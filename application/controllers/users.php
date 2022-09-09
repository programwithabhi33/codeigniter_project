<?php
    include_once(APPPATH.'core/AdminController.php');
    class Users extends MY_controller {
        // // When you define this class constructor you have to call the ci_controller constructor to acces the super object 
        // public function __construct(){
        //     parent::__construct();
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
            $this->load->library('form_validation','fv');

            // The first argument is the name field of the input tag you can target the field value and second argument is the conventional name for your understanding and third is the rules multiple rules added by the | symbol

            $this->form_validation->set_rules('username','User Name','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required|max_length[12]|min_length[6]');

            // This is how you can add the style to the error messages and style it 
            $this->form_validation->set_error_delimiters('<div style = "color:red;">','</div>');

            if($this->form_validation->run()){
                // echo "Form validate successful";

                // Here Getting the post values
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                // echo "UserName is ".$uname." Password is ".$password;

                // Validating the user using the admin_login model validate_user function
                $this->load->model('loginmodel');
                $id = $this->loginmodel->validate_user($username,$password);
                if($id){
                    // Storing the returning user id in the session variable
                    $this->load->library('session');
                    $this->session->set_userdata('id',$id);
                    return redirect('Users/Welcome');
                }
                else{
                    echo "Details Not Matched";
                }

            }
            else{
                $this->load->view('users/articles');
            }
                               

        }

        public function welcome(){
            $this->load->model('loginmodel');
            $articles = $this->loginmodel->getArticleList();
            $this->load->view('users/articleList',['articles'=>$articles]);
        }
    }

?>