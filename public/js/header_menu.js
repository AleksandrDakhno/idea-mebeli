  function drawHeaderMenu(){
    var top  = 5;
    var left = 0; 

    for(i=1; i<=6; i++) {
      var item = "menuItem" + i;

      var menuItem = document.getElementById( item );

      menuItem.style.top  = top + "px";
      menuItem.style.left = left + "px";

      menuItem.style.position = "absolute";
      menuItem.style.width    = "182px";
      menuItem.style.height   = "190px";

      menuItem.style.margin   = "0px";
      menuItem.style.padding  = "0px";

      //menuItem.style.border   = "solid 1px";
      menuItem.style.background = '#1E90FF';

      left += 193;
    }
  }
