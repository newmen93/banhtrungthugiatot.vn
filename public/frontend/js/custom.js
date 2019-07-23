jQuery.noConflict();
jQuery(document).ready(function() {
    /*mobile menu*/
    jQuery(function(){
        jQuery('#mobile-menu-toggle').click(function(e){
            jQuery('body').addClass('off-canvas-open');
        });
        jQuery('#close-mobile').click(function(){
             jQuery('body').removeClass('off-canvas-open');
        });
    });
    /*level-menu*/
    jQuery(function(){
        jQuery('.has-sub>.down-button').click(function(e) {
            if ( jQuery(this).parent().hasClass('open-sub')) {
                jQuery(this).parent().removeClass('open-sub');
                jQuery('.level-1').removeClass('open-sub');
            } else {
                jQuery('.has-sub').removeClass('open-sub');
                jQuery(this).parent().addClass('open-sub');
            }
                 
        });

        jQuery('.level-1>.down-button').click(function(e) {
            if ( jQuery(this).parent().hasClass('open-sub')) {
                jQuery(this).parent().removeClass('open-sub');
            } else {
                jQuery('.level-1').removeClass('open-sub');
                jQuery(this).parent().addClass('open-sub');
            }
                 
        });
    });


    /*vertical-menu*/
    jQuery(function(){
        jQuery('.caret-button').click(function(e) {
            if ( jQuery(this).hasClass('active-collapsable')) {
                jQuery(this).removeClass('active-collapsable');
                jQuery(this).parent().find('.dropdown-menu-cate').removeClass('collapsable');  
            } else {
                jQuery('.caret-button').removeClass('active-collapsable');
                jQuery(this).addClass('active-collapsable');
                jQuery('.dropdown-menu-cate').removeClass('collapsable');
                jQuery(this).parent().find('.dropdown-menu-cate').addClass('collapsable');   
            }
                 
        });

    });

    /*checkbox*/
    jQuery(function(){
        jQuery('.shipping_address').hide();
        jQuery('#ship-to-different-address-checkbox').change(function () {
            if (this.checked) 
               jQuery('.shipping_address').show();
            else 
                jQuery('.shipping_address').hide();
        });
    });

    /*map*/
    jQuery('a.map-active').click(function(e) {
        e.preventDefault();
        jQuery('.map-active').parent().removeClass('active');
        jQuery(this).parent().addClass('active');
        var url = jQuery(this).attr('href');
        jQuery('.address-store').text(jQuery(this).find('span').text());
        jQuery('#map').attr('src', url);
        return false;
    });
    jQuery('.address-city').click(function(e) {
        jQuery('.address-city').removeClass('active');
        jQuery(this).addClass('active');
    });

});
