<?php
// 태그 및 필터
const TYPES = ['전체', '강아지', '고양이', '소동물', '특수 케어'];
const CARES = ['방문 돌봄', '방문 산책', '위탁 돌봄', '병원 동행'];
const TAGS = ['전체', '산책', '소형견', '노령견 케어', '고양이', '약 먹이기', '실내놀이', '방문돌봄', '대형견', '소동물', '위탁돌봄', '24시간 케어', '병원동행', '특수케어'];
// 전화번호 형식
const TEL = '/^010-\d{4}-\d{4}$/';
const HOME_LIMIT = 6;
const NEW_PRICE = 20000;

get('/', function () {
  $sitters = DB::fetchAll("SELECT * FROM petsitters WHERE review_count >= ? AND rating >= ? ORDER BY review_count DESC LIMIT " . HOME_LIMIT, [HOT_REVIEW, HOT_RATING]);
  view('home', compact('sitters'));
});

get('/about', fn() => view('about'));
post('/api/login', function () {
  $id = trim($_POST['u_id'] ?? '');
  $pw = $_POST['u_pw'] ?? '';
  if (!$id || !$pw) back('아이디와 비밀번호를 입력해 주세요.');
  $u = DB::fetch("SELECT * FROM users WHERE u_id=?", [$id]);
  if (!$u || !password_verify($pw, $u['u_pw'])) back('아이디 또는 비밀번호를 확인해 주세요.');
  DB::run("UPDATE users SET u_token=? WHERE u_idx=?", [$u['u_token'] = bin2hex(random_bytes(16)), $u['u_idx']]);
  unset($u['u_pw']);
  $_SESSION['ss'] = $u;
  move('/', '로그인되었습니다.');
});
// 로그인 상태에서 회원가입 메뉴를 눌렀을 때
get('/join', function () {
  if (ss()) move('/', '이미 가입된 회원입니다.');
  move('/');
});
post('/api/register', function () {
  if (ss()) move('/', '이미 가입된 회원입니다.');
  extract($_POST);
  if (!$u_id || !$u_pw || !$u_name || !$u_email || !$u_tel) back('모든 항목을 입력해 주세요.');
  if (DB::fetch("SELECT u_idx FROM users WHERE u_id = ?", [$u_id])) back('이미 가입된 회원입니다.');
  if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) back('이메일 형식이 올바르지 않습니다.');
  if (DB::fetch("SELECT u_idx FROM users WHERE u_email = ?", [$u_email])) back('이미 가입된 이메일입니다.');
  if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $u_pw)) back('비밀번호는 영문과 숫자를 조합하여 8자 이상으로 입력해 주세요.');
  if (!preg_match(TEL, $u_tel)) back('전화번호는 010-0000-0000 형식으로 입력해 주세요.');
  DB::exec("INSERT INTO users(u_id, u_pw, u_name, u_email, u_tel) VALUES (?,?,?,?,?)", [$u_id, password_hash($u_pw, PASSWORD_DEFAULT), $u_name, $u_email, $u_tel]);
  move('/', '회원가입이 완료되었습니다');
});
// 아이디 중복 확인
post('/api/check', function () {
  extract($_POST);
  $duped = DB::fetch("SELECT u_idx FROM users WHERE u_id = ?", [$u_id]);
  echo json_encode(['ok' => !$duped, 'msg' => $duped ? '이미 사용 중인 아이디입니다.' : '사용할 수 있는 아이디입니다.'], JSON_UNESCAPED_UNICODE);
});
get('/api/logout', function () {
  session_destroy();
  move('/', '로그아웃되었습니다.');
});
get('/logout', function () {
  session_destroy();
  move('/', '로그아웃되었습니다.');
});
get('/petsitter', fn() => view('petsitter', ['only' => 0]));
get('/popular', fn() => view('petsitter', ['only' => 1]));
// 목록에 뿌릴 펫시터 전체 
get('/api/petsitter', function () {
  $list = [];
  foreach (DB::fetchAll("SELECT * FROM petsitters") as $r) {
    $r['html'] = render('card', ['s' => $r]);
    $r['tags'] = tags($r['tags']);
    $r['popular'] = hot($r);
    $list[] = $r;
  }
  echo json_encode($list, JSON_UNESCAPED_UNICODE);
});
// 찜하기 토글
post('/api/favorite', function () {
  if (!ss()) return print json_encode(['ok' => false, 'msg' => '로그인 후 이용해 주세요.'], JSON_UNESCAPED_UNICODE);
  extract($_POST);
  $off = DB::run("DELETE FROM favorites WHERE u_idx = ? AND p_idx = ?", [ss()->u_idx, $p_idx]);
  if (!$off) DB::exec("INSERT INTO favorites(u_idx, p_idx) VALUES (?,?)", [ss()->u_idx, $p_idx]);
  echo json_encode(['ok' => true, 'fav' => !$off, 'msg' => $off ? '찜하기가 취소되었습니다.' : '관심 펫시터로 등록되었습니다.'], JSON_UNESCAPED_UNICODE);
});
get('/apply', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  view('apply');
});
post('/api/apply', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  extract($_POST);
  $animals = implode(', ', $_POST['animals'] ?? []);
  if (!$name || !$age || !$tel || !$region || !$license || !$motive || !$animals) back('모든 항목을 입력해 주세요.');
  if (!preg_match(TEL, $tel)) back('전화번호는 010-0000-0000 형식으로 입력해 주세요.');
  DB::exec(
    "INSERT INTO applies(u_idx, name, age, tel, region, license, motive, animals) VALUES (?,?,?,?,?,?,?,?)",
    [ss()->u_idx, $name, $age, $tel, $region, $license, $motive, $animals]
  );
  move('/', '펫시터 지원이 완료되었습니다.');
});

get('/reserve', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  $sitters = DB::fetchAll("SELECT * FROM petsitters ORDER BY name");
  $booked = [];
  foreach (DB::fetchAll("SELECT p_idx, r_date FROM reservations WHERE r_date >= CURDATE()") as $b) $booked[$b['p_idx']][] = $b['r_date'];
  view('reserve', compact('sitters', 'booked'));
});
post('/api/reserve', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  extract($_POST);
  if (!$p_idx || !$name || !$tel || !$pet_type || !$r_date || !$request) back('모든 항목을 입력해 주세요.');
  if (!preg_match(TEL, $tel)) back('전화번호는 010-0000-0000 형식으로 입력해 주세요.');
  if ($r_date < date('Y-m-d')) back('오늘 이전 날짜는 선택할 수 없습니다.');
  if (DB::fetch("SELECT r_idx FROM reservations WHERE p_idx = ? AND r_date = ?", [$p_idx, $r_date])) back('이미 예약된 날짜입니다.');
  DB::exec(
    "INSERT INTO reservations(u_idx, p_idx, name, tel, pet_type, r_date, request) VALUES (?,?,?,?,?,?,?)",
    [ss()->u_idx, $p_idx, $name, $tel, $pet_type, $r_date, $request]
  );
  move('/', '펫시터 예약이 완료되었습니다.');
});

get('/care', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  view('care');
});
post('/api/care', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  extract($_POST);
  if (!$name || !$tel || !$pet_type || !$service || !$s_date || !$request) back('모든 항목을 입력해 주세요.');
  if (!preg_match(TEL, $tel)) back('전화번호는 010-0000-0000 형식으로 입력해 주세요.');
  if ($s_date < date('Y-m-d')) back('오늘 이전 날짜는 선택할 수 없습니다.');
  DB::exec(
    "INSERT INTO services(u_idx, name, tel, pet_type, service, s_date, request) VALUES (?,?,?,?,?,?,?)",
    [ss()->u_idx, $name, $tel, $pet_type, $service, $s_date, $request]
  );
  move('/', '돌봄 서비스 신청이 완료되었습니다.');
});

get('/mypage', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  $me = ss()->u_idx;
  $reserves = DB::fetchAll("SELECT r.*, p.name sitter FROM reservations r LEFT JOIN petsitters p ON p.p_idx = r.p_idx WHERE r.u_idx = ? AND r.r_date >= CURDATE() ORDER BY r.r_date", [$me]);
  $cares = DB::fetchAll("SELECT * FROM services WHERE u_idx = ? AND s_date >= CURDATE() ORDER BY s_date", [$me]);
  $favorites = DB::fetchAll("SELECT p.* FROM favorites f LEFT JOIN petsitters p ON p.p_idx = f.p_idx WHERE f.u_idx = ? ORDER BY f.f_idx DESC", [$me]);
  $pets = DB::fetchAll("SELECT * FROM pets WHERE u_idx = ? ORDER BY pet_idx", [$me]);
  view('mypage', compact('reserves', 'cares', 'favorites', 'pets'));
});
post('/api/profile', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  extract($_POST);
  if (!$u_name || !$u_email || !$u_tel) back('모든 항목을 입력해 주세요.');
  if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) back('이메일 형식이 올바르지 않습니다.');
  if (!preg_match(TEL, $u_tel)) back('전화번호는 010-0000-0000 형식으로 입력해 주세요.');
  $img = upload($_FILES['u_profile'] ?? null);
  if ($img === false) back('프로필 사진은 이미지 파일만 등록할 수 있습니다.');
  // 새 사진을 안 올리면 기존 사진 유지
  DB::run("UPDATE users SET u_name=?, u_email=?, u_tel=?, u_profile=? WHERE u_idx=?", [$u_name, $u_email, $u_tel, $img ?: ss()->u_profile, ss()->u_idx]);
  move('/mypage', '내 정보가 수정되었습니다.');
});
// pet_idx 있으면 수정, 없으면 등록
post('/api/pet', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  extract($_POST);
  if (!$name || !$kind || !$breed || !$age || !$gender || !$note) back('모든 항목을 입력해 주세요.');
  $img = upload($_FILES['profile'] ?? null);
  if ($img === false) back('사진은 이미지 파일만 등록할 수 있습니다.');
  if ($pet_idx) {
    $old = DB::fetch("SELECT profile FROM pets WHERE pet_idx = ? AND u_idx = ?", [$pet_idx, ss()->u_idx]);
    if (!$old) back('수정할 권한이 없습니다.');
    DB::run("UPDATE pets SET profile=?, name=?, kind=?, breed=?, age=?, gender=?, note=? WHERE pet_idx=?", [$img ?: $old['profile'], $name, $kind, $breed, $age, $gender, $note, $pet_idx]);
    move('/mypage', '반려동물 정보가 수정되었습니다.');
  }
  DB::exec("INSERT INTO pets(u_idx, profile, name, kind, breed, age, gender, note) VALUES (?,?,?,?,?,?,?,?)", [ss()->u_idx, $img, $name, $kind, $breed, $age, $gender, $note]);
  move('/mypage', '반려동물 정보가 등록되었습니다.');
});
post('/api/cancel', function () {
  if (!ss()) return move('/', '로그인 후 이용해 주세요.');
  extract($_POST);
  if (!trim($reason)) back('취소 사유를 입력해 주세요.');
  $table = $type === 'care' ? 'services' : 'reservations';
  $key = $type === 'care' ? 's_idx' : 'r_idx';
  // 관리자는 전체, 회원은 본인 것만
  if (admin()) DB::run("DELETE FROM $table WHERE $key = ?", [$idx]);
  else DB::run("DELETE FROM $table WHERE $key = ? AND u_idx = ?", [$idx, ss()->u_idx]);
  move(admin() ? '/admin' : '/mypage', '취소가 완료되었습니다.');
});

get('/admin', function () {
  if (!admin()) return move('/', '관리자 페이지입니다.');
  $users = DB::fetchAll("SELECT * FROM users WHERE u_role = 0 ORDER BY created_at DESC");
  $reserves = DB::fetchAll("SELECT r.*, u.u_id, u.u_name FROM reservations r LEFT JOIN users u ON u.u_idx = r.u_idx ORDER BY r.r_idx DESC");
  $cares = DB::fetchAll("SELECT s.*, u.u_id, u.u_name FROM services s LEFT JOIN users u ON u.u_idx = s.u_idx ORDER BY s.s_idx DESC");
  view('admin', compact('users', 'reserves', 'cares'));
});
post('/api/member/delete', function () {
  if (!admin()) return move('/', '관리자 페이지입니다.');
  extract($_POST);
  // 남는 기록 없게 관련 자료부터 정리
  foreach (['favorites', 'reservations', 'services', 'applies', 'pets'] as $t) DB::run("DELETE FROM $t WHERE u_idx = ?", [$idx]);
  DB::run("DELETE FROM users WHERE u_idx = ? AND u_role = 0", [$idx]);
  move('/admin', '회원이 삭제되었습니다.');
});

get('/admin/apply', function () {
  if (!admin()) return move('/', '관리자 페이지입니다.');
  $applies = DB::fetchAll("SELECT a.*, u.u_id FROM applies a LEFT JOIN users u ON u.u_idx = a.u_idx ORDER BY a.a_idx DESC");
  view('admin_apply', compact('applies'));
});
post('/api/apply/approve', function () {
  if (!admin()) return move('/', '관리자 페이지입니다.');
  extract($_POST);
  $a = DB::fetch("SELECT * FROM applies WHERE a_idx = ?", [$idx]);
  if (!$a) back('존재하지 않는 지원 내역입니다.');
  $animals = array_map('trim', explode(',', $a['animals']));
  DB::exec(
    "INSERT INTO petsitters(name, region, pet_type, price, tags) VALUES (?,?,?,?,'[]')",
    [$a['name'], $a['region'], $animals[0], NEW_PRICE]
  );
  DB::run("DELETE FROM applies WHERE a_idx = ?", [$idx]);
  move('/admin/apply', '승인이 완료되었습니다.');
});
post('/api/apply/reject', function () {
  if (!admin()) return move('/', '관리자 페이지입니다.');
  extract($_POST);
  DB::run("DELETE FROM applies WHERE a_idx = ?", [$idx]);
  
  move('/admin/apply', '거절이 완료되었습니다.');
});
get('/api/notify', function () {
    if (!ss()) json(['msgs' => []]);
    $rows = DB::fetchAll("SELECT msg FROM notices WHERE u_idx=? AND seen=0 ORDER BY n_idx", [ss()->u_idx]);
    DB::run("UPDATE notices SET seen=1 WHERE u_idx=?", [ss()->u_idx]);
    json(['msgs' => array_column($rows, 'msg')]);
});
