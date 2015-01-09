$(document).ready(function(){

  $(".event-name input").keyup(function() {
      var value = $(".event-name input").val().replace(/ /g, '-').toLowerCase();
      $('.event-slug input').val(value);
  });

  var frequencyCount = 0;
  var maxFrequencies = 3;
  var selectedFrequencies;

  $( ".frequency-option" ).click(function() {

    console.log($(this).attr('data-id'));

    var id = $(this).attr('data-id');


    if ($(this).hasClass('frequency-selected')) {
      frequencyCount--;
      selectedFrequencies.remove(id);
      $(this).toggleClass('frequency-selected');
    }
    else if (frequencyCount < maxFrequencies) {
      frequencyCount++;
      selectedFrequencies.push(id);
      $(this).toggleClass('frequency-selected');
      $('#selected-frequencies-text').val();
    }

  });

});
