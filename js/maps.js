/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var map, userLoc, service, infowindow, userCurPos, watchId, venue;
var userTravelMode = "walking";
var directionsService = new google.maps.DirectionsService();
var userLocWatchOptions = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0,
    desiredAccuracy: 0,
    frequency: 10000
};


function initializeMap(v) {
    venue = v;
    getUserLocation(function () {
    });
}

function processPlacesResponse(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            var place = results[i];
            createMarker(results[i]);
        }
    }
}


function getUserLocation(callback) {
    if (navigator.geolocation) {
        watchId = navigator.geolocation.watchPosition(locSuccess, locError, userLocWatchOptions);
    }
    callback();
}

function locSuccess(pos) {
    userCurPos = pos;
    updateMap();
}

function locError() {
    console.error("Location Lookup Failed");
}

function updateMap() {
    userLoc = new google.maps.LatLng(userCurPos.coords.latitude, userCurPos.coords.longitude);
    venueLoc = new google.maps.LatLng(venue.latitude, venue.longitude);

    map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: userLoc,
        zoom: 15
    });

    var request = {
        location: userLoc,
        keyword: "Peppers Pub",
        radius: '500'
    };

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, processPlacesResponse);
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function () {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
}

function getDirections(destinationLoc) {
    
    var directionsRequestOptions = {
        origin: userLoc,
        destination: destinationLoc,
        travelMode: TravelMode.WALKING,
        //transitOptions: TransitOptions,
        unitSystem: UnitSystem.METRIC
        //durationInTraffic: true,
        //waypoints: [null],
        //optimizeWaypoints: true,
        //provideRouteAlternatives: false,
        //avoidHighways: false,
        //avoidTolls: false,
        //region: String
    };
    
    directionsService.route(request, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            map.setDirections(response);
        }
    });
}

function getVenueMap(venue) {
    
}

function updateUserLocation() {
    var data = [];
    data["userId"] = 1;
    data["latitude"]  = userCurPos.coords.latitude;
    data["longitude"] = userCurPos.coords.longitude;
    
    $.ajax({
        data: data,
        dataType:"json",
        success: function() {},
        complete: function() {},
        fail: function() {}
    });
}

//google.maps.event.addDomListener(window, 'load', initializeMap);