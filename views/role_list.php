<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
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
        <div class="flex-1 p-8 text-gray-700">
            <!-- Konten utama -->
            <div class="container mx-auto">
                <!-- Tombol untuk menambah peran baru -->
                <div class="mb-4">
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md transition duration-200 mb-4">
                        <a href="views/role_input.php">Tambah Role Baru</a>
                    </button>
                </div>

                <!-- Tabel Daftar Peran -->
                <div class="bg-white shadow-md rounded my-6 overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gradient-to-r from-gray-800 to-gray-700 text-white">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">ID Role</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Nama Role</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Deskripsi Role</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Status Role</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <!-- Baris Data Dinamis -->
                            <?php foreach ($roles as $role) : ?>
                                <tr class="text-center border-b border-gray-300 transition duration-200 ease-in-out hover:bg-gray-200">
                                    <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->idPeran); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($role->namaPeran); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($role->descPeran); ?></td>
                                    <td class="py-3 px-4">
                                        <?php if ($role->statusPekerjaan == 1) : ?>
                                            <span class="text-green-600">✔ Aktif</span>
                                        <?php else : ?>
                                            <span class="text-red-600">✘ Tidak Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4">
                                        <!-- Tombol Update -->
                                        <button class="bg-green-200 hover:bg-green-300 text-green-700 font-semibold py-1 px-3 rounded-md transition duration-200">
                                            <a href="index.php?modul=role&fitur=edit&id=<?php echo $role->idPeran; ?>" class="block">Update</a>
                                        </button>
                                        <!-- Tombol Delete -->
                                        <button class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-1 px-3 rounded-md transition duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus peran ini?');">
                                            <a href="index.php?modul=role&fitur=delete&id=<?php echo $role->idPeran; ?>" class="block">Delete</a>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>