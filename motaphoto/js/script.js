// ============== Fermeture de pop-up ================= //
document.addEventListener('DOMContentLoaded', () => {
    const closeButton = document.getElementById('close');
    // HTMLButtonElement object
    // console.log(closeButton); 
    //  Works as expected
    closeButton.addEventListener('click', function () {
        const popupOverlay = document.querySelector('.popup');
        // console.log(popupOverlay);
        popupOverlay.classList.remove('active');
    })
})

// ======================= Load more button ================ //
const loadMoreBtn = document.getElementById('more');
// console.log(loadMoreBtn);

loadMoreBtn.addEventListener('click', () => {
    // console.log('coucouc toi !');
    // load the content here 
})
