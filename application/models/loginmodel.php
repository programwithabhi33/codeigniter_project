<?php

    class loginmodel extends CI_Model{
        // public function __construct(){
        //     parent::__construct();
        // }
        public function validate_user($username,$password){
             // Loading the database library 
            $this->load->database();

            $result = $this->db->where('username',$username)
                                ->where('password',$password)
                            ->get('users');
            // echo "<pre>";
            // print_r($result);
            // SQL_Query = SELECT * FROM 'users' WHERE 'username' = $username , 'password'= $password;



            // Model is the core class so you can access the load method in the model
            // echo "this is the model";
            // $this->db->select('*');
            // $this->db->where('username',$username);
            // $this->db->from('users');
            // $result = $this->db->get();
            // print_r($result);
            // die;
        }
    }

?>