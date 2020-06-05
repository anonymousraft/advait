<?php
/**
 *@package Advait
 */
/**
 *Plugin Name: Advait
 *Plugin URI: https://quatervois.io
 *Description: All in one plugin from Quatervois Inc to enable its client to do more with WordPress.
 *Version: 1.0.0
 *Author: Hitendra Rathore
 *Author URI: https://hitendra.co
 *License: GPLv2 or later
 *Text Domain: advait
 */

/*
Copyright (C) 2020  Hitendra Rathore

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

defined('ABSPATH') or die('You are not allowed to access this file directly');

//require the composer autoload file. this is the only file that needs to require
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php'))
{
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Code that runs during the plugin activation
 */
function activate_advait()
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_advait');

/**
 * Code that runs during the plugin deactivation
 */
function deactivate_advait()
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_advait');

/**
 *Initialize all the core classes of plugin
 */
if (class_exists('Inc\\Init'))
{
    Inc\Init::register_services();
}
