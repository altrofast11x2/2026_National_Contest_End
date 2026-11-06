<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스 펫케어</title>
    <!-- B모듈 공통 디자인 위에 C모듈 스타일을 덧입힘 -->
    <link rel="stylesheet" href="/B_Module/css/style.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<!-- 스크립트에서 로그인 여부 확인용 -->
<body data-login="<?= ss() ? 1 : 0 ?>">
    <!-- 라디오 하나만 켜지므로 모달이 겹치지 않음 -->
    <input type="radio" name="pop" id="close" hidden checked>
    <header id="header">
        <div class="con">
            <div class="wrap">
                <a href="/">
                    <img src="/B_Module/images/logo.png" alt="스킬스 펫케어 로고" title="스킬스 펫케어">
                </a>
                <!-- 과제 도면대로 구성한 메뉴 -->
                <ul class="nav">
                    <li class="menu">
                        <input type="text">
                        <label>사이트 소개</label>
                        <ul class="sub-menu">
                            <li><a href="/about">서비스 소개</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <input type="text">
                        <label>펫시터</label>
                        <ul class="sub-menu">
                            <li><a href="/petsitter">전체 펫시터</a></li>
                            <li><a href="/popular">인기 펫시터</a></li>
                            <li><a href="/apply">펫시터 지원</a></li>
                            <li><a href="/reserve">예약하기</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <input type="text">
                        <label>돌봄 서비스</label>
                        <ul class="sub-menu">
                            <li><a href="/care">돌봄 서비스</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <input type="text">
                        <label>회원 서비스</label>
                        <ul class="sub-menu">
                            <li><a href="/mypage">마이페이지</a></li>
                            <?php if (ss()) { ?>
                                <!-- 로그인 상태면 안내 메시지 출력 -->
                                <li><a href="/join">회원가입</a></li>
                            <?php } else { ?>
                                <li><label for="register">회원가입</label></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php if (admin()) { ?>
                        <!-- 관리자만 보이는 메뉴 -->
                        <li class="menu">
                            <input type="text">
                            <label>관리자</label>
                            <ul class="sub-menu">
                                <li><a href="/admin/apply">펫시터 지원 관리</a></li>
                                <li><a href="/admin">예약/신청 내역, 회원 관리</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- 로그인 상태에 따라 다르게 표시 -->
            <ul class="auth-area">
                <?php if (ss()) { ?>
                    <li class="me">
                        <a href="/mypage">
                            <img src="<?= profile(ss()->u_profile) ?>" alt="<?= e(ss()->u_name) ?> 회원의 프로필 사진" title="<?= e(ss()->u_name) ?>">
                            <span><?= e(ss()->u_name) ?>(<?= e(ss()->u_id) ?>)</span>
                        </a>
                    </li>
                    <li><a href="/logout" class="auth-btn">로그아웃</a></li>
                <?php } else { ?>
                    <li><label for="login">로그인</label></li>
                    <li><label for="register">회원가입</label></li>
                <?php } ?>
            </ul>
        </div>
    </header>
