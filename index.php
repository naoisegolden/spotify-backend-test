<?php
// this is the controller
require('lib/lib.php');


class Application extends lib {

	/**
	 * Given a URL it parses a set of elements and returns them.
	 * @param String url The URL to parse
	 * @return matrix of data
	 */ 
    private function _parse( $url = null ) {
    	if (!$url )
    		throw new Exception('No URL to parse was given.');
    		
    	try {
	    	// start parsing
	    	libxml_use_internal_errors(TRUE);
			$dom = new DOMDocument;
			$dom->loadHTMLFile($url);
			libxml_clear_errors();
			// use XPath to find all nodes with a class attribute of header
			$xp = new DOMXpath($dom);
			$query = '//div[@id="main"]';
			$query = '//table/tr';
			$elements = $xp->query($query);
			
    	} catch (Exception $e) {
    		throw $e;
    	}
    	
    	// we need to grab: rank, rating, title, year and number_of_votes
		
		// grap what we have
		if (!is_null($elements)) {
		  	// loop the array
		  	$i = 0;
		  	$data = array();
		  	foreach ($elements as $element) {
		  		if($i>10) break; // we stop at 10
		  	  	if($i>0) { // first TR is header, off with his head!
		  	  				
				    $nodes = $element->childNodes;
				    $j = 0;
				    $list = array();
				    foreach ($nodes as $node) {
				      switch($j) {
				      	case 0:	// rank
				      		$list['rank'] = $node->nodeValue;
				      		break;
				      	case 1:	// rating
				      		$list['rating'] = $node->nodeValue;
				      		break;
				      	case 2:	// title + year
				      		$pieces = explode("(", $node->nodeValue);
				      		$list['title'] = $pieces[0];
				      		$list['year'] = str_replace(")","",$pieces[1]);
				      		break;
				      	case 3:	// number_of_votes
				      		$list['number_of_votes'] = $node->nodeValue;
				      		break;
				      }
				      $j++;
				    }
				    $data[] = $list;
		  	  	}
				$i++;
			}
		}

    	return $data;
    }
    /**
	 * Main function, triggers all the logic and renders.
	 */
    public function run($url = null) {

        $error = '';
        $message = '';
        $data = array();
        
        try {
    		$data = $this->_parse($url);
    	} catch (Exception $e) {
    		$error = $e->getMessage();
    	}

        $this->render('main', compact('var', 'var2', 'error', 'message', 'data'));
    }

}

$url = 'http://www.imdb.com/chart/top';

$app = new Application();
$app->run($url);  

?>