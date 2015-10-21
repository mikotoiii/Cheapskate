"use strict";

var venueData;
var curVenue;
var user;

//set current day
var curDay;

var weekdays = [];
    weekdays[0] = "Sunday";
    weekdays[1] = "Monday";
    weekdays[2] = "Tuesday";
    weekdays[3] = "Wednesday";
    weekdays[4] = "Thursday";
    weekdays[5] = "Friday";
    weekdays[6] = "Saturday";

// Init on DOM Load Stuff
$(function () {
    getUserLocation(function() {});
    curDay  = new Date().getDay();
    $("#dayTitle").text(getDayName(curDay));
    
    // load venues
    $.ajax({
        url: "CheapskateAPI/findVenuesInRadius/1",
        dataType: "json",
        success: function(result) {
            venueData = result;
        },
        complete: function() {
            populateDays();  
        }
    });
    
    $.ajax({
        url: "CheapskateAPI/getUser/1",
        dataType: "json",
        success: function(result) {
            user = result;
        },
    });

    $('.flexslider').flexslider({
        slideshow: false,
        controlNav: false,
        slideToStart: curDay,
        after: function() {
            var theDay = trimLetters($("#daysContainer li:visible").attr("id"));
            $("#dayTitle").text(getDayName(theDay));
        },
        animationDuration: 200
    });
    
    $(document).on("click", ".venueTextLink", function(e) {
        var venue = getVenue($(e.target).data("id"));
        curVenue = venue;
        initMap();
        $("#daysContainer").toggle();
        $("#venueDetailsContainer").toggle({
            duration:200,
            done: function() {
                populateVenue(venue);
                
            }
        });
    });

    $("#venueDetailsCloseBtn").click(function(e) {
        $("#daysContainer").show();
        $("#venueDetailsContainer").hide();
    });
    
});

function populateDays() {
    $("#daysContainer li").each(function (i, ele) {
        var day = trimLetters($(ele).attr("id"));
        
        $(ele).addClass("clearfix");

        $(ele).data("day", day);
        $(ele).append(dayMarkupFactory(), null);
        $("#dayTitle").text(getDayName(day));
        
        populateDeals(day);
    });

}

function populateDeals(day) {
    
    if (day > (testData.days.length - 1)) {
        return;
    }
    
    var data = testData.days[day];
    var deals = data.deals;
    
    var ul = $("#day" + day + " ul");
    $.each(deals, function(ind) {
        var deal = deals[ind];
        var li = $("<li class='dealItem'></li>");
        var venue = getVenue(deal.venueId);
        li.append("<i class='fa fa-" + getCategoryIcon(deal.category) + "'></i>");
        li.append("<div class='venue venueTextLink' data-id='" + deal.venueId + "'>" + venue.name + "</div>");
        li.append("<div class='category'>" + deal.category + " | " + deal.type) + "</div>";
        li.append("<div class='time'><i class='fa fa-clock-o'></i> " + deal.timeStart + " - " + deal.timeEnd + "</div>");
        li.append("<div class='info'>" + deal.info + "</div>");

        ul.append(li);
    });
    
}

function populateVenue(venue) {
    $("#venueTitle").append("<div>" + venue.name + "</div>");
    $("#venueDetails").append("<div>" + venue.info + "</div>");
    $("#venueDetails").append("<div id='directions-panel'></div>");
    //$("#venueMap").append("<div>" + getVenueMap(venue) + "</div>"); 
}

function dayMarkupFactory() {
    return "<div class='dayWrapper'><ul class='dealList'></ul></div>";
}

function getDayName(day) {
    return weekdays[day];
}


function trimLetters(string) {
    return string.replace(/\D/g, "");
}

function getCategoryIcon(category) {
    switch(category) {
        case "drinks":
            return "glass";
        case "food":
            return "cutlery";
        default:
            break;
    }
}

function findVenueByName(name) {
    for (var i = 0; i < venueData.length; i++) {
        if (venueData[i].hasOwnProperty("name") && (venueData[i].name === name))
            return venueData[i];
    }
    
    console.warn("Couldn't find venue: " + name);
    return null;
}

function getVenue(id) {
    for (var i = 0; i < venueData.length; i++) {
        if (venueData[i].hasOwnProperty("id") && (venueData[i].id == id))
            return venueData[i];
    }
    
    console.warn("Couldn't find venue: " + id);
    return null;
}
