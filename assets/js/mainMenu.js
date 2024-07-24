
$(".nav-link").on("click", function () {

    if ($(this).hasClass("active") && $(this).hasClass("sub-link") == false) {
        $(this).removeClass("active");
    } else {
        if ($(this).hasClass("sub-link") == false) {
            $(this).addClass("active");
            // $(this).addClass("disabled");
            // $(this).prop("Disabled", true);

        }
    }
    if ($(this).hasClass("sub-link")) {
        $(".sub-link").removeClass("active");
        $(".sub-link").removeClass("disabled");
        $(this).addClass("active");
        $(this).addClass("disabled");
        $(this).prop("disabled", true);
    }

})
// $("#user_manual").on("click", function(){

//     $(this).download = '../user_manual.pdf';

// })

