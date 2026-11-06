    <!-- 비주얼 -->
    <section id="visual">
        <div class="con">
            <input type="checkbox" id="vauto" checked="checked" hidden="hidden">
            <input type="radio" id="vs1" name="vs" hidden="hidden" checked>
            <input type="radio" id="vs2" name="vs" hidden="hidden">
            <input type="radio" id="vs3" name="vs" hidden="hidden">
            <div class="wrap">
                <p class="year">2026Ver</p>
                <h1 class="title">SKILLS PETCARE</h1>
                <div class="bot">
                    <ul class="ment-track">
                        <li>
                            <h3>믿고 맡기는 반려 돌봄, 함께하는 행복한 일상</h3>
                        </li>
                        <li>
                            <h3>숙련된 펫시터들의 안전한 돌봄을 경험해보세요</h3>
                        </li>
                        <li>
                            <h3>아이의 행복과 안전한 돌봄, 스킬스 펫케어</h3>
                        </li>
                        <li>
                            <h3>믿고 맡기는 반려 돌봄, 함께하는 행복한 일상</h3>
                        </li>
                    </ul>
                </div>
                <div class="progress_bar">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <div class="controls"><span class="prev">
                        <label for="vs3" class="s1">◀</label>
                        <label for="vs1" class="s2">◀</label>
                        <label for="vs2" class="s3">◀</label></span>
                    <label for="vauto" class="model">
                        <b class="pa">중지</b>
                        <b class="pl">재생</b>
                    </label><span class="next">
                        <label for="vs2" class="s1">▶</label>
                        <label for="vs3" class="s2">▶</label>
                        <label for="vs1" class="s3">▶</label></span>
                </div>
            </div>
            <div class="wrap-1">
                <div class="scene">
                    <div class="box box-1">
                        <div class="face front"></div>
                        <div class="face left show">
                            <div class="scr">
                                <ul class="track">
                                    <li><img src="/B_Module/images/1.jpg" alt="카메라를 바라보는 고양이" title="믿고 맡기는 반려 돌봄">
                                    </li>
                                    <li><img src="/B_Module/images/2.jpg" alt="잔디밭에서 공을 쫓는 강아지" title="숙련된 펫시터의 안전한 돌봄">
                                    </li>
                                    <li><img src="/B_Module/images/3.jpg" alt="손 위에 앉은 앵무새" title="반려동물의 행복한 일상">
                                    </li>
                                    <li><img src="/B_Module/images/1.jpg" alt="카메라를 바라보는 고양이" title="믿고 맡기는 반려 돌봄">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="face top"></div>
                    </div>
                    <div class="box box-2">
                        <div class="face front"></div>
                        <div class="face left"></div>
                        <div class="face top"></div>
                    </div>
                    <div class="box box-3">
                        <div class="face front"></div>
                        <div class="face left"></div>
                        <div class="face top"></div>
                    </div>
                    <div class="box box-4">
                        <div class="face front"></div>
                        <div class="face left show">
                            <div class="scr">
                                <ul class="track next">
                                    <li>
                                        <p>01</p>
                                    </li>
                                    <li>
                                        <p>02</p>
                                    </li>
                                    <li>
                                        <p>03</p>
                                    </li>
                                    <li>
                                        <p>01</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="face top"></div>
                    </div>
                    <div class="box box-5">
                        <div class="face front"></div>
                        <div class="face left show">
                            <div class="scr">
                                <ul class="track next">
                                    <li><img src="/B_Module/images/2.jpg" alt="잔디밭에서 공을 쫓는 강아지" title="숙련된 펫시터의 안전한 돌봄">
                                    </li>
                                    <li><img src="/B_Module/images/3.jpg" alt="손 위에 앉은 앵무새" title="반려동물의 행복한 일상">
                                    </li>
                                    <li><img src="/B_Module/images/1.jpg" alt="카메라를 바라보는 고양이" title="믿고 맡기는 반려 돌봄">
                                    </li>
                                    <li><img src="/B_Module/images/2.jpg" alt="잔디밭에서 공을 쫓는 강아지" title="숙련된 펫시터의 안전한 돌봄">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="face top"></div>
                    </div>
                    <div class="box box-6">
                        <div class="face front"></div>
                        <div class="face left"></div>
                        <div class="face top"></div>
                    </div>
                    <div class="box box-7">
                        <div class="face front"></div>
                        <div class="face left"></div>
                        <div class="face top"></div>
                        <div class="face back"></div>
                        <div class="face right"></div>
                        <div class="face bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 인기 펫시터 -->
    <section id="famus">
        <div class="con">
            <div class="global-title">
                <div class="title-wrap">
                    <p class="en-title">POPULAR PETSITTERS</p>
                    <p class="kr-title">인기 펫시터</p>
                </div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="wrap">
                <?php foreach ($sitters as $s) part('card', ['s' => $s]); ?>
            </div>
        </div>
    </section>
    <!-- 예약 프로세스 -->
    <section id="process">
        <div class="con">
            <div class="global-title">
                <div class="title-wrap">
                    <p class="en-title">RESERVATION PROCESS</p>
                    <p class="kr-title">예약 프로세스</p>
                </div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="wrap">
                <div class="real-process">
                    <div class="content">
                        <h2>서비스 선택</h2>
                        <p>원하는 돌봄 서비스와 펫시터를 선택합니다.</p>
                    </div>
                    <div class="process">
                        <span class="line"></span>
                        <div class="box box-process">
                            <div class="face front"></div>
                            <div class="face left">1단계</div>
                            <div class="face top"><img src="/B_Module/images/pick.png" alt="서비스 선택" title="서비스 선택"></div>
                        </div>
                    </div>
                </div>
                <div class="real-process">
                    <div class="content">
                        <h2>예약 신청</h2>
                        <p>예약 날짜와 요청 사항을 입력하여 예약을 진행합니다.</p>
                    </div>
                    <div class="process">
                        <span class="line"></span>
                        <div class="box box-process">
                            <div class="face front"></div>
                            <div class="face left">2단계</div>
                            <div class="face top"><img src="/B_Module/images/write.png" alt="예약 신청" title="예약 신청"></div>
                        </div>
                    </div>
                </div>
                <div class="real-process">
                    <div class="content">
                        <h2>예약 확인</h2>
                        <p>펫시터가 예약 요청을 확인하고 예약 가능 여부를 안내합니다.</p>
                    </div>
                    <div class="process">
                        <span class="line"></span>
                        <div class="box box-process">
                            <div class="face front"></div>
                            <div class="face left">3단계</div>
                            <div class="face top"><img src="/B_Module/images/calendar.png" alt="예약 확인" title="예약 확인"></div>
                        </div>
                    </div>
                </div>
                <div class="real-process">
                    <div class="content">
                        <h2>돌봄 진행</h2>
                        <p>예약된 날짜에 맞춰 반려동물 돌봄 서비스를 진행합니다.</p>
                    </div>
                    <div class="process">
                        <span class="line"></span>
                        <div class="box box-process">
                            <div class="face front"></div>
                            <div class="face left">4단계</div>
                            <div class="face top"><img src="/B_Module/images/care.png" alt="돌봄 진행" title="돌봄 진행"></div>
                        </div>
                    </div>
                </div>
                <div class="real-process">
                    <div class="content">
                        <h2>후기 작성</h2>
                        <p>서비스 이용 후 후기를 작성하고 평점을 남길 수 있습니다.</p>
                    </div>
                    <div class="process">
                        <span class="line"></span>
                        <div class="box box-process">
                            <div class="face front"></div>
                            <div class="face left">5단계</div>
                            <div class="face top"><img src="/B_Module/images//write.png" alt="후기 작성" title="후기 작성"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 후기 -->
     <!-- 후기 -->
    <section id="reviews">
        <div class="con">
            <div class="global-title">
                <div class="title-wrap">
                    <p class="en-title">REVIEWS</p>
                    <p class="kr-title">후기</p>
                </div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="wrap">
                <div class="review-track">
                    <div class="card">
                        <div class="thumb">
                            <img src="/B_Module/후기/images/review1.png" alt="후기 작성자 김도윤 프로필 사진" title="김도윤 님의 후기">
                        </div>
                        <div class="context">
                            <div class="context-wrap">
                                <div class="inner-wrap">
                                    <span class="name">김도윤</span>
                                    <span class="star">★★★★★</span>
                                </div>
                                <span class="pet">강아지</span>
                            </div>
                            <p>처음 맡겨보는 거라 걱정했는데 사진도 자주 보내주시고 정말 친절하게 돌봐주셨어요!</p>
                            <p class="date">2026-05-12</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="thumb">
                            <img src="/B_Module/후기/images/review2.png" alt="후기 작성자 박서연 프로필 사진" title="박서연 님의 후기">
                        </div>
                        <div class="context">
                            <div class="context-wrap">
                                <div class="inner-wrap">
                                    <span class="name">박서연</span>
                                    <span class="star">★★★★★</span>
                                </div>
                                <span class="pet">고양이</span>
                            </div>
                            <p>고양이가 예민한 편인데 편안하게 잘 지냈어요. 다음에도 예약하고 싶습니다.</p>
                            <p class="date">2026-05-09</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="thumb">
                            <img src="/B_Module/후기/images/review3.png" alt="후기 작성자 이준혁 프로필 사진" title="이준혁 님의 후기">
                        </div>
                        <div class="context">
                            <div class="context-wrap">
                                <div class="inner-wrap">
                                    <span class="name">이준혁</span>
                                    <span class="star">★★★★☆</span>
                                </div>
                                <span class="pet">소형견</span>
                            </div>
                            <p>산책도 꼼꼼하게 해주시고 요청사항도 잘 반영해주셨어요.</p>
                            <p class="date">2026-05-05</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="thumb">
                            <img src="/B_Module/후기/images/review4.png" alt="후기 작성자 최하은 프로필 사진" title="최하은 님의 후기">
                        </div>
                        <div class="context">
                            <div class="context-wrap">
                                <div class="inner-wrap">
                                    <span class="name">최하은</span>
                                    <span class="star">★★★★★</span>
                                </div>
                                <span class="pet">토끼</span>
                            </div>
                            <p>소동물 돌봄 가능한 곳이 적은데 정말 만족스러웠어요!</p>
                            <p class="date">2026-05-01</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="thumb">
                            <img src="/B_Module/후기/images/review5.png" alt="후기 작성자 정유진 프로필 사진" title="정유진 님의 후기">
                        </div>
                        <div class="context">
                            <div class="context-wrap">
                                <div class="inner-wrap">
                                    <span class="name">정유진</span>
                                    <span class="star">★★★★★</span>
                                </div>
                                <span class="pet">노령견</span>
                            </div>
                            <p>노령견이라 걱정이 많았는데 세심하게 케어해주셔서 안심됐습니다.</p>
                            <p class="date">2026-04-28</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="thumb">
                            <img src="/B_Module/후기/images/review6.png" alt="후기 작성자 한지민 프로필 사진" title="한지민 님의 후기">
                        </div>
                        <div class="context">
                            <div class="context-wrap">
                                <div class="inner-wrap">
                                    <span class="name">한지민</span>
                                    <span class="star">★★★★☆</span>
                                </div>
                                <span class="pet">고양이</span>
                            </div>
                            <p>예약 과정도 편하고 응답도 빨라서 좋았어요.</p>
                            <p class="date">2026-04-25</p>
                        </div>
                    </div>
                </div>
                <div class="pagination-move">
                    <div class="pagination">
                        <ul class="pagination-track">
                            <li>01</li>
                            <li>02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sns 갤러리 -->
    <section id="gallary">
        <div class="con">
            <div class="global-title">
                <div class="title-wrap">
                    <p class="en-title">SNS GALLERY</p>
                    <p class="kr-title">SNS 갤러리</p>
                </div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <input type="radio" name="cat" id="cat-all" hidden checked>
            <input type="radio" name="cat" id="cat-dog" hidden>
            <input type="radio" name="cat" id="cat-cat" hidden>
            <input type="radio" name="cat" id="cat-etc" hidden>
            <ul class="cat-menu">
                <li><label for="cat-all">전체</label></li>
                <li><label for="cat-dog">강아지</label></li>
                <li><label for="cat-cat">고양이</label></li>
                <li><label for="cat-etc">기타</label></li>
            </ul>
            <div class="wrap">
                <!-- 타일 6종: 사진 비율에 맞춰 크기를 모두 다르게 배치 -->
                <div class="gl s-hero c-dog">
                    <label for="g-1">
                        <img src="/B_Module/gallery/images/puppy01.jpg" alt="잔디밭에 앉아 있는 골든리트리버" title="산책 중인 강아지">
                    </label>
                    <div class="g-info">
                        <span class="like">♡ 152</span>
                        <ul class="tags">
                            <li>#강아지</li>
                            <li>#산책</li>
                            <li>#펫시터</li>
                            <li>#행복한하루</li>
                        </ul>
                    </div>
                </div>
                <div class="gl s-wide c-cat">
                    <label for="g-2">
                        <img src="/B_Module/gallery/images/cat02.jpg" alt="침대에 누워 쉬고 있는 고양이" title="집에서 쉬는 고양이">
                    </label>
                    <div class="g-info">
                        <span class="like">♡ 145</span>
                        <ul class="tags">
                            <li>#고양이일상</li>
                            <li>#냥냥</li>
                            <li>#캣스타그램</li>
                            <li>#반려묘</li>
                        </ul>
                    </div>
                </div>
                <div class="gl s-tall c-etc">
                    <label for="g-3">
                        <img src="/B_Module/gallery/images/rabbit02.jpg" alt="바닥에 앉아 있는 갈색 토끼" title="돌봄 중인 토끼">
                    </label>
                    <div class="g-info">
                        <span class="like">♡ 98</span>
                        <ul class="tags">
                            <li>#토끼</li>
                            <li>#소동물</li>
                            <li>#반려동물</li>
                            <li>#귀여워</li>
                        </ul>
                    </div>
                </div>
                <div class="gl s-strip c-etc">
                    <label for="g-4">
                        <img src="/B_Module/gallery/images/hemster02.jpg" alt="나무 집 앞에 앉아 있는 햄스터" title="돌봄 중인 햄스터">
                    </label>
                    <div class="g-info">
                        <span class="like">♡ 87</span>
                        <ul class="tags">
                            <li>#햄스터</li>
                            <li>#소동물</li>
                            <li>#귀여운동물</li>
                            <li>#일상</li>
                        </ul>
                    </div>
                </div>
                <div class="gl s-xtall c-cat">
                    <label for="g-5">
                        <img src="/B_Module/gallery/images/cat03.jpg" alt="위를 올려다보는 하얀 고양이" title="집사를 바라보는 고양이">
                    </label>
                    <div class="g-info">
                        <span class="like">♡ 201</span>
                        <ul class="tags">
                            <li>#고양이그램</li>
                            <li>#캣타워</li>
                            <li>#집사일상</li>
                            <li>#힐링</li>
                        </ul>
                    </div>
                </div>
                <div class="gl s-band c-dog">
                    <label for="g-6">
                        <img src="/B_Module/gallery/images/puppy06.jpg" alt="노란 옷을 입고 앉아 있는 강아지" title="돌봄 받는 강아지">
                    </label>
                    <div class="g-info">
                        <span class="like">♡ 173</span>
                        <ul class="tags">
                            <li>#댕댕이</li>
                            <li>#노령견케어</li>
                            <li>#펫시터</li>
                            <li>#산책</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 갤러리 모달 -->
            <input type="radio" name="galpop" id="g-off" hidden checked>

            <input type="radio" name="galpop" id="g-1" hidden>
            <div class="modal">
                <label for="g-off" class="dim"></label>
                <div class="card gal-card">
                    <label for="g-off" class="modal-close">
                        <div class="box box-close">
                            <div class="face front">X</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                    </label>
                    <img src="/B_Module/gallery/images/puppy01.jpg" alt="잔디밭에 앉아 있는 골든리트리버" title="산책 중인 강아지">
                    <div class="pop-info">
                        <span class="like">♡ 152</span>
                        <ul class="tags">
                            <li>#강아지</li>
                            <li>#산책</li>
                            <li>#펫시터</li>
                            <li>#행복한하루</li>
                        </ul>
                        <span class="uid">@doglover_01</span>
                    </div>
                </div>
            </div>

            <input type="radio" name="galpop" id="g-2" hidden>
            <div class="modal">
                <label for="g-off" class="dim"></label>
                <div class="card gal-card">
                    <label for="g-off" class="modal-close">
                        <div class="box box-close">
                            <div class="face front">X</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                    </label>
                    <img src="/B_Module/gallery/images/cat02.jpg" alt="침대에 누워 쉬고 있는 고양이" title="집에서 쉬는 고양이">
                    <div class="pop-info">
                        <span class="like">♡ 145</span>
                        <ul class="tags">
                            <li>#고양이일상</li>
                            <li>#냥냥</li>
                            <li>#캣스타그램</li>
                            <li>#반려묘</li>
                        </ul>
                        <span class="uid">@lovely_cat</span>
                    </div>
                </div>
            </div>

            <input type="radio" name="galpop" id="g-3" hidden>
            <div class="modal">
                <label for="g-off" class="dim"></label>
                <div class="card gal-card">
                    <label for="g-off" class="modal-close">
                        <div class="box box-close">
                            <div class="face front">X</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                    </label>
                    <img src="/B_Module/gallery/images/rabbit02.jpg" alt="바닥에 앉아 있는 갈색 토끼" title="돌봄 중인 토끼">
                    <div class="pop-info">
                        <span class="like">♡ 98</span>
                        <ul class="tags">
                            <li>#토끼</li>
                            <li>#소동물</li>
                            <li>#반려동물</li>
                            <li>#귀여워</li>
                        </ul>
                        <span class="uid">@bunny_house</span>
                    </div>
                </div>
            </div>

            <input type="radio" name="galpop" id="g-4" hidden>
            <div class="modal">
                <label for="g-off" class="dim"></label>
                <div class="card gal-card">
                    <label for="g-off" class="modal-close">
                        <div class="box box-close">
                            <div class="face front">X</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                    </label>
                    <img src="/B_Module/gallery/images/hemster02.jpg" alt="나무 집 앞에 앉아 있는 햄스터" title="돌봄 중인 햄스터">
                    <div class="pop-info">
                        <span class="like">♡ 87</span>
                        <ul class="tags">
                            <li>#햄스터</li>
                            <li>#소동물</li>
                            <li>#귀여운동물</li>
                            <li>#일상</li>
                        </ul>
                        <span class="uid">@tiny_pet</span>
                    </div>
                </div>
            </div>

            <input type="radio" name="galpop" id="g-5" hidden>
            <div class="modal">
                <label for="g-off" class="dim"></label>
                <div class="card gal-card">
                    <label for="g-off" class="modal-close">
                        <div class="box box-close">
                            <div class="face front">X</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                    </label>
                    <img src="/B_Module/gallery/images/cat03.jpg" alt="위를 올려다보는 하얀 고양이" title="집사를 바라보는 고양이">
                    <div class="pop-info">
                        <span class="like">♡ 201</span>
                        <ul class="tags">
                            <li>#고양이그램</li>
                            <li>#캣타워</li>
                            <li>#집사일상</li>
                            <li>#힐링</li>
                        </ul>
                        <span class="uid">@meow_meow</span>
                    </div>
                </div>
            </div>

            <input type="radio" name="galpop" id="g-6" hidden>
            <div class="modal">
                <label for="g-off" class="dim"></label>
                <div class="card gal-card">
                    <label for="g-off" class="modal-close">
                        <div class="box box-close">
                            <div class="face front">X</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                    </label>
                    <img src="/B_Module/gallery/images/puppy06.jpg" alt="노란 옷을 입고 앉아 있는 강아지" title="돌봄 받는 강아지">
                    <div class="pop-info">
                        <span class="like">♡ 173</span>
                        <ul class="tags">
                            <li>#댕댕이</li>
                            <li>#노령견케어</li>
                            <li>#펫시터</li>
                            <li>#산책</li>
                        </ul>
                        <span class="uid">@dog_family</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ -->
    <section id="faq">
        <div class="con">
            <div class="global-title">
                <div class="title-wrap">
                    <p class="en-title">FAQ</p>
                    <p class="kr-title">질문답변</p>
                </div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="box box-deco">
                <div class="face front"></div>
                <div class="face left"></div>
                <div class="face top"></div>
            </div>
            <ul class="faq-list">
                <li class="faq-item">
                    <input type="radio" name="faq" id="fq1" hidden checked>
                    <label for="fq1">
                        <div class="box box-q">
                            <div class="face front">Q</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                        예약은 어떻게 진행되나요?
                    </label>
                    <div class="faq-answer">
                        <p>원하는 펫시터를 선택한 후 예약 날짜와 요청 사항을 입력하면 예약이 진행됩니다.</p>
                    </div>
                </li>
                <li class="faq-item">
                    <input type="radio" name="faq" id="fq2" hidden>
                    <label for="fq2">
                        <div class="box box-q">
                            <div class="face front">Q</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                        비회원도 예약이 가능한가요?
                    </label>
                    <div class="faq-answer">
                        <p>예약 및 돌봄 서비스 신청은 로그인 후 이용할 수 있습니다.</p>
                    </div>
                </li>
                <li class="faq-item">
                    <input type="radio" name="faq" id="fq3" hidden>
                    <label for="fq3">
                        <div class="box box-q">
                            <div class="face front">Q</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                        예약 취소는 어떻게 하나요?
                    </label>
                    <div class="faq-answer">
                        <p>마이페이지에서 예약 내역 확인 후 취소 버튼을 눌러 취소할 수 있습니다.</p>
                    </div>
                </li>
                <li class="faq-item">
                    <input type="radio" name="faq" id="fq4" hidden>
                    <label for="fq4">
                        <div class="box box-q">
                            <div class="face front">Q</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                        어떤 반려동물을 돌볼 수 있나요?
                    </label>
                    <div class="faq-answer">
                        <p>강아지, 고양이, 소동물 등 다양한 반려동물 돌봄 서비스를 제공합니다.</p>
                    </div>
                </li>
                <li class="faq-item">
                    <input type="radio" name="faq" id="fq5" hidden>
                    <label for="fq5">
                        <div class="box box-q">
                            <div class="face front">Q</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                        펫시터 지원은 누구나 가능한가요?
                    </label>
                    <div class="faq-answer">
                        <p>회원가입 후 펫시터 지원 페이지에서 지원할 수 있습니다.</p>
                    </div>
                </li>
                <li class="faq-item">
                    <input type="radio" name="faq" id="fq6" hidden>
                    <label for="fq6">
                        <div class="box box-q">
                            <div class="face front">Q</div>
                            <div class="face left"></div>
                            <div class="face top"></div>
                        </div>
                        돌봄 서비스 신청 후 수정이 가능한가요?
                    </label>
                    <div class="faq-answer">
                        <p>신청 완료 후에는 관리자 확인 전까지 수정 및 취소가 가능합니다.</p>
                    </div>
                </li>
            </ul>
            <div class="box box-deco2">
                <div class="face front"></div>
                <div class="face left"></div>
                <div class="face top"></div>
            </div>
        </div>
    </section>
