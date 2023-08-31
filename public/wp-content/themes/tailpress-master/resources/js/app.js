// Navigation toggle
window.addEventListener('load', function () {
      let main_navigation = document.querySelector('#primary-menu');
      document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
            e.preventDefault();
            main_navigation.classList.toggle('hidden');
      });

      // Header serach toggle
      document.querySelector('.search-toggle').addEventListener('click', function (e) {
            e.preventDefault()
            e.target.closest('.search-wrapper').classList.toggle('active')
      });

      // Home: Products Slider
      const swiper1 = new Swiper('section.products .swiper', {
            slidesPerView: 3,
            spaceBetween: 32,

            pagination: {
                  el: 'section.products .swiper-pagination',
                  clickable: true,
            },

            navigation: {
                  nextEl: 'section.products .swiper-button-next',
                  prevEl: 'section.products .swiper-button-prev',
            },
      });

      // Home: Industries Slider
      const swiper2 = new Swiper('section.industries .swiper', {
            slidesPerView: 'auto',
            spaceBetween: 16,

            pagination: {
                  el: 'section.industries .swiper-pagination',
                  clickable: true,
            },

            navigation: {
                  nextEl: 'section.industries .swiper-button-next',
                  prevEl: 'section.industries .swiper-button-prev',
            },
      });

      //Home: Contatc section paroller.js
      jQuery("[data-paroller-factor]").paroller();
});
