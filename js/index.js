function show_register() {
  var disp = document.getElementById("register").style.display;
  
 if (disp == "block") 
   document.getElementById("register").style.display = "none";
 else
   document.getElementById("register").style.display = "block";
}
