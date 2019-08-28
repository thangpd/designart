jCookies = window;
jCookies = {
    'set':function(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    },
    'get':function(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
}

//translate language
;(function($) {
    $(document).ready(function () {

        if ( $('#custome-multi-languagle').length > 0 ) {
            var language = jCookies.get('language');
            language = language.trim();
            var home_url = $('#custome-multi-languagle').attr('data-home');
            var url_current = window.location.href;
            //check url
            if ( language != undefined ) {
                if (url_current.match(home_url+'/'+language) == null) {
                    if (url_current.match(home_url+'/en/') != null) {
                        url_current = url_current.replace(home_url+'/en', home_url);
                    }

                    if (url_current.match(home_url+'/cn/') != null) {
                        url_current = url_current.replace(home_url+'/cn', home_url);
                    }

                    url_current = url_current.replace(home_url, home_url+'/'+language);
                    window.location = url_current;
                }
            }

            if (url_current.match('/' + language + '/') == null ) {
                if (url_current.match(home_url) != null && url_current.match(home_url).index == 0 && url_current.match(home_url+'/wp-admin') == null && url_current.match(home_url+'/wp-content') == null) {
                    url_current = url_current.replace(new RegExp('\/en($|\/)','g'), '/');
                    url_current = url_current.replace(new RegExp('\/cn($|\/)','g'), '/');
                    url_current = url_current.replace(home_url, home_url+'/'+language);
                    if (url_current.match(/\/$/) == null) {
                        url_current += '/';
                    }
                    window.location = url_current;
                }
            }

            $(document).on('click', 'a', function () {
                if ( language!= '' && language != undefined ) {
                    var current = $(this);
                    var href = current.attr('href');
                    if (href != undefined) {
                        // if (href.match(home_url) != null && href.match(home_url).index == 0 && href.match(home_url+'/wp-admin') == null && href.match(home_url+'/wp-content') == null) {
                        //     href = href.replace(new RegExp('\/en($|\/)','g'), '/');
                        //     href = href.replace(new RegExp('\/cn($|\/)','g'), '/');
                        //     href = href.replace(home_url, home_url+'/'+language);
                        //     if (href.match(/\/$/) == null) {
                        //         href += '/';
                        //     }
                        //     window.location = href;
                        //     return false;
                        // }
                    }

                }
            })
        }
    })
})(jQuery);
