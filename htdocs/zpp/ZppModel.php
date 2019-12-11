<?php
/**
 * ZppModel
 *
 * Basic PHP model abstract object.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @link        https://www.sitepoint.com/the-mvc-pattern-and-php-1/
 * @package     zpp
 * @version     2019.12.11
 */

abstract class ZppModel extends ZppObj
{
	function __construct( )
	{
        parent::__construct( );
	}
}