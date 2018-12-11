window.addEventListener('load', function(){

    /**
    * 
    * This function creates an node 
    * 
    * @param - element - takes a String that specified what type of node will be created, to simplify code later 
    * 
    */
         function createNode(element){
    return document.createElement(element);
        
    }
    
    /**
    * 
    * This funcion appends a node to a parent node, to simplify code later 
    * 
    * @param - parent, el - Takes two nodes as parameters, one being the parent node to that the child node will be appended to 
    * 
    */
    function append(parent, el){
        return parent.appendChild(el);
        
    }
    
    
    let paintingAPI = '';                                       //initialized the paintings API variable
    
                                                                //based on the variable that is passed to the page it will retireve a different set of data 
    if(type=='gallery'){    
    paintingAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?GalleryID=" + galleryID;         //if populaitng the gallery wil grab paintings from gallery
    }
    else if(type=="artist"){
    paintingAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?ArtistID=" + artistID;           //if populaitng the artist wil grab paintings from artist
    }
    else if(type=="genre"){
    paintingAPI = "https://groupproj-kossboss.c9users.io/services/painting.php?GenreID=" + genreID;              //if populaitng the genre wil grab paintings from genre
    }
    
    let paintings = [];                                 //initialixes paintings array
    
    fetch(paintingAPI)                                  //grabs data from painting API
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
                  let paintingData = JSON.stringify(data);                          //turns the JSON data into a string
                  window.localStorage.setItem('Paintings', paintingData);           //saves the data to local storage
                  let paintingObjects = window.localStorage.getItem("Paintings");   //grabs the data from local storage
                  paintings = JSON.parse(paintingObjects);                          //sets the data in a variable
                  populateList(paintings);                                          //calls the functions to populate the painting list
                 
                })
              
.catch((error => {
        console.log(error)                   // displays errors to the console if any errors were encountered 
    }))  
    
    /**
     * 
     * This function populates the painting list for the page and adds the event listeners to show the pop up image 
     * 
     */
    function populateList(data){
        
        const paintingTable = document.getElementById('paintTable');                    //grabs the painting table element
        const paintingList = document.getElementById('paintingList');                   //grabs the painting list element so the hover can be appened to it 
        
        paintingTable.innerHTML =  "<tr> <th> </th> <th id = 'headingArtist'>Artist</th> <th id = 'headingTitle'>Title</th> <th id = 'year'>Year</th> </tr>";   // resets the table so that it can be refilled when sorting
        
        for(let d of data){                                                             //loops through all the paintings
        
           let hoverImage = createNode('div');                                          //creates div for hover painting
           let tablerow = createNode('tr');                                             //creates table row node
           let imagerow = createNode('td');                                             //creates data node for image
           let image = createNode('img');                                               //creates image node for thumbnail
           let imageLink = createNode('a');                                             //creates link node for the link to painting 
           let title = createNode('td');                                                //creates data node for title
           let titleLink = createNode('a');                                             //creates link node for the link to painting
           let artist = createNode('td');                                               //creates data node for artist
           let artistLink = createNode('a');                                            //creates link node for the link to artist
           let year = createNode('td');                                                 //creates data node for year of work
           
           
           hoverImage.setAttribute('style', "display: none;");                          //hides the hover image
           append(paintingList,hoverImage);                                             //adds the image to the page
           
           const paintingLink = "https://groupproj-kossboss.c9users.io/php/images.php?imgType=paintings&imgSize=square&width=100&imgFileName="+d.ImageFileName; //get the image for the thumbnail from PHP file

           image.setAttribute('src', paintingLink);                                                     //sets the image source to the PHP file
           imageLink.setAttribute('href', ('singlePaintingPage.php?PaintingID=' + d.PaintingID))        //sets the link to the single painting view
           titleLink.textContent = d.Title;                                                             //changes text content to the painting title
           titleLink.setAttribute('href', ('singlePaintingPage.php?PaintingID=' + d.PaintingID))        //sets the link to the single painting view 
           artistLink.textContent = d.FirstName + " " + d.LastName;                                     //changes the text content to the artist full name
           artistLink.setAttribute('href', ('singleArtistPage.php?ArtistID=' + d.ArtistID))             //sets the link to the single artist view
           year.textContent = d.YearOfWork;                                                             //changes the text content to the year of work
           
           let makeImg = createNode('img');                                                             //create node for the hover image
           
           image.addEventListener('mouseenter', (event)=> {                                             //adds event listener to show hover image 
           
               hoverImage.setAttribute('style', 'display: inline-block');                               //unhides the hover image 
               
               let bigPaintingLink = "https://groupproj-kossboss.c9users.io/php/images.php?imgType=paintings&imgSize=square&width=400&imgFileName="+d.ImageFileName;    //grabs the image from the PHP file
               makeImg.setAttribute('src', bigPaintingLink);                                            //sets the image source to the image from PHP file
               append(hoverImage, makeImg);                                                             //adds the img tag to the hover image div
               
               let x = event.pageX;                                                                     //gets the location of the mouse x coordinate
               let y = event.pageY;                                                                     //gets the location of the mouse y coordinate
               hoverImage.setAttribute('style', 'position: absolute; left: '+x+ "; top :"+y+";");       //sets the location of the picture to where the mouse is pointing
               
           })
           
            image.addEventListener('mousemove', (event)=> {                                             //adds event listener to make the hover image follow the mouse 
            
               let x = event.pageX;                                                                     //gets the location of the mouse x coordinate
               let y = event.pageY;                                                                     //gets the location of the mouse y coordinate
               hoverImage.setAttribute('style', 'position: absolute; left: '+x+ "; top :"+y+";");       //sets the location of the picture to follow the mouse when it moves 
               
           })
           
            image.addEventListener('mouseleave', ()=> {                                                 //adds event listener to hide the hover image div and remove the img when the mouse leave thumbnail
            
               hoverImage.setAttribute('style', "display: none;");                                      //hids the image hover div
               makeImg.parentNode.removeChild(makeImg);                                                 //deletes img tag
               
           })
           
          append(tablerow, imagerow);                                   //adds the image row to the table
          append(tablerow, title);                                      //adds the title row to the table   
          append(tablerow, artist);                                     //adds the artist row to the table
          append(tablerow, year);                                       //adds the year row to the table
          append(imagerow, imageLink);                                  //adds the image link to the thumbnail
          append(imagerow, image);                                      //adds the image to the image row
          append(imageLink, image);                                     //adds the image to the image link
          append(title, titleLink);                                     //adds the title link to the title
          append(artist, artistLink);                                   //adds the artist link to the artist
           
          append(paintingTable, tablerow);                              //adds the table row to table
           
        }
        addSortListeners(data);                                         //adds the event listeners to sort the painting list 
    }
    
    /**
     * 
     * These are the comparison functions to sort the tables by certain criteria
     * 
     */
    function artist(a,b){
            const a1 = a.LastName.toUpperCase();
            const a2 = b.LastName.toUpperCase();
            
            let comparison = 0;
            if (a1 > a2){
                comparison = 1;
        }
            else if (a1 < a2){                          // sorts the objects by the artists last name 
                comparison = -1; 
        }
            return comparison;
        }
        
        function title(a,b){
            const t1 = a.Title.toUpperCase();
            const t2 = b.Title.toUpperCase();
            
            let comparison = 0;
            if (t1 > t2){
                comparison = 1;
        }
        else if (t1 < t2){                          // sorts the objects by the painting title 
            comparison = -1; 
        }
            return comparison;
        }
        
        function year(a,b){
            const y1 = a.YearOfWork.toUpperCase();
            const y2 = b.YearOfWork.toUpperCase();
            
            let comparison = 0;
            if (y1 > y2){
                comparison = 1;
        }
        else if (y1 < y2){                          // sorts the objects by the paintings year of work 
            comparison = -1; 
        }
            return comparison;
        }
    
    /**
     * 
     * This function adds the event listeners to the table headings to sort by the clicked category
     * 
     * @param - data - is passes the list of paintings for the page 
     * 
     */
    function addSortListeners(data){

                const yearHeading = document.getElementById('year');                    //grabs the year heading element
                const titleHeading  = document.getElementById('headingTitle');          //grabs the titles heading element
                const artistHeading = document.getElementById('headingArtist');         //grabs the artist heading element
                
                yearHeading.addEventListener('click', () => {                           //adds the even listener for the year heading 

                    let sorted = data;                                                  //creates new list of painting to sort
                    sorted.sort(year);                                                  //sorts list by the year 
                    populateList(sorted);                                               //repopulates table with new sorted list
                })
                
                titleHeading.addEventListener('click', () => {                          //adds the even listener for the title heading 
                
                    let sorted = data;                                                  //creates new list of painting to sort
                    sorted.sort(title);                                                 //sorts list by the title 
                    populateList(sorted);                                               //repopulates table with new sorted list
                })
                
                artistHeading.addEventListener('click', () => {                         //adds the even listener for the artist heading 
                
                    let sorted = data;                                                  //creates new list of painting to sort
                    sorted.sort(artist);                                                //sorts list by the artist
                    populateList(sorted);                                               //repopulates table with new sorted list
                })
    }
    
    })