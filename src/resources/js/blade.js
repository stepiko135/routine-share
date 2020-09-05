/*
 |
 | views/layouts/app.balde.php で使用
 |
 */

$(document).ready(function() {
    $(".dropdown-trigger").dropdown({
        coverTrigger: false
    });
    $(".modal").modal();
    $(".sidenav").sidenav();
    $('.tooltipped').tooltip();
    $('.chara-count').characterCounter();

});

/*
 | views/routine/show.blade.php で使用
 | https://freefrontend.com/css-timelines/
 |https://codepen.io/tutsplus/pen/QNeJgR/
 */

(function() {
    "use strict";

    // define variables
    var items = document.querySelectorAll(".timeline li");

    // check if an element is in viewport
    // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <=
                (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function callbackFunc() {
        for (var i = 0; i < items.length; i++) {
            if (isElementInViewport(items[i])) {
                items[i].classList.add("in-view");
            }
        }
    }

    // listen for events
    window.addEventListener("load", callbackFunc);
    window.addEventListener("resize", callbackFunc);
    window.addEventListener("scroll", callbackFunc);
})();
