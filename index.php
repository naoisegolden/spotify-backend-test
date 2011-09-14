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
		if (is_null($elements)) {
			throw new Exception('Nothing was parsed from '. $url);
		} else {
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
     * Stores the given data, only if this data is not already stored.
     * @param matrix data table of movies
     * @param string message info of what happened
     */
    private function _store($data = null) {
    	if (!$data )
    		throw new Exception('Nothing to store.');
    	
    	throw new Exception ("DB storing not available yet");
    		
    }
    /**
	 * Main function, triggers all the logic and renders.
	 */
    public function run($url = null) {

        $errors = array();
        $messages = array();
        $data = array();
        
        // poor man's chron: we parse when someone visits the page
    	$mysqldate = date( 'Y-m-d' ); // we use MySQL DATE to know if it's stored
    	if(!$this->dateIsStored($mysqldate)){
    		// date is not stored, proceed to parse and store
    		try {
    			$messages[] = "Proceeding to parse " . $url . ".";
	    		$data = $this->_parse($url);
	    		$messages[] = "Proceeding to store in db.";
	    		$messages[] = $this->_store($data);
	    	} catch (Exception $e) {
	    		$errors[] = $e->getMessage();
	    	}
    	} else {
    		// date is stored, nothing to store. move on.
    		$messages[] = "Today's chart is already stored.";
    	}
    	
        $this->render('main', compact('errors', 'messages', 'data'));
    }

}

$url = 'http://www.imdb.com/chart/top';

$app = new Application();
$app->run($url);  

?>