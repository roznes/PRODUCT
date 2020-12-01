<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['qty']) ) {
  $name = $_POST['name'];
  $qty = $_POST['qty'];
  $unit = $_POST['unit'];
  $cost_per_unit = $_POST['cost_per_unit'];
  $salseprice_per_unit = $_POST['salseprice_per_unit'];
  $sql = 'UPDATE product SET name=:name, qty=:qty, unit=:unit, cost_per_unit=:cost_per_unit, salseprice_per_unit=:salseprice_per_unit WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':qty' => $qty, ':unit' => $unit, ':cost_per_unit' => $cost_per_unit, ':salseprice_per_unit' => $salseprice_per_unit, ':id' => $id])) {
    header("Location: /ZzZ/Product");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Product</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">names</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="qty">qty</label>
          <input type="number" value="<?= $person->qty; ?>" name="qty" id="qty" class="form-control">
        </div>
        <div class="form-group">
          <label for="unit">unit</label>
          <input type="text" value="<?= $person->unit; ?>" name="unit" id="unit" class="form-control">
        </div>
        <div class="form-group">
          <label for="cost_per_unit">cost_per_unit</label>
          <input type="number" value="<?= $person->cost_per_unit; ?>" name="cost_per_unit" id="cost_per_unit" class="form-control">
        </div>
        <div class="form-group">
          <label for="salseprice_per_unit">salseprice_per_unit</label>
          <input type="number" value="<?= $person->salseprice_per_unit; ?>" name="salseprice_per_unit" id="salseprice_per_unit" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
