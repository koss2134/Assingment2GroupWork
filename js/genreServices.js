window.addEventListener('load', function(){

    const genreAPI = "https://groupproj-kossboss.c9users.io/services/genre.php?GenreID=" + genreID;
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
                  let genreData = JSON.stringify(data);
                  window.localStorage.setItem('Genre', genreData);
                  let genre =JSON.parse(window.localStorage.getItem("Genre"));
                  fillGenreData(genre[0]);        // calls the method to load the genre list 
              })
              
.catch((error => {
        console.log(error)  // displays errors to the console if any errors were encountered 
    }))  
 
 function fillGenreData(data){
        
        const genreName = document.getElementById('genreName');
        const era = document.getElementById('genreEra');
        const description = document.getElementById('genreDesc');
        const link = document.getElementById('link');
        
        genreName.textContent = data.GenreName;
        era.textContent = data.EraID;
        description.textContent = data.Description;
        link.setAttribute('href', data.Link);
        link.textContent = data.Link;
        
        
    }
    
})