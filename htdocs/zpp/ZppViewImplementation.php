<?php
/**
 * ZppViewImplementation
 *
 * Project specific implementation of a ZppView, specifically the ZppViewHTML object.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.09
 */

class ZppViewImplementation extends ZppViewHTML
{

	function __construct( ZppControllerImplementation $uri_con, ZppModelImplementation $event )
	{
		parent::__construct( $uri_con, $event );

        $this -> controller = $uri_con;
        $this -> model = $event;

        // This is using the event system just as an example
        $this -> model -> listen( 'view_parsing_args', $this, 'content' );
	}

	function content( $args = array() )
    {
        // This is where you would build the page....
        $this -> head_content[ ] ='<title>Better Page Title</title>';
        $this -> body_content[ ] ='<h1>Better Page Title</h1>';
    }
}