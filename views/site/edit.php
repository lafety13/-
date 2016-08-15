<?php include_once ROOT . '/views/layout/header.php'; ?>  
  <div class="container">   
    <div class="starter-template">
      <form action="" method="post" name="edit_form" id="edit_form" >
        <div class="form-group">
          <div class="form-group">
           <label class="control-label">ID</label>
           <input type="text" name="id" class="form-control" value="<?=$phonebook->id;?>" disabled = "disabled">
          </div>
           <label class="control-label">Name</label>
           <input type="text" name="name" class="form-control" value="<?=$phonebook->name;?>">
          </div>
          <div class="form-group">
           <label class="control-label">Phone number</label>
           <input type="text" name="phone_number" class="form-control" value="<?=$phonebook->phone_number;?>">
          </div>
          <input type="submit" name="edit_sub" class="btn btn-success" value="Edit">
        </form>
      </div>
    </div>
<?php include_once ROOT . '/views/layout/footer.php'; ?>  


