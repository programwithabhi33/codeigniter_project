
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
    <!-- The above line the html form tag with its argument is the action path -->
    <?php echo form_open('users/index')?> 

    <!-- The above line render the html input tag with the argument is the associtive array with the key is the attrubute and the value is the its value -->
    <?php echo form_input(['class'=>'form-input','placeholder'=>'Enter the Name'])?> 
    <?php echo form_input(['class'=>'form-input','placeholder'=>'Enter the Email'])?> 
    <?php echo form_password(['class'=>'form-input','placeholder'=>'Enter the Password'])?> 

    <?php echo form_submit(['class'=>'submit','value'=>'Submit'])?>

    <?php echo form_reset(['class'=>'reset','value'=>'Reset'])?>
    
    <?php echo form_close()?> 
</body>
</html>
