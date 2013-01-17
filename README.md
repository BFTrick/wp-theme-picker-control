# WP Theme Picker Control

## Description

This WordPress plugin creates a new control type for the [WordPress Theme Customizer](http://codex.wordpress.org/Theme_Customization_API). This new control will allow you to pick a theme made up of various options with one click.

An example would be a theme with two different color palettes: a blue theme and a red theme. A user that clicks on the blue theme would then automatically set all other controls to the right settings to make the theme blue.

## Usage

1. Include & activate the plugin
2. Open your functions.php file
3. Save your themes in an array like so: 

	``` php
	$customThemes;

	// make sure the classes exist before calling them
	if (class_exists('Theme_Picker_Theme_Collection') && class_exists('Theme_Picker_Theme'))
	{
		// assemble data for themes
		$themes[] = array(
			"title" => "Theme Number One", 
			"appearance" => array(
					array("percentage" => 60, "color" => "#efefef"),
					array("percentage" => 20, "color" => "#ffffff"),
					array("percentage" => 10, "color" => "#4d4d4d"),
					array("percentage" => 10, "color" => "#ff3333")
				), 
			"settings" => array(
					"background_color_control" 			=> "#efefef", 
					"content_background_color_control" 	=> "#ffffff",
					"text_color_control" 				=> "#4d4d4d",
					"active_text_color_control" 		=> "#ff3333",
					"font_family_control"				=> "Arial"
				), 
		);
		
		// create new theme collection
		$customThemes = new Theme_Picker_Theme_Collection($themes);
	}
	``` 
	* **title** - the title of the theme
	* **appearane** - the appearance of the theme within the theme customizer. The implementation isn't complete so there aren't any docs yet.
	* **settings** - the settings that this theme controls. The settings field contains an array with `keys` that are the control ids and `values` that that the value for that property. *Note* If you're digging through the source code, the control id looks like this `<li id="customize-control-FOO">`. WordPress automatically adds the `customize-control-` to the ID you specify in your functions file.

## Known Issues

* Can only have one instance of a theme picker
* Requires JavaScript
* Settings should use `postMessage` for `transport` or there may be issues with AJAX (untested)

## Version

### 0.2

* support for select boxes & input fields

### 0.1 

* Initial upload