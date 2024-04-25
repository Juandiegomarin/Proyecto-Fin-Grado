
function goBack(){
    window.history.back()
}
$(document).ready(function () {

$("#registro>input").on("blur",function(){

    if ($(this).val().length == 0) {
        $(this).next().css("visibility", "visible")
        $(this).css("border-color", "yellow")
    } else {
        $(this).next().css("visibility", "hidden")
        $(this).css("border-color", "black")
    }
})
    
})