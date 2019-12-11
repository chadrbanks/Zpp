<?php
/**
 * Index.php
 *
 * Example bootloader index of a Zpp web project.
 * 
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.09
 */

spl_autoload_register(function ($class_name) {
    include __DIR__ . DIRECTORY_SEPARATOR . "zpp" . DIRECTORY_SEPARATOR . "$class_name.php";
});

$zpp  = new ZppMain( );
$zpp -> main( );