$(document).ready(function () {
  /* ------------ 메인배너 슬라이드 ------------- */
  new Swiper(".mySwiper1", {
    spaceBetween: 0,
    centeredSlides: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  /* ------------ 추천 여행지 슬라이드 ------------- */
  new Swiper(".mySwiper2", {
    slidesPerView: 1.5,
    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    touchRatio: 1,
    simulateTouch: true,
    breakpoints: {
      376: {
        slidesPerView: 2.3,
        spaceBetween: 30,
      },
      768: {
        slidesPerView: 3.3,
        spaceBetween: 30,
      },
      1024: {
        slidesPerView: 4.3,
        spaceBetween: 50,
      },
    },
  });

  /* ------------ 제휴광고 슬라이드 ------------- */
  new Swiper(".mySwiper3", {
    spaceBetween: 0,
    centeredSlides: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  /* ------------ 이달의 여행테마 슬라이드 ------------- */
  const $slider = $(".slider");
  let swiper4;
  let slideInx = 0;
  let resizeTimer;
  let oldWChk = window.innerWidth > 767 ? "pc" : "mo";
  const slideNum = $slider.find(".swiper-slide").length;

  function initSlider() {
    if (swiper4) swiper4.destroy();

    const isLoop = slideNum > (oldWChk === "pc" ? 2 : 1);

    swiper4 = new Swiper($slider.find(".inner")[0], {
      slidesPerView: "auto",
      initialSlide: slideInx,
      loop: isLoop,
      centeredSlides: true,
      pagination: {
        el: $slider.find(".swiper-pagination")[0],
        clickable: true,
      },
      on: {
        init() {
          updateBackground();
          updateSlideClass();
        },
        slideChangeTransitionStart() {
          slideInx = this.realIndex;
          updateBackground();
          updateSlideClass();
        },
      },
    });
  }

  function updateSlideClass() {
    $slider
      .find(".swiper-slide-prev")
      .prev()
      .addClass("first")
      .siblings()
      .removeClass("first");
    $slider
      .find(".swiper-slide-next")
      .next()
      .addClass("last")
      .siblings()
      .removeClass("last");
  }

  function updateBackground() {
    const src = $slider.find(".swiper-slide-active .img img").attr("src");
    $("#sec06").css("--bg-image", `url(".${src}")`);
  }

  initSlider();

  $(window).on("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      const newWChk = window.innerWidth > 767 ? "pc" : "mo";
      if (newWChk !== oldWChk) {
        oldWChk = newWChk;
        initSlider();
      }
    }, 300);
  });

  /* ------------ 핫 플레이스 탭 컨텐츠 ------------- */
  $(".col-12").hide();
  $('.col-12[alt="애견카페"]').show();

  $(".tab-btn").click(function () {
    const tabName = $(this).data("tab");
    $(".tab-btn").removeClass("active-tab");
    $(this).addClass("active-tab");

    $(".col-12").hide();
    $(`.col-12[alt="${tabName}"]`).show();
  });
});


