<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">over</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;	
}
</script>

</body>

<!-- Mirrored from www.w3schools.com/html/tryit.asp?filename=tryhtml5_geolocation by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:02:56 GMT -->
</html>
