window.addEventListener('load', function(){

    const paintingAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?PaintingID=" + paintingID;
    fetch(paintingAPI)
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
                  let paintingData = JSON.stringify(data);
                  window.localStorage.setItem('Painting', paintingData);
                  let painting =JSON.parse(window.localStorage.getItem("Painting"));
                  fillPaintingData(painting[0]);        // calls the method to load the genre list 
              })
              
.catch((error => {
        console.log(error)  // displays errors to the console if any errors were encountered 
    }))  
 
 function fillPaintingData(data){
        
        const image = document.getElementById('painting');
        const paintTitle = document.getElementById('singlePaintTitle');
        const paintArtist = document.getElementById('singlePaintArtist');
        const paintDesc = document.getElementById('singlePaintingDesc');

        image.setAttribute('src', "images/paintings/full/" + data.ImageFileName +".jpg");
        paintArtist.textContent = data.FirstName + " " + data.LastName;
        paintTitle.textContent = data.Title;
        paintDesc.textContent = data.YearOfWork + " " + data.GalleryName + " " + data.GenreName;
        
    }
    

    
})