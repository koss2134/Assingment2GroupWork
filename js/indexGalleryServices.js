window.addEventListener('load', function(){

    const galleryAPI = "https://groupproj-kossboss.c9users.io/services/gallery.php";     //grabs the API and JSON data for the gallery

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
                  postGalleryData(galleries);                                                            // calls the method to fill the gallery list      
              })
              
.catch((error => {
        console.log(error)              // displays errors to the console if any errors were encountered 
    }))  
    
/**
 * 
 *This funciton fills all the data from the the gallery data and fills the list 
 * 
 * @param - data - receives the data that was retrieved from the gallery API
 * 
 */
    function postGalleryData(data){
const galleryList_ = document.getElementById('GalleryList');

    for(var i = 0;i< data.length;i++){
        galleryList_.innerHTML += "<li><A href=singleGalleryPage.php?GalleryID='"+data[i].GalleryID +"'>"+data[i].GalleryName  + "</a></li>";
    }


    }

})