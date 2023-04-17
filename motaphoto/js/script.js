(function($) {
    'use strict';
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

// ==================== Pop-up Contact button with ref ==================== //

document.addEventListener('DOMContentLoaded', () => {
    const contactBtn = document.getElementById('contact');
    if(document.getElementById('contact-filled')){
    const filledBtn = document.getElementById('contact-filled');
    // console.log(contactBtn);
    
    filledBtn.addEventListener('click', function () {
        const popupOverlay = document.querySelector('.popup');
        popupOverlay.classList.add('active');
        // ici le code pour afficher la ref
        // afficher la ref d'image : single.php -> class ref && contenu && ce centenu passe (injecter) en value dans le formulaire champs ref
        const reference = document.querySelector('.ref-val').innerText;
        // console.log(reference);
        document.querySelector('input[name="reference"]').value = reference;
    })
}
    contactBtn.addEventListener('click', function () {
        // console.log('you are clicking on contact');
        const popupOverlay = document.querySelector('.popup');
        popupOverlay.classList.add('active');
        // console.log('you have activated popup');
    })
})


// ===================== AJAX load more page principale  =================================== //

function loadMore() {
    let currentPage = 1;
    const xhr = new XMLHttpRequest();
    const loadMoreBtn = document.getElementById('load-more');


    loadMoreBtn.addEventListener('click', () => {
        currentPage++;
        // console.log("it works");

        xhr.open('POST', "wp-admin/admin-ajax.php");
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.addEventListener('load', () => {
            //  console.log(xhr);
            //  console.log(xhr.status);

            // verification of the Response status
            if (xhr.status === 200) {
                //  console.log(xhr.statusText); 
                //  console.log("still works, even here !!!! ");  // simple control if code is read up to this point

                //displaying images here
                const result = xhr.responseText;
                document.querySelector('.photo-grid').insertAdjacentHTML('beforeend', result);

            } else {
                console.error('Request faild. Error:', xhr.statusText);
            }
        });
        
        xhr.send('action=load_more&paged=' + currentPage);
    })

}

if(document.getElementById('load-more')){
  loadMore();
}

// ===================== AJAX afficher toutes les photos : page single.php  ============================= //

// ============================== Lightbox =================================== //



})(jQuery);

