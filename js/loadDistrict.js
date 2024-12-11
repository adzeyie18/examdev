/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function selectCity(nbse_districtCode){
	if(nbse_districtCode!="-1"){
		loadData('schools',nbse_districtCode);
		$("#city_dropdown").html("<option value='-1'>Select city</option>");	
	}else{
		$("#nbse_schools_dropdown").html("<option value=''>--Select school--</option>");
		$("#city_dropdown").html("<option value=''>Select city</option>");		
	}
}

function loadData(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="../loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadData.php",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value=''>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}
