<?php
/**
 * ZppController
 *
 * Basic PHP controller abstract object.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @link        https://www.sitepoint.com/the-mvc-pattern-and-php-1/
 * @package     zpp
 * @version     2019.12.11
 */

abstract class ZppController extends ZppObj
{
	protected $model;
	
	public function __construct( ZppModel $m )
	{
        parent::__construct( );

		$this -> model = $m;

		/*
		if (isset($_GET['action']) && !empty($_GET['action']) && method_exists($this, $_GET['action']))
		{
			$this->{$_GET['action']}();
		}
		*/
	}
}
