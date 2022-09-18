<?php
include_once(APPPATH . 'core/AdminController.php');
class Users extends AdminController
{
    // // When you define this class constructor you have to call the ci_controller constructor to acces the super object 
    public function __construct(){
        parent::__construct();
        // echo "This is the users class constructor";


        // $this->load->library('pagination'); 
        // You can initialize the pagination using the pagination library it requires the url,per_page and total database rows then you can show the numbers on the view page using the $this->pagination->create_links() function
        // $config = [
        //     'base_url' => base_url('users/index'),
        //     'per_page' => 2,
        //     // 'total_rows' => $this->ar->num_rows(),
        //     'total_rows' => 18,
        //     'full_tag_open'=>"<ul class='pagination'>",
        //     'full_tag_close'=>"</ul>",
        //     'next_tag_open' =>"<li>",
        //     'next_tag_close' =>"</li>",
        //     'prev_tag_open' =>"<li>",
        //     'prev_tag_close' =>"</li>",
        //     'num_tag_open' =>"<li>",
        //     'num_tag_close' =>"<li>",
        //     'cur_tag_open' =>"<li class='active'><a>",
        //     'cur_tag_close' =>"</a></li>"
        // ];


        // $this->pagination->initialize($config);
    }

    public function index()
    {
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('loginmodel');
        // If the user already loged in and trying to access the login page it automatically redirect to the welcome function
        if ($this->session->userdata('id')) {
            redirect('users/welcome');
        }

        // You can initialize the pagination using the pagination library it requires the url,per_page and total database rows then you can show the numbers on the view page using the $this->pagination->create_links() function
        $config = [
            'base_url' => base_url('users/index'),
            'per_page' => 2,
            // 'total_rows' => $this->ar->num_rows(),
            'total_rows' => 18,
            'full_tag_open'=>"<ul class='pagination'>",
            'full_tag_close'=>"</ul>",
            'next_tag_open' =>"<li>",
            'next_tag_close' =>"</li>",
            'prev_tag_open' =>"<li>",
            'prev_tag_close' =>"</li>",
            'num_tag_open' =>"<li>",
            'num_tag_close' =>"<li>",
            'cur_tag_open' =>"<li class='active'><a>",
            'cur_tag_close' =>"</a></li>"
        ];


        $this->pagination->initialize($config);


        // $articles = $this->loginmodel->articleList($config['per_page'], $this->uri->segment(3));
        // $this->__construct();
        // print_r(base_url('abhishek'));
        // echo "This is the index function of the user class";
        $this->load->helper('form');
        $this->load->view('users/articles');
    }

    public function abhi()
    {
        $this->load->library('form_validation');

        // The first argument is the name field of the input tag you can target the field value and second argument is the conventional name for your understanding and third is the rules multiple rules added by the | symbol

        // $this->form_validation->set_rules('username','User Name','trim|required');
        // $this->form_validation->set_rules('password','Password','trim|required|max_length[12]|min_length[6]');

        // This is how you can add the style to the error messages and style it 
        $this->form_validation->set_error_delimiters('<div style = "color:red;">', '</div>');

        // The set_rules coming from the config folder and from form_validation file inside the config array
        if ($this->form_validation->run('set_rules')) {

            // echo "Form validate successful";

            // Here Getting the post values
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // echo "UserName is ".$uname." Password is ".$password;

            // Validating the user using the admin_login model validate_user function
            $this->load->model('loginmodel');
            $id = $this->loginmodel->validate_user($username, $password);
            if ($id) {
                // Storing the returning user id in the session variable
                $this->load->library('session');
                $this->session->set_userdata('id', $id);
                return redirect('Users/Welcome');
            } else {
                echo "Details Not Matched";
                // Key and value combination you can user this key to the view to display the message
                $this->load->library('session');
                $this->session->set_flashdata('Login Failed', 'Invalid Username Or Password');
                redirect('/users');
            }
        } else {
            // echo "abhi";
            $this->load->library('session');
            $this->load->view('users/articles');
        }
    }

    public function welcome()
    {
        $this->load->library('session');
        // If the user trying to access the articles without login it redirect to the index function
        if (!$this->session->userdata('id')) return redirect('users');
        $this->load->model('loginmodel');
        $articles = $this->loginmodel->getArticleList();
        $this->load->view('users/articleList', ['articles' => $articles]);
    }

    public function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('id');
        return redirect('users');
    }
}
