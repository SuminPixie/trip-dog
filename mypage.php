<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>마이페이지</title>
  <?php include "./inc/head.php"; ?>
  <link rel="stylesheet" href="./css/common.css">


  <style>
    /* -----------마이페이지 서식------------ */
    .content{
      padding: 0 6% 20px 6%;
      border-bottom: 10px solid #f1f3f5;
    }
    .menu_txt div img{
      width: 40px;
    }
    .menu_txt div p{
      font-size: 14px;
      font-weight: bold;
      margin-top: 8px;
    }
    .mySwiper2 span:nth-of-type(2){
      display:block;
      color:#F2055C;
      font-size:18px;
    }

    /* 로그인 및 회원가입 */
    .bi-person-circle{
      font-size:50px;
      margin-right: 30px;
      margin-top: -10px;
      color: #F2055C;
    }
    .bi-chevron-right{
      margin-top: 15px;
      color: #aaa;
    }
    /* 430px보다 화면 작아지면 사람모양 아이콘 사라지게 */
    @media (max-width: 430px) {
      .bi-person-circle {
        display: none;
      }
    }

    /* 광고배너 */
    .ad{
      border-radius: 10px;
      height: 130px;
      overflow: hidden;
      display: flex;
      align-items: center;
    }
    .ad picture{
      width: 100%;
      height: 100%;
    }
    .ad img{
      width: 100%;
      height: 100%;
      object-fit: cover;
      vertical-align: middle;
    }
    .swiper-pagination{
      width: 60px;
      left: inherit;
      right:0 !important;
      color: #fff;
    }

    /* 오늘의 혜택 */
    .event{
      background: rgba(242, 5, 92, 0.05);
      height: 100px;
      border-radius: 10px;
    }
    .event img{
      width: 50px;
      height: 50px;
      margin-left:20px;
    }




    @media (min-width: 768px) {
      .content{
        padding: 0 15% 20px 15%;
      }
    }
  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./inc/header.php')?>

  <main id="mypage">
    <div class="content">
      <div>
        <h2 class="fw-bold fs-3 pt-5 pb-3">마이페이지</h2>
        <?php if (isset($_SESSION['ss_mb_name'])): ?>
          <?php $mb_name = $_SESSION['ss_mb_name']; ?>
          <div class="fw-bold fs-5 d-flex justify-content-between" title="마이페이지">
            <div>
              <span style="color:#F2055C;"><?= $mb_name ?> 님 환영합니다!</span>
              <div class="small text-muted fw-normal mt-1">다양한 혜택을 누려보세요.</div>
            </div>
            <div class="d-flex">
              <i class="bi bi-person-circle"></i>
              <i class="bi bi-chevron-right"></i>
            </div>
          </div>
        <?php else: ?>
          <a href="./login.php" class="fw-bold fs-5 d-flex justify-content-between" title="로그인 및 회원가입하기">
            <div>
              <span style="color:#F2055C;">로그인 및 회원가입하기</span>
              <div class="small text-muted fw-normal mt-1">3초 로그인하고 맞춤 여행지로 떠나개!</div>
            </div>
            <div class="d-flex">
              <i class="bi bi-person-circle"></i>
              <i class="bi bi-chevron-right"></i>
            </div>
          </a>
        <?php endif; ?>
      </div>
      <div>
        <div class="menu_txt d-flex justify-content-between mt-5">
          <div class="text-center" role="button">
            <img alt="아이콘" src="./images/icon_time.png"/>
            <p>최근 본 여행</p>
          </div>
          <div class="text-center" role="button">
            <img alt="아이콘" src="./images/icon_calendar.png"/>
            <p>나의 예약</p>
          </div>
          <div class="text-center" role="button">
            <img alt="아이콘" src="./images/icon_review.png"/>
            <p>나의 리뷰</p>
          </div>
          <div class="text-center" role="button">
            <img alt="아이콘" src="./images/icon_006.png"/>
            <p>이벤트</p>
          </div>
          <div class="text-center" role="button">
            <img alt="아이콘" src="./images/icon_007.png"/>
            <p>쿠폰함</p>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="ad">
                <picture>
                  <source srcset="./images/ad_1_pc.jpeg" media="(min-width: 768px)">
                  <img src="./images/ad_1.jpeg" alt="광고배너">
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="ad">
                <picture>
                  <source srcset="./images/ad_2_pc.jpeg" media="(min-width: 768px)">
                  <img src="./images/ad_2.jpeg" alt="광고배너">
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="ad">
                <picture>
                  <source srcset="./images/ad_3_pc.jpeg" media="(min-width: 768px)">
                  <img src="./images/ad_3.jpeg" alt="광고배너">
                </picture>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="pt-4 pb-3">
        <a href="javascript:void(0);" class="fw-bold fs-5 d-flex justify-content-between" title="오늘의 혜택">
          <span style="font-size:18px;">꼭 받아가세요
            <span style="color:#1BC3EA;"> 오늘의 혜택</span>
          </span>
          <span class="fw-normal fs-6" style="color:#aaa;">더보기
            <i class="bi bi-chevron-right"></i>
          </span>
        </a>
      </div>
      <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="./images/event_stamp.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>출석체크 하고</span>
                <span>경품 응모 하기</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="./images/event_dog.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>댕댕이 사진 올리고</span>
                <span>기프티콘 받기</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="./images/event_coin.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>리뷰 남기면</span>
                <span>포인트 적립</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="./images/event_friend.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>친구 초대하면</span>
                <span>쿠폰이 펑펑</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="./images/event_place.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>핫플 투표하고</span>
                <span>이벤트 응모하기</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="content" style="border-bottom:1px solid #f1f3f5;">
      <div class="pt-4 pb-3">
        <span class="text-muted">여행</span>
        <a href="javascript:void(0);" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="최근 본 여행">최근 본 여행</a>
        <a href="javascript:void(0);" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="찜 한 여행">찜 한 여행</a>
      </div>
    </div>

    <div class="content" style="border-bottom: none;">
      <div class="pt-4 pb-3">
        <span class="text-muted">고객센터</span>
        <a href="javascript:void(0);" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="문의내역">문의내역</a>
        <a href="javascript:void(0);" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="FAQ">FAQ</a>
        <a href="javascript:void(0);" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="공지사항">공지사항</a>
      </div>
    </div>
    <?php if (isset($_SESSION['ss_mb_name'])): ?>
      <div class="content" style="border-top: 1px solid #f1f3f5; border-bottom:none;">
        <div class="pt-4 pb-3">
          <a href="./act/mypage_logout.php" class="text-muted" style="text-decoration: none;">로그아웃</a>
        </div>
      </div>
    <?php endif; ?>



  </main>

  <!-- 공통 바텀바삽입 -->
  <?php include('./inc/bottom.php')?>
  <script>
    //해당 페이지에 해당하는 하단 바텀바에 버튼색 생기게
    $(document).ready(function() {
      $('a[title="마이"]').find('i, span').addClass('active');
    });
  </script>


  <script>
    /* ------------제휴광고 슬라이드------------- */
    const adswiper = new Swiper(".mySwiper", {
    spaceBetween: 0,
    centeredSlides: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


    //-------------오늘의 혜택 슬라이드---------------
    const eventswiper = new Swiper(".mySwiper2", {
    // 작은 모바일 (0 ~ 375px)
    slidesPerView: 1.2,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // 큰 모바일 (376 ~ 767px)
      376: {
        slidesPerView: 1.5,
        spaceBetween: 10,
      },
      // 태블릿 (768 ~ 1023px)
      768: {
        slidesPerView: 3.1,
        spaceBetween: 10,
      },
      // PC (1024px 이상)
      1024: {
        slidesPerView: 4.1,
        spaceBetween: 10,
      }
    },
  });


  </script>

</body>
</html>