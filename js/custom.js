// CUSTOM STUFF
var key = "98b9c60e63066cc909ee48c92368ee4e";
var city = "London"; // My test case was "London"
var url = "https://api.openweathermap.org/data/2.5/forecast";

jQuery.ajax({
    url: url, //API Call
    dataType: "json",
    type: "GET",
    data: {
        q: city,
        appid: key,
        units: "metric",
        cnt: "1"
    },
    success: function(data) {
        console.log('Received data:', data) // For testing
        var wf = "";
        wf += "<h2>" + data.city.name + " Weather</h2><hr />"; // City (displays once)
        jQuery.each(data.list, function(index, val) {
            wf += "<h3>" // Opening paragraph tag
            wf += val.main.temp + "&degC" // Temperature
            wf += "<span> | " + val.weather[0].description + "</span>"; // Description
            wf += "</h3>" // Closing paragraph tag
        });
        jQuery("#weather").html(wf);
    }
});




jQuery('ul.navbar-nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});