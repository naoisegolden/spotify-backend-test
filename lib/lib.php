<?php
// this is the model
class lib {

    protected function root() {
        return dirname(__FILE__);
    }

    /**
     * Renders the view.
     */
    protected function render($file_name, $variables_array = null) {
        if($variables_array)
            extract($variables_array);  

        require($this->root() . '/../views/' . $file_name . '.php');
    }
    
    
    /**
     * Inits the database
     */
    protected function init() {	
    }
    
    /**
     * Checks in the db if there is a registry with this date
     */
    protected function dateIsStored($mysqldate) {
    	return false;	
    }
    
    /**
     * Returns an array with the table for the given date
     */
    protected function retrieveFromDate($mysqldate) {
    	// check if is memcached
    	// if not, retrieve from DB and cache
    	// if yes, return cached data
    }
    
    
    /**
     * Stores in the database a new registry with the given date
     */
    protected function storeWithDate($mysqldate) {
    }
}

?>