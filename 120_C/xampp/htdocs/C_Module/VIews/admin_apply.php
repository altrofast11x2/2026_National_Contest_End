<!-- 관리자 - 펫시터 지원 관리 -->
<section id="mypage">
    <div class="con">
        <div class="global-title">
            <div class="title-wrap">
                <p class="en-title">APPLY</p>
                <p class="kr-title">펫시터 지원 관리</p>
            </div>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="my-box">
            <!-- 지원 내역, 최신순 -->
            <h3 class="box-title">펫시터 지원 내역</h3>
            <table class="list-table">
                <tr>
                    <th>회원 이름</th>
                    <th>나이</th>
                    <th>전화번호</th>
                    <th>활동 가능 지역</th>
                    <th>보유 자격증</th>
                    <!-- 길어질 수 있어 줄바꿈 처리 -->
                    <th>지원 동기</th>
                    <th>돌봄 가능 동물</th>
                    <th>처리</th>
                </tr>
                <?php if (!$applies) { ?><tr><td colspan="8" class="empty">지원 내역이 없습니다.</td></tr><?php } ?>
                <?php foreach ($applies as $a) { ?>
                    <tr>
                        <td><?= e($a['name']) ?></td>
                        <td><?= e($a['age']) ?></td>
                        <td><?= e($a['tel']) ?></td>
                        <td><?= e($a['region']) ?></td>
                        <td><?= e($a['license']) ?></td>
                        <td class="req"><?= e($a['motive']) ?></td>
                        <td><?= e($a['animals']) ?></td>
                        <td class="ctrl">
                            <!-- 승인하면 전체 펫시터에 등록됨 -->
                            <form action="/api/apply/approve" method="post">
                                <input type="hidden" name="idx" value="<?= $a['a_idx'] ?>">
                                <button type="submit" class="btn-fill">승인</button>
                            </form>
                            <!-- 거절하면 목록에서 삭제 -->
                            <form action="/api/apply/reject" method="post">
                                <input type="hidden" name="idx" value="<?= $a['a_idx'] ?>">
                                <button type="submit" class="btn-del">거절</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>
