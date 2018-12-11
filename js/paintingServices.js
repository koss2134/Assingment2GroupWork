window.addEventListener('load', function(){

    const paintingAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?PaintingID=" + paintingID;     //grabs the link to the painting API with the specified paintingID
    
    fetch(paintingAPI)                                                                                              //gets JSON data from the paintingAPI;
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
                  let paintingData = JSON.stringify(data);                                                          //turns the JSON data into a string
                  window.localStorage.setItem('Painting', paintingData);                                            //stores the data in local storage
                  let painting =JSON.parse(window.localStorage.getItem("Painting"));                                //gets data from local storage
                  fillPaintingData(painting[0]);                                                                    // calls the method to load the genre list              
              })
              
.catch((error => {
        console.log(error)  // displays errors to the console if any errors were encountered 
    }))  
 
 /**
  * 
  * This function fills the information about the painting and displays the Painting image
  * 
  * @param - data - receives the data for the painting that is being displayed
  * 
  */
 function fillPaintingData(data){
        
        const image = document.getElementById('painting');                              //grabs the image element
        const paintTitle = document.getElementById('singlePaintTitle');                 //grabs the title element
        const paintArtist = document.getElementById('singlePaintArtist');               //grabs the artist element
        const paintDesc = document.getElementById('singlePaintingDesc');                //grabs the description element 
        const paintYear = document.getElementById('yearOfPainting');                    //grabes the year element

        
    
        const paintingLink = "https://groupproj-kossboss.c9users.io/php/images.php?imgType=paintings&imgSize=full&imgFileName="+data.ImageFileName; //gets the image from the PHP file
        const artistLink = 'singleArtistPage.php?ArtistID=' + data.ArtistID;
        const galleryLink = 'singleGalleryPage.php?GalleryID=' + data.GalleryID;
        
        image.setAttribute('src', paintingLink);                                                    //sets the image source to the PHP file
        paintArtist.textContent = data.FirstName + " " + data.LastName;                             //changes the text content to the artists full name
        paintArtist.setAttribute('href', artistLink);
        paintTitle.textContent = data.Title;                                                        //chnages the text content to the painting title
        paintDesc.textContent =  data.GalleryName;    //changes the text content to the year of work, gallery name, and genre name;
        paintDesc.setAttribute('href', galleryLink);
        paintYear.textContent = data.YearOfWork;

        
    }
    

    
})