
//set current day
var curDay = new Date().getDay();

var weekdays = new Array(7);
    weekdays[0] = "Sunday";
    weekdays[1] = "Monday";
    weekdays[2] = "Tuesday";
    weekdays[3] = "Wednesday";
    weekdays[4] = "Thursday";
    weekdays[5] = "Friday";
    weekdays[6] = "Saturday";

// Init on DOM Load Stuff
$(function () {
    
    // load venues
    var venueData;
    $.ajax({
        url: "http://localhost/cheapskate/index.php/CheapskateAPI/findAllVenues",
        success: function(result) {
            venueData = result
            console.log(venueData);
        }
    });

    $('.flexslider').flexslider({
        slideshow: false,
        controlNav: false,
        slideToStart: curDay,
        animationDuration: 200
    });

    populateDays();
    
    $(".venueTextLink").click(function(e) {
        var venue = findVenueByName(e.target.innerText);
        $("#daysContainer").toggle();
        $("#venueDetailsContainer").toggle({
            duration:200,
            done: function() {
                populateVenue(venue);
            }
        });
        
        initialize();
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
        $(ele).append(dayMarkupFactory(day), null);
        
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
    var index = 0;
    $.each(deals, function() {
        var deal = deals[index];
        var li = $("<li class='dealItem'></li>");
        var venue = findVenueByName(deal.venue);
        
        
        li.append("<i class='fa fa-" + getCategoryIcon(deal.category) + "'></i>");
        li.append("<div class='venue venueTextLink'>" + venue.name + "</div>");
        li.append("<div class='category'>" + deal.category + " | " + deal.type) + "</div>";
        li.append("<div class='time'><i class='fa fa-clock-o'></i> " + deal.timeStart + " - " + deal.timeEndyup + "</div>");
        li.append("<div class='info'>" + deal.info + "</div>");

        ul.append(li);
        index++;
    });
    
}

function populateVenue(venue) {
    $("#venueTitle").append("<div>" + venue.name + "</div>");
    $("#venueDetails").append("<div>" + venue.details + "</div>");
    $("#venueMap").append("<div>" + getVenueMap(venue) + "</div>");
}

function dayMarkupFactory(day, data) {
    return "<div class='dayTitle'>" + getDayName(day) + "</div><div class='dayWrapper'>" +
            "<ul class='dealList'></ul>";
            
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
    
    console.warning("Couldn't find venue: " + name);
    return null;
}

