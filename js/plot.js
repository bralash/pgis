  var canvas = document.getElementById('land-area');
  ctx = canvas.getContext('2d');
  canvas.width = 1250;
  canvas.height = 1250;
  var excelData = new FormData;

  var strt = $("#strt"),
            drw = $("#drw"),
            clsPth = $("#clsPth"),
            end = $("#end"),
            xCood = $('.xCood'),
            yCood = $('.yCood');

  //  var XOrigin,
  //          XFinal,
  //          YOrigin,
  //          YFinal,
  //          isSetXY = false;

  end.css('display', 'none');
  clsPth.css('display', 'none');

  strt.on('click', function (e) {
            e.preventDefault();
            ShwGrid();

            var xPos = xCood.val().substring(3),
                      yPos = yCood.val().substring(3),
                      drwX = (xPos / 2),
                      drwY = (yPos / 2),
                      color = $('.color').val();

            ctx.beginPath();
            ctx.moveTo(drwX, drwY);

            ctx.lineWidth = 2;
            ctx.strokeStyle = color;
            ctx.stroke();

            xCood.val('');
            yCood.val('');
            $(this).hide('slow');
            end.show();
            clsPth.show();
  });

  drw.on('click', function (e) {
            e.preventDefault();
            var xPos = xCood.val().substring(3),
                      yPos = yCood.val().substring(3),
                      drwX = (xPos / 2),
                      drwY = (yPos / 2),
                      color = '#' + $('.color').val();

            ctx.lineTo(drwX, drwY);

            ctx.lineWidth = 2;
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

  function ShwGrid() {
            //Grid Lines
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(0, 1250);
            ctx.moveTo(250, 0);
            ctx.lineTo(250, 1250);
            ctx.moveTo(500, 0);
            ctx.lineTo(500, 1250);
            ctx.moveTo(750, 0);
            ctx.lineTo(750, 1250);
            ctx.moveTo(1000, 0);
            ctx.lineTo(1000, 1250);
            ctx.moveTo(1250, 0);
            ctx.lineTo(1250, 1250);

            ctx.moveTo(0, 0);
            ctx.lineTo(1250, 0);
            ctx.moveTo(0, 250);
            ctx.lineTo(1250, 250);
            ctx.moveTo(0, 500);
            ctx.lineTo(1250, 500);
            ctx.moveTo(0, 750);
            ctx.lineTo(1250, 750);
            ctx.moveTo(0, 1000);
            ctx.lineTo(1250, 1000);
            ctx.moveTo(0, 1250);
            ctx.lineTo(1250, 1250);
            ctx.lineWidth = 2;
            ctx.strokeStyle = '#ccc';
            ctx.stroke();
  }

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

                                          //                                  if (!isSetXY) {
                                          var XOrigin = listOfX[0] * 1000;
                                          var XFinal = (listOfX[length - 1] + 1) * 1000;
                                          var YOrigin = listOfY[0] * 1000;
                                          var YFinal = (listOfY[length - 1] + 1) * 1000;
                                          var isSetXY = true;
                                          //                                  }

                                          //                console.log(XOrigin, XFinal, YOrigin, YFinal);

                                          var marginX = listOfX[length - 1] - listOfX[0],
                                                    marginY = listOfY[length - 1] - listOfY[0];

                                          if (marginX == 0) marginX = 1;
                                          if (marginY == 0) marginY = 1;

                                          var scaleX = 1250 / marginX,
                                                    scaleY = 1250 / marginY;

                                          drawGrid(listOfX[length - 1], listOfX[0], listOfY[length - 1], listOfY[0]);

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

                                                    console.log(listOfX[i] - XOrigin);
                                                    ctx.strokeStyle = '#' + $('.up.color').val();
                                                    ctx.stroke();
                                          }
                                          clsPth.trigger('click');
                                },
                                error: function (error) {

                                },
                                type: 'POST',
                                processData: false,
                                contentType: false
                      });

            });
  });