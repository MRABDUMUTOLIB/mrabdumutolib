let eyeicon = document.getElementById("eyeicon");
let kod = document.getElementById("kod");

eyeicon.onclick = function() {
  if(kod.type == "password"){
    kod.type = "text";
    eyeicon.src = "/sources/eye-open.png"
  }
  else{
    kod.type = "password";
    eyeicon.src = "/sources/eye-close.png"
  }
};
