<?php
require 'db.php';
$sql = 'SELECT * FROM product';
$statement = $connection->prepare($sql);
$statement->execute();
$product = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>รับเข้าสินค้า</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>รหัสสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>จำนวนสินค้าคงเหลือ</th>
          <th>หน่วยนับ</th>
          <th>ราคาต้นทุนต่อหน่วย</th>
          <th>ราคาขายต่อหน่วย</th>
          <th>แก้ไข/ลบ</th>
        </tr>
        <?php foreach($product as $prd): ?>
          <tr>
            <td><?= $prd->id; ?></td>
            <td><?= $prd->name; ?></td>
            <td><?= $prd->qty; ?></td>
            <td><?= $prd->unit; ?></td>
            <td><?= $prd->cost_per_unit; ?></td>
            <td><?= $prd->salseprice_per_unit; ?></td>
            <td>
              <a href="edit.php?id=<?= $prd->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $prd->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
