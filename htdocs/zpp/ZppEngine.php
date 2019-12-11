<?php
/**
 * ZppEngine 
 *
 * Main implementation.
 * 
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.09
 */

class ZppEngine extends ZppRoot
{
    function main( $args = array( ) )
    {
        /*
        // Example MVC implementation
        $model = new Model();
        $controller = new Controller($model);
        $view = new View($controller, $model);
        echo $view->render();
        */

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