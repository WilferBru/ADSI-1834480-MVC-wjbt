<center>
<div class="col-lg-6">
  <div class="p-5">
    <h1><i class="fas fa-user-circle"></i></h1>
      <div class="text-center">
         <h1 class="h4 text-gray-900 mb-4"><?=$button?></h1>
      </div>
      <form class="user" method="POST" action="index.php?c=<?=Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','crud')?>">
          <div class="form-group">
              <input type="text" class="form-control form-control-user" id="name" name="name" value="<?=$name?>"aria-describedby="emailHelp" placeholder="Nombre">
          </div>
          <div class="form-group">
              <input type="email" class="form-control form-control-user" id="email" name="email" value="<?=$email?>"  placeholder="Correo">
          </div>
          <div class="form-group">
              <label>Nivel</label>
              <select class="form-control" name="level" id="level">
                 <option <?=$select1?> value="1">Super usuario</option>
                 <option <?=$select2?> value="2">Administrador</option>
              </select>
          </div>
          <input type="hidden" name="id" value="<?=$id?>">
        <button type="submit" class="btn btn-primary btn-user btn-block">
            <?=$button?>
        </button>
       </form>
  </div>
</div>
</center>