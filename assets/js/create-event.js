$(document).ready(function(){

    $(".event-name input").keyup(function() {
        var value = $(".event-name input").val().replace(/ /g, '-').toLowerCase();
        $('.event-slug input').val(value);
    });

});
