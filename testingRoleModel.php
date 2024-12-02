<?php
session_start();

require_once 'model/model_role.php';

$obj_role = new ModelRole();
$obj_role->addRole("Admin", "Untuk Admin", 0);
$obj_role->addRole("Kasir", "Untuk Kasir", 1);
$obj_role->addRole("Customer", "Untuk Customer", 1);

// testing 
echo "<br>" . "==TESTING DATA ROLE==" . "<br>";
foreach ($obj_role->getAllRoles() as $role) {
    echo "role ID : " . $role->idPeran . "<br>";
    echo "role Name : " . $role->namaPeran . "<br>";
    echo "role Description : " . $role->descPeran . "<br>";
    echo "role Status : " . $role->statusPekerjaan . "<br>";
    echo "<br><br>";
}

// update role
echo "<br>" . "==UPDATE DATA ROLE==" . "<br>";
$obj_role->updateRole(1, "update role", "role terupdate", 1);
foreach ($obj_role->getAllRoles() as $role) {
    echo "role ID : " . $role->idPeran . "<br>";
    echo "role Name : " . $role->namaPeran . "<br>";
    echo "role Description : " . $role->descPeran . "<br>";
    echo "role Status : " . $role->statusPekerjaan . "<br>";
    echo "<br><br>";
}

// Menghapus data role
echo "<br>" .  "==DELETE DATA ROLE==" . "<br>";
$obj_role->deleteRole(1);
$obj_role->deleteRole(2);
foreach ($obj_role->getAllRoles() as $role) {
    echo "role ID : " . $role->idPeran . "<br>";
    echo "role Name : " . $role->namaPeran . "<br>";
    echo "role Description : " . $role->descPeran . "<br>";
    echo "role Status : " . $role->statusPekerjaan . "<br>";
    echo "<br><br>";
}

session_destroy();
