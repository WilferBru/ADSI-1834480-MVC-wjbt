<script>
    function Confirmdelete(){
      var respuesta = confirm('¿Estas seguro de que quieres eliminar este usuario?');
      if (respuesta == true){
          return true;
      }else{
        return false;
      }
    }
</script>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Usuarios <a href="index.php?c=<?= Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','edit')?>" class="btn btn-primary"> Crearnuevo user<i class="fas fa-user-plus"></i></a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Rol</th>
                      <th>Activo</th>
                      <th>Ultima Sesión</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Rol</th>
                      <th>Activo</th>
                      <th>Ultima Sesión</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($rows as $row):?>
                    <tr>
                      <td><?=$row->name?></td>
                      <td><?=$row->email?></td>
                      <td><?=$row->level?></td>
                      <td><?=$row->active?></td>
                      <td><?=$row->lastAccess?></td>
                      <td>
                        <a href="index.php?c=<?=Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','edit')?>&id=<?=Database::encryptor('encrypt',$row->id)?>" class="btn btn-success btn-circle"><i class="fas fa-user-edit"></i></a>

                        <a href="index.php?c=<?=Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','delete')?>&id=<?=Database::encryptor('encrypt',$row->id)?>" onclick='return Confirmdelete()' class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>

                        <a href="index.php?c=<?=Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','download')?>&id=<?=Database::encryptor('encrypt',$row->id)?>" class="btn btn-primary btn-circle"><i class="fas fa-cloud"></i></a>

                        <a href="index.php?c=<?=Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','viewDoc')?>&id=<?=Database::encryptor('encrypt',$row->id)?>" class="btn btn-warning btn-circle"><i class="fas fa-folder-open"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
