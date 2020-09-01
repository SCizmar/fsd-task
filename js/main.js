var modal = document.querySelector('.modal');
var modalTrigger = document.querySelector('.buy-now');
var closeModal = document.querySelector('.btn-close');

//var modalTrigger = document.getElementsByClassName('.buy-now');;
//var modalTrigger = document.querySelectorAll('*[id^="button-"]');

function showModal() {
    let closestModal = modalTrigger.closest('.modal');
    console.log(closestModal);
    modal.classList.toggle('modal-active');
}

function hideModal(event) {
    if (event.target === modal) {
        showModal();
    }
}

modalTrigger.addEventListener("click", showModal);
closeModal.addEventListener("click", showModal);
window.addEventListener("click", hideModal);

/**
 * Slick initialize
 */

 $(document).ready(function() {
    $('.slider').slick({
        slidesToShow: 1,
        prevArrow: $('.prev-arrow'),
        nextArrow: $('.next-arrow')
    });
 });

 /****
  * Nav menu mobile
  */

  $(document).ready(function() {
    $('.menu-toggle').on('click', function() {
        $('#primary-menu').toggleClass('open');
    });
  });


 