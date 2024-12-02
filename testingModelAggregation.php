<?php
require_once 'model/aggregation_model.php';

echo "=== TESTING AGGREGATION MODEL ===<br>";


$departemenKeuangan = new Department("Keuangan");


$roleModel = new RoleModel();


$roleModel->tambahRole(1, "Kasir", "Mengelola transaksi", "Aktif", $departemenKeuangan);
$roleModel->tambahRole(2, "Manajer", "Mengawasi operasional", "Aktif", $departemenKeuangan);


echo "<strong>Daftar Role:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}

// update role
echo "==update data role==" . "<br>";
$roleModel->updateRole(1, "update role", "role terupdate", 1, $departemenKeuangan);
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}

$roleModel->hapusRole(1);
echo "<br><strong>Setelah Role Dihapus:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}
