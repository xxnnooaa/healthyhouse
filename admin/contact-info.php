<?php
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid" id="link_wrapper">


</div>

<script >
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("link_wrapper").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "contact.php", true);
  xhttp.send();
}
setInterval(function(){
    loadXMLDoc();
},1000);

window.onload = loadXMLDoc;


</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>