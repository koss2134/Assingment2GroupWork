window.addEventListener('load', function(){

    const galleryAPI = "https://groupproj-kossboss.c9users.io/services/gallery.php?GalleryID=" + galleryID;

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
                  let galleryData = JSON.stringify(data);
                  window.localStorage.setItem('Galleries', galleryData);
                  let galleries =JSON.parse(window.localStorage.getItem("Galleries"));
                  fillGalleryData(galleries[0]);        // calls the method to load the gallery list 
              })
              
.catch((error => {
        console.log(error)  // displays errors to the console if any errors were encountered 
    }))  
    
    function fillGalleryData(data){
        
        const galleryName = document.getElementById('galleryName');
        const nativeName = document.getElementById('nativeName');
        const cityName = document.getElementById('cityName');
        const address = document.getElementById('address');
        const country = document.getElementById('country');
        const link = document.getElementById('website');
        var lati = data.latitude;
        var longi = data.longitude;        
        
        console.log(lati);
        console.log(longi);        
        
        
        galleryName.textContent = data.GalleryName;
        nativeName.textContent = data.GalleryNativeName;
        cityName.textContent = data.GalleryCity;
        address.textContent = data.GalleryAddress;
        country.textContent = data.GalleryCountry;
        link.setAttribute('href', data.GalleryWebSite);
        link.textContent = data.GalleryWebSite;



    }

})