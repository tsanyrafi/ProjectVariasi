<?php
require_once 'model/composition_model.php';

echo "=== TESTING COMPOSITION MODEL ===<br>";

$roleModel = new RoleModel();

$roleModel->tambahRole("Supervisor", "Mengawasi tim", 1, "Produksi");
$roleModel->tambahRole("Manajer HR", "Mengelola SDM", 0, "HR");

echo "<strong>Daftar Role:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}

//Update role
echo "==update data role==" . "<br>";
$roleModel->updateRole(1, "update role", "role terupdate", 1, "admin");
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}

//Hapus role
$roleModel->hapusRole(1);
echo "<br><strong>Setelah Role Dihapus:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoPeran();
}
