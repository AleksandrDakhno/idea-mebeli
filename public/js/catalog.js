

function drawMenu( ) {
  
  var top  = 80;
  var left = 15;

  for(i=1; i<=30; i++) {
    var item = "menuProduct" + i;
    var menuItem = document.getElementById( item );

    menuItem.style.top  = top + "px";
    menuItem.style.left = left + "px";
    
    if( i % 4 == 0 ){
      top = top + 120;
      left = 15;
    } else {
      left = left + 140;
    }
    

    menuItem.style.position = "absolute";
    menuItem.style.width    = "120px";
    menuItem.style.height   = "130px";

    menuItem.style.margin   = "0px";
    menuItem.style.padding  = "10px";

    //menuItem.style.border   = "solid 1px";
  }

}

