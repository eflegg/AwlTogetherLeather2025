document.addEventListener("DOMContentLoaded", function(){
    console.log('blog script enqueued');

//single filter
 const ajaxFilter = document.getElementById( 'ajax-filter' )
 console.log('ajax filter: ', ajaxFilter);
 const cardContainer = document.querySelector( '.card-container' )
 
 const selectElem = ajaxFilter.querySelectorAll('.cat-list_item');
const catSelect = document.getElementById("cat-select");
const taxType = catSelect.getAttribute('tax-type');

 selectElem.forEach(function(radio){
    const postType = radio.getAttribute('data-type');
    radio.addEventListener( 'change', event => {
     
        fetch( ajaxurl +'?action=ajaxfilter', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify( { 
                'cat' : event.target.value,
                'dataType' : postType,
                'tax' : taxType
          
            } )
        
        }).then( response => {
            return response.text()
        }).then( response => {
    
            if( response ) {
                cardContainer.innerHTML = response;
            }
        
            console.log('response: ', response );
        console.log(postType);
        
       
    
        }).catch( error => {
            console.log( error )
        })
    
    } )
 })
 

 //active state on label
 const labels = document.querySelectorAll('.cat-label');

 for (var i = 0; i < labels.length; i++) {
    labels[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
    //   current[0].className = current[0].className.replace("active", "");
    //   this.className += " active";
      if (current[0]) {
      current[0].classList.remove("active");
    }
    
    // Add the 'active' class to the clicked button
    this.classList.add("active");
    });
  }


});