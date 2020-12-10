'use strict';
document.addEventListener("DOMContentLoaded", function(event) {

    let dismissButtons = document.querySelectorAll('[data-dismiss="modal"]');
    for(var i = 0; i < dismissButtons.length; i++){
        dismissButtons[i].addEventListener('click', () => {
            hideModals();
        });
    }

    let modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
    for(var i = 0; i < modalToggleButtons.length; i++){
        modalToggleButtons[i].addEventListener('click', (el) => {
            console.log(el.target);
            showModal(el.target.getAttribute('data-modal-toggle'));
        });
    }

    let hideModals = () => {
        let modals = document.getElementsByClassName('modal');
        for(i = 0; i < modals.length; i++){
            modals[i].style.display = 'none';
        }
    }

    let showModal = (id) =>{
        document.getElementById(id).style.display = 'flex';
    };
    
});
