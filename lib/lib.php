<?php
// this is the model
class lib {

    protected function root() {
        return dirname(__FILE__);
    }

    protected function render($file_name, $variables_array = null) {
        if($variables_array)
            extract($variables_array);  

        require($this->root() . '/../views/' . $file_name . '.php');
    }
}

?>