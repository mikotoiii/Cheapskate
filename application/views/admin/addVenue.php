<div class="wrapper style1">
				<article id="work">
								<header>
												<h2>Add a new venue!</h2>
								</header>
								<div class="container 50%">
												<section>
																<form method="post" action="/signup">
																				<div>
                        <div class="row">
                            <div class="12u">
                                <input type="text" name="autocomplete" id="autocomplete" placeholder="jam that venue name in this..." />
                            </div>
                        </div>
                        <div class="row">
                            	<div class="2u">
																																<input type="text" name="street_number" id="street_number" />
																												</div>
																												<div class="4u">
																																<input type="text" name="route" id="route" />
																												</div>
                        </div>
                        <div class="row">
                            <div class="6u 12u(mobile)">
																																<input type="text" name="locality" id="locality" />
																												</div>
																												<div class="3u 12u(mobile)">
																																<input type="text" name="administrative_area_level_1" id="administrative_area_level_1" />
																												</div>
																												<div class="3u 12u(mobile)">
																																<input type="text" name="postal_code" id="postal_code" />
																												</div>
																								</div>
                        <div class="row">
                            <div class="6u">
																																<input type="text" name="dob" id="dob" placeholder="birth date" />
																												</div>
                            <div class="6u">
                                <label for="dob">(...helps us show you birthday-specific deals!)</label>
                            </div>
                        </div>
																								<div class="row">
																												<div class="12u">
																																<ul class="actions">
																																				<li><input type="submit" value="Sign up!" /></li>
																																</ul>
																												</div>
																								</div>
																				</div>
																</form>
																<footer>
																				<div>...or register with Facebook!</div>
																				<fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();"></fb:login-button>
																</footer>
												</section>
								</div>
				</article>
</div>

<script type="text/javascript">
var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]
$(function() {
    geolocate();
});

</script>

<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>