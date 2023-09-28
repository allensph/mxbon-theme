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
            AOS.init({
                  once: true,
                  easing: 'ease-in-out',
            });
            // paroller.js
            jQuery("[data-paroller-factor]").paroller();
      })
}