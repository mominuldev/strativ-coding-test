( function( $ ) {
    'use strict';

    $(document).ready(function () {
        /* Magnefic Popup */
        $('.popup-video').each(function () {
            $('.popup-video').magnificPopup({
                type: 'iframe',
            });
        });


        document.addEventListener( 'wpcf7submit', function( event ) {
            if ( 'a5ba624' == event.detail.contactFormId ) {
                alert( "The contact form ID is 123." );
                // do something productive
            }
        }, false );

        var wpcf7Elm = document.querySelector( '.wpcf7' );

        wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
            if ( '144' == event.detail.contactFormId ) {
                // Hide the form
                $('.wpcf7').hide();
                // Show the success message
                $('.message-send-success-message').show();
                $('.message-send-success-message').css('opacity', '1', 'display', 'block');
                $('.btn-close').on('click', function(){
                    $('.message-send-success-message').hide();
                    $('.wpcf7, .modal').show('slow');
                });
            }
        }, false );

    } );
}( jQuery ) );

