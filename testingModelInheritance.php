<?php
require_once 'model/inheritance_model.php';

echo "=== TESTING INHERITANCE MODEL ===<br>";


$roleModel = new RoleModel();



$roleModel->tambahRole("Teknisi", "Memperbaiki peralatan", 1, "Budi");
$roleModel->tambahRole("Admin IT", "Mengelola sistem", 0, "Siti");


echo "<strong>Daftar Role:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}


// update role
echo "==update data role==" . "<br>";
$roleModel->updateRole(1, "update role", "role terupdate", 1, "update");
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}



$roleModel->hapusRole(1);
echo "<br><strong>Setelah Role Dihapus:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}
