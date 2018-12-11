
var map;									//this variable holds the map 

/**
 * 
 * This Functions creates the map and sets its type and zoom.
 * 
 */
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {center: {lat: 41.89474, lng:12.4839},		//creates new map
	mapTypeId: 'satellite',																					//sets type to satellite
	zoom: 18																								//sets zoom to 18 
	});
}
/**
 * 
 * This function sets the new location for the map to the coordinates that are passed to it and resets the zoom
 * 
 * @param - newLat - recieves the new latitude that the map will be set to 
 * @param - newLong - recieves the new longitude that the map will be set to 
 * 
 */
function newLocation (newLat, newLong) {
	map.setCenter({
		lat: newLat,						//sets new latitude 
		lng: newLong						//sets new longitude
		});
	map.setZoom(18);						//resets zoom to 18
	createMarker(map, newLat, newLong);		//creates new marker on map 
}

/**
 * 
 * This function creates a new marker for the map using the long and lati
 * 
 * @param - map - is passed the map the the marker is being added to 
 * @param - latitide - is passed the latitude of the coordinatea for the marker
 * @param - longitude - is passed the longitude of the coordinates for the marker
 * 
 */
function createMarker(map, latitude, longitude) {
	let imageLatLong = {lat: latitude, lng: longitude };		//create a new positition
	let marker = new google.maps.Marker({
		position: imageLatLong,									//sets the new position
		map: map												//sets which map to add marker to 
	});
}