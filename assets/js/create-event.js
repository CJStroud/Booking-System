$(document).ready(function(){

  $(".event-name input").keyup(function() {
      var value = $(".event-name input").val().replace(/ /g, '-').toLowerCase();
      $('.event-slug input').val(value);
  });

  var frequenciesSelected = 0;
  var maxFrequencies = 3;

  $( ".frequency-option" ).click(function() {

    if ($(this).hasClass('frequency-selected')) {
      frequenciesSelected--;
      $(this).toggleClass('frequency-selected');
    }
    else if (frequenciesSelected < maxFrequencies) {
      frequenciesSelected++;
      $(this).toggleClass('frequency-selected');
    }

  });

});
