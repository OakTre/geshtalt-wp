jQuery(document).ready(function () {
  //Всплывающее меню
  jQuery('.burger').on('click', function () { 
    jQuery(this).toggleClass('burger-active');
    jQuery('.header-menu').toggleClass('header-menu-active');
   });

   
//cf7
jQuery(".wpcf7").on('wpcf7:mailsent', function(event){
  //alert('GOOD');
  jQuery('#thx').addClass('thx-active');
  jQuery('.overlay').fadeIn(200);
  //Скрытие поп окна автоматически, через 5,5 секнд
  setTimeout(function(){
    jQuery('#thx').removeClass('thx-active');
  },2500);  //3500 = 3,5 секунды
  
  setTimeout(function(){jQuery('.popup').fadeOut(300);},2700); 
  
  setTimeout(function(){jQuery('.overlay').fadeOut(300);},2700);
});

jQuery(".wpcf7").on('wpcf7:invalid', function(event){
  alert('Заполните поля правильно и повторите попытку!');
});
jQuery(".wpcf7").on('wpcf7:mailfailed', function(event){
  alert('Ошибка при отправке! Попробуйте отправить заявку еще раз!');
});

  jQuery('.doc-item').on('click', function() {
    var href = jQuery(this).children('.doc-href').attr('src');
    window.location.href = href;
  });

  //Открыть видео
  jQuery('.about-wrap-right').on('click', function () {
    var video = jQuery(this).attr('data-src');
    jQuery('.overlay').fadeIn(300);
    jQuery('.popup').fadeIn(300);
    jQuery('.popup iframe').attr('src', video);
  });
  jQuery('.overlay').on('click', function () {
    jQuery('.overlay').fadeOut(300);
    jQuery('.popup').fadeOut(300);
    jQuery('.popup iframe').attr('src', '');
  });
  jQuery('.close').on('click', function () {
    jQuery('.overlay').fadeOut(300);
    jQuery('.popup').fadeOut(300);
    jQuery('.popup iframe').attr('src', '');
  });

  jQuery('.offer').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: false,
    arrows: true
  });

//parralax
/* function parallaxScroll(){
  var scrolled = jQuery(window).scrollTop();
  jQuery('.offer').css('background-position-y',  (0 + (scrolled*.15))  + 'px');
 }
jQuery(window).scroll(function() { 
  parallaxScroll();
}); */
	
	
jQuery('#mailerlite-1-field-email').attr('placeholder', 'e-mail');
jQuery('#mailerlite-1-field-name').attr('placeholder', 'Ваше имя');
jQuery('#mailerlite-1-field-phone').attr('placeholder', 'Ваш телефон');

jQuery('#mailerlite-2-field-email').attr('placeholder', 'e-mail');
jQuery('#mailerlite-2-field-name').attr('placeholder', 'Ваше имя');
jQuery('#mailerlite-2-field-phone').attr('placeholder', 'Ваш телефон');
jQuery('#mailerlite-2-field-city').attr('placeholder', 'Ваш город');
	
	
});