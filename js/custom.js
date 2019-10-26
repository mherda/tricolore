// CUSTOM STUFF
var key = "98b9c60e63066cc909ee48c92368ee4e";
var city = "London"; 
var url = "https://api.openweathermap.org/data/2.5/forecast/daily";

function indexForNextSunday() {
    let now = new Date();
    let currentDay = now.getDay();
    return Math.abs(currentDay - 7);
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
    success: function (data) {
        let val = data.list[indexForNextSunday()];

        var wf = "";
        wf += "<h2> Sunday&#39s Weather</h2><hr />"; 
        wf += "<h3>" 
        wf += val.temp.day + "&degC"
        wf += "<span> " + val.weather[0].description + "</span>"; 
        wf += "</h3>" 

        jQuery("#weather").html(wf);
    }
});




jQuery('ul.navbar-nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});