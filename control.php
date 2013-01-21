<?php
/**
 * Google_Font_Picker_Custom_Control Class
**/
class Theme_Picker_Custom_Control extends WP_Customize_Control
{
	private $themes;

	/**
	 * Enqueue the styles and scripts
	**/
	public function enqueue()
	{
		// styles
		wp_register_style( 'theme-picker-control', plugins_url( 'assets/style.css', __FILE__ ));
		wp_enqueue_style( 'theme-picker-control' );
		
		// scripts
		wp_register_script( 'theme-picker-control', plugins_url( 'assets/script.js', __FILE__ ));
		wp_enqueue_script( 'theme-picker-control' );
		// pass variables into the script
		global $customThemes;
		wp_localize_script( 'theme-picker-control', 'themeSettings', $customThemes->getThemeSettings() );
	}

	/**
	 * Render the content on the theme customizer page
	**/
	public function render_content()
	{
		if ( empty( $this->choices ) )
		{
			// if there are no choices then don't print anything
			return;
		}

		?>
		<div class="themePickerControl">
			<select <?php $this->link(); ?>>
				<?php
				foreach ( $this->choices as $value => $label )
				{
					?>
					<option value="<?php echo esc_attr( $value )?>" <?php echo selected( $this->value(), $value, false )?>><?php echo $label['title'] ?></option>
					<?php
				}
				?>
			</select>
			<div class="fancyDisplay">
				<ul>
					<?php
					foreach ( $this->choices as $value => $label )
					{
						?>
						<li style="color: <?=$label['titleColor']?>; background-image: url(<?=$label['backgroundImage'];?>);"><?php echo $label['title'];?></li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
		<?php
	}
}