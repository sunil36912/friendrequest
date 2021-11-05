<?php
include('templates/header.php');
?>
<div class="container">

<div class="jumbotron mt-3">
    <h1 class="text-center text-success">Login Here</h1>      
    
  </div>
  



  

<?php echo form_open('UserController/login') ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    
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