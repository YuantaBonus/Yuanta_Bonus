//Get the context of the canvas element we want to select

function myChart1(label_array,value_array){
	console.log(label_array);
	var ctx = document.getElementById("myChart1").getContext("2d");
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: label_array,
	        datasets: [{
	            label: '剩餘點數',
	            data: value_array,
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        },

	    }
	});
}

function myChart2(label_array,value_array){
	console.log(label_array);
	var ctx = document.getElementById("myChart2").getContext("2d");
	var myChart = new Chart(ctx, {
	    type: 'pie',
	    data: {
	        labels: label_array,
	        datasets: [{
	            label: '剩餘點數',
	            data: value_array,
             	backgroundColor: [
	                "#FF6384",
	                "#36A2EB",
	                "#FFCE56"
	            ],
	            hoverBackgroundColor: [
	                "#FF6384",
	                "#36A2EB",
	                "#FFCE56"
	            ]
	        }]
	    },
	    options: {

	    }
	});
}
    