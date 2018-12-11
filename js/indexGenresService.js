window.addEventListener('load', function(){

    const genreAPI = "https://groupproj-kossboss.c9users.io/services/genre.php";     //grabs the API and JSON data for the genre

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
                  let genreData = JSON.stringify(data);                                             //turns the JSON data into a string
                  window.localStorage.setItem('Genre', genreData);                                  //stores the data in the local storage
                  let genre =JSON.parse(window.localStorage.getItem("Genre"));                      //grabs the data from the local storage
                  postGenreData(genre);                                                             // calls the method to fill the gallery list      
              })
              
.catch((error => {
        console.log(error)              // displays errors to the console if any errors were encountered 
    }))  
    
/**
 * 
 *This funciton fills all the data from the the genre data and shows fills the genre list
 * 
 * @param - data - receives the data that was retrieved from the genre API
 * 
 */

    function postGenreData(data){
        
        const genreList = document.getElementById('genreList');                     //grabs the genre list element
    
        for(var i = 0;i< data.length;i++){                                          //itterates through all the genres in the database
      
            const picLink = 'https://groupproj-kossboss.c9users.io/php/images.php?imgType=genres&width=150&imgFileName=' + data[i].GenreID;//creates the link for the genres image 
      
            genreList.innerHTML += "<div style='float: right;overflow: horizontal;'>";                                      //adds a div to the genre list for the next genre
             genreList.innerHTML += "<div class = 'singleGenre'> <A href='singleGenrePage.php?GenreID="+ data[i].GenreID +"'>" + data[i].GenreName + "<div><img src = "+ picLink +  "></div>" +"</a> </div></div>"; //adds the genre to the current list


        }


    }

})