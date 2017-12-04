
var xmlhttp = false;

try {

 xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

} catch (e) {

 try {

  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

 } catch (E) {

  xmlhttp = false;

 }

}



if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {

 xmlhttp = new XMLHttpRequest();

}

var JsVar = "ini variable";   // Ini variable Javascriptnya

xmlhttp.open("GET","testvar.php?input=" + JsVar,true);   // ini untuk di pass ke script php nya

 xmlhttp.onreadystatechange = function() {

  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

   var Result= xmlhttp.responseText;

  }

 }

 xmlhttp.send(null);
