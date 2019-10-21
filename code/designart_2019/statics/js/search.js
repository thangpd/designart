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
            let area = $(this).parents("ul.area");
            let siblings = area.siblings();
            siblings.text($(this).find('label').text())
            if ($(this).hasClass('selected')) {
                siblings.text(siblings.data('title'));
                $(this).removeClass("selected");
            } else {
                $(this).addClass("selected");
            }
            area.find('.radio_area.selected').not($(this)).removeClass("selected");


        });

        $("#searchform .cate .radio_area").on('click', function (e) {
            let cate = $(this).parents("ul.cate");
            let siblings = cate.siblings();
            siblings.text($(this).find('label').text())
            if ($(this).hasClass('selected')) {
                siblings.text(siblings.data('title'));
                $(this).removeClass("selected");
            } else {
                $(this).addClass("selected");
            }
            cate.find('.radio_area.selected').not($(this)).removeClass("selected");

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
            var input = $("#searchform input[name='s']");
            if (input.length > 0) {
                searchtext = input.val();
            }

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