<?php 
include_once('include/config.php');
include_once('include/head.php');
include_once('include/menyu.php');

 ?>

<?php 
if (isset($_POST['registerbtn'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $parol = md5($_POST['password']);
    $sorov = "INSERT INTO `register` VALUES(null, '".$username."','".$email."','".$parol."')" or die($baza->error);
    $baza->query($sorov);
}
 ?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Foydalanuvchi_qo`shish
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foydalanuvchi qo`shish</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form action="" method="post">
        
      <div class="modal-body">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter username" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="registerbtn">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table width="100%">
    <thead>
      <tr>
        <th>id</th><th>Foydalanuvchi nomi</th><th>Elektron pochta</th><th>Parol</th><th colspan="2">Amal</th>
      </tr>
    </thead>  
    <tbody>
      <?php
        $sql = "SELECT * FROM `register`";
        $result = $baza->query($sql) or die($baza->error);
        while($row = $result->fetch_object()): 
      ?>
      <tr>
        <td><?=$row->id?></td>
        <td><?=$row->username?></td>
        <td><?=$row->email?></td>
        <td><?=$row->password?></td>
        <td>

         <form action="code.php" method="post">
           <input type="hidden" name="edit_id" value="<?php echo $row->id; ?>">
           <button name="edit_btn" type="submit" class="btn btn-success">Tahrirlash</button>
         </form>
  <!-- <a href="edit.php?id=<?=$row->id?>">Tahrirlash</a>
          <a href="delete.php?id=<?=$row->id?>">O`chirish</a> -->
        </td>
        <td>
        
 <form action="userdelete.php" method="post">
           <input type="text" name="delete_id" value="<?php echo $row->id; ?>">
        <button name="delete_btn" type="submit" class="btn btn-danger">O`chirish</button>
        </form>         
        </td>
      </tr>
<?php endwhile; ?>
    </tbody>
  </table>
    </div>
  </div>
</div>

<?php 

include_once('include/footer.php');
include_once('include/script.php');

 ?>