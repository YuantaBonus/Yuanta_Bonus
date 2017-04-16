function current_date(){
	
	var date = new Date();
			var yyyy = date.getFullYear();
			var mm = date.getMonth()+1; //January is 0!
			var dd = date.getDate();

			if(dd<10) {
			    dd='0'+dd
			} 

			if(mm<10) {
			    mm='0'+mm
			} 

			date = yyyy+"-"+mm+"-"+dd;

			return date;
		}