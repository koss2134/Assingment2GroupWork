window.addEventListener('load', function(){

    const artistAPI = "https://groupproj-kossboss.c9users.io/services/artist.php?ArtistID=" + artistID;         //grabs the API and gets the JSON data for the artist
    fetch(artistAPI)
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
                  let artistData = JSON.stringify(data);                                                    //turns the JSON into string
                  window.localStorage.setItem('Artist', artistData);                                        //stores the data in local storage
                  let artist =JSON.parse(window.localStorage.getItem("Artist"));                            //grabs the data from local storage
                  fillArtistData(artist[0]);                                                                // calls to fill the artist data 
              })
              
.catch((error => {
        console.log(error)              // displays errors to the console if any errors were encountered 
    }))  
 
 /**
  * 
  * This function fills all the information from the artist data and shows the image from the images PHP file
  * 
  * @param - data - receives the data that was retireved from the artist API
  * 
  */
 
 function fillArtistData(data){

        const artistName = document.getElementById('artistName');                   //grabs the artist element
        const nationality = document.getElementById('nationality');                 //grabs the nationality element
        const gender = document.getElementById('artistGender');                     //grabs the gender element      
        const yearOfBirth = document.getElementById('artistYOB');                   //grabs the year of birth element 
        const details = document.getElementById('artistDetails');                   //grabs the details element
        const link = document.getElementById('link');                               //grabs the link element
        const picture = document.getElementById('artPic')                           //grabs the picture element
        
        const pictureLink = "https://groupproj-kossboss.c9users.io/php/images.php?width=500&imgType=artists&imgSize=full&imgFileName="+data.ArtistID;     //grabs the image from the php file for the artist
        picture.setAttribute('src', pictureLink);                                   //sets the image source to the php image file 
        
        artistName.textContent = data.FirstName + " " + data.LastName;              //changes text content to artist full name
        nationality.textContent = data.Nationality;                                 //changes the text content to the nationality 
        gender.textContent = data.Gender;                                           //changes the text content to the gender
        yearOfBirth.textContent = data.YearOfBirth;                                 //changes the text content to the year of birth 
        details.innerHTML = data.Details;                                           //changes the inner HTML to the details of artist
        link.setAttribute('href', data.ArtistLink);                                 //adds the link to the link element
        link.textContent = data.ArtistLink;                                         //changes the text content to the link 
        
        
        
        
        
    }
    
})