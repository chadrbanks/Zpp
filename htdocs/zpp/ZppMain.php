<?php
/**
 * ZppMain
 *
 * Main implementation.
 * 
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.10
 */

class ZppMain extends ZppRoot
{
    function main( $args = array( ) )
    {
        // Model
        $model = new ZppModelImplementation(  );

        // Controller
        $controller = new ZppControllerImplementation( $model );

        // View
        //$view = new ZppViewVue( $controller, $model );
        //$view = new ZppViewAngular( $controller, $model );
        //$view = new ZppViewBootstrap( $controller, $model );
        $view = new ZppViewImplementation( $controller, $model );
        $view -> render( );
    }
}