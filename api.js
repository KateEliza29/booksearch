//API call and population of dropdowns.
function fetchInfo(e) {
    let id = e.target.id;
    console.log(id);
    let isbn = document.getElementById(id).parentNode.children[1].children[1].children[10].innerText;
    console.log(isbn);
    let fullReq = `https://www.googleapis.com/books/v1/volumes?q=isbn+${isbn}`;
    let amazonLink = `https://www.amazon.co.uk/s?k=${isbn}`;

    fetch(fullReq)
        .then(response => response.json())
        .then(data => {
            //description fill.
            document.getElementById(id).parentNode.children[1].children[2].innerHTML = data.items[0].volumeInfo.description; 
            //image fill.
            document.getElementById(id).parentNode.children[1].children[0].setAttribute("href", amazonLink);
            document.getElementById(id).parentNode.children[1].children[0].children[0].setAttribute("src", data.items[0].volumeInfo.imageLinks.smallThumbnail);
            //page count fill. 
            document.getElementById(id).parentNode.children[1].children[1].children[8].innerText = data.items[0].volumeInfo.pageCount;
        });
    
}

//Add event listeners.
let summaryList = document.getElementsByTagName("summary");
for (let i=0; i<summaryList.length; i++) {
    summaryList[i].addEventListener("click", fetchInfo);
}