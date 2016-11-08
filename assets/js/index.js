
// Toggle Function
$('.toggle').click(function(){
    if($(this).hasClass('active')){
       //alert('a');    
    }else{
        $(this).addClass('active');
        $('.toggle2').removeClass('active');
         $('#teacher').animate({
    height: 'toggle',
    opacity: "toggle"
  }, "slow");
   $('#student').animate({
    height: 'toggle',
    opacity: "toggle"
  }, "slow");
    }
});

// Toggle Function
$('.toggle2').click(function(){
    if($(this).hasClass('active')){
        //alert('a');    
    }else{
        //alert('a');
        $(this).addClass("active");
        $('.toggle').removeClass("active");
         $('#teacher').animate({
           height: 'toggle',
           opacity: "toggle"
         }, "slow");
    $('#student').animate({
        height: 'toggle',
        opacity: "toggle"
    }, "slow");
    }
});


