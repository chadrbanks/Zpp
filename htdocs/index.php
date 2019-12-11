<?php
/**
 * Index.php
 *
 * Example bootloader of a Zpp project.
 * 
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.10
 */

spl_autoload_register(function ($class_name) {
    $d = DIRECTORY_SEPARATOR;

    $file = __DIR__ . $d . "zpp" . $d . "$class_name.php";

    if( file_exists($file) )
    {
        @include ($file);
    }
    else
    {
        $module = __DIR__ . $d . "zpp" . $d . $class_name . $d . "$class_name.php";
        if( file_exists($module) )
            @include ($module);
    }
});

$zpp  = new ZppMain( );
$zpp -> main( );