$(document).ready(function () {
  $('nav').addClass('transparent'),
  $('#menu-itens li a').addClass('transparent-white');
});

$(window).scroll(function () {
  if ($('nav').offset().top > 200) {
    $('nav').removeClass('transparent'),
    $('#menu-itens li a').removeClass('transparent-white');
    //$('.button-collapse i.material-icons, a.brand-logo, .menu-item').addClass('white-text');
  } else {
    $('nav').addClass('transparent'),
    $('#menu-itens li a').addClass('transparent-white');
    //$('.button-collapse i.material-icons, a.brand-logo, .menu-item').removeClass('white-text');
  }
});