(function(){
    window.trace = function(){
        if(window.console && console.log && console.log.apply) console.log.apply(console, arguments);
    }

    var current = 0, len = eventParty.length;

    function initThumbnails(target){

        for( var i = 0; i < len; i++ ){
            var img = document.createElement("img");
            img.onload = function () {
                var width = this.naturalWidth;
                var height = this.naturalHeight;
                var ratio = height / width;

                if(ratio < 0.667){
                    img.style.width = "auto";
                    img.style.height = "100%";
                }
            }

            img.src = eventParty[i].thumbnail;
            img.style.transform = "translate3d(" + i * 100 + "%, 0,0)";
            target.appendChild(img);
        }
    }

    function setInfo() {
        var date = document.querySelector('.event_party .item .date');
        var txt = document.querySelector('.event_party .item .txt');
        // var a = document.querySelector('.event_party .item a');
        date.innerHTML = eventParty[current].date;
        txt.innerHTML = eventParty[current].title;

/*        var link = eventParty[current].link;

        if(link){
            a.href = eventParty[current].link;
            a.target = "_blank";
        }else{
            a.href = "javascript:void(0)";
            a.target = "_self";
        }*/
    }

    function setPrevNext(){
        var next = document.querySelector('.event_party .next');
        var prev = document.querySelector('.event_party .prev');
        next.addEventListener("click", function(event){
            if(current === len-1) return;

            current++;
            setInfo();
            slide();
        });

        prev.addEventListener("click", function(event){
            if(current === 0) return;
            current--;
            setInfo();
            slide();
        });
    }

    function slide(){
        var thumbs = document.querySelectorAll('.event_party .item .img img');
        for( var i = 0, len = thumbs.length; i < len; i++ ){
            var img = thumbs[i];
            var x = (i * 100) - (current * 100);
            img.style.transform = "translate3d(" + x + "%, 0,0)";
        }
    }

    function swipe(difX, state){
        var target = document.querySelector('.event_party .item .img');
        var thumbs = document.querySelectorAll('.event_party .item .img img');
        var len = thumbs.length;
        var per = difX / target.clientWidth * 100;

        if(state === "end"){
            if(per < -20){
                if(current < len-1) {
                    current++;
                    setInfo();
                }
            }else if(per > 20){
                if(current > 0) {
                    current--;
                    setInfo();
                }
            }
            per = 0;
        }

        for( var i = 0; i < len; i++ ){
            var img = thumbs[i];
            var x = (i * 100) - (current * 100) + per;

            if(state === "move") img.style.transition = "transform 0ms";
            else img.style.transition = "transform 500ms";

            img.style.transform = "translate3d(" + x + "%, 0,0)";
        }
    }

    function setSwipe(){
        var target = document.querySelector('.event_party .item .img');
        var thumbs = target.querySelectorAll('img');
        var startSwipeX, difMoveSwipeX;
        if(thumbs.length > 1){
            target.addEventListener("touchstart", function(event){
                startSwipeX = event.changedTouches[0].clientX;
            });

            target.addEventListener("touchmove", function(event){
                event.preventDefault();
                difMoveSwipeX = event.changedTouches[0].clientX - startSwipeX;
                swipe(difMoveSwipeX, "move");
            });

            target.addEventListener("touchend", function(event){
                difMoveSwipeX = event.changedTouches[0].clientX - startSwipeX;
                swipe(difMoveSwipeX, "end");
            });
        }
    }

    initThumbnails(document.querySelector('.event_party .item .img'));
    setInfo();
    setPrevNext();
    setSwipe();
})();