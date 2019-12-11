<?php
/**
 * ZppControllerHTTP
 *
 * Controller for taking input from the Request_URI.
 * 
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.10
 */

class ZppControllerHTTP extends ZppController
{
	protected $base;
	protected $page = '';
	protected $parts;

	public function __construct( ZppModelEvent $event, $dirignore = 1, $base = null )
	{
		parent::__construct( $event );
		
		$pos = strpos( $_SERVER['REQUEST_URI'], 'favicon.ico' );
		if( $pos !== false )
		{
			exit(  );
		}
		unset( $pos );

		$p = explode( '/', $_SERVER['REQUEST_URI'] );

		for( $x = 0; $x < $dirignore; $x++ )
		{
			array_shift( $p );
		}

		foreach( $p as $tlc )
		{
			$this -> parts[] = strtolower( $tlc );
		}

		if( is_null( $base ) )
			$this -> base = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
		else
			$this -> base = $base;

		if( isset( $this -> parts[0] ) )
			$this -> page = $this -> parts[0];

		if( $this -> page == "" )
		{
			$this -> page = 'home';
		}
	}

	public function getBase( )
	{
		return $this -> base;
	}

	public function getPage( )
	{
		return $this -> page;
	}

	public function getPart( $p )
	{
		if( isset( $this -> parts[ $p ] ) )
			return $this -> parts[ $p ];
		else
			return false;
	}
}
