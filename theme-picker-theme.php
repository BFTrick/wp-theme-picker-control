<?php
/**
 * Theme_Picker_Theme Class
**/
class Theme_Picker_Theme
{
	private $title;				// the name of the theme
	private $settings;			// an array of settings to be changed when this theme is selected
								// 	format:
								// 	id => value
	private $backgroundImage;	// location of the background image
	private $titleColor;		// the color of the title text on top of the background image

	/**
	 * Constructor
	**/
	public function __construct($title, $settings, $backgroundImage, $titleColor)
	{
		$this->title = $title;
		$this->settings = $settings;
		$this->backgroundImage = $backgroundImage;
		$this->titleColor = $titleColor;
	}

	/**
	 * Getters
	 * taken from: http://stackoverflow.com/questions/4478661/getter-and-setter
	**/
	public function __get($property) 
	{
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
} // Theme_Picker_Theme