
$(document).ready(function(){

    $('#menu-btn').on('click',function(){
        $('header').toggleClass('open');
        $('.overlay').fadeToggle(500);
    })

});