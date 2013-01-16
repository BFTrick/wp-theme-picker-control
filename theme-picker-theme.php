<?php
/**
 * Theme_Picker_Theme Class
**/
class Theme_Picker_Theme
{
	private $title;				// the name of the theme
	private $appearance;		// an array containing data to display the theme
								// 	format:
								// 	arbitrary index => array(percentage => XX%, color => #XXXXXX)
	private $settings;			// an array of settings to be changed when this theme is selected
								// 	format:
								// 	id => value

	/**
	 * Constructor
	**/
	public function __construct($title, $appearance, $settings)
	{
		$this->title = $title;
		$this->appearance = $appearance;
		$this->settings = $settings;
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