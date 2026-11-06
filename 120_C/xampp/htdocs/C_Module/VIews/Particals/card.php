<?php
// 필요한 함수들
$booked = !$s['available'] || in_array($s['p_idx'], booked());
$fav = in_array($s['p_idx'], favs());
?>
<!-- 카드 -->
<div class="card" data-idx="<?= $s['p_idx'] ?>">
    <?php if (hot($s)) { ?><span class="badge">인기 펫시터</span><?php } ?>
    <span class="status <?= $booked ? 'bad' : 'ok' ?>"><?= $booked ? '예약 불가' : '예약 가능' ?></span>
    <div class="tumb">
        <img src="<?= profile($s['profile'], '/C-Module/images') ?>" alt="펫시터 <?= e($s['name']) ?> 프로필 사진" title="펫시터 <?= e($s['name']) ?>">
    </div>
    <div class="inner-wrap">
        <div class="info">
            <div class="info-wrap">
                <span class="name"><?= e($s['name']) ?></span>
                <span class="star"><?= $s['rating'] ?>★</span>
                <span class="reviews">리뷰 <?= number_format($s['review_count']) ?></span>
                <span class="reserve">재계약률 <span><?= $s['recontract_rate'] ?>%</span></span>
            </div>
            <span class="location"><?= e($s['region']) ?></span>
        </div>
        <ul class="tags">
            <?php foreach (tags($s['tags']) as $t) { ?><li><?= e($t) ?></li><?php } ?>
        </ul>
        <div class="comment">
            <?php if ($s['review_count']) { ?>
                <ul class="comment-track">
                    <?php foreach ([...ments($s['p_idx']), ments($s['p_idx'])[0]] as $m) { ?><li><?= e($m) ?></li><?php } ?>
                </ul>
            <?php } else { ?>
                <!-- 후기가 아직 없는 신규 펫시터 -->
                <ul class="comment-track new">
                    <li>새로 등록된 펫시터입니다.</li>
                </ul>
            <?php } ?>
        </div>
        <div class="actions">
            <p class="price"><span><?= number_format($s['price']) ?></span>원</p>
            <div class="buttons">
                <button type="button" class="go-reserve"<?= $booked ? 'disabled' : '' ?>><?= $booked ? '예약불가' : '예약하기' ?></button>
                <button type="button" class="go-fav<?= $fav ? ' on' : '' ?>"><?= $fav ? '찜 취소' : '찜하기' ?></button>
            </div>
        </div>
    </div>
</div>
