window.addEventListener('load', function(){

    const artistAPI = "https://groupproj-kossboss.c9users.io/services/artist.php?ArtistID=" + artistID;
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
                  let artistData = JSON.stringify(data);
                  window.localStorage.setItem('Artist', artistData);
                  let artist =JSON.parse(window.localStorage.getItem("Artist"));
                  fillArtistData(artist[0]);        // calls the method to load the genre list 
              })
              
.catch((error => {
        console.log(error)  // displays errors to the console if any errors were encountered 
    }))  
 
 function fillArtistData(data){
        
        const artistName = document.getElementById('artistName');
        const nationality = document.getElementById('nationality');
        const gender = document.getElementById('artistGender');
        const yearOfBirth = document.getElementById('artistYOB');
        const details = document.getElementById('artistDetails');
        const link = document.getElementById('link');
        
        artistName.textContent = data.FirstName + " " + data.LastName;
        nationality.textContent = data.Nationality;
        gender.textContent = data.Gender;
        yearOfBirth.textContent = data.YearOfBirth;
        details.textContent = data.Details;
        link.setAttribute('href', data.ArtistLink);
        link.textContent = data.ArtistLink;
        
        
    }
    
})