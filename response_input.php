<?php
require_once 'domain_object/node_role.php';
$obj_role = [];

// Membuat objek Role dengan objek Department
$department = new Department($_POST['role_department']);
$obj_role[] = new Role(1, $_POST['role_name'], $_POST['role_description'], $_POST['role_status'], $department);

include 'views/role_list.php';
