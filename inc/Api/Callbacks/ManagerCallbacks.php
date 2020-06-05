<?php
/**
 *@package Advait
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;


class ManagerCallbacks extends BaseController
{
	public function checkBoxSanitize( $input )
	{
		return (isset($input) ? true : false );
	}

	public function advaitSectionSetting()
	{
		echo "Manage all the module of Advait Plugin:";
	}

	public function checkBoxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$checkBoxValue = esc_attr( get_option($name) );

		echo '<div class="'. $classes .'"><input type="checkbox" id="'. $name .'" name="'. $name .'" value="1" class="" '. ($checkBoxValue? 'checked': '') .'><label for="'. $name .'"><div></div></label></div>';
	}

}








