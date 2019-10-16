jQuery(function ($) {
    $(document).ready(function () {

        $("#searchform .radios .tit").each(function (i) {
            $(this).on("click", function () {
                console.log($(this))

                var self = $(this);
                var another = (i === 0) ? $("#searchform .radios .tit")[1] : $("#searchform .radios .tit")[0];

                var ul = $(this).parent().find("ul");

                if (self.hasClass("show")) self.removeClass("show");
                else {
                    self.addClass("show");

                    //もう1つのプルダウンを閉じる
                    $(another).removeClass("show");
                    $(another).parent().find("ul").removeClass("show");
                }

                if (ul.hasClass("show")) ul.removeClass("show");
                else ul.addClass("show");


            });
        });


        $("#searchform .area .radio_area").on('click', function (e) {
            console.log($(this));
            $(this).parents().find('.radio_area.selected').removeClass("selected");
            $(this).addClass("selected");

            // $(this).parent().removeClass("selected");

            //init
            /*if ($(this).is(':checked')) {
                //ブラウザのbackで戻ったりするとcheckが残っていたりするため表示を同期させる
                console.log($(this).parent())
                $(this).parent().removeClass("selected");

            } else {
                console.log($(this).parent())
                $(this).parent().addClass("selected");
            }*/

            //change
        });

        $("#searchform .cate .radio_area").on('click', function (e) {
            console.log($(this));
            $(this).parents().find('.radio_area.selected').removeClass("selected");
            $(this).addClass("selected");

            // $(this).parent().removeClass("selected");

            //init
            /*if ($(this).is(':checked')) {
                //ブラウザのbackで戻ったりするとcheckが残っていたりするため表示を同期させる
                console.log($(this).parent())
                $(this).parent().removeClass("selected");

            } else {
                console.log($(this).parent())
                $(this).parent().addClass("selected");
            }*/

            //change
        });

        $("#searchform input.submit_bt").on('click', function (e) {
            e.preventDefault();
            let area = '';
            let cate = '';
            let searchtext = '';
            var input = $("#searchform .area .radio_area.selected input");
            if (input.length > 0) {
                area = input.val();
            }
            var input = $("#searchform .cate .radio_area.selected input");
            if (input.length > 0) {
                cate = input.val();
            }


            console.log(input);

            console.log('ajax');
            var data = {action: 'filter_exhibitor', area: area, cate: cate, s: searchtext};
            $.ajax({
                type: "GET",
                url: ajaxurl,
                data: data, // serializes the form's elements.
                success: function (data) {
                    console.log(data); // show response from the php script.

                    $('.ajax_respone').replaceWith(data);
                }
            });
        })


    });

});