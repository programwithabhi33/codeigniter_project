<?php
    class users extends my_controller {
        // When you define this class constructor you have to call the ci_controller constructor to acces the super object 
        // public function __construct(){
        //     // parent::__construct();
        //     // echo "This is the users class constructor";
        // }

        public function index(){
           
            $this->__construct();
            echo "This is the index function of the user class";
            $this->load->helper('form');
            $this->load->view('users/articles');
        }

        // public function abhi(){
             // $this->load->library('cart');
            // print_r($this->cart);
        //     echo 'this is the abhi function inside the users controller';
        // //   $abhi =  $this->cart->insert(["name"=>'abhishek']);
        //   print_r($this->cart);

        // }
    }

?>