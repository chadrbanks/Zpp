<?php
/**
 * ZppModelEvent
 *
 * Event model implementation.
 * 
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.11
 */

class ZppModelEvent extends ZppModel
{
	private $evts = array( );
	private $logging = null;
    
    function __construct( $l = 0 )
    {
        parent::__construct( );

        $this -> logging = $l;
    }

    public function listen( $keyword, &$object, $function, $priority = 0 )
	{
		if( $this -> logging >= 1 )
		{
			echo '<pre>' . get_class($object) . '::' . $function . ' listening: ' . $keyword . '</pre>';
		}

		if( $priority == 0 )
		{
			$priority = rand( 100, 1000 );
		}

		while( isset( $this -> evts[$keyword][$priority] ) )
		{
			$priority++;
		}

		$this -> evts[$keyword][$priority] = array( 'obj' => $object, 'func' => $function );
	}

	public function fire( $keyword, $data = array() )
	{
		$r = array(  );

		if( $this -> logging >= 1 )
		{
			echo '<pre>fired: ' . $keyword . '</pre>';// . var_export( $o, true ) . '</pre>';
		}

		if( isset( $this -> evts[ $keyword ] ) )
		{
			foreach( $this -> evts[ $keyword ] as $e )
			{
				if( $this -> logging == 1 )
				{
					echo '<pre>executing: ' . get_class( $e[ 'obj' ] ) . ' -> ' . $e[ 'func' ] . '</pre>';
				}

				$r[ get_class( $e[ 'obj' ] ) . ' -> ' . $e[ 'func' ] ] = $e[ 'obj' ] -> { $e[ 'func' ] }( $data );
			}

			return $r;
		}

		return false;
	}
}