<?php
/**
 * ZppControllerImplementation
 *
 * Project specific implementation of a ZppController, specifically the ZppControllerHTTP object.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.09
 */

class ZppControllerImplementation extends ZppControllerHTTP
{
    public function __construct( ZppModelImplementation $m )
    {
        parent::__construct( $m, 1, null );
        
        /*
		if (isset($_GET['action']) && !empty($_GET['action']) && method_exists($this, $_GET['action']))
		{
			$this->{$_GET['action']}();
		}
		*/

        // This class is where you would process controller actions....
    }
}
