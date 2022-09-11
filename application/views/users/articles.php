
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Article</title>
    <link href="<?= base_url('assets/css/style.css')?>stylesheet" rel="style.css">
</head>
<body>
    <h2>This is the users article page</h2>
    <!-- Accessing the flasdata key here  -->
    <?php if($abhi = $this->session->flashdata('Login Failed')){?> 
        <h2 style="color:red;"><?= $abhi ?></h2>
        <?php  }?> 
        
        <!-- The above line the html form tag with its argument is the action path -->
    <?php echo form_open('users/abhi')?> 

    <!-- The above line render the html input tag with the argument is the associtive array with the key is the attrubute and the value is the its value -->
    <!-- Added the set_value function in the value key -->
    <?php echo form_input(['class'=>'form-input','placeholder'=>'Enter the Name','name'=>'username','value'=>set_value('username')])?> 
    <?php echo form_password(['class'=>'form-input','placeholder'=>'Enter the Password','name'=>'password'])?> 

    <?php echo form_submit(['class'=>'submit','value'=>'Submit'])?>

    <?php echo form_reset(['class'=>'reset','value'=>'Reset'])?>
    
    <?php echo form_close()?> 
    <?php 
    // echo validation_errors();
    // You can show the erros with the first parameter is the name of the input you want to show the error and second is the style the error with the delimeters
    // echo form_error('username','<div style="color:red;">','</div>');

    echo form_error('username');
    echo form_error('password');
    
    ?>
</body>
</html>
