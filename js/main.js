$(document).ready(function(){
    $(".support").hover(function(){
        if(i === true){
            $(".support-content").addClass("hidden");
            i = false;
        }
        else if(i === false){
            $(".support-content").removeClass("hidden");
            i = true;
        }
    });
    $(".support-content").addClass("hidden");
    let i = false;
});