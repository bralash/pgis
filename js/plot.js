var canvas = document.getElementById('land-area');
ctx = canvas.getContext('2d');
canvas.width = 1250;
canvas.height = 1250;
var excelData = new FormData;
var gridDrawn = false;
var strt = $("#strt"),
          drw = $("#drw"),
          clsPth = $("#clsPth"),
          end = $("#end"),
          xCood = $('.xCood'),
          yCood = $('.yCood');
strt.hide();
var XOrigin,
          XFinal,
          YOrigin,
          YFinal,
          isSetXY = false,
          movedTo = false;

end.css('display', 'none');
clsPth.css('display', 'none');


drw.on('click', function (e) {
          e.preventDefault();
          ctx.beginPath();

          x = (1250 / (XFinal - XOrigin)) * ($('.xCood').val() - XOrigin);
          y = (1250 / (YFinal - YOrigin)) * ($('.yCood').val() - YOrigin);
          console.log(x, y);

          if (movedTo) {
              ctx.lineTo(x, y);
              console.log('lineTo '+x, y);

          } else {
             ctx.moveTo(x, y);
             console.log('movedTo '+x, y);

             movedTo = true;
          }
          ctx.strokeStyle = '#'+$('.color').val();
          ctx.stroke();

          xCood.val('');
          yCood.val('');
          clsPth.show();
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

$('.brw').on('click', function (e) {
          e.preventDefault();
          $('.hidden-browse').trigger('click');
});

$('.hidden-browse').on('click', function () {
          $(this).change(function () {
                    var filename = $(this).val();
                    $('#ip').val(filename);
                    excelData.set('action', 'loadExcelFile');
                    excelData.set('file', document.getElementById('upload-input').files[0]);

                    console.log(excelData.get('action'));
                    $.ajax({
                              url: 'php/conflict_controller.php',
                              data: excelData,
                              success: function (response) {
                                        var ResponseObject = JSON.parse(response);

                                        var length = 0,
                                                  olistOfX = new Array,
                                                  olistofY = new Array;

                                        for (prop in ResponseObject) {
                                                  length++;
                                        }

                                        for (var i = 0; i < length; i++) {
                                                  olistOfX.push(new String(ResponseObject[i + 1]['A']).substring(0, 3));
                                                  olistofY.push(new String(ResponseObject[i + 1]['B']).substring(0, 3));
                                        }
                                        var listOfX = new Array;
                                        var listOfY = new Array;

                                        for (var i = 0; i < length; i++) {
                                                  listOfX.push(new Number(olistOfX[i]));
                                                  listOfY.push(new Number(olistofY[i]));
                                        }
                                        listOfX.sort();
                                        listOfY.sort();

                                        if (!gridDrawn) {
                                                  XOrigin = listOfX[0] * 1000;
                                                  XFinal = (listOfX[length - 1] + 1) * 1000;
                                                  YOrigin = listOfY[0] * 1000;
                                                  YFinal = (listOfY[length - 1] + 1) * 1000;
                                                  isSetXY = true;
                                        }

                                        $('.xorigin').text(XOrigin);
                                        $('.xfinal').text(XFinal);
                                        $('.yorigin').text(YOrigin);
                                        $('.yfinal').text(YFinal);

                                        //                                  }
                                        //                console.log(XOrigin, XFinal, YOrigin, YFinal);

                                        var marginX = listOfX[length - 1] - listOfX[0],
                                                  marginY = listOfY[length - 1] - listOfY[0];

                                        if (marginX == 0) marginX = 1;
                                        if (marginY == 0) marginY = 1;

                                        var scaleX = 1250 / marginX,
                                                  scaleY = 1250 / marginY;

                                        if (gridDrawn) drawPoints();
                                        if (!gridDrawn) {
                                                  drawGrid(listOfX[length - 1], listOfX[0], listOfY[length - 1], listOfY[0]);
                                                  gridDrawn = true;
                                        }

                                        console.log(XOrigin, XFinal, XFinal - XOrigin);

                                        function drawPoints() {
                                                  listOfX = [];
                                                  listOfY = [];

                                                  for (var i = 0; i < length; i++) {
                                                            listOfX.push(ResponseObject[i + 1]['A']);
                                                            listOfY.push(ResponseObject[i + 1]['B']);
                                                  }
                                                  //                listOfX.sort();
                                                  //                listOfY.sort();
                                                  ctx.beginPath();

                                                  x1 = (1250 / (XFinal - XOrigin)) * (listOfX[0] - XOrigin);
                                                  y1 = (1250 / (YFinal - YOrigin)) * (listOfY[0] - YOrigin);

                                                  ctx.moveTo(x1, y1);

                                                  for (var i = 0; i < length; i++) {
                                                            x = (1250 / (XFinal - XOrigin)) * (listOfX[i] - XOrigin);
                                                            y = (1250 / (YFinal - YOrigin)) * (listOfY[i] - YOrigin);
                                                            ctx.lineTo(x, y);

                                                            console.log(x, y);
                                                            ctx.strokeStyle = '#' + $('.up.color').val();
                                                            ctx.stroke();
                                                  }
                                                  clsPth.trigger('click');
                                        }
                              },
                              error: function (error) {

                              },
                              type: 'POST',
                              processData: false,
                              contentType: false
                    });
          });
});

$('.save-btn').click(function () {
          $.ajax({
                    url: 'php/conflict_controller.php',
                    data: {
                              conflict_id: $('[name=conf_id]').val(),
                              base64: canvas.toDataURL('image/jpeg'),
                              action: 'addConflictImage'
                    },
                    type: 'post',
                    success: function (response) {
                              if (response == 'true') {
                                        window.alert('success');
                                        window.location.reload();
                              }
                    },
                    error: function () {}
          });
});