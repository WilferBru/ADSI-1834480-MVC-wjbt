 <?php

    if (isset($_REQUEST['m'])) {
       $msg = Database::encryptor('decrypt',$_REQUEST['m']);
       if ($_REQUEST['e'] == 0) {
       	  $alert = 'alert-danger';
       } else 

       if($_REQUEST['e'] == 1){
       	  $alert = 'alert-success';
       }else{
       	  $alert = 'alert-primary';
       }
       
       ?>  

<div class="alert <?=$alert?> alert-dismissible fade show" id="alert" role="alert">
   <center><?=$msg?></center>
   <!-- <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button> -->
</div>

<?php
}

?>


