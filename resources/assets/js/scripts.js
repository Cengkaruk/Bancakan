$(document).ready(function() {
  // Ask
  $('select').select2();

  // Answer
  $('#show-answer-box').click(function() {
    $(this).hide();
    $('#answer-box').show();
  });

  // Reply
  $('.show-reply-answer-box').click(function() {
    $(this).closest('.answer').find('.reply-answer-box').toggle();
    return false;
  });
});
