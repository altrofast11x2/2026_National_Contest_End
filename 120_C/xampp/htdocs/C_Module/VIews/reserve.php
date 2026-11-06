<?php $pick = (int) ($_GET['p'] ?? 0); ?>
<!-- 펫시터 예약 (로그인 필요) -->
<section id="form-page">
    <div class="con">
        <div class="global-title">
            <div class="title-wrap">
                <p class="en-title">RESERVATION</p>
                <p class="kr-title">예약하기</p>
            </div>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <form action="/api/reserve" method="post" class="page-form" id="reserve-form">
            <label class="field">
                <!-- 카드에서 넘어오면 미리 선택됨 -->
                <span>펫시터</span>
                <select name="p_idx">
                    <option value="">펫시터를 선택해 주세요</option>
                    <?php foreach ($sitters as $s) { ?>
                        <option value="<?= $s['p_idx'] ?>" <?= $pick === (int) $s['p_idx'] ? 'selected' : '' ?> <?= $s['available'] ? '' : 'disabled' ?>>
                            <?= e($s['name']) ?> · <?= e($s['region']) ?> · <?= number_format($s['price']) ?>원<?= $s['available'] ? '' : ' (예약 불가)' ?>
                        </option>
                    <?php } ?>
                </select>
            </label>
            <label class="field">
                <span>이름</span>
                <input type="text" name="name" value="<?= e(ss()->u_name) ?>" placeholder="이름을 입력해 주세요">
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
                <!-- 중복 날짜면 아래에 바로 안내 -->
                <span>예약 날짜</span>
                <input type="date" name="r_date" min="<?= date('Y-m-d') ?>">
                <em class="msg" id="msg-date"></em>
            </label>
            <label class="field wide">
                <!-- 글자수 실시간 표시 -->
                <span>요청 사항</span>
                <textarea name="request" maxlength="500" placeholder="요청 사항을 입력해 주세요"></textarea>
                <em class="counter" data-for="request"><b>0</b> / 500자</em>
            </label>
            <!-- 완료 후 메인으로 이동 -->
            <button type="submit"  onclick="console.log('clicked')">예약하기</button>
        </form>
    </div>
</section>
