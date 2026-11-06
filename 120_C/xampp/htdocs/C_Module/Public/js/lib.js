const $ = s => document.querySelector(s)
const $$ = s => [...document.querySelectorAll(s)]

// 전화번호는 하이픈
$$('.u_tel').forEach(i => i.oninput = () => i.value = i.value
    .replace(/\D/g, '')
    .slice(0, 11)
    .replace(/^(\d{3})(\d{0,4})(\d{0,4})$/, (_, a, b, c) => [a, b, c].filter(Boolean).join('-')))

// 글자수 실시간 표시
$$('textarea[maxlength]').forEach(t => t.oninput = () => $(`.counter[data-for="${t.name}"] b`).textContent = t.value.length)

const join = $('#join-form')
if (join) {
    let checked = ''
    const v = n => join[n].value.trim()
    const say = (n, m, ok) => Object.assign($('#msg-' + n), { textContent: m, className: ok ? 'msg ok' : 'msg' })

    // 아이디 중복 확인
    $('#check-id').onclick = async () => {
        if (!v('u_id')) return say('u_id', '아이디를 입력하세요.', false)
        const body = new FormData(); body.append('u_id', v('u_id'))
        const d = await fetch('/api/check', { method: 'POST', body }).then(r => r.json())
        say('u_id', d.msg, d.ok)
        checked = d.ok ? v('u_id') : ''
    }
    join.onsubmit = e => {
        const bad = [
            ['u_id', !v('u_id') ? '아이디를 입력해 주세요.' : checked !== v('u_id') ? '아이디 중복 확인을 해주세요.' : ''],
            ['u_pw', v('u_pw').length < 8 ? '비밀번호는 8자 이상 입력해 주세요.' : ''],
            ['u_name', !v('u_name') ? '이름을 입력해 주세요.' : ''],
            ['u_email', /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v('u_email')) ? '' : '이메일 형식이 올바르지 않습니다.'],
            ['u_tel', /^010-\d{4}-\d{4}$/.test(v('u_tel')) ? '' : '전화번호는 010-0000-0000 형식으로 입력해 주세요.'],
        ]
        bad.forEach(([n, m]) => say(n, m))
        if (bad.some(([, m]) => m)) e.preventDefault()
    }
}

const page = $('#sitter-page')
if (page) {
    // localStorage
    const KEY = 'sitter-filter'
    const sorts = {
        popular: (a, b) => b.review_count * b.rating - a.review_count * a.rating,
        rating: (a, b) => b.rating - a.rating,
        review: (a, b) => b.review_count - a.review_count,
        price: (a, b) => a.price - b.price,
    }
    // 조건에 맞는 카드만 새로고침 없이 다시 그림
    const render = () => {
        localStorage.setItem(KEY, JSON.stringify(f))
        $('#sort').value = f.sort
        $$('.cat').forEach(b => b.classList.toggle('on', b.dataset.type == f.type))
        $$('.tag').forEach(b => b.classList.toggle('on', f.tags.includes(b.dataset.tag)))
        const list = all
            .filter(s => (page.dataset.only != 1 || s.popular) && (f.type == '전체' || s.pet_type == f.type) && f.tags.every(t => s.tags.includes(t)))
            .sort(sorts[f.sort])
        $('#count').textContent = list.length
        $('#sitter-list').innerHTML = list.map(s => s.html).join('') || '<p class="empty">조건에 맞는 펫시터가 없습니다.</p>'
    }
    let all = [], f = JSON.parse(localStorage.getItem(KEY)) || { type: '전체', sort: 'popular', tags: [] }

    fetch('/api/petsitter').then(r => r.json()).then(d => (all = d, render()))
    // 카테고리
    $$('.cat, .tag').forEach(b => b.onclick = () => {
        const { type, tag } = b.dataset
        if (type) f.type = type
        else f.tags = f.tags.includes(tag) ? f.tags.filter(x => x != tag) : [...f.tags, tag]
        render()
    })
    $('#sort').onchange = () => (f.sort = $('#sort').value, render())
}

document.onclick = async ({ target: t }) => {
    // data-idx는 펫시터 카드에만 있어서 모달 상자랑 안 섞임
    const idx = t.closest('.card[data-idx]')?.dataset.idx
    if (t.matches('.go-reserve')) {
        if (document.body.dataset.login != 1) return alert('로그인 후 이용해 주세요.'), location.replace(location.pathname)
        location.href = '/reserve?p=' + idx
    }
    if (t.matches('.go-fav')) {
        const body = new FormData(); body.append('p_idx', idx)
        const d = await fetch('/api/favorite', { method: 'POST', body }).then(r => r.json())
        alert(d.msg)
        if (!d.ok) return
        t.classList.toggle('on', d.fav)
        t.textContent = d.fav ? '찜 취소' : '찜하기'
    }
    // 수정일 때는 기존 값을 모달에 채워넣음
    if (t.matches('.pet-add, .pet-edit')) {
        const form = $('#pet-form'), pet = JSON.parse(t.dataset.pet || '{}')
        form.reset()
            ;['pet_idx', 'name', 'kind', 'breed', 'age', 'gender', 'note'].forEach(k => form[k].value = pet[k] ?? '')
        $('#pet-submit').textContent = pet.pet_idx ? '수정하기' : '등록하기'
    }
    if (t.matches('.cancel')) {
        const form = $('#cancel-form')
        form.type.value = t.dataset.kind
        form.idx.value = t.dataset.idx
        form.reason.value = ''
    }
    if (t.matches('.user-del')) {
        $('#user-form').idx.value = t.dataset.idx
        $('#del-name').textContent = t.dataset.name
    }
}
let checked = false
$$("input[name='tags[]'").forEach(e => {
    e.addEventListener('input',()=>{
        if($("input[name='tags[]'").checked > 3){
            return alert("태그는 최대 3개까지 가능합니다.")
        }
    })
})

const rf = $('#reserve-form')
if (rf) {
    const booked = JSON.parse(rf.dataset.booked)
    const days = () => booked[rf.p_idx.value] || []
    // 날짜나 펫시터를 바꾸면 바로 중복인지 알려줌
    const check = () => $('#msg-date').textContent = days().includes(rf.r_date.value) ? '이미 예약된 날짜입니다.' : ''
    rf.r_date.onchange = rf.p_idx.onchange = check
    rf.onsubmit = e => days().includes(rf.r_date.value) && (alert('이미 예약된 날짜입니다.'), e.preventDefault())
}
// // 실시간 메시지
// setInterval(async () => {
//     const d = await fetch('/api/notify').then(r => r.json());
//     if (d.logout) {
//         alert(d.logout);
//         return location.replace('/');
//     }
//     d.msgs.forEach(m => {
//         const el = document.createElement('div');
//         el.className = 'toast';
//         el.textContent = m;
//         document.querySelector('.toast-area').append(el);
//         setTimeout(() => el.remove(), 3000);
//     });
// }, 2000);
