<!-- 관리자 - 회원 / 예약 / 신청 관리 -->
<section id="mypage">
    <div class="con">
        <div class="global-title">
            <div class="title-wrap">
                <p class="en-title">ADMIN</p>
                <p class="kr-title">예약/신청 내역, 회원 관리</p>
            </div>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="my-box">
            <!-- 최신 가입순 -->
            <h3 class="box-title">회원 관리</h3>
            <table class="list-table">
                <tr>
                    <th>이름</th>
                    <th>아이디</th>
                    <th>이메일</th>
                    <th>전화번호</th>
                    <th>가입일</th>
                    <th>삭제</th>
                </tr>
                <?php if (!$users) { ?><tr><td colspan="6" class="empty">가입된 회원이 없습니다.</td></tr><?php } ?>
                <?php foreach ($users as $u) { ?>
                    <tr>
                        <td><?= e($u['u_name']) ?></td>
                        <td><?= e($u['u_id']) ?></td>
                        <td><?= e($u['u_email']) ?></td>
                        <td><?= e($u['u_tel']) ?></td>
                        <td><?= substr($u['created_at'], 0, 10) ?></td>
                        <td><label for="pop-user" class="btn-del user-del" data-idx="<?= $u['u_idx'] ?>" data-name="<?= e($u['u_name']) ?>">삭제</label></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="my-box">
            <!-- 전체 예약, 최신순 -->
            <h3 class="box-title">펫시터 예약</h3>
            <table class="list-table">
                <tr>
                    <th>회원 이름</th>
                    <th>회원 아이디</th>
                    <th>전화번호</th>
                    <th>반려동물 종류</th>
                    <th>예약 날짜</th>
                    <th>요청 사항</th>
                    <th>취소</th>
                </tr>
                <?php if (!$reserves) { ?><tr><td colspan="7" class="empty">예약 내역이 없습니다.</td></tr><?php } ?>
                <?php foreach ($reserves as $r) { ?>
                    <tr>
                        <td><?= e($r['u_name']) ?></td>
                        <td><?= e($r['u_id']) ?></td>
                        <td><?= e($r['tel']) ?></td>
                        <td><?= e($r['pet_type']) ?></td>
                        <td><?= e($r['r_date']) ?></td>
                        <td class="req"><?= e($r['request']) ?></td>
                        <td><label for="pop-cancel" class="btn-del cancel" data-kind="reserve" data-idx="<?= $r['r_idx'] ?>">취소</label></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="my-box">
            <!-- 전체 돌봄 신청 -->
            <h3 class="box-title">돌봄 서비스 신청 내역</h3>
            <table class="list-table">
                <tr>
                    <th>회원 이름</th>
                    <th>회원 아이디</th>
                    <th>전화번호</th>
                    <th>반려동물 종류</th>
                    <th>요청 서비스</th>
                    <th>예약 날짜</th>
                    <th>요청 사항</th>
                    <th>취소</th>
                </tr>
                <?php if (!$cares) { ?><tr><td colspan="8" class="empty">신청 내역이 없습니다.</td></tr><?php } ?>
                <?php foreach ($cares as $c) { ?>
                    <tr>
                        <td><?= e($c['u_name']) ?></td>
                        <td><?= e($c['u_id']) ?></td>
                        <td><?= e($c['tel']) ?></td>
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

<!-- 회원 삭제 확인 모달 -->
<input type="radio" name="pop" id="pop-user" hidden>
<form action="/api/member/delete" method="post" class="modal" id="user-form">
    <label for="close" class="dim"></label>
    <div class="card">
        <input type="hidden" name="idx" value="">
        <label for="close" class="modal-close">
            <div class="box box-close">
                <div class="face front">X</div>
                <div class="face left"></div>
                <div class="face top"></div>
            </div>
        </label>
        <h2>DELETE<i>/</i><span>회원 삭제</span></h2>
        <p class="greet"><b id="del-name"></b> 회원을 삭제하시겠습니까?</p>
        <button type="submit">삭제하기</button>
    </div>
</form>

<!-- 취소 모달 -->
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
