(function ($) {
    "use strict";


    $(".fancybox").fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        helpers: {
            title: {type: 'outside'},
        },
        animationEffect: "fade",
        afterLoad: function (instance, current) {
            var content_caption = JSON.parse(decodeURIComponent(current.opts.caption));
            var product_name = '';
            if (content_caption.product_name) {
                product_name = '<div class="text">' + content_caption.product_name.replace(/\+/g, ' ') + '</div>';
            }
            var exhibit_place = '';
            if (content_caption.exhibit_place) {
                exhibit_place = '<div class="text">' + content_caption.exhibit_place.replace(/\+/g, ' ') + '</div>';
            }
            var html_left = '<div class="fancybox-caption-left">' + product_name + exhibit_place + '</div>';
            var photo_name = '';
            if (content_caption.photo_name) {
                photo_name = content_caption.photo_name.replace(/\+/g, ' ');
            }
            var html_right = '<div class="fancybox-caption-right"><div class="text">' + photo_name + '</div></div>';

            current.$content.append('<div class="fancybox-custom-caption">' + html_left + html_right + '</div>');
        }
    });
})(jQuery);