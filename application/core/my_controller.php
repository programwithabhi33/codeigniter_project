<?php
    class MY_Controller extends CI_Controller {
        // public function __construct() {
        //     parent::__construct();
        //    echo "This is the my_controller class constructor<br>";
        // }
        // public function toThing(){
        //     echo "This is the toThing function under the my_controller";
        // }
    }

    class New_Controller extends MY_Controller {
        public function __construct() {
            parent::__construct();
           echo "This is the my_controller class constructor<br>";
        }
        // public function toThing(){
        //     echo "This is the toThing function under the my_controller";
        // }
    }

?>