(function ($) {
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

    // ==================== Pop-up Contact button ==================== //

    document.addEventListener('DOMContentLoaded', () => {
        const contactBtn = document.getElementById('contact');
        const filledBtn = document.getElementById('contact-filled');
        // console.log(contactBtn);
        contactBtn.addEventListener('click', function () {
            // console.log('you are clicking on contact');
            const popupOverlay = document.querySelector('.popup');
            popupOverlay.classList.add('active');
            // console.log('you have activated popup');
        })

        filledBtn.addEventListener('click', function () {
            const popupOverlay = document.querySelector('.popup');
            popupOverlay.classList.add('active');
        })

    })

    // ===================== AJAX load more  =================================== //

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
    loadMore();

    // ===================== load more jQuery =================== //


    // let currentPage = 1;
    // $('#load-more').on('click', function () {
    //     // console.log('ok');
    //     currentPage++;
    //     $.ajax({
    //         type: 'POST',
    //         url: 'wp-admin/admin-ajax.php',
    //         dataType: 'html',
    //         data: {
    //             action: 'load_more',
    //             paged: currentPage,
    //         },
    //         success: function (res) {
    //             $('.photo-grid').append(res);
    //         }
    //     });
    // })

})(jQuery);


