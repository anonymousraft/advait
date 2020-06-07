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
		$output = [];

		foreach ($this->managers as $key => $value){
			$output[$key] = isset($input[$key]) ? true : false ;
		}
		return $output;
	}

	public function advaitSectionSetting()
	{
		echo "Manage all the module of Advait Plugin:";
	}

	public function checkBoxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];

		$checkBoxValue = get_option($option_name);

		$checked = isset($checkBoxValue[$name]) ? ($checkBoxValue[$name] ? true : false) : false;

		echo '<div class="'. $classes .'"><input type="checkbox" id="'. $name .'" name="'. $option_name . '[' . $name .']" value="1" class="" '. ($checked ? 'checked': '') .'><label for="'. $name .'"><div></div></label></div>';
	}

}








