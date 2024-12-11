function myFunction() {
var nameResult = document.getElementById("nbse_results").value;
var dataString = 'nbse_results=' + nbse_results;
if (nameResult == '') {
alert("Please select one");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "ajaxresultCall.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}