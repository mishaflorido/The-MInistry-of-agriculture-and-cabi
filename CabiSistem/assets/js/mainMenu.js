
$(".nav-link").on("click", function () {

    if ($(this).hasClass("active") && $(this).hasClass("sub-link") == false) {
        $(this).removeClass("active");
    } else {
        if ($(this).hasClass("sub-link") == false) {
            $(this).addClass("active");
        }
    }
    if ($(this).hasClass("sub-link")) {
        $(".sub-link").removeClass("active");
        $(this).addClass("active");
    }

})

