const swiper = new Swiper('.mySwiper', {
       // Opções básicas
       loop: true, // Repete no final
       autoplay: {
         delay: 2500, // Tempo troca (2,5 segundos)
         disableOnInteraction: false, // Continua após clicar/arrastar
       },
       // Se quiser navegação e paginação
       pagination: {
         el: '.swiper-pagination',
         clickable: true,
       },
       navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
       },
     });