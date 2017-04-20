function current_date(){
	
	var date = new Date();
			var yyyy = date.getFullYear();
			var mm = date.getMonth()+1; //January is 0!
			var dd = date.getDate();

			var hour    = date.getHours();
		    var minute  = date.getMinutes();
		    var second  = date.getSeconds(); 

			if(dd<10) {
			    dd='0'+dd
			} 

			if(mm<10) {
			    mm='0'+mm
			} 
			if(hour.toString().length == 1) {
		        var hour = '0'+hour;
		    }
		    if(minute.toString().length == 1) {
		        var minute = '0'+minute;
		    }
		    if(second.toString().length == 1) {
		        var second = '0'+second;
		    }   


			date = yyyy+"-"+mm+"-"+dd+" "+hour+":"+minute+":"+second;

			return date;
		}