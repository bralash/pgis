$(document).ready(function () {
    $("[name=owner_pln], [name=owner_def]").change(function () {
        var value = $(this).find(':selected').text().toLowerCase();

        var nameVal = $(this).attr('name');

        $(this).removeAttr('name').parent('.field').find('[data-input=' + value + ']').attr('name', nameVal).show();
        console.log(value)
    });
});