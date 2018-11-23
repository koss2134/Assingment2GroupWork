//MAP FUNCTIONS 
var map;
//Map Creation
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {center: {lat: 41.89474, lng:12.4839},
	mapTypeId: 'satellite',
	zoom: 18
	});
}
//Setting map center to new location, it also resets zoom incase someone changed it manually
function newLocation (newLat, newLong) {
	map.setCenter({
		lat: newLat, 
		lng: newLong
		});
	map.setZoom(18);
	createMarker(map, newLat, newLong);
}
//Setting a marker to a map location.
function createMarker(map, latitude, longitude) {
	let imageLatLong = {lat: latitude, lng: longitude };
	let marker = new google.maps.Marker({
		position: imageLatLong,
		map: map
	});
}