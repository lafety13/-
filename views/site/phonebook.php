<?php include_once ROOT . '/views/layout/header.php'; ?>  
  <div class="container">   

    <table class="table">
      <thead>
      <tr>
        <td>
        <form action="/phonebook/create" method="post">
          <input type="submit" name="add" value="Add a new entry" class="btn btn-success">
        </form>
        </td>
        <td></td>
        
        <td style="text-align:right" colspan="2">
          <form action="/phonebook/search" method="post" class="form-inline" onsubmit="return checkSearch()">
            <div class="form-group">
            <label class="sr-only">Search</label>
            <input type="text" id="search" name="search" class="form-control" placeholder="Search">
            </div>
            <input type="submit" id="search_sub" name="search_sub" class="btn btn-success" value="Find">
          </form>
        </td>
        <td></td>
      </tr>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone number</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if ($phonebook): ?>
          <?php foreach ($phonebook->data as $value): ?>
            <tr>
              <td><?=htmlspecialchars($value->id);?></td>
              <td><?=htmlspecialchars($value->name);?></td>
              <td><?=htmlspecialchars($value->phone_number);?></td>
              <td>
                <a href="/phonebook/edit/<?=$value->id;?>">Edit</a> | <a href="/phonebook/delete/<?=$value->id;?>">Delete</a>
              </td>
            </tr>
          <?php endforeach;?>
        <?php endif;?>
      </tbody>
    </table>
  </div>
<?php include_once ROOT . '/views/layout/footer.php'; ?>  