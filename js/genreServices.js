window.addEventListener('load', function(){

    const genreAPI = "https://groupproj-kossboss.c9users.io/services/genre.php?GenreID=" + genreID;       //grabs the API and JSON data for the genre
    fetch(genreAPI)
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
                  let genreData = JSON.stringify(data);                                                 //turns the JSON data into a string
                  window.localStorage.setItem('Genre', genreData);                                      //stores the JSON data in local storage
                  let genre =JSON.parse(window.localStorage.getItem("Genre"));                          //grabs the JSON data from local storage 
                  fillGenreData(genre[0]);                                                              // calls the method to load the genre list        
              })
              
.catch((error => {
        console.log(error)                  // displays errors to the console if any errors were encountered 
    }))  
    
 
 /**
  * 
  * This function fills all the data for the genre and shows the image from the PHP file
  * 
  * @param - data - receives the data that was retireved from the genre API
  * 
  */
 
 function fillGenreData(data){
        const genreName = document.getElementById('genreName');                     //grabs the genre name element
        const era = document.getElementById('genreEra');                            //grabs the era element
        const description = document.getElementById('genreDesc');                   //grabs the description element
        const link = document.getElementById('link');                               //grabs the link element
        const picture = document.getElementById('genrePicture');                    //grabs the picture element
                
        const pictureLink = "https://groupproj-kossboss.c9users.io/php/images.php?width=700&imgType=genres&imgFileName="+data.GenreID ;       //grabs the image from the PHP file for the genre
        picture.setAttribute('src', pictureLink);                                   //sets the image source to the php image file

        genreName.textContent = data.GenreName;                                     //changes text content to the genres name 
        era.textContent = data.EraName;                                             //changes the text content to the era name
        description.innerHTML = data.Description;                                   //changes the text content to the genres description
        link.setAttribute('href', data.Link);                                       //sets the link to the genres linke
        link.textContent = data.Link;                                               //changes the text content to the websites link 
        
    }
    
})