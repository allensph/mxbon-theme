// Navigation toggle
window.addEventListener('DOMContentLoaded', function () {
      let main_navigation = document.querySelector('.primary-menu-container');
      document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
            e.preventDefault()
            main_navigation.classList.toggle('active')
            document.body.classList.toggle('toggle-active')
      })

      // Header serach toggle
      document.querySelector('.search-toggle').addEventListener('click', function (e) {
            e.preventDefault()
            e.target.closest('.search-wrapper').classList.toggle('active')
            document.body.classList.toggle('search-active')
      })
})

// Frontpage
if (window.location.pathname == '/') {

      window.addEventListener('DOMContentLoaded', function () {

            // Products Slider
            const swiper1 = new Swiper('section.products .swiper', {
                  slidesPerView: 1,
                  spaceBetween: 32,

                  breakpoints: {
                        768: {
                              slidesPerView: 2,
                              spaceBetween: 32,
                        },
                        960: {
                              slidesPerView: 3,
                              spaceBetween: 32,
                        }
                  },
                  pagination: {
                        el: 'section.products .swiper-pagination',
                        clickable: true,
                  },

                  navigation: {
                        nextEl: 'section.products .swiper-button-next',
                        prevEl: 'section.products .swiper-button-prev',
                  },
            });

            // Industries Slider
            const swiper2 = new Swiper('section.industries .swiper', {
                  slidesPerView: 1,
                  spaceBetween: 16,

                  breakpoints: {
                        768: {
                              slidesPerView: 2,
                              spaceBetween: 16,
                        },
                        960: {
                              slidesPerView: 3,
                              spaceBetween: 16,
                        },
                        1280: {
                              slidesPerView: 'auto',
                              spaceBetween: 16,
                        },
                  },
                  pagination: {
                        el: 'section.industries .swiper-pagination',
                        clickable: true,
                  },

                  navigation: {
                        nextEl: 'section.industries .swiper-button-next',
                        prevEl: 'section.industries .swiper-button-prev',
                  },
            });

            // Contatc section paroller.js
            jQuery("[data-paroller-factor]").paroller();
      })
}

if (window.location.pathname == '/about-us/company-overview/') {

      window.addEventListener('DOMContentLoaded', function () {

            const counterUp = window.counterUp.default

            const callback = entries => {
                  entries.forEach(entry => {
                        const el = entry.target
                        if (entry.isIntersecting) {
                              counterUp(el, {
                                    duration: 2000,
                                    delay: 16,
                              })
                        }
                  })
            }

            const observer = new IntersectionObserver(callback, { threshold: 1 })

            const elments = document.querySelectorAll('.counter')

            elments.forEach(el => {
                  observer.observe(el)
            })
      })
}

if (window.location.pathname == '/about-us/history/') {
      window.addEventListener('DOMContentLoaded', function () {
            // paroller.js
            jQuery("[data-paroller-factor]").paroller();
      })
}

if (window.location.pathname == '/about-us/corporate-philsosphy/') {
      window.addEventListener('DOMContentLoaded', function () {

            // animate on scroll
            AOS.init({ once: true, easing: 'ease-in-out', });

            // paroller.js
            jQuery("[data-paroller-factor]").paroller();
      })
}

if (window.location.pathname == '/about-us/innovation/') {
      window.addEventListener('DOMContentLoaded', function () {
            // animate on scroll
            AOS.init({ once: true, easing: 'ease-in-out', });

            // auto scratch card
            const PIXEL_RATIO = (function () {
                  const ctx = document.createElement('canvas').getContext('2d'),
                        dpr = window.devicePixelRatio || 1,
                        bsr = ctx.webkitBackingStorePixelRatio ||
                              ctx.mozBackingStorePixelRatio ||
                              ctx.msBackingStorePixelRatio ||
                              ctx.oBackingStorePixelRatio ||
                              ctx.backingStorePixelRatio || 1;

                  return dpr / bsr;
            })();

            function parentWidth(element) {
                  return element.parentElement.clientWidth;
            }

            console.log(window?.innnerWidth)

            const WIDTH = window.innnerWidth < 1024
                  ? parentWidth(document.getElementById('fg'))
                  : 304;
            const HEIGHT = window.innnerWidth < 1024
                  ? parentWidth(document.getElementById('fg')) * 230 / 304
                  : 230;

            function initCanvas(w, h, id) {
                  const canvas = document.getElementById(id);
                  canvas.width = w * PIXEL_RATIO;
                  canvas.height = h * PIXEL_RATIO;
                  canvas.style.width = w + 'px';
                  //canvas.style.height = h + 'px';
                  canvas.style.height = 230 + 'px';
                  canvas.getContext('2d').setTransform(PIXEL_RATIO, 0, 0, PIXEL_RATIO, 0, 0);

                  return canvas;
            }
            function rand(min, max) {
                  return Math.floor(Math.random() * (max - min + 1)) + min;
            }
            function initFg() {
                  const canvas = initCanvas(WIDTH, HEIGHT, 'fg');
                  const ctx = canvas.getContext('2d');
                  ctx.fillStyle = '#f4f4f5';
                  ctx.fillRect(0, 0, canvas.width, canvas.height);
                  ctx.globalCompositeOperation = 'destination-out';
            }
            function scratch() {
                  ctx.beginPath();
                  x += rand(2, 3);
                  ctx.ellipse(
                        x,
                        WIDTH / 2 + rand(-80, 80),
                        radius * rand(1, 5) / 10,
                        radius * rand(10, 20) / 5,
                        rand(15, 30) * Math.PI / 180,
                        0,
                        2 * Math.PI
                  );
                  ctx.fill();

                  if (i++ < 100) requestAnimationFrame(scratch);
                  if (i > 80) canvas.classList.add('fade-out');
            }

            const canvas = document.getElementById('fg');
            const ctx = canvas.getContext('2d');
            let radius = WIDTH / (PIXEL_RATIO * 10), x = 0, i = 0;

            initFg();
            requestAnimationFrame(scratch);
            canvas.onanimationend = () => {
                  return;
            }
      })
}

if (window.location.pathname == '/about-us/certification/') {
      window.addEventListener('DOMContentLoaded', function () {
            // animate on scroll
            AOS.init({ once: true, easing: 'ease-in-out', });
      })
}

if (window.location.pathname.split('/')[1] == 'product') {
      window.addEventListener('DOMContentLoaded', function () {

            // paroller.js
            jQuery("[data-paroller-factor]").paroller();

            if (window.location.pathname.split('/')[2]) {
                  const swiper = new Swiper('section.product-banner .swiper', {
                        slidesPerView: 1,
                        spaceBetween: 1,
                        setWrapperSize: true,
                        navigation: {
                              nextEl: 'section.product-banner .swiper-button-next',
                              prevEl: 'section.product-banner .swiper-button-prev',
                        },
                  })
            }
      })
}

if (window.location.pathname.split('/')[1] == 'industry') {
      window.addEventListener('DOMContentLoaded', function () {

            // paroller.js
            jQuery("[data-paroller-factor]").paroller();

            // animate on scroll
            AOS.init({ once: true, easing: 'ease-in-out', });

            const swiper = new Swiper('section.industry-banner .swiper', {
                  slidesPerView: 1,
                  spaceBetween: 1,
                  setWrapperSize: true,
                  navigation: {
                        nextEl: 'section.industry-banner .swiper-button-next',
                        prevEl: 'section.industry-banner .swiper-button-prev',
                  },
            })
      })
}