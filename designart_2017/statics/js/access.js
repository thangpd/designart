jQuery(function($) {
    $(document).ready(function() {
        processRender();
    });

    $(document).on('click', 'a.item-filter', function () {
        var tab = $(this).attr('href');
        if (tab!=undefined) {
            window.history.pushState('', '',tab);
            processRender();
            return false;
        }
    })

    function rtrim(str) {
        return str.replace(/\s+$/, "");
    }

    $(document).on('click', 'a[data-reload]', function () {
        var href = $(this).attr('href');
        window.location = href;
		window.location.reload(true);
    })

    $(window).bind('hashchange', function() {
		setTimeout(function(){ processRender(); }, 500);
        return false;
    });

   function processRender() {
        var href = window.location.href;
        href = rtrim(href);
        var regex = href.match(/\/#tab=(.*)$/);
        if (regex != null) {
            var tab = regex[1];
            tab = replaceLastFix(tab);
            regex = tab.match(/(.*)#(.*)/);
            if (regex != null) {
                tab = regex[1];
                $('.tab-filter').find('a[href=#' + tab + ']').click();
                var id = regex[2];
                var offset = -$('.header-main').outerHeight();
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: $('#' + id).offset().top + offset
                    }, 2000);
                }, 500);
            } else {
                $('.tab-filter').find('a[href=#' + tab + ']').click();
                var offset = -$('.header-main').outerHeight();
                $('html, body').animate({
                    scrollTop: $('.tab-filter').find('a[href=#' + tab + ']').offset().top + offset
                }, 500);
            }
        }
        $('#primary-menu').find('a[data-demo=item-5]').parent().addClass('current-menu-item');
    }

    function replaceLastFix(text) {
        var regex = text.match(/(.*)\/$/);
        if (regex != null) {
            text = regex[1];
        }
        return text;
    }
})
