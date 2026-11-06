<!-- 마이페이지 -->
<section id="mypage">
    <div class="con">
        <div class="global-title">
            <div class="title-wrap">
                <p class="en-title">MYPAGE</p>
                <p class="kr-title">마이페이지</p>
            </div>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="my-box">
            <!-- 내 정보 -->
            <h3 class="box-title">내 정보</h3>
            <div class="my-info">
                <img src="<?= profile(ss()->u_profile) ?>" alt="<?= e(ss()->u_name) ?> 회원의 프로필 사진" title="<?= e(ss()->u_name) ?>">
                <ul>
                    <li><b>이름</b><?= e(ss()->u_name) ?></li>
                    <li><b>아이디</b><?= e(ss()->u_id) ?></li>
                    <li><b>이메일</b><?= e(ss()->u_email) ?></li>
                    <li><b>전화번호</b><?= e(ss()->u_tel) ?></li>
                </ul>
                <label for="pop-profile" class="btn-fill">내 정보 수정</label>
            </div>
        </div>

        <div class="my-box">
            <h3 class="box-title">반려동물 정보 <label for="pop-pet" class="btn-line pet-add">반려동물 정보 등록</label></h3>
            <!-- 등록한 반려동물 목록 -->
            <div class="pet-list">
                <?php if (!$pets) { ?><p class="empty">등록된 반려동물이 없습니다.</p><?php } ?>
                <?php foreach ($pets as $p) { ?>
                    <div class="pet">
                        <img src="<?= profile($p['profile']) ?>" alt="반려동물 <?= e($p['name']) ?> 사진" title="<?= e($p['name']) ?>">
                        <ul>
                            <li><b>이름</b><?= e($p['name']) ?></li>
                            <li><b>종류</b><?= e($p['kind']) ?></li>
                            <li><b>품종</b><?= e($p['breed']) ?></li>
                            <li><b>나이</b><?= e($p['age']) ?>살</li>
                            <li><b>성별</b><?= e($p['gender']) ?></li>
                            <li><b>특이사항</b><?= e($p['note']) ?></li>
                        </ul>
                        <label for="pop-pet" class="btn-line pet-edit" data-pet='<?= json_encode($p, JSON_UNESCAPED_UNICODE) ?>'>수정</label>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="my-box">
            <!-- 찜한 펫시터 -->
            <h3 class="box-title">찜한 펫시터</h3>
            <div class="wrap fav-wrap">
                <?php if (!$favorites) { ?><p class="empty">찜한 펫시터가 없습니다.</p><?php } ?>
                <?php foreach ($favorites as $s) part('card', ['s' => $s]); ?>
            </div>
        </div>

        <div class="my-box">
            <!-- 아직 안 지난 예약만 -->
            <h3 class="box-title">펫시터 예약</h3>
            <table class="list-table">
                <tr>
                    <th>펫시터</th>
                    <th>반려동물 종류</th>
                    <th>예약 날짜</th>
                    <th>요청 사항</th>
                    <th>취소</th>
                </tr>
                <?php if (!$reserves) { ?><tr><td colspan="5" class="empty">예약 내역이 없습니다.</td></tr><?php } ?>
                <?php foreach ($reserves as $r) { ?>
                    <tr>
                        <td><?= e($r['sitter']) ?></td>
                        <td><?= e($r['pet_type']) ?></td>
                        <td><?= e($r['r_date']) ?></td>
                        <td class="req"><?= e($r['request']) ?></td>
                        <td><label for="pop-cancel" class="btn-del cancel" data-kind="reserve" data-idx="<?= $r['r_idx'] ?>">취소</label></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="my-box">
            <h3 class="box-title">돌봄 서비스 신청 내역</h3>
            <table class="list-table">
                <tr>
                    <th>이름</th>
                    <th>반려동물 종류</th>
                    <th>요청 서비스</th>
                    <th>예약 날짜</th>
                    <th>요청 사항</th>
                    <th>취소</th>
                </tr>
                <?php if (!$cares) { ?><tr><td colspan="6" class="empty">신청 내역이 없습니다.</td></tr><?php } ?>
                <?php foreach ($cares as $c) { ?>
                    <tr>
                        <td><?= e($c['name']) ?></td>
                        <td><?= e($c['pet_type']) ?></td>
                        <td><?= e($c['service']) ?></td>
                        <td><?= e($c['s_date']) ?></td>
                        <td class="req"><?= e($c['request']) ?></td>
                        <td><label for="pop-cancel" class="btn-del cancel" data-kind="care" data-idx="<?= $c['s_idx'] ?>">취소</label></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>

<input type="radio" name="pop" id="pop-profile" hidden>
<form action="/api/profile" method="post" enctype="multipart/form-data" class="modal">
    <label for="close" class="dim"></label>
    <div class="card">
        <label for="close" class="modal-close">
            <div class="box box-close">
                <div class="face front">X</div>
                <div class="face left"></div>
                <div class="face top"></div>
            </div>
        </label>
        <h2>PROFILE<i>/</i><span>내 정보 수정</span></h2>
        <label class="field">
            <span>NAME<i>/</i><em>이름</em></span>
            <input type="text" name="u_name" value="<?= e(ss()->u_name) ?>">
        </label>
        <label class="field">
            <span>EMAIL<i>/</i><em>이메일</em></span>
            <input type="text" name="u_email" value="<?= e(ss()->u_email) ?>">
        </label>
        <label class="field">
            <span>TEL<i>/</i><em>전화번호</em></span>
            <input type="text" name="u_tel" class="u_tel" value="<?= e(ss()->u_tel) ?>" placeholder="010-0000-0000" maxlength="13">
        </label>
        <label class="field">
            <span>PHOTO<i>/</i><em>프로필 사진</em></span>
            <input type="file" name="u_profile" accept="image/*">
        </label>
        <button type="submit">수정하기</button>
    </div>
</form>

<!-- 반려동물 등록 / 수정 모달 -->
<input type="radio" name="pop" id="pop-pet" hidden>
<form action="/api/pet" method="post" enctype="multipart/form-data" class="modal" id="pet-form">
    <label for="close" class="dim"></label>
    <div class="card">
        <label for="close" class="modal-close">
            <div class="box box-close">
                <div class="face front">X</div>
                <div class="face left"></div>
                <div class="face top"></div>
            </div>
        </label>
        <h2>MY PET<i>/</i><span>반려동물 정보</span></h2>
        <input type="hidden" name="pet_idx" value="">
        <label class="field">
            <span>PHOTO<i>/</i><em>사진</em></span>
            <input type="file" name="profile" accept="image/*">
        </label>
        <label class="field">
            <span>NAME<i>/</i><em>이름</em></span>
            <input type="text" name="name" placeholder="이름">
        </label>
        <label class="field">
            <span>KIND<i>/</i><em>종류</em></span>
            <select name="kind">
                <option value="">종류를 선택해 주세요</option>
                <?php foreach (array_slice(TYPES, 1) as $t) { ?>
                    <option value="<?= e($t) ?>"><?= e($t) ?></option>
                <?php } ?>
            </select>
        </label>
        <label class="field">
            <span>BREED<i>/</i><em>품종</em></span>
            <input type="text" name="breed" placeholder="예) 푸들">
        </label>
        <label class="field">
            <span>AGE<i>/</i><em>나이</em></span>
            <input type="number" name="age" min="0" placeholder="나이">
        </label>
        <label class="field">
            <span>GENDER<i>/</i><em>성별</em></span>
            <select name="gender">
                <option value="">성별을 선택해 주세요</option>
                <option value="수컷">수컷</option>
                <option value="암컷">암컷</option>
            </select>
        </label>
        <label class="field">
            <span>NOTE<i>/</i><em>특이사항</em></span>
            <textarea name="note" placeholder="특이사항을 입력해 주세요"></textarea>
        </label>
        <button type="submit" id="pet-submit">등록하기</button>
    </div>
</form>

<!-- 취소 모달, 사유 필수 -->
<input type="radio" name="pop" id="pop-cancel" hidden>
<form action="/api/cancel" method="post" class="modal" id="cancel-form">
    <label for="close" class="dim"></label>
    <div class="card">
        <input type="hidden" name="type" value="">
        <input type="hidden" name="idx" value="">
        <label for="close" class="modal-close">
            <div class="box box-close">
                <div class="face front">X</div>
                <div class="face left"></div>
                <div class="face top"></div>
            </div>
        </label>
        <h2>CANCEL<i>/</i><span>취소하기</span></h2>
        <p class="greet">취소 사유를 입력해 주세요.</p>
        <label class="field">
            <span>REASON<i>/</i><em>취소 사유</em></span>
            <textarea name="reason" placeholder="취소 사유"></textarea>
        </label>
        <button type="submit">취소하기</button>
    </div>
</form>
