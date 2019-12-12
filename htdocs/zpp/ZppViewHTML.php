<?php
/**
 * ZppViewHTML
 *
 * Zpp HTML view object used to render HTML 5.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.10
 */

class ZppViewHTML extends ZppView
{
    private $buffers;

    private $head_content;
    private $body_content;
    private $head_script;
    private $body_script;
    private $meta_tags;

	function __construct( ZppControllerHTTP $uri_con, ZppModelEvent $event )
	{
		parent::__construct( $uri_con, $event );

		$this -> controller     = $uri_con;
		$this -> model          = $event;

        $this -> head_content   = '';
        $this -> body_content   = '';
        $this -> head_script    = '';
        $this -> body_script    = '';
        $this -> meta_tags      = '';
        $this -> buffers        = 0;
	}

    protected function addMeta( $meta )
    {
        if( is_array( $meta ) )
        {
            $m = '<meta ';
            foreach( $meta as $key => $str )
            {
                $m .= "$key=\"$str\" ";
            }
            $m .= '>';

            $this -> meta_tags .= $m;
        }
        else if( is_string( $meta ) )
        {
            $this -> meta_tags .= $meta;
        }
    }

    protected function addScriptToBody( $arg )
    {
        if( is_string( $arg ) )
        {
            $this -> body_script .= "<script src=\"$arg\" ></script>";
        }
        else if( is_array( $arg ) )
        {
            foreach( $arg as $str )
            {
                if( is_string( $str ) )
                {
                    $this -> body_script .= "<script src=\"$str\" ></script>";;
                }
            }
        }
    }

    protected function addScriptToHead( $arg )
    {
        if( is_string( $arg ) )
        {
            $this -> head_script .= "<script src=\"$arg\" ></script>";
        }
        else if( is_array( $arg ) )
        {
            foreach( $arg as $str )
            {
                if( is_string( $str ) )
                {
                    $this -> head_script .= "<script src=\"$str\" ></script>";
                }
            }
        }
    }

    protected function addTagToBody( $arg )
    {
        // is_valid_html instead of is_string?
        if( is_string( $arg ) )
        {
            $this -> body_content .= $arg;
        }
        else if( is_array( $arg ) )
        {
            foreach( $arg as $str )
            {
                if( is_string( $str ) )
                {
                    $this -> body_content .= $str;
                }
            }
        }
    }

    protected function addTagToHead( $arg )
    {
        // is_valid_html instead of is_string?
        if( is_string( $arg ) )
        {
            $this -> head_content .= $arg;
        }
        else if( is_array( $arg ) )
        {
            foreach( $arg as $str )
            {
                if( is_string( $str ) )
                {
                    $this -> head_content .= $str;
                }
            }
        }
    }

    protected function parseTemplate( $path = '' )
    {
        $content = false;

        if( is_string( $path ) )
        {
            if( file_exists( $path ) )
            {
                ob_start("parseTemplate_Buffer_" . $this -> buffers);
                @include( $path );
                $content = ob_get_contents();
                ob_clean();
            }
        }

        return $content;
    }

    public function render( )
    {
        $this -> model -> fire( 'view_rending', array( ) );

        $page_content = '<!doctype html><html lang="en"><head>';

        $this -> model -> fire( 'view_rending_head', array( ) );

        $page_content .= $this -> meta_tags;
        $page_content .= $this -> head_content;
        $page_content .= $this -> head_script;

        $this -> model -> fire( 'view_rendered_head', array( ) );

        $page_content .= '</head><body>';

        $this -> model -> fire( 'view_rending_body', array( ) );

        $page_content .= $this -> body_content;
        $page_content .= $this -> body_script;

        $this -> model -> fire( 'view_rendered_body', array( ) );

        $page_content .= '</body></html>';

        $this -> model -> fire( 'view_rendered', array( ) );

        ob_start( "render_final" );
        echo $page_content;
        ob_end_flush();
    }
}