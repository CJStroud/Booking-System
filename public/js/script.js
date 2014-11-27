var isMobile = {
	Android: function() {
		return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
		return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function() {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
		return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() {
		return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
};


var classes = new Object();

function removeFunction() {var id = $(this).attr('id');
delete classes[id];
$(this).parent().parent().remove();
}


$(document).ready(function(){

	$('select').change(function() {
		var value = $(this).children(":selected").attr("value");
		$(this).siblings('.hidden-text').val(value);
	});

	$('select').load(function() {
		var id = $(this).children(":selected").attr("id");
		$(this).siblings('.hidden-text').val(id);
	});


	$('#btn-add').click(function(){
		var optionSelected = $("#class-drop-down option:selected");
		var id = $(optionSelected).attr("id");

		if(classes[id] == null){
			var name = $(optionSelected).val();
			var newClass = new Class(id, name, 25);
			classes[String(newClass.id)] = newClass;
			$("#class-container").append(newClass.createDOM());

			$('.btn-remove').click(removeFunction);

			$('.input-limit').focusout(function(){
				var limit = $(this).val();
				if(limit == parseInt(limit, 10)){
					classes[$(this).attr('data-id')].limit = parseInt(limit, 10);
					console.log(JSON.stringify(classes));
				}else{
					console.log('Display error message');
					$(this).focus();
				}
			});
			console.log(JSON.stringify(classes));
			console.log(classes);
			var newClass = new Class(0,0,0);
			newClass.BuildFromObj(JSON.parse(JSON.stringify(classes)));
			console.log(newClass.createDOM());
		}
	});

	$('.btn-submit').click(function(e){
		e.preventDefault();

		$('#json-class').val(JSON.stringify(classes));

		$('#create-form').submit();
	});

	if($('#json-class').val() != ''){
		var value = $('#json-class').val();
		var json_classes = JSON.parse(value);
		console.log(json_classes['1']);
		for(var json_property in json_classes){
			var newClass = new Class(0,0,0);
			newClass.BuildFromObj(json_classes[json_property]);
			classes[newClass.id] = newClass;
			$("#class-container").append(newClass.createDOM());
		}

		console.log(classes);
	}
	$('.btn-remove').click(removeFunction);

});
