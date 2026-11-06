<?php
// 등록된 태그를 중복 없이 모아서 필터 버튼으로 씀
$all = array_unique(array_merge(...array_map(fn($r) => tags($r['tags']), DB::fetchAll("SELECT tags FROM petsitters"))));
sort($all);
?>
<!-- only가 1이면 스크립트가 인기 펫시터만 걸러냄 -->
<section id="sitter-page" data-only="<?= $only ?>">
    <div class="con">
        <div class="global-title">
            <div class="title-wrap">
                <p class="en-title"><?= $only ? 'POPULAR PETSITTERS' : 'ALL PETSITTERS' ?></p>
                <p class="kr-title"><?= $only ? '인기 펫시터' : '전체 펫시터' ?></p>
            </div>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- 반려동물 종류별 카테고리 -->
        <ul class="cat-list">
            <?php foreach (TYPES as $t) { ?>
                <li><button type="button" class="cat" data-type="<?= e($t) ?>"><?= e($t) ?></button></li>
            <?php } ?>
        </ul>
        <!-- 태그 필터, 여러 개 동시 선택 가능 -->
        <ul class="tag-list">
            <?php foreach ($all as $t) { ?>
                <li><button type="button" class="tag" data-tag="<?= e($t) ?>"><?= e($t) ?></button></li>
            <?php } ?>
        </ul>
        <div class="list-tools">
            <!-- 현재 출력 중인 펫시터 수 -->
            <p class="total">현재 <b id="count">0</b>명의 펫시터가 있습니다.</p>
            <select id="sort">
                <option value="popular">인기순</option>
                <option value="rating">평점순</option>
                <option value="review">리뷰순</option>
                <option value="price">가격 낮은순</option>
            </select>
        </div>
        <!-- 카드는 스크립트가 여기에 그려 넣음 -->
        <div class="wrap" id="sitter-list"></div>
    </div>
</section>
