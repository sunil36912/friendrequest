<?php
include('templates/header.php');
?>
<div class="container">
<div class="jumbotron mt-3">
    <h1 class="text-center text-success">Register Here</h1>      
    
  </div>



<?php echo form_open_multipart('RegisterController/register') ?>


<div class="mb-6">
    <label for="name" class="form-label">Name</label>
    
   <?php $data = array(
        'type'  => 'name',
        'name'  => 'name',
        'id'    => 'hiddenname',
        'value' => set_value('name') ,
        'class' => 'form-control'
);

echo form_input($data);?>
  <div class="mb-3">
    <label for="name" class="form-label">Email address</label>
    
   <?php $data = array(
        'type'  => 'email',
        'name'  => 'email',
        'id'    => 'hiddenemail',
        'value' => set_value('email') ,
        'class' => 'form-control'
);

echo form_input($data);?>
    <div id="emailHelp" class="form-text"><?php echo form_error('email'); ?></div>
  </div>
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Password</label>
  <?php $data = array(
        'type'  => 'password',
        'name'  => 'password',
        'id'    => '',
        'value' => set_value('password'),
        'class' => 'form-control'
);

echo form_input($data);?>
    
    <div id="emailHelp" class="form-text"><?php echo form_error('password'); ?></div> 
  </div>

 
  <div class="mb-3">
  <label for="file" class="form-label">Profile Pic</label>
  <?php $data = array(
        'type'  => 'file',
        'name'  => 'file',
        'id'    => '',
        
        'class' => 'form-control'
);

echo form_input($data);?>
  
    
    <div id="file" class="form-text"><?php echo form_error('file'); ?></div> 
  </div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Department</label>
    
   <?php $data = array(
        'type'  => 'text',
        'name'  => 'department',
        'id'    => 'hiddenname',
        'value' => set_value('department') ,
        'class' => 'form-control'
);

echo form_input($data);?>

<div id="file" class="form-text"><?php echo form_error('department'); ?></div> 
  </div>
  <div class="mb-3">
    <label for="about" class="form-label">About</label>
  <?php $data = array(
        'type'  => 'text',
        'name'  => 'about',
        'id'    => 'hiddenname',
        'value' => set_value('about') ,
        'class' => 'form-control'
);

echo form_input($data);?>

<div id="about" class="form-text"><?php echo form_error('about'); ?></div> 
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Hobbies</label>
    <div class="mb-3">
    <label for="name" class="form-label">Cricket</label>
    <?php
    echo form_checkbox('hobbies[]' , 'cricket', set_checkbox('hobbies', 'cricket'));
     ?>
   <div class="mb-3">
    <label for="name" class="form-label">Football</label>
    <?php
    echo form_checkbox('hobbies[]' , 'football', set_checkbox('hobbies', 'football'));
    ?>
     <div class="mb-3">
    <label for="name" class="form-label">Bedminton</label>
    <?php
    echo form_checkbox('hobbies[]' , 'bedminton', set_checkbox('hobbies', 'bedminton'));
    ?>
   
    <div class="mb-3">
   <label for="name" class="form-label">Hockey</label>
    <?php
    echo form_checkbox('hobbies[]' , 'hockey', set_checkbox('hobbies', 'hockey'));
    ?>
    <div id="hobbies" class="form-text"><?php echo form_error('hobbies[]'); ?></div> 
  </div>
  <?php $data = array(
        'type'  => 'submit',
        'name'  => 'submit',
        'id'    => '',
        'value' => 'Submit',
        'class' => 'btn btn-primary'
);

echo form_submit($data);?>
<?php $data = array(
        'type'  => 'reset',
        'name'  => 'reset',
        'id'    => '',
        'value' => 'Reset',
        'class' => 'btn btn-primary'
);

echo form_submit($data);?>
  
</form>
</div>

<?php
include('templates/footer.php');
?>
</body>
</html>