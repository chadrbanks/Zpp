<?php
/**
 * ZppModelImplementation
 *
 * Project specific implementation of a ZppModel, specifically the ZppModelEvent object.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.09
 */

class ZppModelImplementation extends ZppModelEvent
{
	function __construct( $l = 0 )
	{
        parent::__construct( $l );
	}
}