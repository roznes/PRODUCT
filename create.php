<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['qty']) && isset($_POST['unit']) && isset($_POST['cost_per_unit']) && isset($_POST['salseprice_per_unit']) ) {
  $name = $_POST['name'];
  $qty = $_POST['qty'];
  $unit = $_POST['unit'];
  $cost_per_unit = $_POST['cost_per_unit'];
  $salseprice_per_unit = $_POST['salseprice_per_unit'];
  $sql = 'INSERT INTO product(name, qty, unit, cost_per_unit, salseprice_per_unit) VALUES(:name, :qty, :unit, :cost_per_unit, :salseprice_per_unit)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([
    ':name' => $name, 
    ':qty' => $qty,
    ':unit' => $unit,
    ':cost_per_unit' => $cost_per_unit,
    ':salseprice_per_unit' => $salseprice_per_unit
    ])) {
    $message = 'data inserted successfully';
  }
}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a product</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="Name">ชื่อสินค้า</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="qty">จำนวนสินค้าคงเหลือ</label>
          <input type="number" name="qty" id="qty" class="form-control">
        </div>
        <div class="form-group">
          <label for="unit">หน่วยนับ</label>
          <input type="text" name="unit" id="unit" class="form-control">
        </div>
        <div class="form-group">
          <label for="cost_per_unit">ราคาต้นทุนต่อหน่วย</label>
          <input type="number" name="cost_per_unit" id="cost_per_unit" class="form-control">
        </div>
        <div class="form-group">
          <label for="salseprice_per_unit">ราคาขายต่อหน่วย</label>
          <input type="number" name="salseprice_per_unit" id="salseprice_per_unit" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
