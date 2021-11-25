$(function(){
    $(".edus-content-item-2").css( "display", "none" );
    $(".edus-content-item-3").css( "display", "none" );
    
    $(".edus-nav-item-1").on("click", function(){
    
        $(".edus-content-item-2").css( "display", "none" );
        $(".edus-content-item-3").css( "display", "none" );
        $(".edus-content-item-1").css( "display", "block" );
   
    });
    $(".edus-nav-item-2").on("click", function(){
    
        $(".edus-content-item-1").css( "display", "none" );
        $(".edus-content-item-3").css( "display", "none" );
        $(".edus-content-item-2").css( "display", "block" );
   
    });
    $(".edus-nav-item-3").on("click", function(){
    
        $(".edus-content-item-1").css( "display", "none" );
        $(".edus-content-item-2").css( "display", "none" );
        $(".edus-content-item-3").css( "display", "block" );
   
    });
});