$(document).ready(function() {
  $('.collapse-icon').on('click', function() {
    var target = $(this).attr('href');
    $('.collapse.show').not(target).collapse('hide');
  });
});