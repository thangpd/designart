jQuery(function($) {
    var item_click = $('.wp-tab .list-scroll-item .item-filter');
    // Tab filter
    item_click.on('click', function() {
        // Get data attribute & location filter
        var data_value = $(this).attr('data-value'),
            location_filter = $('.wp-tab .tab-filter-section .block-filter');
        // Set active for item filter
        item_click.removeClass('active-tab');
        $(this).addClass('active-tab');
        // When a location selected
        if(data_value.length) {
            // Hide all all not matching
            $(this).parents('.wp-tab').find('.wp-content[data-value!=' + data_value + ']').fadeOut(300);
            // Display all matching
            $(this).parents('.wp-tab').find('.wp-content[data-value=' + data_value + ']').fadeIn(300);
        } else {
            location_filter.find('.wp-content').fadeIn(300);
        }
        //Get text when choose item for mobile
        var filter_name = $(this).text();
        $(this).parents('.wp-tab .tab-filter').find('.show-tabs').text(filter_name);
    });

    //Tab filter responsive
    $(document).on('click', '.wp-tab .show-tabs', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $(this).closest('.wp-tab .tab-filter').toggleClass('open-tab-filter-sm');
    });
    // Click outside close tab
    $(document).on('click touchstart',function() {
        $('.wp-tab .show-tabs').closest('.wp-tab .tab-filter').removeClass('open-tab-filter-sm');
    });

    $(document).ready(function () {
        processRender();
    });

    function rtrim(str){
        return str.replace(/\s+$/,"");
    }

    $(window).bind('hashchange', function() {
        processRender();
    });

    function processRender() {
        var href = window.location.href;
        href = rtrim(href);
        var regex = href.match(/(.*)\/$/);

        if (regex != null) {
            href = regex[1];
        }

        var regex  = href.match(/\/#tab=(.*)$/);
        if ( regex != null ) {
            var tab = regex[1];
            var regex_tab = tab.match(/(.*)#(.*)/);
            if (regex_tab == null) {
                $('a[data-value='+tab+']').click();
                var id = regex[1];
                var offset = -$('.header-main').outerHeight();

                $('html, body').animate({
                    scrollTop: $('a[data-value='+tab+']').offset().top + offset
                }, 500);
            } else {
                $('a[data-value='+regex_tab[1]+']').click();
                var id = regex_tab[2];
                var offset = -$('.header-main').outerHeight();

                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: $('#'+id).offset().top + offset
                    }, 2000);
                }, 500);
            }

        } else {
            regex  = href.match(/\/#(.*)$/);
            if ( regex != null ) {
                var id = regex[1];
                var offset = - $('.header-main').outerHeight() + 20;

                $('html, body').animate({
                    scrollTop: $('#'+id).offset().top + offset
                }, 2000);
            }
        }

    }
})
