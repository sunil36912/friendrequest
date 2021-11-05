<?php
include('templates/header.php');
?>

<div class="container">
  <div class="row">
  <?php
   
   foreach ($data->result() as $row)  
   {  

     ?>
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
         <div class=" align-items-center">
         
         <img class="img-fluid img-thumbnail" src="<?php echo base_url('uploads/files/'.$row->profile_pic); ?>" />
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0"><?php echo $row->name;?></h5>
              <p class="card-text text-uppercase text-muted"><?php echo $row->about;?></p>
              <p class="card-text">
              <input type="hidden" id="base" value="<?php echo base_url(); ?>">
                <input type="hidden" id="friend_id<?php echo $row->id;?>" value="<?php echo $row->user_two;?>" />
                <input type="hidden" id="user_id<?php echo $row->id;?>" value="<?php echo $this->session->userdata('id');?>" />
              
              <?php echo $row->email;?>
              </p>
            </div>
          </div>
          <button id="<?php echo $row->id;?>" class="tile-link btn btn-danger send" >Remove Friend</button>
          <a class="btn btn-info" href="<?php echo base_url('/index.php/UserController/getFriends/'.$row->user_two) ?>"> View MY Friends</a>
          
        </div>
      </div>
    </div>
    <?php
 }

  ?>
    
  </div>
  <?php
include('templates/footer.php');
?>
  <script type="text/javascript">

$("button").click(function(){
  alert(this.id);

 var id=this.id;
//  user_id=$('#user_id'+id).val();
  friend_id=$('#friend_id'+id).val();




  var base_url = $('#base').val();
 


  



    $.ajax({

       url: base_url+'index.php/UserController/getFriends',

       type: 'POST',

       data: { friend_id: friend_id},

       error: function() {

          alert('Something is wrong');

       },

       success: function(data) {

          

            alert("Request Send successfully"+data);  

       }

    }); 
 
  });
</script>
</body>
</html>