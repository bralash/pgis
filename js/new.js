$(document).ready(function () {
    $("body").on('click', '.name-owner-pln option, [name=owner_def] option', function () {

        var value = $(this).text().toLowerCase();
        var nameVal = $(this).parent().attr('name');
        console.log(nameVal);

        $(this).parent().siblings('[data-input=' + value + ']').addClass('showing-owner-pln').siblings().removeClass('showing-owner-pln');

        $('.showing-owner-pln').show().attr('name', nameVal).siblings('select').removeAttr('name');
        console.log(value);
    });


    $("input[type=number]").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
	});

	$("input[type=text]").keydown(function (e) {
		if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105))
	    	e.preventDefault();
		});
		
});