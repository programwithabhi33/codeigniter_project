<?php
    class users extends my_controller {
        // When you define this class constructor you have to call the ci_controller constructor to acces the super object 
        // public function __construct(){
        //     // parent::__construct();
        //     // echo "This is the users class constructor";
        // }

        public function index(){
           
            // $this->__construct();
            // print_r(base_url('abhishek'));
            echo "This is the index function of the user class";
            $this->load->helper('form');
            $this->load->view('users/articles');
        }

        public function abhi(){
            $this->load->library('form_validation');

            // The first argument is the name field of the input tag you can target the field value and second argument is the conventional name for your understanding and third is the rules multiple rules added by the | symbol

            $this->form_validation->set_rules('username','User Name','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');

            if($this->form_validation->run()){
                echo "Form validate successful";
            }
            else{
                echo "Form validate failed";
            }
          

        }
    }

?>