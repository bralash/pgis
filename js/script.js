$('select.ui.dropdown').dropdown();


$('.upload-input').change(function (e) {
    e.preventDefault();

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


function drawGrid(maxX, minX, maxY, minY) {
    var marginX = maxX - minX,
        marginY = maxY - minY;


    if (marginX == 0) {
        marginX = 1
    }
    if (marginY == 0) {
        marginY = 1;
    }

    var scaleX = 1250 / marginX,
        scaleY = 1250 / marginY;

    ctx.beginPath();
    //    console.log(marginX, scaleX);

    var plotMarginX,
        plotMarginY;

    for (var i = 0; i <= marginX; i++) {
        plotMarginX = scaleX * i;
        ctx.moveTo(plotMarginX, 0);
        ctx.lineTo(plotMarginX, 1250);
    }

    for (var i = 0; i <= marginY; i++) {
        plotMarginY = scaleY * i;
        ctx.moveTo(0, plotMarginY);
        ctx.lineTo(1250, plotMarginY);
    }

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#aaaaaa';
    ctx.stroke();
}

var shG = $("#shG");

shG.on('click', function (e) {
    e.preventDefault();
    var strtX = $("#strtX").val().substring(0, 3),
        endX = $("#endX").val().substring(0, 3),
        strtY = $("#strtY").val().substring(0, 3),
        endY = $("#endY").val().substring(0, 3);

    drawGrid(endX, strtX, endY, strtY);
    gridDrawn = true;

    XOrigin = strtX * 1000;
    XFinal = endX * 1000;
    YOrigin = strtY * 1000;
    YFinal = endY * 1000;

    $('.xorigin').text(XOrigin);
    $('.xfinal').text(XFinal);
    $('.yorigin').text(YOrigin);
    $('.yfinal').text(YFinal);
});

$('button.del').on('click', function() {
    $(this).parent().find('.confirm-del').css({
        'bottom' : '0px'
    });
    
});
$('a.no').on('click', function(e) {
    e.preventDefault();
    $(this).parent().css({
        'bottom' : '-60px'
    });
});


// drawGrid(125, 120, 140, 130);