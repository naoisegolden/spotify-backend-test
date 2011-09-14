<?php
// this is the controller
require('lib/lib.php');


class Application extends lib {

	/**
	 * Given a URL it parses a set of elements and returns them.
	 * @param String url The URL to parse
	 * @return array of variables
	 */ 
    private function _parse( $url = null ) {
    	if (!$url )
    		throw new Exception('No URL to parse was given.');
    }
    /**
	 * Main function, triggers all the logic and renders.
	 */
    public function run() {

        $var = '1st variable to use in a template';
        $var2 = '2nd variable to use in a template';
        $message = '';
        
        try {
    		_parse();
    	} catch (Exception $e) {
    		$message = $e->getMessage();
    	}

        $this->render('main', compact('var', 'var2', 'message'));
    }
    

}

$app = new Application();

$app->run();  

?>