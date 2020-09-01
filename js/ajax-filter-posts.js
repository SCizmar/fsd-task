jQuery('.category-filter').click(function (event) {
    // Prevent defualt action - opening tag page
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
    // Get tag slug from title attirbute
    var selected_taxonomy = $(this).attr('title');
    //console.log(selected_taxonomy);
    $('.car-cards').fadeOut();
    var data = {
        action: 'filter_posts',
        afp_nonce: afp_vars.afp_nonce,
        taxonomy: selected_taxonomy,
    };
    jQuery.post( afp_vars.afp_ajax_url, data, function(response) {

    if( response ) {
    //alert(response);
        jQuery('.car-cards').fadeIn();
        jQuery('.car-cards').html( response );
    };
});

});