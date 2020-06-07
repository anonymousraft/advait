<?php
/**
 *@package Advait
 */
namespace Inc;

final class Init
{

    //get the classes names to be initialise
	public static function get_services()
	{
		return [
			Pages\Dashboard::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			Base\CustomPostTypeController::class,
			Base\TaxonomyController::class,
			Base\WidgetController::class,
			Base\MediaController::class,
			Base\TestimonialController::class,
			Base\CustomTemplateController::class,
			Base\LoginController::class,
			Base\MembershipController::class,
			Base\ChatController::class
		];
	}

    //Call the initialization function and calling the register method from the class
	public static function register_services()
	{
		foreach (self::get_services() as $class)
		{
			$service = self::instantiate($class);

			if (method_exists($service, 'register'))
			{
				$service->register();
			}
		}
	}

    //Initializing the classes
	private static function instantiate($class)
	{
		$service = new $class();
		return $service;
	}
}
