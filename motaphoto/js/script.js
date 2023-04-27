// (function($) {
//     'use strict';
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
    if (document.getElementById('contact-filled')) {
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


// ===================== AJAX load more page & filtres front-page.php  =================================== //

function loadPhotos(filters) {
    let currentPage = 1;
    const xhr = new XMLHttpRequest();
    const loadMoreBtn = document.getElementById('load-more');
    const photoGrid = document.querySelector('.photo-grid');
    // console.log(filters);

    function sendRequest() {
        xhr.open('POST', "wp-admin/admin-ajax.php");
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.addEventListener('load', () => {
            if (xhr.status === 200) {
                const result = xhr.responseText;
                if (currentPage === 1) {
                    photoGrid.innerHTML = result;
                } else {
                    photoGrid.insertAdjacentHTML('beforeend', result);
                }
            } else {
                console.error('Request failed. Error:', xhr.statusText);
            }
        });

        // initializing the data variable
        /*
        The action key is set to 'load_more', which is the name of the PHP function (in functions.php) 
        */
        let data = `action=load_more&paged=${currentPage}`;

        // Loop that iterates over the keys in the filters object, 
        //which contains filter values for category, format, and sort.

        for (const key in filters) {

            //Appending the key-value pair to the data string in the format &key=value. 
            //This way, the data string will include all the necessary information for the server-side function 
            //to handle the filters and paginate the results correctly.

            data += `&${key}=${filters[key]}`;
        }

        /*
         Data variable  holds a string similar to 
         'action=load_more&paged=1&category=value1&format=value2&sort=value3'. 
         This string  is sent as the request payload in the AJAX request.
        */
        xhr.send(data);
    }
    

    loadMoreBtn.addEventListener('click', () => {
        currentPage = currentPage + 1;
        sendRequest();
        
    });

    sendRequest();
    
    return;
}


function initFilters() {
    const categoryFilter = document.getElementById('categories-select');
    const formatFilter = document.getElementById('filter-select');
    const dateFilter = document.getElementById('sort-dates');

    const filters = {
        category: '',
        format: '',
        sort: ''
    };

    function updateFiltersAndLoad() {
        filters.category = categoryFilter.value;
        filters.format = formatFilter.value;
        filters.sort = dateFilter.value;
        loadPhotos(filters);
    }

    categoryFilter.addEventListener('change', updateFiltersAndLoad);
    formatFilter.addEventListener('change', updateFiltersAndLoad);
    dateFilter.addEventListener('change', updateFiltersAndLoad);

    loadPhotos(filters);
    
}

if (document.getElementById('load-more')) {
    initFilters();
}



// ============================== Lightbox =================================== //

function openLightbox(){
    
    document.addEventListener('DOMContentLoaded', () => {
        const lightboxOpen = document.querySelectorAll('.fullscreen');
        console.log(lightboxOpen);
        lightboxOpen.forEach(open => {
            
        console.log(open);
            open.addEventListener('click', function () {
                // console.log('you are clicking on lightbox');
                const lightboxSpace = document.querySelector('.lightbox');
                // console.log(lightboxSpace);
                lightboxSpace.classList.add('active');
            })
        });
    
    });
}

openLightbox();

// })(jQuery);

