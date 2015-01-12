$(document).ready(function(){

	var skillId = $("#skill-input").val();
	$("#skill-dropdown option#" + skillId).prop('selected', true);

	var classId = $("#class-hidden-input").val();
	$("#class-dropdown option#" + classId).prop('selected', true);

});
