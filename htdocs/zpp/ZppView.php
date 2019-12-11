<?php
/**
 * ZppView
 *
 * Basic PHP view abstract object.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @link        https://www.sitepoint.com/the-mvc-pattern-and-php-1/
 * @package     zpp
 * @version     2019.12.11
 */

abstract class ZppView extends ZppObj
{
    protected $controller;
    protected $model;

    function __construct( ZppController $c, ZppModel $m )
    {
        parent::__construct( );

        $this -> controller = $c;
        $this -> model = $m;
    }

    abstract public function render( );
}