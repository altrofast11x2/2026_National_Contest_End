<!-- 돌봄 서비스 신청 (로그인 필요) -->
<section id="form-page">
    <div class="con">
        <div class="global-title">
            <div class="title-wrap">
                <p class="en-title">CARE SERVICE</p>
                <p class="kr-title">돌봄 서비스</p>
            </div>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- 보호자 정보 + 요청 서비스 -->
        <form action="/api/care" method="post" class="page-form">
            <label class="field">
                <span>보호자 이름</span>
                <input type="text" name="name" value="<?= e(ss()->u_name) ?>" placeholder="보호자 이름을 입력해 주세요">
            </label>
            <label class="field">
                <span>전화번호</span>
                <input type="text" name="tel" class="u_tel" value="<?= e(ss()->u_tel) ?>" placeholder="010-0000-0000" maxlength="13">
            </label>
            <label class="field">
                <span>반려동물 종류</span>
                <select name="pet_type">
                    <option value="">반려동물 종류를 선택해 주세요</option>
                    <?php foreach (array_slice(TYPES, 1) as $t) { ?>
                        <option value="<?= e($t) ?>"><?= e($t) ?></option>
                    <?php } ?>
                </select>
            </label>
            <label class="field">
                <!-- 방문돌봄 / 방문산책 / 위탁돌봄 / 병원동행 -->
                <span>요청 서비스</span>
                <select name="service">
                    <option value="">요청 서비스를 선택해 주세요</option>
                    <?php foreach (CARES as $c) { ?>
                        <option value="<?= e($c) ?>"><?= e($c) ?></option>
                    <?php } ?>
                </select>
            </label>
            <label class="field">
                <!-- min을 오늘로 잡아 지난 날짜 차단 -->
                <span>예약 날짜</span>
                <input type="date" name="s_date" min="<?= date('Y-m-d') ?>">
            </label>
            <label class="field wide">
                <span>요청 사항</span>
                <textarea name="request" maxlength="500" placeholder="요청 사항을 입력해 주세요"></textarea>
                <em class="counter" data-for="request"><b>0</b> / 500자</em>
            </label>
            <!-- 완료 후 메인으로 이동 -->
            <button type="submit">신청하기</button>
        </form>
    </div>
</section>
