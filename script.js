let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};

var swiper = new Swiper(".home-slider", {
   loop:true,
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev",
   },
});

var swiper = new Swiper(".reviews-slider", {
   grabCursor:true,
   loop:true,
   autoHeight:true,
   spaceBetween: 20,
   breakpoints: {
      0: {
        slidesPerView: 1,
      },
      700: {
        slidesPerView: 2,
      },
      1000: {
        slidesPerView: 3,
      },
   },
});

let loadMoreBtn = document.querySelector('.packages .load-more .btn');
let currentItem = 3;

loadMoreBtn.onclick = () =>{
   let boxes = [...document.querySelectorAll('.packages .box-container .box')];
   for (var i = currentItem; i < currentItem + 3; i++){
      boxes[i].style.display = 'inline-block';
   };
   currentItem += 3;
   if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
   }
}

/* ===================== BOOKING POPUP ===================== */
function showBookingPopup() {
   const popup = document.getElementById('bookingPopup');
   if(popup) {
       popup.style.display = 'flex';
   }
}

// Close popup button
const closePopupBtn = document.getElementById('closePopupBtn');
if(closePopupBtn) {
   closePopupBtn.addEventListener('click', () => {
       document.getElementById('bookingPopup').style.display = 'none';
   });
}

/* ===== Step 3: Close popup if clicking outside the content ===== */
const popupOverlay = document.getElementById('bookingPopup');
if(popupOverlay) {
   popupOverlay.addEventListener('click', (e) => {
       if(e.target === popupOverlay) {
           popupOverlay.style.display = 'none';
       }
   });
}

// ===================== BOOKING POPUP TRIGGER (Step 4) =====================
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('success') === '1') {
        const popup = document.getElementById('bookingPopup');
        if(popup) {
            popup.style.display = 'flex';
        }

        // Remove ?success=1 from URL without reloading
        window.history.replaceState({}, document.title, "book.php");
    }
});
