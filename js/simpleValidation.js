/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validate() {
	 
         //First Name Validation 
    var ap=document.getElementById('txtnbse_fname').value;
    if(ap == ""){
        alert('Please Enter First Name');
        document.getElementById('txtnbse_fname').style.borderColor = "red";
        document.getElementById('txtnbse_fname').focus();
		return false;
    }else{
        document.getElementById('txtnbse_fname').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("txtnbse_fname").value)) {
        alert("First Name Contains Numbers!");
        document.getElementById('txtnbse_fname').style.borderColor = "red";
		document.getElementById('txtnbse_fname').focus();
        return false;
    }else{
        document.getElementById('txtnbse_fname').style.borderColor = "green";
    }
    if(ap.length <=2){
        alert('Your Name is Too Short');
        document.getElementById('txtnbse_fname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('txtnbse_fname').style.borderColor = "green";
    }
         
         //Father Name Validation 
    var ap=document.getElementById('nbse_father_name').value;
    if(ap == ""){
        alert('Please Enter Father Name');
        document.getElementById('nbse_father_name').style.borderColor = "red";
        document.getElementById('nbse_father_name').focus();
		return false;
    }else{
        document.getElementById('nbse_father_name').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("nbse_father_name").value)) {
        alert("Father Name Contains Numbers!");
        document.getElementById('nbse_father_name').style.borderColor = "red";
		document.getElementById('nbse_father_name').focus();
        return false;
    }else{
        document.getElementById('nbse_father_name').style.borderColor = "green";
    }
    if(ap.length <=2){
        alert('Father Name is Too Short');
        document.getElementById('nbse_father_name').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('nbse_father_name').style.borderColor = "green";
    }
    
    //Mother Name Validation 
    var ap=document.getElementById('nbse_mother_name').value;
    if(ap == ""){
        alert('Please Enter Mother Name');
        document.getElementById('nbse_mother_name').style.borderColor = "red";
        document.getElementById('nbse_mother_name').focus();
		return false;
    }else{
        document.getElementById('nbse_mother_name').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("nbse_mother_name").value)) {
        alert("Mother Name Contains Numbers!");
        document.getElementById('nbse_mother_name').style.borderColor = "red";
		document.getElementById('nbse_mother_name').focus();
        return false;
    }else{
        document.getElementById('nbse_mother_name').style.borderColor = "green";
    }
    if(ap.length <=2){
        alert('Mother Name is Too Short');
        document.getElementById('nbse_mother_name').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('nbse_mother_name').style.borderColor = "green";
    }
    
    //Identification Name Validation 
    var ap=document.getElementById('nbse_identification_mark').value;
    if(ap == ""){
        alert('Please Enter Indentification');
        document.getElementById('nbse_identification_mark').style.borderColor = "red";
        document.getElementById('nbse_identification_mark').focus();
		return false;
    }else{
        document.getElementById('nbse_identification_mark').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("nbse_identification_mark").value)) {
        alert("Identification Mark Contains Numbers!");
        document.getElementById('nbse_identification_mark').style.borderColor = "red";
		document.getElementById('nbse_identification_mark').focus();
        return false;
    }else{
        document.getElementById('nbse_identification_mark').style.borderColor = "green";
    }
    if(ap.length <=2){
        alert('Identification Name is Too Short');
        document.getElementById('nbse_identification_mark').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('nbse_identification_mark').style.borderColor = "green";
    }
    
    //Date of birth Name Validation 
    var ap=document.getElementById('nbse_dob').value;
    if(ap == ""){
        alert('Please Enter Date of Birth');
        document.getElementById('nbse_dob').style.borderColor = "red";
        document.getElementById('nbse_dob').focus();
		return false;
    }else{
        document.getElementById('nbse_dob').style.borderColor = "green";
    }
         
    //Gender Validation 
     if(document.getElementById('nbse_gender').value == ""){
        alert('Please Select Gender');
        document.getElementById('nbse_gender').style.borderColor = "red";
        document.getElementById('nbse_gender').focus();
		return false;
    }else{
        document.getElementById('nbse_gender').style.borderColor = "green";
    }
	//Community Validation 
	 if(document.getElementById('s').value == ""){
        alert('Please Select Community');
        document.getElementById('s').style.borderColor = "red";
        document.getElementById('s').focus();
		return false;
    }else{
        document.getElementById('s').style.borderColor = "green";
    }
	
    //Second Language Validation 
	 if(document.getElementById('nbse_secondLanguage').value == ""){
        alert('Please Select Second Language');
        document.getElementById('nbse_secondLanguage').style.borderColor = "red";
        document.getElementById('nbse_secondLanguage').focus();
		return false;
    }else{
        document.getElementById('nbse_secondLanguage').style.borderColor = "green";
    }
	
	if(document.getElementById('nbse_sixSubject').value == "")
    {
        alert('Please Select SixSubject');
        document.getElementById('nbse_sixSubject').style.borderColor = "red";
        document.getElementById('nbse_sixSubject').focus();
		return false;
    }
    else
    {
        document.getElementById('nbse_sixSubject').style.borderColor = "green";
    }      
	
	//Birth Certificate Validation 
	 /*if(document.getElementById('uploadFile').value == "")
     {
        alert('Please Upload Birth Certificate');
        document.getElementById('uploadFile').style.borderColor = "red";
        document.getElementById('uploadFile').focus();
		return false;
    }
    else
    {
        document.getElementById('uploadFile').style.borderColor = "green";
    } 
	
		//Applicant Photo Validation 
	 if(document.getElementById('uploadFile1').value == ""){
        alert('Please Upload Applicant Photo');
        document.getElementById('uploadFile1').style.borderColor = "red";
        document.getElementById('uploadFile1').focus();
		return false;
    }else{
        document.getElementById('uploadFile1').style.borderColor = "green";
    }
	
	//Passed Certificate Validation 
	 if(document.getElementById('uploadFile2').value == ""){
        alert('Please Upload Passed Certificate');
        document.getElementById('uploadFile2').style.borderColor = "red";
        document.getElementById('uploadFile2').focus();
		return false;
    }else{
        document.getElementById('uploadFile2').style.borderColor = "green";
    }
	
	//Provision Certificate Validation 
	 if(document.getElementById('uploadFile3').value == ""){
        alert('Please Upload Provision Certificate');
        document.getElementById('uploadFile3').style.borderColor = "red";
        document.getElementById('uploadFile3').focus();
		return false;
    }else{
        document.getElementById('uploadFile3').style.borderColor = "green";
    }
	
	//Migration Certificate Validation 
	 if(document.getElementById('uploadFile4').value == ""){
        alert('Please Upload Migration Certificate');
        document.getElementById('uploadFile4').style.borderColor = "red";
        document.getElementById('uploadFile4').focus();
		return false;
    }else{
        document.getElementById('uploadFile4').style.borderColor = "green";
    }*/
		
		//Repeaters Validation 
	 if(document.getElementById('nbse_repeaters').value == ""){
        alert('Please Select Repeaters');
        document.getElementById('nbse_repeaters').style.borderColor = "red";
        document.getElementById('nbse_repeaters').focus();
		return false;
    }else{
        document.getElementById('nbse_repeaters').style.borderColor = "green";
    }
         return( true );
      }

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 
//function ValidateAlpha(evt) {
//        var charCode;
//        if (window.event)
//            charCode = window.event.keyCode;  //for IE
//        else
//            charCode = evt.which;  //for firefox
//        if (charCode == 32) //for &lt;space&gt; symbol
//            return true;
//        if (charCode > 31 && charCode < 65) //for characters before 'A' in ASCII Table
//            return false;
//        if (charCode > 90 && charCode < 97) //for characters between 'Z' and 'a' in ASCII Table
//            return false;
//        if (charCode > 122) //for characters beyond 'z' in ASCII Table
//            return false;
//        return true;
//    }
	
//formsPage.php
function validator()
{
    var ap=document.getElementById('nbse_schoolDistrict_name').value;
    if(ap == "")
    {
        alert('Please select district!');
        document.getElementById('nbse_schoolDistrict_name').style.borderColor = "red";
        document.getElementById('nbse_schoolDistrict_name').focus();
    	return false;
    }
    else
    {
        document.getElementById('nbse_schoolDistrict_name').style.borderColor = "green";
    }
    var ap=document.getElementById('Schools_dropdowns').value;
    if(ap == "")
    {
        alert('Please select school!');
        document.getElementById('Schools_dropdowns').style.borderColor = "red";
        document.getElementById('Schools_dropdowns').focus();
    	return false;
    }
    else
    {
        document.getElementById('Schools_dropdowns').style.borderColor = "green";
    }	
    var ap=document.getElementById('nbse_class').value;
    if(ap == "")
    {
        alert('Please select session!');
        document.getElementById('nbse_class').style.borderColor = "red";
        document.getElementById('nbse_class').focus();
    	return false;
    }
    else
    {
        document.getElementById('nbse_class').style.borderColor = "green";
    }
    var ap=document.getElementById('nbse_session').value;
    if(ap == "")
    {
        alert('Please select session!');
        document.getElementById('nbse_session').style.borderColor = "red";
        document.getElementById('nbse_session').focus();
    	return false;
    }
    else
    {
        document.getElementById('nbse_session').style.borderColor = "green";
    }

}	