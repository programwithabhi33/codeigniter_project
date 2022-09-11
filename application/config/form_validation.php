<?php

$config = [
    'set_rules'=>[
        [
            'field'=>'username',
            'label'=>'User Name Config',
            'rules'=>'trim|required'
        ],
        [
            'field'=>'password',
            'label'=>'Password Config',
            'rules'=>'trim|required|max_length[12]|min_length[6]'
        ]
    ]
        ];


?>


