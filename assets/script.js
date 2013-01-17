/**
 * Hide default select box, replace with fancy theme picker
 * Make all ajax changes related to theme
 * Accept themeSettings array from PHP - wp_localize_script()
**/
jQuery(document).ready(function($) 
{
	// initialize the custom control for the theme picker
	$(".themePickerControl").themePickerCustomControl();
});


/**
 * A small jquery plugin that does all of the hard work
**/
(function( $ ) 
{
	$.fn.themePickerCustomControl = function() 
	{

		//return the 'this' selector to maintain jquery chainability
		return this.each(function() 
		{
			// cache this selector for further use
			thisThemePickerCustomControl = this;

			// add event listener to select box
			$("select", thisThemePickerCustomControl).change(function() 
			{
				//get selected option
				themeTitle = $("option:selected", thisThemePickerCustomControl).text();
				
				// copy data out of themeSettings
				theme = themeSettings[themeTitle];

				// if index exists then proceed
				// TODO

				// loop through properties
				for(var propertyName in theme) 
				{
					// get property
					property = theme[propertyName];

					// find the appropriate section
					section = $("#customize-control-"+propertyName);

					// for each property find an input/select and change the value
					// after changing the property fire off a change event to fire off the default WP jquery events
					$("input, select", section).val(property).change();
				}
			});

		});

	};
})( jQuery );