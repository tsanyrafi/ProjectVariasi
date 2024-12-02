<?php

require_once 'model/model_role.php';
$idPeran = $_GET['id'];

$objectRole = new ModelRole();

$role = $objectRole->getRoleById($idPeran);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Form Edit Peran -->
            <div class="container mx-auto">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="text-2xl mb-6 text-gray-700">Edit Role</h2>

                    <!-- Form -->
                    <form action="index.php?modul=role&fitur=update&id=<?php echo $role->idPeran; ?>" method="POST">
                        <!-- Input Nama Peran -->
                        <div class="mb-4">
                            <label for="role_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Role:</label>
                            <input type="text" id="role_name" name="role_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                value="<?php echo htmlspecialchars($role->namaPeran); ?>" required>
                        </div>

                        <!-- Input Deskripsi Peran -->
                        <div class="mb-4">
                            <label for="role_description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Role:</label>
                            <textarea id="role_description" name="role_description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4" required><?php echo htmlspecialchars($role->descPeran); ?></textarea>
                        </div>

                        <!-- Checkbox Status Peran (Aktif/Tidak Aktif) -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status Role:</label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="role_status" class="form-checkbox h-5 w-5 text-indigo-600" <?php echo $role->statusPekerjaan == 1 ? 'checked' : ''; ?>>
                                <span class="ml-2 text-gray-700">Aktif</span>
                            </label>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Simpan Perubahan
                            </button>
                            <a href="index.php?modul=role" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>