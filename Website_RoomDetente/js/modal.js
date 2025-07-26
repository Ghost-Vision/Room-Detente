// Get the modal
var modalBooking = document.getElementById("modal_TS");
var modalService = document.getElementById("modal_");



// // Get the button that opens the modal Time Slot
// var btnTimeslot1 = document.getElementById("button_TS_1");

// // When the user clicks the button, open the modal 
// btnTimeslot1.onclick = function() {
//   modalBooking.style.display = "block";
// }


// Get the <span> element that closes the modal
var spanTS = document.getElementsByClassName("closeM-TS")[0];
var spanInfo = document.getElementsByClassName("closeMInfo")[0];
var spanTest = document.getElementsByClassName('closeMInfo')[0];



// Récupération et activation des boutons automatiquement
// Modal Booking Timeslot
const totalButton =18;
for (let i = 1; i <= totalButton; i++) {
  let btnTS = document.getElementById(`button_TS_${i}`);
  if (btnTS) {
      btnTS.onclick = () => modalBooking.style.display = "block";
  }
}
// Modal Massage Info
const totalMassage = 8;
let i = 0;
let modalMInfo = document.getElementById(`modal-m${i}`);
for (i = 1; i <= totalMassage; i++) 
{
  let btnMInfo = document.getElementById(`button-M-Info-${i}`);
  let modalMInfo = document.getElementById(`modal-m${i}`);
  if (btnMInfo) {
    btnMInfo.onclick = () => modalMInfo.style.display = "block";
  }
  else if (spanTest){
    // When the user clicks on <span> (x), close the modal
    spanTest.onclick = function() {modalMInfo.style.display = "none";}
  }
}





// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalBooking) {
    modalBooking.style.display = "none";
  }
  else if(event.target== modalMInfo)
  {
    modalMInfo.style.display = "none";
  }
}

//---------------------------------------------------------------------//

// Ciblage des éléments
const openButtons = document.querySelectorAll('[data-modal-target]');
const closeButtons = document.querySelectorAll('[data-close-button]');
const overlay      = document.getElementById('overlay');

// Ouvrir la modal
openButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const modal = document.querySelector(btn.dataset.modalTarget);
    modal.classList.add('active');
    overlay.classList.add('active');
  });
});

// Fermer la modal au clic sur la croix
closeButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const modal = btn.closest('.modal');
    modal.classList.remove('active');
    overlay.classList.remove('active');
  });
});

// Fermer au clic sur l’overlay
overlay.addEventListener('click', () => {
  document.querySelectorAll('.modal.active').forEach(modal => {
    modal.classList.remove('active');
  });
  overlay.classList.remove('active');
});
