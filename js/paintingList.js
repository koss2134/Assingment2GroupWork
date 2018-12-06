window.addEventListener('load', function(){
    
         function createNode(element){
    return document.createElement(element);
        
    }
    
    function append(parent, el){
        return parent.appendChild(el);
        
    }
    

    let artistAPI = '';
    
    if(type=='gallery'){
    artistAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?GalleryID=" + galleryID;
    }
    else if(type=="artist"){
    artistAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?ArtistID=" + artistID;  
    }
    else if(type=="genre"){
    artistAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?GenreID=" + genreID; 
    }
    let paintings = [];
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
                  let paintingData = JSON.stringify(data);
                  window.localStorage.setItem('Paintings', paintingData);
                  let paintingObjects = window.localStorage.getItem("Paintings");
                  paintings = JSON.parse(paintingObjects);
                  populateList(paintings);
              })
              
.catch((error => {
        console.log(error)  // displays errors to the console if any errors were encountered 
    }))  
        
    function populateList(data){
        
        const paintingTable = document.getElementById('paintTable');
        console.log(data);
        for(let d of data){

            
           let tablerow = createNode('tr');
           let imagerow = createNode('td');
           let image = createNode('img');
           let imageLink = createNode('a');
           let title = createNode('td');
           let titleLink = createNode('a');
           let artist = createNode('td');
           let artistLink = createNode('a');
           let year = createNode('td');
           
           image.setAttribute('src', 'images/paintings/square/'+d.ImageFileName+".jpg");
           image.setAttribute('width', 100);
           image.setAttribute('height', 100);
           imageLink.setAttribute('href', ('singlePaintingPage.php?PaintingID=' + d.PaintingID))
           titleLink.textContent = d.Title;
           titleLink.setAttribute('href', ('singlePaintingPage.php?PaintingID=' + d.PaintingID))
           artistLink.textContent = d.FirstName + " " + d.LastName;
           artistLink.setAttribute('href', ('singleArtistPage.php?ArtistID=' + d.ArtistID))
           year.textContent = d.YearOfWork;
           
           append(tablerow, imagerow);
           append(tablerow, title);
           append(tablerow, artist);
           append(tablerow, year);
           append(imagerow, imageLink);
           append(imagerow, image);
           append(imageLink, image);
           append(title, titleLink);
           append(artist, artistLink);
           
           append(paintingTable, tablerow);
           
        }
        
    }

    })