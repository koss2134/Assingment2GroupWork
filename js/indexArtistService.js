window.addEventListener('load', function(){

    const artist_onePaintingAPI = "https://groupproj-kossboss.c9users.io/services/artist.php";     //grabs the API and JSON data for the artist

    fetch(artist_onePaintingAPI)
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
                  let artist_onePaintingData = JSON.stringify(data);                                            //turns the JSON data into a string
                  window.localStorage.setItem('Artist', artist_onePaintingData);                                //stores the data in the local storage
                  let artist_onePainting =JSON.parse(window.localStorage.getItem("Artist"));                    //grabs the data from the local storage
                  postArtist(artist_onePainting);                                                               // calls the method to fill the gallery list      
              })
              
.catch((error => {
        console.log(error)              // displays errors to the console if any errors were encountered 
    }))  
    
/**
 * 
 *This funciton fills all the data from the aritst API and loads the list into the artist div 
 * 
 * @param - data - receives the data that was retrieved from the artist API
 * 
 */
    function postArtist(data){
        
        const artistList = document.getElementById('artistList');               //grabs the artist list element
    
        for(var i = 0;i< data.length;i++){                                      //itterates through all the artists in the database
        
            const picLink = 'https://groupproj-kossboss.c9users.io/php/images.php?imgType=artists&imgSize=square&width=150&imgFileName=' + data[i].ArtistID;        //creates the linnk to get the image for the artist
        
            artistList.innerHTML += "<div id = 'artistIndexList'>";                                                 //adds a div to the artist list for the next artist
            artistList.innerHTML += "<div  class = 'singleArtist' ><h4> <A href='singleArtistPage.php?ArtistID="+  data[i].ArtistID +"'>" + data[i].FirstName +" " +  data[i].LastName + "<div border=solid><img src = "+ picLink +  ">" +"</a></h4> </div>";//adds the artist to the current list

            artistList.innerHTML += " </div> </div>";           //closes the divs
        
        }


    }

})