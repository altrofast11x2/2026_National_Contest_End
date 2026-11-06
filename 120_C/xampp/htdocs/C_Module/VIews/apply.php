<section id="form-page">
    <div class="con">
        <div class="global-title">
            <div class="title-wrap">
                <p class="en-title">APPLY</p>
                <p class="kr-title">펫시터 지원</p>
            </div>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <form action="/api/apply" method="post" class="page-form">
            <label class="field">
                <span>이름</span>
                <input type="text" name="name" value="<?= e(ss()->u_name) ?>" placeholder="이름을 입력해 주세요">
            </label>
            <label class="field">
                <span>나이</span>
                <input type="number" name="age" min="1" placeholder="나이를 입력해 주세요">
            </label>
            <label class="field">
                <span>전화번호</span>
                <input type="text" name="tel" class="u_tel" value="<?= e(ss()->u_tel) ?>" placeholder="010-0000-0000" maxlength="13">
            </label>
            <label class="field">
                <span>활동 가능 지역</span>
                <input type="text" name="region" placeholder="예) 서울 강남구">
            </label>
            <label class="field">
                <span>보유 자격증</span>
                <input type="text" name="license" placeholder="예) 반려동물관리사 2급">
            </label>
            <div class="field">
                <span>가격</span>
                <input type="number" name="price" placeholder="예) 21,000">
            </div>
             <div class="field">
                <!-- 돌봄 가능 동물은 다중 선택 -->
                <span>태그</span>
                <ul class="check-list">
                    <?php foreach (array_slice(TAGS, 0) as $t) { ?>
                        <li><label><input type="checkbox" name="tags[]" value="<?= e($t) ?>" class="tags" ><?= e($t) ?></label></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="field">
                <!-- 돌봄 가능 동물은 다중 선택 -->
                <span>돌봄 가능 동물</span>
                <ul class="check-list">
                    <?php foreach (array_slice(TYPES, 1) as $t) { ?>
                        <li><label><input type="checkbox" name="animals[]" value="<?= e($t) ?>"><?= e($t) ?></label></li>
                    <?php } ?>
                </ul>
            </div>
            <label class="field wide">
                <!-- 글자수 실시간 표시 -->
                <span>지원 동기</span>
                <textarea name="motive" maxlength="500" placeholder="지원 동기를 입력해 주세요"></textarea>
                <em class="counter" data-for="motive"><b>0</b> / 500자</em>
            </label>
            <!-- 완료 후 메인으로 이동 -->
            <button type="submit">지원하기</button>
        </form>
    </div>
</section>
