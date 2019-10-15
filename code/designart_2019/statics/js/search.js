jQuery(function ($) {
    $(document).ready(function () {

        $("#searchform .radios .tit").each(function(i) {
            $(this).on("click", function(){

                var self = $(this);
                var another = (i === 0) ? $("#searchform .radios .tit")[1] : $("#searchform .radios .tit")[0];

                var ul = $(this).parent().find("ul");

                if(self.hasClass("show")) self.removeClass("show");
                else {
                    self.addClass("show");

                    //もう1つのプルダウンを閉じる
                    $(another).removeClass("show");
                    $(another).parent().find("ul").removeClass("show");
                }

                if(ul.hasClass("show")) ul.removeClass("show");
                else ul.addClass("show");


            });
        });


        $("#searchform input[type=radio]").each(function(i){
            //init
            if($(this).prop('checked')) {
                //ブラウザのbackで戻ったりするとcheckが残っていたりするため表示を同期させる
                $(this).parent().addClass("selected");
            }

            //change
            $(this).on("change", function(){
                if ($(this).prop('checked')) {
                    $(this).parent().addClass("selected");
                } else {
                    $(this).parent().removeClass("selected");
                }
            });
        });
    });
})