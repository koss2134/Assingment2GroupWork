window.addEventListener('load', function() {
	
	const paiUrl = 'services/painting.php?ArtistID=';
	var ID;
	var paiInfo = [];
	var sortedP = [];
	function generatePaintingTable () {
		var url = paiUrl + ID;
		fetch(url)
			.then ( reposnse => reposnse.json())
			.then ((data) => {
				paiInfo = data;
				sortPaintings("Title");
				console.log(sortedP);
				fillPList();
			})
			.catch (error => console.log(error));
	}

	function sortPaintings (k){
		sortedP = paiInfo.sort( (a,b)=> {return a[k] < b[k] ? -1 : 1});
	}

	function fillPList(){
		const table = document.querySelector("#paintingTable tbody");
		clearTableAddHeaders(table);
		for (let x of sortedP){
		        const tableRowLink = document.createElement('A');
		        var linkUrl = 'singlePaintingPage.php?PaintingID=' + x.PaintingID;
		        tableRowLink.setAttribute('href', linkUrl);
				const tableRow = document.createElement('tr');
				const ele1 = document.createElement('td');
				const ele2 = document.createElement('td');
				const ele3 = document.createElement('td');
				const ele4 = document.createElement('td');
				var pUrl = "images/square/" + x.ImageFileName + ".jpg";
				var pLink = document.createElement('img');
				pLink.setAttribute('src', pUrl);
				pLink.setAttribute('width', 100);
				pLink.setAttribute('height', 100);
				ele1.appendChild(pLink);
				tableRow.appendChild(ele1);
				ele2.textContent = x.LastName;
				tableRow.appendChild(ele2);
				ele3.textContent = x.Title;
				tableRow.appendChild(ele3);
				ele4.textContent = x.YearOfWork;
				tableRow.appendChild(ele4);
				tableRowLink.appendChild(tableRow);
				table.appendChild(tableRowLink);
			}
	}

	//Clears the table and adds the headers with click event.
	function clearTableAddHeaders (p) {
		const ha = {PaintingID: "", LastName: "Artist", Title: "Title", YearOfWork: "Year"};
		//Array of table ids
		var ids = ["headingImg", "headingTitle", "headingArtist", "year"];
		//Clears possible other paitings for previous clicks
		p.innerHTML = "";
		const tr = document.createElement('tr');
		//Loop to iterate object array with a counter.
		for(let i=0; i < 4; i++) {
			const th = document.createElement('th');
			//Sets ID for table headers
			th.setAttribute("id", ids[i]);
			//Event Listener for when headers are clicked, it calls the sort then repops list.
			th.addEventListener('click', ()=> {
				//Calling sort function for the table header.
				sortPaintings(Object.keys(ha)[i]);
				fillPList();
			});
			th.textContent = ha[Object.keys(ha)[i]];
			tr.appendChild(th);
		}
		p.appendChild(tr);
	}
});