jQuery(function ($) {

    ajax_exhibitorguide = function (data) {
        $.ajax({
            url: ajaxurl,
            timeout: 3000,
            type: 'POST',
            data: data,
            success: function (res) {
                if (res) {
                    console.log(res);
                    $('.exhibitor_guide_container_ajax').html(res);
                } else {

                }


            }

        });
    };
    $(document).ready(function () {
        $(document).on('click', '.pagination-wrapp .navigation.pagination a', function (e) {
            e.preventDefault();
            var paged = $(this).attr('href');
            paged = paged.replace('?', '');
            /*["paged", "3"]*/
            paged = paged.split('=');
            if (paged == "") {
                paged[1] = 1;
            }
            var arr_active_cat = [];
            $(document).find('.filter_category a.active').each(function (index, val) {
                arr_active_cat[index] = $(this).attr('href');
                arr_active_cat[index] = arr_active_cat[index].substring(1, arr_active_cat[index].lenght);
            });


            console.log(paged);
            console.log(arr_active_cat);
            data = {'action': 'ajax_load_exhibitorguide_post', 'paged': paged[1], 'cat_filter': arr_active_cat};
            ajax_exhibitorguide(data);
        });
        $(document).on('click', '.filter_category a', function (e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
            var arr_active_cat = [];
            $(document).find('.filter_category a.active').each(function (index, val) {
                arr_active_cat[index] = $(this).attr('href');
                arr_active_cat[index] = arr_active_cat[index].substring(1, arr_active_cat[index].lenght);
            });

            console.log(arr_active_cat);
            /*paged=int*/
            var paged = 1;
            console.log(paged);

            data = {'action': 'ajax_load_exhibitorguide_post', 'paged': paged, 'cat_filter': arr_active_cat};
            ajax_exhibitorguide(data);

        })

    });


});