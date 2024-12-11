
	//MOUSE ENTERS ICON
	$('#menuDropdownButton').hover(
		function(e)
		{
			$('#menuDropdown').fadeIn('fast');
		},
		function(e)
		{
		}
	);
	//MOUSE LEAVES DROPDOWN MENU
	$('#menuDropdown').mouseleave(
		function()
		{
			$('#menuDropdown').fadeOut('fast');
		}
	);
	//MOUSE ENTERS DUMMY DIV
	$('#dummy').mouseenter(
		function()
		{
			$('#menuDropdown').fadeOut('fast');
		});
