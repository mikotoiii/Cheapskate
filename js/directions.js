/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var googleMapsPlaceId;
var url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" + googleMapsPlaceId;
var map, userLoc, venueLoc, userCurPos, watchId;
var userTravelMode = "walking";
var directionsService = new google.maps.DirectionsService;
var directionsDisplay = new google.maps.DirectionsRenderer;
var markerArray = [];
var userLocWatchOptions = {
    enableHighAccuracy: true,
    timeout: 8000,
    maximumAge: 0,
    desiredAccuracy: 0,
    frequency: 10000
};

function getUserLocation(callback) {
    if (navigator.geolocation) {
        watchId = navigator.geolocation.watchPosition(locSuccess, locError, userLocWatchOptions);
    } else {
        
    }
    callback();
}

function locSuccess(pos) {
    userCurPos = pos;
}

function locError() {
    console.error("Location Lookup Failed");
}

function initMap() {

    userLoc  = {lat: parseFloat(user.lastLocationLat), lng: parseFloat(user.lastLocationLong)};
    venueLoc = {lat: parseFloat(curVenue.latitude), lng: parseFloat(curVenue.longitude)};
 
    map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: userLoc,
        scrollwheel: false,
        zoom: 13
    });

    directionsDisplay.setMap(map);

    // Set destination, origin and travel mode.
    var request = {
        destination: venueLoc,
        origin: userLoc,
        travelMode: google.maps.TravelMode.WALKING
    };
    
    // Pass the directions request to the directions service.
    function processDistanceDetails(response) {
        var distanceDetails = [];
        distanceDetails["distance"] = response.legs[0].distance.value; // metres
        distanceDetails["time"] = response.legs[0].duration.value; //seconds
    }
    
    directionsService.route(request, function (response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
            directionsDisplay.setPanel(document.getElementById('directions-panel'));
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}


