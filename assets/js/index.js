// menu
var selects = document.querySelectorAll('#nav select');
selects.forEach(select => {
  select.onchange = (e) => {
    window.location = select.value
  }
});

// Lightbox
// https://github.com/biati-digital/glightbox

const lightbox = GLightbox({
  touchNavigation: true,
  loop: true,
  autoplayVideos: true
});


//search 
var searchbutton = document.querySelector('#search-navbutton');
var search = document.querySelector('#search-button');
var searchoverlay = document.querySelector('#search-overlay');
if(searchbutton){  
  searchbutton.addEventListener('click', function(){
    var bar = document.querySelector("#search-bar");
    var input = document.querySelector("#search-input");
    bar.classList.add('opened');
    header.classList.add('searching');
    input.focus();
    input.select();
    searchoverlay.addEventListener('click', function(){
      bar.classList.remove('opened');
      header.classList.remove('searching');
    });
    search.addEventListener('click', function(){
      if(input.value == "") {
        bar.classList.remove('opened');
        header.classList.remove('searching');
      }
    });
  });
}