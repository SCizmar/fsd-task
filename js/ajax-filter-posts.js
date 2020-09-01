jQuery('.category-filter').click(function (event) {
    // Prevent defualt action - opening tag page
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
    // Get tag slug from title attirbute
    var selected_taxonomy = $(this).attr('title');
    $('.car-cards').fadeOut();
    var data = {
        action: 'filter_posts',
        afp_nonce: afp_vars.afp_nonce,
        taxonomy: selected_taxonomy,
    };
    $.ajax({
        type: 'post',
        dataType: 'html',//Return type is html
        url: afp_vars.ajaxurl,
        data: data,
        success: function (data) {
            $('.car-cards').html(data);
            $('.car-cards').fadeIn();
        },
        error: function () {
            $('.car-cards').html('No posts found');
            $('.car-cards').fadeIn();
        }
    })

});