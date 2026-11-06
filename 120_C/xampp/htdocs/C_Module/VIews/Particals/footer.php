    <!-- 푸터 -->
    <footer>
        <div class="con">
            <div class="footer-top">
                <a href="/" class="logo">
                    <img src="/B_Module/images/logo_foot.png" alt="스킬스 펫케어 로고" title="스킬스 펫케어">
                </a>
                <ul class="footer-links">
                    <li><a href="/popular">인기 펫시터</a></li>
                    <li><a href="/care">돌봄 서비스</a></li>
                    <li><a href="/apply">펫시터 지원</a></li>
                    <li><a href="/reserve">예약하기</a></li>
                    <li><a href="/mypage">마이페이지</a></li>
                    <li><a href="/about">서비스 소개</a></li>
                    <li><a href="/petsitter">전체 펫시터</a></li>
                </ul>
                <ul class="footer-sns">
                    <li><a href="#" title="인스타그램"><img src="/B_Module/images/instagram.png" title="인스타그램"></a></li>
                    <li><a href="#" title="X"><img src="/B_Module/images/X.png" alt="X" title="X"></a></li>
                    <li><a href="#" title="카카오톡" title="카카오톡"><img src="/B_Module/images/kakao.png" alt="카카오톡" title="카카오톡"></a>
                    </li>
                </ul>
            </div>
            <!-- 사업자 정보 -->
            <div class="footer-bottom">
                <p>믿고 맡기는 반려 돌봄, 함께하는 행복한 일상 (주)스킬스펫케어</p>
                <p>대표자 : 홍길동 · 사업자등록번호 : 123-45-67890</p>
                <p>주소 : 서울특별시 강남구 테헤란로 123 스킬스빌딩</p>
                <p>전화번호 : 02-1234-5678 · 이메일 : skillspetcare@skills.com</p>
                <p>Copyright &copy; 2026 Skills PetCare. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <div class="toast-area"></div>
    <?php if (!ss()) { ?>
        <!-- 로그인 모달 (비로그인일 때만 생성) -->
        <input type="radio" name="pop" id="login" hidden>
        <form action="/api/login" method="post" class="modal">
            <label for="close" class="dim"></label>
            <div class="card">
                <label for="close" class="modal-close">
                    <div class="box box-close">
                        <div class="face front">X</div>
                        <div class="face left"></div>
                        <div class="face top"></div>
                    </div>
                </label>
                <h2>LogIN<i>/</i><span>로그인</span></h2>
                <p class="greet">스킬스 펫케어에 오신 것을 환영합니다.</p>
                <label class="field">
                    <span>ID<i>/</i><em>아이디</em></span>
                    <input type="text" name="u_id" placeholder="아이디">
                </label>
                <label class="field">
                    <span>PW<i>/</i><em>비밀번호</em></span>
                    <input type="password" name="u_pw" placeholder="비밀번호">
                </label>
                <ul class="sns-login">
                    <li><a href="#"><img src="/B_Module/images/instagram.png" alt="인스타그램" title="인스타그램"></a></li>
                    <li><a href="#"><img src="/B_Module/images/kakao.png" alt="카카오톡" title="카카오톡"></a></li>
                    <li><a href="#"><img src="/B_Module/images/X.png" alt="X" title="X"></a></li>
                </ul>
                <button type="submit">로그인</button>
                <p class="ask">회원이 아니신가요? <label for="register">회원가입</label></p>
            </div>
        </form>
        <!-- 회원가입 모달, msg-* 자리에 오류 표시 -->
        <input type="radio" name="pop" id="register" hidden>
        <form action="/api/register" method="post" class="modal" id="join-form">
            <label for="close" class="dim"></label>
            <div class="card">
                <label for="close" class="modal-close">
                    <div class="box box-close">
                        <div class="face front">X</div>
                        <div class="face left"></div>
                        <div class="face top"></div>
                    </div>
                </label>
                <h2>JoinUS<i>/</i><span>회원가입</span></h2>
                <p class="greet">스킬스 펫케어의 회원이 되어주세요.</p>
                <label class="field">
                    <span>ID<i>/</i><em>아이디</em></span>
                    <div class="row">
                        <input type="text" name="u_id" placeholder="아이디">
                        <button type="button" id="check-id">중복 확인</button>
                    </div>
                    <em class="msg" id="msg-u_id"></em>
                </label>
                <label class="field">
                    <span>PW<i>/</i><em>비밀번호</em></span>
                    <input type="password" name="u_pw" placeholder="영문과 숫자 조합으로 8자 이상 입력해 주세요">
                    <em class="msg" id="msg-u_pw"></em>
                </label>
                <label class="field">
                    <span>NAME<i>/</i><em>이름</em></span>
                    <input type="text" name="u_name" placeholder="이름">
                    <em class="msg" id="msg-u_name"></em>
                </label>
                <label class="field">
                    <span>EMAIL<i>/</i><em>이메일</em></span>
                    <input type="text" name="u_email" placeholder="skills@petcare.com">
                    <em class="msg" id="msg-u_email"></em>
                </label>
                <label class="field">
                    <span>TEL<i>/</i><em>전화번호</em></span>
                    <input type="text" name="u_tel" class="u_tel" placeholder="010-0000-0000" maxlength="13">
                    <em class="msg" id="msg-u_tel"></em>
                </label>
                <button type="submit">회원가입</button>
                <p class="ask">이미 회원이신가요? <label for="login">로그인</label></p>
            </div>
        </form>
    <?php } ?>
    <!-- 스크립트는 맨 마지막에 -->
    <script src="/js/lib.js"></script>
    </body>

    </html>