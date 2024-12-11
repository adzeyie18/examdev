function validatePassword( passwordValue , errID )
{
	var password=passwordValue;
	var errorID=errID;
	var error='';
	var pattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/;
	if(password=='')
	{
		$(errorID).html('Password is required!').fadeIn();;
		return false;
	}
	if(!pattern.test(password))
	{
		$(errorID).html('Invalid password').fadeIn();;
		return false;
	}
	else
	{
		$(errorID).fadeOut();
		return true;
	}
		
}