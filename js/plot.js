var canvas = document.getElementById('land-area');
ctx = canvas.getContext('2d');
canvas.width = 750;
canvas.height = 750;

var strt = $("#strt"),
    drw = $("#drw"),
    clsPth = $("#clsPth"),
    end = $("#end"),
    xCood = $('.xCood'),
    yCood = $('.yCood');

end.css('display', 'none');
clsPth.css('display', 'none');

//strt.on('click', function (e) {
//    e.preventDefault();
//    ShwGrid();
//});
 
drw.on('click', function (e) {
    e.preventDefault();
    var xPos = xCood.val().substring(3),
        yPos = yCood.val().substring(3),
        drwX = (xPos / 2),
        drwY = (yPos / 2),
        color = '#' + $('.color').val();

    ctx.lineTo(drwX, drwY); 

    ctx.lineWidth = 3;
    ctx.strokeStyle = color;
    ctx.stroke();

    xCood.val('');
    yCood.val('');
});

end.on('click', function (e) {
    e.preventDefault();

    strt.show();
});

clsPth.on('click', function (e) {
    e.preventDefault();

    ctx.closePath();
    ctx.stroke();
});

(function ShwGrid() {
    //Grid Lines
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(0, 750);
    ctx.moveTo(250, 0);
    ctx.lineTo(250, 750);
    ctx.moveTo(500, 0);
    ctx.lineTo(500, 750);
    ctx.moveTo(750, 0);
    ctx.lineTo(750, 750);

    ctx.moveTo(0, 0);
    ctx.lineTo(750, 0);
    ctx.moveTo(0, 250);
    ctx.lineTo(750, 250);
    ctx.moveTo(0, 500);
    ctx.lineTo(750, 500);
    ctx.moveTo(0, 750);
    ctx.lineTo(750, 750);
    ctx.lineWidth = 2;
    ctx.strokeStyle = '#ccc';
    ctx.stroke();


    var xPos = xCood.val().substring(3),
        yPos = yCood.val().substring(3),
        drwX = (xPos / 2),
        drwY = (yPos / 2),
        color = $('.color').val();

    ctx.beginPath();
    ctx.moveTo(drwX, drwY);

    ctx.lineWidth = 3;
    ctx.strokeStyle = color;
    ctx.stroke();

    xCood.val('');
    yCood.val('');
    $(this).hide('slow');
    end.show();
    clsPth.show();
    
})()