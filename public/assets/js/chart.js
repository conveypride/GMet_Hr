$(document).ready(function() {

	// Morris.Bar({
	// 	element: 'bar-charts',
	// 	data: [
	// 		{ y: '2017', a: 100, b: 90 },
	// 		{ y: '2018', a: 75,  b: 65 },
	// 		{ y: '2019', a: 50,  b: 40 },
	// 		{ y: '2020', a: 75,  b: 65 },
	// 		{ y: '2021', a: 50,  b: 40 },
	// 		{ y: '2022', a: 75,  b: 65 },
	// 		{ y: '2023', a: 100, b: 90 }
	// 	],
	// 	xkey: 'y',
	// 	ykeys: ['a', 'b'],
	// 	labels: ['Aplicants', 'Interviewed'],
	// 	lineColors: ['#fcb900','#00f4fc'],
	// 	lineWidth: '3px',
	// 	barColors: ['#fcb900','#00f4fc'],
	// 	resize: true,
	// 	redraw: true
	// });

	// interview bar menu
// Morris.Bar({
// 		element: 'bar-chart',
// 		data: [
// 			{ k: '2017', aa: 100, bb: 90 },
// 			{ k: '2018', aa: 75,  bb: 65 },
// 			{ k: '2019', aa: 50,  bb: 40 },
// 			{ k: '2020', aaa: 75,  bb: 65 },
// 			{ k: '2021', aa: 50,  bb: 40 },
// 			{ k: '2022', aa: 75,  bb: 65 },
// 			{ k: '2023', aa: 100, bb: 90 }
// 		],
// 		xkey: 'k',
// 		ykeys: ['aa', 'bb'],
// 		labels: ['Aplicants', 'Interviewed'],
// 		lineColors: ['#fcb900','#00f4fc'],
// 		lineWidth: '3px',
// 		barColors: ['#fcb900','#00f4fc'],
// 		resize: true,
// 		redraw: true
// 	});



	
	// Line Chart
	
	// Morris.Line({
	// 	element: 'line-charts',
	// 	data: [
	// 		{ y: '2017', a: 150, b: 90 },
	// 		{ y: '2018', a: 250,  b: 165 },
	// 		{ y: '2019', a: 200,  b: 140 },
	// 		{ y: '2020', a: 185,  b: 165 },
	// 		{ y: '2021', a: 180,  b: 140 },
	// 		{ y: '2022', a: 170,  b: 165 },
	// 		{ y: '2023', a: 180, b: 150 }
	// 	],
	// 	xkey: 'y',
	// 	ykeys: ['a', 'b'],
	// 	labels: ['Pending', 'Interview'],
	// 	lineColors: ['#fc00b5','#7600fc'],
	// 	lineWidth: '3px',
	// 	resize: true,
	// 	redraw: true
	// });


 
	// Bar Chart
	
	Morris.Bar({
		element: 'bar-charts',
		data: [
			{ y: '2017', a: 100, b: 90 },
			{ y: '2018', a: 75,  b: 65 },
			{ y: '2019', a: 50,  b: 40 },
			{ y: '2020', a: 75,  b: 65 },
			{ y: '2021', a: 50,  b: 40 },
			{ y: '2022', a: 75,  b: 65 },
			{ y: '2023', a: 100, b: 90 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Adminstration', 'Meteorology'],
		lineColors: ['#f43b48','#453a94'],
		lineWidth: '3px',
		barColors: ['#f43b48','#453a94'],
		resize: true,
		redraw: true
	});
	
	// Line Chart
	
	Morris.Line({
		element: 'line-charts',
		data: [
			{ y: '2017', a: 150, b: 90 },
			{ y: '2018', a: 250,  b: 165 },
			{ y: '2019', a: 200,  b: 140 },
			{ y: '2020', a: 185,  b: 165 },
			{ y: '2021', a: 180,  b: 140 },
			{ y: '2022', a: 170,  b: 165 },
			{ y: '2023', a: 180, b: 150 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Employees Present', 'Employees Absent'],
		lineColors: ['#453a94','#f43b48'],
		lineWidth: '3px',
		resize: true,
		redraw: true
	});
		
});