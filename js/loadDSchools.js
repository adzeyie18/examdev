/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function selectCity(nbse_schoolDistrict_name){
	if(nbse_schoolDistrict_name!="-1"){
		loadDS('Schools',nbse_schoolDistrict_name);
		$("#city_dropdown").html("<option value='-1'>Select city</option>");	
	}else{
		$("#nbse_schools_dropdowns").html("<option value=''>--Select school--</option>");
//		$("#city_dropdown").html("<option value=''>Select city</option>");		
	}
}
function loadDS(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="../loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadDS.php",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdowns").html("<option value=''>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdowns").append(result);  
		}
	});
}
