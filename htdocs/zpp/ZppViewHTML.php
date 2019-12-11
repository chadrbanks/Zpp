<?php
/**
 * ZppViewHTML
 *
 * Zpp HTML view object used to render HTML 5.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.09
 */

class ZppViewHTML extends ZppView
{
    protected $head_content;
    protected $body_content;

	function __construct( ZppControllerHTTP $uri_con, ZppModelEvent $event )
	{
		parent::__construct( $uri_con, $event );

		$this -> controller = $uri_con;
		$this -> model = $event;

        $this -> head_content = array( );
        $this -> body_content = array( );
	}

    public function render( $args = array() )
    {
        $this -> model -> fire( 'view_parsing_args', array( ) );

        if( is_array( $args ) && count( $args ) > 0 )
        {
            if( isset( $args['head'] ) && is_array( $args['head'] ) && count( $args['head'] ) > 0 )
            {
                foreach( $args['head'] as $arg )
                {
                    if( is_string( $arg ) )
                    {
                        $this -> head_content[ ] = $arg;
                    }
                }
            }
            if( isset( $args['body'] ) && is_array( $args['body'] ) && count( $args['body'] ) > 0 )
            {
                foreach( $args['body'] as $arg )
                {
                    if( is_string( $arg ) )
                    {
                        $this -> body_content[ ] = $arg;
                    }
                }
            }
        }

        $this -> model -> fire( 'view_rending', array( ) );

        $page_content = '<!doctype html><html lang="en"><head>';

        $this -> model -> fire( 'view_rending_head', array( ) );

        if( is_array( $this -> head_content ) && count( $this -> head_content ) > 0 )
        {
            foreach( $this -> head_content as $temp_content )
            {
                if( is_string( $temp_content ) )
                {
                    $page_content .= $temp_content;
                }
            }
        }

        $this -> model -> fire( 'view_rendered_head', array( ) );

        $page_content .= '</head><body>';

        $this -> model -> fire( 'view_rending_body', array( ) );

        if( is_array( $this -> body_content ) && count( $this -> body_content ) > 0 )
        {
            foreach( $this -> body_content as $temp_content )
            {
                if( is_string( $temp_content ) )
                {
                    $page_content .= $temp_content;
                }
            }
        }

        $this -> model -> fire( 'view_rendered_body', array( ) );

        $page_content .= '</body></html>';

        $this -> model -> fire( 'view_rendered', array( ) );

        echo $page_content;
    }
}