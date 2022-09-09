<?php

    class loginmodel extends CI_Model{
        // public function __construct(){
        //     parent::__construct();
        // }
        public function validate_user($username,$password){
             // Loading the database library 
            $this->load->database();

            $result = $this->db->where('username',$username)
            // where(['username'=>$username,'password'=>$password])
                                ->where('password',$password)
                            ->get('users');
            // echo "<pre>";
            // $result->row() returns first matching row in the database
            // print_r($result->row());
            // SQL_Query = SELECT * FROM 'users' WHERE 'username' = $username , 'password'= $password;

            if($result->num_rows()){
                // print_r($result->row()->id);
                // die;
                return $result->row()->id;
            }
            else{
                return false;
            }


            // Model is the core class so you can access the load method in the model
            // echo "this is the model";
            // $this->db->select('*');
            // $this->db->where('username',$username);
            // $this->db->from('users');
            // $result = $this->db->get();
            // print_r($result);
            // die;
        }
        
        public function getArticleList(){
            $this->load->library('session');
            $id = $this->session->userdata('id');
            $result = $this->db->select("article_title,article_body")
                                ->from('articles')
                                ->where('user_id',$id)
                                ->get();
                        print_r($result->result());
                        die;

        }
    }

?>