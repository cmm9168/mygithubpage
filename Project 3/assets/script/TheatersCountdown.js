// set the date we're counting down to
var theater_date = new Date("Nov 1, 2013").getTime();
var dvd_date = new Date("Feb 15, 2014").getTime();
 
// variables for time units
var days, hours, minutes, seconds;
 
// get tag element
var countdown = document.getElementById("countdown");
 
// update the tag with id "countdown" every 1 second
setInterval(function () {
 
    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var theater_seconds_left = (theater_date - current_date) / 1000;
	if(theater_seconds_left <= 1)
	{
		var dvd_seconds_left = (dvd_date - current_date) / 1000;
		if(dvd_seconds_left <= 1)
		{
			countdown.innerHTML = "<h4>Ender's Game has been released to Theaters and DVD!</h4>";
		}
		else
		{
			// do some time calculations
			days = parseInt(dvd_seconds_left / 86400);
			dvd_seconds_left = dvd_seconds_left % 86400;
			 
			hours = parseInt(dvd_seconds_left / 3600);
			dvd_seconds_left = dvd_seconds_left % 3600;
			 
			minutes = parseInt(dvd_seconds_left / 60);
			seconds = parseInt(dvd_seconds_left % 60);
			 
			// format countdown string + set tag value
			countdown.innerHTML = "<h4>Ender's Game has been released to Theaters!</h4>"
			+ "<h3>Countdown timer till movie is released to DVD</h3>" 
			+ "<h4>" + days + " days, " + hours + " hours, "+ minutes + "minutes, " + seconds + "seconds" + "</h4>";  
		}
	}
	else
	{
		// do some time calculations
		days = parseInt(seconds_left / 86400);
		seconds_left = seconds_left % 86400;
		 
		hours = parseInt(seconds_left / 3600);
		seconds_left = seconds_left % 3600;
		 
		minutes = parseInt(seconds_left / 60);
		seconds = parseInt(seconds_left % 60);
		 
		// format countdown string + set tag value
		countdown.innerHTML = days + "days, " + hours + "hours, " + minutes + "minutes, " + seconds + "seconds";  
	}
 
}, 1000);