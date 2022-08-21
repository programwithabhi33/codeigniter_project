<?php
    class users extends my_controller {
        public function _construct(){
            // parent::_construct();
            echo "This is the users class constructor";
        }

        public function index(){
            // $this->_construct();
            echo "This is the index function of the user class";
            $this->load->helper('form');
            $this->load->view('users/articles');
        }
    }

?>