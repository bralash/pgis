$(document).ready(function () {
	$('select.ui.dropdown').dropdown();
	var excelData = new FormData;

	$('#upload').click(function (e) {
		e.preventDefault();
		$('label[for=excel-file]').trigger('click');
		excelData.set('action', 'loadExcelFile');
	});

	$('#excel-file').change(function () {
		excelData.set('file', document.getElementById('excel-file').files[0]);

		console.log(excelData.get('action'));
		$.ajax({
			url: 'php/conflict_controller.php',
			data: excelData,
			success: function (response) {
				var ResponseObject = JSON.parse(response);


				var length = 0,
					listOfX = new Array,
					listofY = new Array;

				for (prop in ResponseObject) {
					length++;
				}

				for (var i = 0; i < length; i++) {
					listOfX.push(ResponseObject[i + 1]['A']);
					listofY.push(ResponseObject[i + 1]['B']);
				}

				listOfX.sort();
				listofY.sort();

				var marginX = listOfX[length - 1] - listOfX[0],
					marginY = listofY[length-1] - listofY[0],
					factorX = 700 / marginX,
					factorY = 700 / marginY;

				var scaledInitValx = ResponseObject[1]['A'] - listOfX[0],
					Initx = scaledInitValx * factorX + 25,
					scaledInitValy = ResponseObject[1]['B'] - listofY[0],
					Inity = scaledInitValy * factorY + 25;
				
				console.log('first points are ', Initx, Inity);
				ctx.moveTo(Initx, Inity);

				for (var i = 0; i < length; i++) {
					var scaledValx = ResponseObject[i + 1]['A'] - listOfX[0],
						valToPlotx = scaledValx * factorX + 25,
						scaledValy = ResponseObject[i + 1]['B'] - listofY[0],
						valToPloty = scaledValy * factorY + 25;

					console.log(valToPlotx, valToPloty);
					ctx.lineTo(valToPlotx, valToPloty);

					ctx.strokeStyle = '#' + $('.color').val();
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