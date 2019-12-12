<?php
/**
 * ZppViewImplementation
 *
 * Project specific implementation of a ZppView, specifically the ZppViewHTML object.
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   MIT
 * @package     zpp
 * @version     2019.12.11
 */

class ZppViewImplementation extends ZppViewHTML
{

	function __construct( ZppControllerImplementation $uri_con, ZppModelImplementation $event )
	{
		parent::__construct( $uri_con, $event );

        $this -> controller = $uri_con;
        $this -> model = $event;

        // This is using the event system just as an example
        $this -> model -> listen( 'view_rending', $this, 'render_cover_page' );
	}

	function render_cover_page( $args = array() )
    {
        // This is where you would build the page....
		// Below is an example page using Bootstrap.
		
		// Here are some ways to add content to the head element
        $this -> addMeta( '<meta charset="utf-8">' );

		$head_tags = array
		(
			'<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">',
			'<meta name="description" content="">',
			'<meta name="author" content="">',
			'<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">',
			'<title>Cover Template for Bootstrap</title>',
			'<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">',
			'<!-- Bootstrap core CSS -->',
			'<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">',
		);
		$this -> addTagToHead( $head_tags );
		$this -> addTagToHead( '<!-- Custom styles for this template -->' );
		$this -> addTagToHead( '<style>' . $this -> parseTemplate( __DIR__ . DIRECTORY_SEPARATOR . 'cover.css' ) . '</style>' );


		// Here are some ways to add content to the body of the page
		$this -> addTagToBody( $this -> parseTemplate( __DIR__ . DIRECTORY_SEPARATOR . 'cover.php' ) );
		$this -> addTagToBody( '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>' );
		
		$body_tags = array
		(
			'<script>window.jQuery || document.write(\'<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>\')</script>',
			'<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>',
			'<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>',
		);
		$this -> addTagToBody( $body_tags );
	}
}