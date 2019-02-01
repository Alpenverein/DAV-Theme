/*
This function get the highest element with given class and give all elements the same high
 */
function elementHeight(element) {

    var highest_element = 0;

    // Prüfe, welches Element am höchsten ist
    $(element).each(function () {
        if ($(this).height() > highest_element) {
            highest_element = $(this).height();
        }
    });

    // Weise diese Höhe allen Elementen zu.
    $(element).each(function () {
        $(this).height(highest_element);
    });

}

var resizeTimer;
$(window).resize(function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(elementHeight, 100);
});


elementHeight('.card-price');
elementHeight('.price-body');
elementHeight('.card-person');
elementHeight('.card-news-one');
elementHeight('.card-news-two');
elementHeight('.card-news-three');
elementHeight('.card-news-image');
elementHeight('.card-page-overview');


$(window).resize(function(){

    elementHeight('.card-price');
    elementHeight('.price-body');
    elementHeight('.card-person');
    elementHeight('.card-news-one');
    elementHeight('.card-news-two');
    elementHeight('.card-news-three');
    elementHeight('.card-news-image');
    elementHeight('.card-page-overview');

});


$(document).ready(function() {

    var targeth = 0;
    var targetn = 0;


    $(".dropdown").hover(function () {
        $(this).children('.nav-link').toggleClass("navitem-caret");
    });

    $( ".dropdown").mouseleave(function() {
        $(this).children('.nav-link').removeClass("navitem-caret");
    });

    $('.btn-menu').click(function () {
        $(this).children().addClass('fa-chevron-down');
        $(this).children().removeClass('fa-chevron-right');

        var targetn = $(this).parent().attr('id');

        if(targeth != 0) {

            console.log(targetn);
            console.log(targeth);

            if (targetn == targeth) {
                $('#'+targeth).addClass('test');
                $('#'+targeth).find('.btn-menu').find('i').addClass('fa-chevron-right');
                $('#'+targeth).find('.btn-menu').find('i').removeClass('fa-chevron-down');

            }

            if (targetn != targeth) {
                $('#'+targeth).addClass('test');
                $('#'+targeth).find('.btn-menu').find('i').addClass('fa-chevron-right');
                $('#'+targeth).find('.btn-menu').find('i').removeClass('fa-chevron-down');


            }

            targeth = targetn;

        } else {
            console.log('null');
            targeth = targetn;

        }

    });

});

$(window).on("scroll", function() {

    if ($("#main-nav-head").hasClass("trans")) {

        if($(window).scrollTop() > 500) {
            $("#main-nav-head").addClass('bg-white');
            $("#main-nav-head").removeClass('bg-transparent60');
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $("#main-nav-head").removeClass('bg-white');
            $("#main-nav-head").addClass('bg-transparent60');
        }

    }
});

$('#main-search-icon').click(function () {

    $('#menu-items').hide();
    $('#mainmenu-search').show();
    $('#s').focus();

});

$('#closesearch').click(function () {
    $('#menu-items').show();
    $('#mainmenu-search').hide();
});

$(document).keyup(function(e) {
    if (e.keyCode === 27) {
        $('#mainmenu-search').hide();
        $('#menu-items').show();
    }
});



$(".fa-bars").click(function(){
    $(this).toggleClass("fa-times");
});