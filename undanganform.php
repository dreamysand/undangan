<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acara</title>
	<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <link rel="stylesheet" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css">
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
    </style>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<label for="acara">JUDUL ACARA</label><br>
		<input type="text" id="acara" name="acara" required><br>
		<div id="map"></div>
		<label for="latitude">Latitude:</label>
        <input type="text" id="latitude" readonly>
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" readonly>
        <br>
        <label for="search">Cari Lokasi:</label>
		<label for="acara">JUDUL ACARA</label><br>
		<input type="text" id="acara" name="acara" required><br>
		<label for="gambar">GAMBAR</label><br>
        <input type="file" id="gambar" name="gambar" required>
	</form>
        <input type="text" id="search" placeholder="Masukkan alamat...">
        <button onclick="searchLocation()">Cari</button>
	<script>
        // Ganti dengan API Key dari HERE
        const API_KEY = "incX_28HQpDt6AdLJml0P4YPZ3sHEeiZcLJIAOq7wjk";

        // Inisialisasi variabel global
        let map, defaultMarker, geocoder;

        // Fungsi untuk mendapatkan lokasi pengguna
        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userCoords = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        initializeMap(userCoords);
                    },
                    (error) => {
                        console.error("Gagal mendapatkan lokasi pengguna: ", error);
                        // Lokasi fallback jika lokasi pengguna tidak dapat diakses
                        const fallbackCoords = { lat: -6.200000, lng: 106.816666 }; // Jakarta
                        initializeMap(fallbackCoords);
                    }
                );
            } else {
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        }

        // Fungsi untuk inisialisasi peta
        function initializeMap(coords) {
            const platform = new H.service.Platform({
                apikey: API_KEY
            });

            const defaultLayers = platform.createDefaultLayers();
            map = new H.Map(
                document.getElementById('map'),
                defaultLayers.vector.normal.map,
                {
                    center: coords,
                    zoom: 14,
                    pixelRatio: window.devicePixelRatio || 1
                }
            );

            // Tambahkan marker default
            defaultMarker = new H.map.Marker(coords, { draggable: true });
            map.addObject(defaultMarker);

            // Update koordinat pada input form
            updateInputFields(coords.lat, coords.lng);

            // Aktifkan event map interaksi
            const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
            const ui = H.ui.UI.createDefault(map, defaultLayers);

            // Tambahkan event listener untuk marker yang dapat dipindah
            defaultMarker.addEventListener('dragend', (evt) => {
                const target = evt.target;
                const newCoords = map.screenToGeo(
                    evt.currentPointer.viewportX,
                    evt.currentPointer.viewportY
                );
                target.setGeometry(newCoords);
                updateInputFields(newCoords.lat, newCoords.lng);
            });

            // Tambahkan event click untuk memindahkan marker
            map.addEventListener('tap', (evt) => {
                const coords = map.screenToGeo(
                    evt.currentPointer.viewportX,
                    evt.currentPointer.viewportY
                );
                defaultMarker.setGeometry(coords);
                updateInputFields(coords.lat, coords.lng);
            });

            // Inisialisasi Geocoder
            geocoder = platform.getGeocodingService();
        }

        // Fungsi untuk mencari lokasi menggunakan Geocoding and Search API v7
function searchLocation() {
    const address = document.getElementById('search').value;
    if (address) {
        // Endpoint Geocoding and Search API v7
        const url = `https://geocode.search.hereapi.com/v1/geocode?q=${encodeURIComponent(address)}&apiKey=${API_KEY}`;

        // Gunakan fetch untuk mengambil data dari API
        fetch(url)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                if (data.items && data.items.length > 0) {
                    const location = data.items[0].position;

                    // Memindahkan peta ke lokasi yang ditemukan
                    map.setCenter(location);
                    map.setZoom(14);

                    // Memindahkan marker ke lokasi yang ditemukan
                    defaultMarker.setGeometry(location);

                    // Update input koordinat
                    updateInputFields(location.lat, location.lng);
                } else {
                    alert('Lokasi tidak ditemukan!');
                }
            })
            .catch((error) => {
                console.error('Error saat mencari lokasi:', error);
                alert('Terjadi kesalahan saat mencari lokasi. Pastikan API Key dan alamat benar.');
            });
    } else {
        alert('Masukkan alamat untuk mencari!');
    }
}




        // Fungsi untuk memperbarui input koordinat
        function updateInputFields(lat, lng) {
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
        }

        // Panggil fungsi untuk mendapatkan lokasi pengguna
        getUserLocation();
    </script>
</body>
</html>