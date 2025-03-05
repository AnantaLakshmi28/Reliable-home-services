<?php
include 'db/dbconnect.php'; // Database connection

// Fetch service locations from the database
$sql = "SELECT * FROM service_locations";
$result = mysqli_query($conn, $sql);
$locations = [];

while ($row = mysqli_fetch_assoc($result)) {
    $locations[] = [
        'name' => $row['name'],
        'lat' => $row['latitude'],
        'lng' => $row['longitude']
    ];
}

// Convert data to JSON format
$locationsJSON = json_encode($locations);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Locations Map</title>

    <!-- Leaflet.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        /* Set map size */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>

    <h2 class="text-center">Our Service Locations</h2>
    <div id="map"></div> <!-- Map container -->

    <!-- Leaflet.js Library -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Initialize the map
        var map = L.map('map').setView([17.450001, 78.401002], 10); // Default center (change as needed)

        // Add OpenStreetMap tiles (free to use)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Load service locations from PHP JSON output
        var locations = <?php echo $locationsJSON; ?>;
        
        // Loop through locations and add markers
        locations.forEach(function(location) {
            L.marker([location.lat, location.lng])
                .addTo(map)
                .bindPopup(<b>${location.name}</b><br>Available here.);
        });
    </script>

</body>
</html>