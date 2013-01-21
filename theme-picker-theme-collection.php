<?php
/**
 * Theme_Picker_Theme_Collection Class
**/
// this file controls all of the data for the custom fonts used in the theme customizer

// the Google_Font_Collection object is a wrapper that holds all of the individual custom fonts
class Theme_Picker_Theme_Collection
{
	private $themes;


	/**
	 * Constructor
	**/
	public function __construct($themes)
	{
		if(empty($themes))
		{
			//we didn't get the required data
			return false;
		}

		// create themes
		foreach ($themes as $key => $value) 
		{
			$this->themes[] = new Theme_Picker_Theme(
				$value["title"], 
				$value["settings"],
				$value["backgroundImage"],
				$value["titleColor"]  
			);
		}
	}


	/**
	 * getTotalNumberOfThemes
	 * this function returns the total number of themes
	**/
	function getTotalNumberOfThemes()
	{
		return count($this->themes);
	}


	/**
	 * getThemeArray
	 * this function gets an array of theme names
	 * for use with the $wp_customize->add_control 'choices' option 
	**/
	function getThemeArray()
	{
		$result;
		foreach ($this->themes as $key => $value) 
		{
			$result[$value->__get("title")] = array("title"=>$value->__get("title"), "backgroundImage"=>$value->__get("backgroundImage"), "titleColor"=>$value->__get("titleColor"));
		}
		return $result;
	}


	/**
	 * getThemeSettings Function
	 * this function returns an array containing all of the settings
	 * this array will then be passed to a JS file to make the AJAX
	**/
	function getThemeSettings()
	{
		$result;
		foreach ($this->themes as $key => $value) 
		{
			$result[$value->__get("title")] = $value->__get("settings");
		}
		return $result;
	}

} // Theme_Picker_Theme_Collection