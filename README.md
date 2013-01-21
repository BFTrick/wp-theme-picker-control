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
			"settings" => array(
					"background_color_control" 			=> "#efefef", 
					"content_background_color_control" 	=> "#ffffff",
					"text_color_control" 				=> "#4d4d4d",
					"active_text_color_control" 		=> "#ff3333",
					"font_family_control"				=> "Arial"
				),
			"backgroundImage" => "http://example.com/foo.png", 
			"titleColor" => "#ffffff",  
		);
		
		// create new theme collection
		$customThemes = new Theme_Picker_Theme_Collection($themes);
	}
	``` 
	* **title** - the title of the theme
	* **settings** - the settings that this theme controls. The settings field contains an array with `keys` that are the control ids and `values` that that the value for that property. *Note* If you're digging through the source code, the control id looks like this `<li id="customize-control-FOO">`. WordPress automatically adds the `customize-control-` to the ID you specify in your functions file.
	* **backgroundImage** - the background image that gives users an idea of what the theme looks like before selecting it. I make my images `259px` wide by `36px` tall but you can play with the CSS to make them anysize.
	* **titleColor** - the color of the title text on top of the background image.

## Screenshots

Here is what the theme picker looks like with 6 different themes.

![theme-picker](http://img.photobucket.com/albums/v357/BFTrick/Web/theme-picker_zps0723ff9a.png)

## Known Issues

* Can only have one instance of a theme picker
* Requires JavaScript & jQuery
* Settings should use `postMessage` for `transport` or there may be issues with AJAX (untested)

## Version

### 0.3

* adding theme background images
* adding title color
* spicing up the theme picker itself

### 0.2

* support for select boxes & input fields

### 0.1 

* Initial upload