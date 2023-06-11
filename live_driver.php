<!DOCTYPE html>
<html>
<head>
  <title>Live Driving Location</title>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <h1>Live Driving Location</h1>
  
  <div>
    <label for="startStreet">Starting Point 1(Street):</label>
    <input type="text" id="startStreet" placeholder="Enter starting street">
    <br>
    <label for="startCity">Starting Point (City):</label>
    <input type="text" id="startCity" placeholder="Enter starting city">
    <br>
    <label for="startProvince">Starting Point (Province):</label>
    <input type="text" id="startProvince" placeholder="Enter starting province">
    <br><br>
    <label for="endStreet">End Point (Street):</label>
    <input type="text" id="endStreet" placeholder="Enter end street">
    <br>
    <label for="endCity">End Point (City):</label>
    <input type="text" id="endCity" placeholder="Enter end city">
    <br>
    <label for="endProvince">End Point (Province):</label>
    <input type="text" id="endProvince" placeholder="Enter end province">
    <br><br>
    <button id="startButton">Start Journey</button>
    <button id="stopButton" disabled>Stop Journey</button>
  </div>
  
  <div id="map"></div>
  <div id="distanceRemaining"></div>

  <script>
    var map;
    var directionsService;
    var directionsRenderer;
    var marker;
    var watchId;
    var stepIndex = 0;
    var steps = [];
    var pathCoordinates = [];
    var totalDistance = 0;
    var stepProgress = 0;

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 0, lng: 0 },
        zoom: 10
      });

      directionsService = new google.maps.DirectionsService();
      directionsRenderer = new google.maps.DirectionsRenderer();
      directionsRenderer.setMap(map);
    }

    function startJourney() {
      var startStreet = document.getElementById('startStreet').value;
      var startCity = document.getElementById('startCity').value;
      var startProvince = document.getElementById('startProvince').value;
      var endStreet = document.getElementById('endStreet').value;
      var endCity = document.getElementById('endCity').value;
      var endProvince = document.getElementById('endProvince').value;

      var startAddress = startStreet + ', ' + startCity + ', ' + startProvince;
      var endAddress = endStreet + ', ' + endCity + ', ' + endProvince;

      calculateRoute(startAddress, endAddress);
      startTracking();
      document.getElementById('startButton').disabled = true;
      document.getElementById('stopButton').disabled = false;
    }

    function calculateRoute(startAddress, endAddress) {
      var request = {
        origin: startAddress,
        destination: endAddress,
        travelMode: 'DRIVING'
      };

      directionsService.route(request, function(result, status) {
        if (status == 'OK') {
          directionsRenderer.setDirections(result);
          steps = result.routes[0].legs[0].steps;
          extractPathCoordinates(result.routes[0].overview_path);
          totalDistance = result.routes[0].legs[0].distance.value;
          document.getElementById('distanceRemaining').innerText = 'Distance Remaining: ' + (totalDistance / 1000).toFixed(2) + ' km';
        }
      });
    }

    function extractPathCoordinates(path) {
      pathCoordinates = [];
      for (var i = 0; i < path.length; i++) {
        pathCoordinates.push({
          lat: path[i].lat(),
          lng: path[i].lng()
        });
      }
    }

    function startTracking() {
      if (navigator.geolocation) {
        var options = {
          enableHighAccuracy: true,
          maximumAge: 1000  // Update every 1 second
          // timeout: 5000      // Set a timeout of 5 seconds
        };

        watchId = navigator.geolocation.watchPosition(
          function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            updateMarker(pos, position.coords.heading);
            updateProgress(pos);
            map.setCenter(pos);
          },
          function(error) {
            console.log('Error occurred. Error code: ' + error.code);
          },
          options
        );
      } else {
        console.log('Geolocation is not supported by this browser.');
      }
    }

    function updateMarker(position, heading) {
      if (marker) {
        marker.setPosition(position);
      } else {
        marker = new google.maps.Marker({
          position: position,
          map: map,
          icon: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#4285F4',
            fillOpacity: 1,
            strokeColor: 'white',
            strokeWeight: 2,
            scale: 10,
            rotation: heading
          }
        });
      }

      marker.setIcon({
        path: google.maps.SymbolPath.CIRCLE,
        fillColor: '#4285F4',
        fillOpacity: 1,
        strokeColor: 'white',
        strokeWeight: 2,
        scale: 10,
        rotation: heading
      });
    }

    function updateProgress(position) {
      if (stepIndex >= steps.length) {
        return;
      }

      var currentStep = steps[stepIndex];
      var currentSegment = currentStep.path;
      var remainingDistance = google.maps.geometry.spherical.computeLength(currentSegment.slice(stepProgress));

      if (remainingDistance < totalDistance * 0.01) {
        stepProgress = 0;
        stepIndex++;
        if (stepIndex >= steps.length) {
          stopJourney();
          return;
        }
        currentStep = steps[stepIndex];
        currentSegment = currentStep.path;
      }

      var closestPoint = google.maps.geometry.poly.closestPointOnPath(position, currentSegment);
      var projectedPosition = closestPoint.position;

      updateMarker(projectedPosition, position.coords.heading);

      stepProgress = closestPoint.vertex;
      document.getElementById('distanceRemaining').innerText = 'Distance Remaining: ' + ((totalDistance - remainingDistance) / 1000).toFixed(2) + ' km';
    }

    function stopJourney() {
      stopTracking();
      marker.setMap(null);
      marker = null;
      stepIndex = 0;
      stepProgress = 0;
      steps = [];
      pathCoordinates = [];
      totalDistance = 0;
      document.getElementById('startButton').disabled = false;
      document.getElementById('stopButton').disabled = true;
      document.getElementById('distanceRemaining').innerText = '';
    }

    function stopTracking() {
      if (navigator.geolocation) {
        navigator.geolocation.clearWatch(watchId);
      }
    }

    document.getElementById('startButton').addEventListener('click', startJourney);
    document.getElementById('stopButton').addEventListener('click', stopJourney);
  </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT08U_JyvDTZpFKh3OI-usFCy1Ot5tBHE&callback=initMap&libraries=geometry" async defer></script>
</body>
</html>
