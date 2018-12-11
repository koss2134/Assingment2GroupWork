window.addEventListener('load', function(){

    const galleryAPI = "https://groupproj-kossboss.c9users.io/services/gallery.php?GalleryID=" + galleryID;     //grabs the API and JSON data for the gallery

    fetch(galleryAPI)
         .then( (response) => {
            if (response.ok) {              //checks to see if the data was fetched correctly 
                   return response.json();
               } else {
                   return Promise.reject({  
                       status: response.status,
                       statusText: response.statusText
                     })
}  
              })
              
              .then((data) => {
                  let galleryData = JSON.stringify(data);                                                   //turns the JSON data into a string
                  window.localStorage.setItem('Galleries', galleryData);                                    //stores the data in the local storage
                  let galleries =JSON.parse(window.localStorage.getItem("Galleries"));                      //grabs the data from the local storage
                  fillGalleryData(galleries[0]);                                                            // calls the method to fill the gallery list      
              })
              
.catch((error => {
        console.log(error)              // displays errors to the console if any errors were encountered 
    }))  
    
/**
 * 
 *This funciton fills all the data from the the gallery data and shows the google maps for the gallery
 * 
 * @param - data - receives the data that was retrieved from the gallery API
 * 
 */

    function fillGalleryData(data){
        
        const galleryName = document.getElementById('galleryName');             //grabs the gallery name element
        const nativeName = document.getElementById('nativeName');               //grabs the native name element
        const cityName = document.getElementById('cityName');                   //grabs the city name element
        const address = document.getElementById('address');                     //grabs the address element
        const country = document.getElementById('country');                     //grabs the country element
        const link = document.getElementById('website');                        //grabs the link element
        
        
        const lati = data.Latitude;                                             //variable to hold latitude of the location of the gallery
        const longi = data.Longitude;                                           //variable to hold longitude of the location of the gallery
        map.setCenter(new google.maps.LatLng(lati, longi));                     //sets the location of the map using the location 

        galleryName.textContent = data.GalleryName;                             //changes text content to the gallery name
        nativeName.textContent = data.GalleryNativeName;                        //changes text content to the native name 
        cityName.textContent = data.GalleryCity;                                //changes text content to the city name
        address.textContent = data.GalleryAddress;                              //changes text content to the address
        country.textContent = data.GalleryCountry;                              //changes text content to the country 
        link.setAttribute('href', data.GalleryWebSite);                         //sets the link to the galleries website 
        link.textContent = data.GalleryWebSite;                                 //changes text content to the galleries website 
        



    }

})