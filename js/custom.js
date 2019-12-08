// CUSTOM STUFF
var key = "98b9c60e63066cc909ee48c92368ee4e";
var city = "London";
var url = "https://api.openweathermap.org/data/2.5/forecast/daily";
let now = new Date();
let currentDay = now.getDay();

function indexForNextSunday(currentDay) {
    if (currentDay == 0) {
        return 0;
    }

    return 7 - currentDay;
}

jQuery.ajax({
    url: url,
    dataType: "json",
    type: "GET",
    data: {
        q: city,
        appid: key,
        units: "metric",
        cnt: "7"
    },
    success: function(data) {
        let val = data.list[indexForNextSunday(currentDay)];
        let forecastDate = new Date(1000 * val.dt);
        console.log(forecastDate);
        var wf = "";

        if (currentDay == 0) {
            wf += "<h2>Today&#39s Weather</h2><hr />";
        } else {
            wf += "<h2>Sunday&#39s Weather</h2><hr />";
        }

        wf += "<p>"
        wf += Math.round(val.temp.day) + "&degC"
        wf += "<span> " + val.weather[0].description + "</span>";
        wf += "</p>"
        jQuery("#weather").html(wf);
    }
});



/* Changed to CSS control */
/*
jQuery('ul.navbar-nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
}, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
});
*/
