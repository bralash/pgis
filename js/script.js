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
					factor = 700 / marginX;
				

					var scaledInitValx = ResponseObject[1]['A'] - listOfX[0],
						Initx = scaledInitValx * factor + 25,
						scaledInitValy = ResponseObject[1]['B'] - listofY[0],
						Inity = scaledInitValy * factor + 25;

				ctx.moveTo(Initx, Inity);
				
				for (var i = 0; i < length; i++) {
					var scaledValx = ResponseObject[i + 1]['A'] - listOfX[0],
						valToPlotx = scaledValx * factor + 25,
						scaledValy = ResponseObject[i + 1]['B'] - listofY[0],
						valToPloty = scaledValy * factor + 25;

					console.log(valToPlotx, valToPloty);
					ctx.lineTo(valToPlotx, valToPloty);
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