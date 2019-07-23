/* <![CDATA[ */
jQuery(document).ready(function($) {
    'use strict';

    $(".product-color-list li a").on('click', function() { // Changes the .image-holder's img src to the src defined in .list a's data attribute.
        var value=$(this).attr('data-image-hover');
        $(".image-holder img").attr("src", value);
    });

    // $('[data-toggle="popover"]').popover({
    //     html: true,
    //     trigger: 'hover',
    //     content: function () {
    //         return '<img src="'+$(this).data('image-hover') + '" />';
    //     }
    // });
});