$(document).ready(function() {
  // Ask
  $('select').select2();

  // Answer
  $('#show-answer-box').click(function() {
    $(this).hide();
    $('#answer-box').show();
  });
});
