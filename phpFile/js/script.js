
//JavaScript
window.addEventListener('pageshow', function (event) {
    // borra el formulario (asumiendo que sólo hay uno; si hay más, especifica su Id)
    document.querySelector("form").reset();
});

function removeRequiredLogin() {
    document.querySelector('input[name="userL"]').required = false
    document.querySelector('input[name="password"]').required = false
}
function removeRequiredRegister() {
    document.querySelector('input[name="user"]').required = false
    document.querySelector('input[name="password"]').required = false
    document.querySelector('input[name="email"]').required = false
}
//Jquery
$(document).ready(function () {

    $("header>#menu>#menu-icon").on("click",function(){
        $(this).css("display","none")
        $(this).next().css("display","flex")
        $("#desplegable").slideDown("slow")
    })

    $("header>#menu>#close-icon").on("click",function(){
        $(this).css("display","none")
        $(this).prev().css("display","flex")
        $("#desplegable").slideUp("slow")
    })

    $("#formulario input").on("blur", function () {

        if ($(this).val().length == 0) {

            if ($(this).parent().hasClass("containerPassword")) {
                $(this).parent().next().css("visibility", "visible")
            } else {
                $(this).next().css("visibility", "visible")
            }

            $(this).css("border-color", "yellow")
        } else {

            if ($(this).parent().hasClass("containerPassword")) {
                $(this).parent().next().css("visibility", "hidden")
            } else {
                $(this).next().css("visibility", "hidden")
            }

            $(this).css("border-color", "black")
        }
    })

    $(".formulario>form>.containerPassword>:nth-child(2)").on("click", function () {

        $(this).css("display", "none")
        $(this).siblings("img").css("display", "flex");
        $(this).siblings("input").attr("type", "text")
    })

    $(".formulario>form>.containerPassword>:nth-child(3)").on("click", function () {

        $(this).css("display", "none")
        $(this).siblings("img").css("display", "flex");
        $(this).siblings("input").attr("type", "password")
    })


    $('.sidebar-div-border').on({
        "mouseenter": function () {
            $(this).children('div').children('span').css("color", "#0CB3D1")
        }, "mouseleave": function () {

            if (!$(this).hasClass("clicked")) {

                $(this).children('div').children('span').css("color", "black")
            }

        }
    })
})