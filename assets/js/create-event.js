$(document).ready(function(){

	$(".event-name input").keyup(function() {
			var value = $(".event-name input").val().replace(/ /g, '-').toLowerCase();
			$('.event-slug input').val(value);
	});

	var frequencyCount = 0;
	var maxFrequencies = 3;
	var frequencyIds = [];
	var frequencyNames = [];
	var frequencyInputValue = "";


	$('#frequencies-input').click(function() {
		$("#frequency-save").click(function() {
			$('#frequencies-input').val(frequencyInputValue);
			$('#frequencies-input-hidden').val(frequencyIds);
		});
	});

	$('#frequencies-input').keydown(function(e) {
		e.preventDefault();
		return false;
	});

	$( ".frequency-option" ).click(function() {

		var id = $(this).attr('data-id');
		var name = $(this).attr('value');

		if ($(this).hasClass('frequency-selected')) {
			frequencyCount--;
			var index = frequencyIds.indexOf(id);
			frequencyIds.splice(index, 1);
			frequencyNames.splice(index, 1);
			$(this).toggleClass('frequency-selected');
		}
		else if (frequencyCount < maxFrequencies) {
			frequencyCount++;
			frequencyIds.push(id);
			frequencyNames.push(name);
			$(this).toggleClass('frequency-selected');
		}

		frequencyInputValue = "";
		var loopIndex;

		for (loopIndex = 0; loopIndex < frequencyNames.length; loopIndex++) {
			if(loopIndex !== 0)
			{
				frequencyInputValue += ", ";
			}
			frequencyInputValue += frequencyNames[loopIndex];
		}

		$('#selected-frequencies-text').html(frequencyInputValue);
	});

});
