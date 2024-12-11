function customValidate(fID)
{
	var flag=true;
	var formID = fID+" ";

	var username = $(formID+"#username").val();
	if(username!=undefined)
	{
		if(username == "")
		{
			$(formID+"#usernameErr").html("Username is required!").fadeIn();
			flag=false;
		}
		else if(username.length<3)
		{
			$(formID+"#usernameErr").html("Username should be of minimum 3 characters!").fadeIn();
			flag=false;
		}
		else if(!/^[a-zA-Z0-9]*$/.test(username))
		{
			$(formID+"#usernameErr").html("Only alphabets and numbers allowed!").fadeIn();
			flag=false;
		}
		else
		{
			$(formID+"#usernameErr").fadeOut();
		}
	}
	
	var email =	$(formID+"#email").val(); 
	if(email!=undefined)
	{
		if(email != "")
		{
			if(!/\S+@\S+\.\S+/.test(email))
			{
				$(formID+"#emailErr").html("Please enter valid email!").fadeIn();
				flag=false;
			}
			else
			{
				$(formID+"#emailErr").fadeOut();
			}
		}	
	}
	
	var phoneNo = $(formID+"#phoneNo").val();
	if(phoneNo!=undefined)
	{
		if(phoneNo=="")
		{
			$(formID+"#phoneErr").html("Phone number is required!").fadeIn();
			flag=false;
		}
		else if(!/\d{10}/.test(phoneNo))
		{
			$(formID+"#phoneErr").html("Please enter a valid phone number!").fadeIn();	
			flag=false;
		}
		else
		{
			$(formID+"#phoneErr").fadeOut();	
		}
	}
	
	var password = $(formID+"#password").val();
	if(password!=undefined)
	{
		if(validatePassword(password,formID+'#passwordErr')==false)
		{
			flag=false;
		}
	}
	

	var role = $(formID+"#role").val();
	if(role!=undefined)
	{
		if(role=="")
		{
			flag=false;
			$(formID+"#roleErr").html("Role is required!").fadeIn();
		}
		else
		{
			$(formID+"#roleErr").fadeOut();
		}
	}
	
	if(role == "user")
	{
		var district = $(formID+"#district").val();
		if(district=="")
		{
			flag=false;
			$(formID+"#districtErr").html("District is required!").fadeIn();
		}
		else
		{
			$(formID+"#districtErr").fadeOut();
		}

		var school = $(formID+"#school").val();
		if(school=="")
		{
			flag=false;
			$(formID+"#schoolErr").html("School is required!").fadeIn();
		}
		else
		{
			$(formID+"#schoolErr").fadeOut();
		}								
	}

	var name = $(formID+"#personName").val();
	if(name!=undefined)
	{
		if(name == "" || /^\s*$/.test(name) )
		{
			flag=false;
			$(formID+"#nameErr").html("Name is required!").fadeIn();
		}
		else if(name.length<3)
		{
			flag=false;
			$(formID+"#nameErr").html("Name should be of minimum 3 characters!").fadeIn();
		}
		else if(!/^[a-zA-Z.'\s\-\u00FC\u00DCS]*$/.test(name))//NAME VALIDATION WITH Ü AND ü
		{
			flag=false;
			$(formID+"#nameErr").html("Only alphabets allowed!").fadeIn();
		}
		else
		{
			$(formID+"#nameErr").fadeOut();
		}
	}
	return flag;
}