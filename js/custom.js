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



// Rider HQ stuff

var urlr = "https://api.riderhq.com/api/v1/3446/getevents?pretty=true"


jQuery.ajax({
    url: urlr,
    method: "GET",
    dataType: 'json',
    success: function(data) {
        console.log(data);
        var html_to_append = '';
        jQuery.each(data.events, function(i, item) {
            s = item.start_date.substring(0, item.start_date.indexOf('T'));
            html_to_append +=
                '<div class="col-md-2 mb-2 bg-light d-flex align-items-center justify-content-center"><div class="text-center pt-1"><h5>' +
                s + '</h5></div></div>' +
                '<div class="col-md-7 p-2 "><h3>' +
                item.name + '</h3><p>' +
                item.type + '</p><p>Fee: ' + item.entrylists[0].fees[0].amount + '</p></div><div class="col-md-3 d-flex align-items-center justify-content-center"><a class="btn btn-primary" href="' + item.enter_uri + '" role="button" target="_blank">Book Event</a></div>';
        });
        jQuery("#riderhq").html(html_to_append);
    },
    error: function() {
        console.log(data);
    }
});

var base = "http://wp-ppp:8888/w/";
var base_url = 'http://wp-ppp:8888/w/wp-json';
var cats = '/wp/v2/categories';
var events = '/wp/v2/event';
var taxes = '/wp/v2/taxonomies?type=event';
var e_cats = '/wp/v2/event_category'

var api_url = base_url + e_cats;

function retrieve_content(api_url) {
    fetch(api_url).then(function(response) {
        return response.json();
    }).then(function(posts) {
        console.log(posts)
        var to_add = '<li><a href="' + base + "events/" + '">All</a></li>';
        jQuery.each(posts, function(i, item) {
            to_add +=
                '<li><a href="' + item.link + '">' + item.name + '</a></li>';
        });
        var div = jQuery('<div></div>').addClass('events').attr('id', 'navmenu');
        var ul = jQuery('<ul></ul>').addClass('text-center');
        ul.append(to_add);
        div.append(ul);
        jQuery("#event-nav").append(div);
    });
}



retrieve_content(api_url);


jQuery('#kara').text('sobota');


jQuery('ul.navbar-nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});