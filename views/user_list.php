<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama User</title>
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
            <!-- Your main content goes here -->
            <div class="container mx-auto">
                <!-- Button to Insert New User -->
                <div class="mb-4">
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md transition duration-200 mb-4">
                        <a href="views/user_input.php">Insert New User</a>
                    </button>
                </div>
                <!-- Users Table -->
                <div class="bg-white shadow-md rounded my-6 overflow-hidden">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gradient-to-r from-gray-800 to-gray-700 text-white">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">User ID</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Username</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php if (!empty($users)) {
                                foreach ($users as $user) { ?>
                                    <tr class="text-center border-b border-gray-300 transition duration-200 ease-in-out hover:bg-gray-200">
                                        <td class="py-3 px-4 text-blue-600">
                                            <?php echo htmlspecialchars($user->user_id); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->user_nama); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->user_username); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->role->namaPeran); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <button class="bg-green-200 hover:bg-green-300 text-green-700 font-semibold py-1 px-3 rounded-md transition duration-200">
                                                <a href="index.php?modul=user&fitur=edit&id=<?php echo htmlspecialchars($user->user_id); ?>">
                                                    Update
                                                </a>
                                            </button>
                                            <button class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-1 px-3 rounded-md transition duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus peran ini?');">
                                                <a href="index.php?modul=user&fitur=delete&id=<?php echo htmlspecialchars($user->user_id); ?>">
                                                    Delete
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="py-3 px-4 text-center">Tidak ada data pengguna tersedia.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>



</html>