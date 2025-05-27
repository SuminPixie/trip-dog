<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>떠나개</title>
  <?php include "./inc/dbconn.php"; ?>
  <?php include "./inc/head.php"; ?>
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/main.css">
  <script defer src="./script/main.js"></script>
</head>
<body>
  <?php
  // 세션 시작
  // session_start();

  // 사용자가 로그인한 경우, mb_name을 세션에서 가져옴.
  if (isset($_SESSION['ss_mb_name'])) {
    $mb_name = $_SESSION['ss_mb_name'];
  } else {
    $mb_name = null;
  }
  ?>

  <!-- 공통헤더삽입 -->
  <?php include('./inc/header.php')?>

  <!-- 메인서식 -->
  <main>
    <!-- 1. 메인배너 -->
    <section id="sec01">
      <!-- Swiper -->
      <div class="swiper mySwiper1">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="main_img">
              <img src="./images/main_visual_01.jpg" alt="이미지">
            </div>
            <div class="main_txt">
              <span>서울부터 부산까지<br>한 번에 떠나개</span>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="main_img">
              <img src="./images/main_visual_02.jpg" alt="이미지">
            </div>
            <div class="main_txt">
              <span>반려견과 함께하는<br>봄 여행 추천</span>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="main_img">
              <img src="./images/main_visual_03.jpg" alt="이미지">
            </div>
            <div class="main_txt">
              <span>반려견 출입 OK<br>어디서나 걱정없개</span>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="input-group mb-3" id="search_box">
        <span class="input-group-text" style="background: #fff; border-radius: 30px 0 0 30px;">
          <i class="bi bi-search"></i>
        </span>
        <input type="text" id="main_search" class="form-control" aria-label="검색창" placeholder="반려견이랑 어디로 떠날까?" style="border-left: none; border-radius: 0 30px 30px 0;">
      </div>
    </section>

    <!-- 2. 카테고리 -->
    <section id="sec02" class="padding">
      <div class="d-flex justify-content-between mt-5 mb-4">
        <h2 class="fw-bold">카테고리</h2>
        <a href="javascript:void(0);" title="카테고리 전체보기">+ 전체보기</a>
      </div>
      <div>
        <div class="d-flex justify-content-between mb-2">
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_seoul.png"/>
            <p class="fw-bold mt-1">서울</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_jeju.png"/>
            <p class="fw-bold mt-1">제주</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_busan.png"/>
            <p class="fw-bold mt-1">부산</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_001.png"/>
            <p class="fw-bold mt-1">강릉</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_002.png"/>
            <p class="fw-bold mt-1">인천</p>
          </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_003.png"/>
            <p class="fw-bold mt-1">경주</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_004.png"/>
            <p class="fw-bold mt-1">가평</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_005.png"/>
            <p class="fw-bold mt-1">여수</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_006.png"/>
            <p class="fw-bold mt-1">이벤트</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="이미지" src="./images/icon_007.png"/>
            <p class="fw-bold mt-1">쿠폰</p>
          </div>
        </div>

      </div>
    </section>

    <!-- 3. 딱 맞는 여행지 -->
    <section id="sec03">
      <div class="sec-title d-flex justify-content-between mt-5 mb-4">
        <h2 class="fw-bold">
        <?php if (!empty($mb_name)) : ?>
          <span style="color:var(--main_color)"><?php echo $mb_name; ?></span>에게 딱 맞는 여행지예요 🏝️</h2>
        <?php else : ?>
          <span style="color:var(--main_color)">반려견</span>에게 딱 맞는 여행지예요 🏝️</h2>
        <?php endif; ?>
        <a href="javascript:void(0);" title="추천여행지 전체보기">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      
      <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
          <?php
          $sql = "SELECT * FROM travel_list ORDER BY rating DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) :
          ?>
          <div class="swiper-slide recommend">
            <div>
              <img src="./images/<?= $row['image'] ?>" alt="이미지">
            </div>
            <div>
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt"><?= $row['title'] ?></span>
                <div class="rating">
                  <i class="bi bi-star-fill"></i>
                  <span><?= number_format($row['rating'], 1) ?></span>
                </div>
              </div>
              <p class="sub_txt mb-1"><?= $row['description'] ?></p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                <?= $row['location'] ?>
                <span style="opacity: 0.6; font-weight: normal;">/ <?= $row['duration'] ?></span>
              </span>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>

    
    </section>

    <!-- 4. 여행 메이트 구해요 -->
    <section id="sec04" class="padding">
      <div class="sec-title d-flex justify-content-between mt-5 mb-4">
        <h2 class="fw-bold">
          여행 메이트 구해요 🐾</h2>
        <a href="javascript:void(0);" title="여행메이트 전체보기">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>

      <div class="container">
        <div class="row m-0">
          <?php
          $sql = "SELECT * FROM mate ORDER BY departure_date ASC";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) :
          ?>
          <div class="col-6 col-lg-3 mb-3">
            <div class="card">
              <img src="./images/<?= $row['image'] ?>" alt="이미지">
              <div class="card-top">
                <h4 class="card-title"><?= date('n월 j일 출발', strtotime($row['departure_date'])) ?></h4>
              </div>
              <div class="card-body">
                <h4 class="card-title"><?= $row['title'] ?></h4>
                <p class="card-text">: <?= $row['description'] ?></p>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>

    </section>

    <!-- 5. 제휴배너 광고 -->
    <section class="padding mb-5">
      <!-- Swiper -->
      <div class="swiper mySwiper3">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="ad">
              <img src="./images/ad_1.jpeg" alt="광고배너">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="ad">
              <img src="./images/ad_2.jpeg" alt="광고배너">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="ad">
              <img src="./images/ad_3.jpeg" alt="광고배너">
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- 6. 이달의 인기여행 테마 -->
    <section id="sec06">
      <div class="sec-title d-flex justify-content-between mb-4 padding pt-5 pb-2">
        <h2 class="fw-bold">
          이 달의 인기 여행 테마 🏆</h2>
        <a href="javascript:void(0);" title="인기여행테마 전체보기">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <div class="slider">
        <div class="inner">
          <ul class="swiper-wrapper slide_list">
            <?php
            $sql = "SELECT * FROM theme ORDER BY id ASC LIMIT 10";
            $result = mysqli_query($conn, $sql);
            $rank = 1;

            while ($row = mysqli_fetch_assoc($result)) :
            ?>
            <li class="swiper-slide">
              <a href="javascript:void(0);">
                <span class="img">
                  <img src="./images/<?= $row['image'] ?>" alt="썸네일 이미지">
                  <div class="card-body">
                    <p class="card-text d-inline"><?= $row['subtitle'] ?></p>
                    <h4 class="card-title fs-6 fw-bold"><?= $row['title'] ?></h4>
                    <div class="mt-3">
                      <?php
                      $tags = explode(',', $row['tags']);
                      foreach ($tags as $tag) {
                        echo '<span class="hash_btn">#' . trim($tag) . '</span>';
                      }
                      ?>
                    </div>
                  </div>
                </span>
                <div class="flag d-inline">
                  <svg width="26" height="33" fill="none">
                    <path d="m13 24.25-13 10V0h26v34.25l-13-10Z" fill="#F2055C"></path>
                  </svg>
                  <span><?= $rank ?></span>
                </div>
              </a>

            </li>
            <?php
              $rank++;
            endwhile;
            ?>
          </ul>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <!-- 7. 베스트 이용리뷰 -->
    <section id="sec07" class="padding">
      <div class="sec-title d-flex justify-content-between mt-5 mb-4">
        <h2 class="fw-bold">
          베스트 이용 리뷰 🏅</h2>
        <a href="javascript:void(0);" title="이용 리뷰 전체보기">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <div>
        <?php
        $sql = "SELECT * FROM review ORDER BY good DESC, id ASC LIMIT 3";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) :
        ?>
        <div class="review">
          <div>
            <img src="./images/<?= $row['image'] ?>" alt="이미지">
          </div>
          <div>
            <div class="d-flex justify-content-between">
              <span class="title_txt"><?= $row['title'] ?></span>
              <div class="star_wrap">
                <?php
                  for ($i = 1; $i <= 5; $i++) {
                    $class = $i <= $row['rating'] ? 'fill' : '';
                    echo "<i class='bi bi-star-fill $class'></i>";
                  }
                ?>
              </div>
            </div>
            <p class="sub_txt"><?= nl2br($row['description']) ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>


    </section>

    <!-- 8. 실시간 인기 여행지 -->
    <section id="sec08">
      <div class="sec-title d-flex justify-content-between mt-5 mb-4" style="padding-right: 6%;">
        <h2 class="fw-bold">실시간 인기 여행지 🔥</h2>
        <a href="javascript:void(0);" title="실시간 인기 여행지 전체보기">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
          <?php
          $sql = "SELECT * FROM travel_list ORDER BY reservation_count DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) :
          ?>
          <div class="swiper-slide recommend">
            <div>
              <img src="./images/<?= $row['image'] ?>" alt="이미지">
            </div>
            <div>
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt"><?= $row['title'] ?></span>
                <div class="rating">
                  <i class="bi bi-star-fill"></i>
                  <span><?= number_format($row['rating'], 1) ?></span>
                </div>
              </div>
              <p class="sub_txt mb-1"><?= $row['description'] ?></p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                <?= $row['location'] ?>
                <span style="opacity: 0.6; font-weight: normal;">/ <?= $row['duration'] ?></span>
              </span>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    
    </section>

    <!-- 9. 내 주변 핫플레이스 -->
    <section id="sec09" class="padding">
      <div class="sec-title d-flex justify-content-between mt-5 mb-3">
        <h2 class="fw-bold">
          내 주변 핫 플레이스 ✨</h2>
        <a href="javascript:void(0);" title="내 주변 핫플레이스 전체보기">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <!-- 탭 버튼 -->
      <div class="mb-3">
        <button class="tab-btn active-tab" data-tab="애견카페">#애견카페</button>
        <button class="tab-btn" data-tab="강아지공원">#강아지공원</button>
        <button class="tab-btn" data-tab="애견숙소">#애견숙소</button>
      </div>
      <!-- 컨텐츠 -->
      <div class="container">
        <div class="row">
          <?php
          $types = ['애견카페', '강아지공원', '애견숙소'];
          foreach ($types as $type) {
            $sql = "SELECT * FROM place WHERE type = '$type' LIMIT 4";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) :
          ?>
          <div class="col-12 col-md-6 mb-4" alt="<?= $row['type'] ?>">
            <a href="javascript:void(0);">
              <div class="card">
                <img src="./images/<?= $row['image'] ?>" alt="<?= $row['type'] ?>">
                <div class="card-body">
                  <h4 class="card-title"><?= $row['title'] ?></h4>
                  <span class="card-text"><?= $row['description'] ?></span>
                  <span class="card-text geo">
                    <i class="bi bi-geo-alt-fill"></i>
                    내 근처 <span><?= $row['distance'] ?>m</span>
                  </span>
                </div>
              </div>
            </a>
          </div>
          <?php
            endwhile;
          }
          ?>
        </div>
      </div>
    </section>
  </main>

  
  <!-- 푸터 영역 -->
  <footer class="footer mt-5">
    <div class="padding">
      <div class="container">
        <div class="row">
          <div class="mt-3 p-0">
            <img src="./images/logo_1.png" alt="하단로고" height="30px">
          </div>
          <div class="col-md-12 p-0 mt-3">
            <p class="fs-6 fw-bold">고객센터 010-0000-0000</p>
            <div class="footer-links d-flex">
              <a href="javascript:void(0);" style="color: #000;">개인정보처리방침</a>
              <a href="javascript:void(0);">이용약관</a>
              <a href="javascript:void(0);">소비자 분쟁해결 기준</a>
              <a href="javascript:void(0);">사업자 정보확인</a>
              <a href="javascript:void(0);">콘텐츠산업진흥법에 의한 표시</a>
            </div>
            <p class="mt-3"><strong>(주)떠나개</strong> | 대표: 홍길동<br>
              사업자등록번호: 000-00-00000<br>
              통신판매업신고번호: 2024-서울-0000<br>
              이메일: contact@tripdog.co.kr<br>
              대표전화: 010-0000-0000<br>
              소재지: 서울특별시 강남구 테헤란로 123
            </p>
            <p>※ 본 사이트는 포트폴리오용으로 제작된 웹사이트이며, 실제 운영되지 않습니다.</p>
            <p>© 떠나개 All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- 공통 바텀바삽입 -->
    <?php include('./inc/bottom.php')?>

  </footer>

  <script>
    $(document).ready(() => {
      // -----------검색창 input 요소----------
      const $searchInput = $('#main_search');
      // PHP 세션에서 사용자 이름을 받아옴 (빈 값 처리 포함)
      const mbName = "<?= trim($mb_name ?? '') ?>";
      // 로그인된 사용자일 경우 placeholder 문구를 사용자 이름 포함하여 출력
      if (mbName) {
        $searchInput.attr('placeholder', `${mbName}랑 어디로 떠날까?`);
      }

      // ---------하단 바에서 홈 메뉴에 active 표시--------
      $('a[title="홈"]').find("i, span").addClass("active");

    });
  </script>

</body>
</html>