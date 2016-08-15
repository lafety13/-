<?php include_once ROOT . '/views/layout/header.php'; ?>  
  <div class="container">   
    <div class="starter-template">
      <form action="" method="post">
        <div class="form-group">
           <label class="control-label">Name</label>
           <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
           <label class="control-label">Phone number</label>
           <input type="text" name="phone_number" class="form-control">
          </div>
          <input type="submit" name="create_sub" class="btn btn-success">
        </form>
      </div>
    </div>
<?php include_once ROOT . '/views/layout/footer.php'; ?>  


