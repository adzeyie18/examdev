/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function selectCity(nbse_districtCode)
{
	if(nbse_districtCode!="-1")
	{
		loadData('schools',nbse_districtCode);
		$("#city_dropdown").html("<option value='-1'>Select city</option>");	
	}
	else
	{
		$("#nbse_schools_dropdown").html("<option value=''>--Select school--</option>");
	}
}

function loadData(loadType,loadId)
{
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$.ajax({
		type: "POST",
		url: "getSchoolCode.php",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_dropdowns").html("<option value=''>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdowns").append(result);  
		}
	});
}
