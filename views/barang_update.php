<!DOCTYPE html>
<html lang="en">

<?php
require_once 'model/barang_model.php';
$barang_id = $_GET['id'];
$obj_modelBarang = new modelBarang();
$barang = $obj_modelBarang->getBarangById($barang_id);
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
    <!--    <link href="./Views/output.css" rel="stylesheet">-->
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
            <!-- Formulir Input Role -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Barang</h2>
                <form action="index.php?modul=barang&fitur=update&id=<?php echo $barang->barang_id; ?>" method="POST">

                    <!-- Nama Barang -->
                    <div class="mb-4">
                        <label for="barang_nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                        <input type="text" id="barang_nama" name="barang_nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="<?php echo htmlspecialchars($barang->barang_nama); ?>" required>
                    </div>

                    <!-- Stok Barang -->
                    <div class="mb-4">
                        <label for="barang_nama" class="block text-gray-700 text-sm font-bold mb-2">Stok Barang:</label>
                        <input type="text" id="barang_stok" name="barang_stok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="<?php echo htmlspecialchars($barang->barang_stok); ?>" required>
                    </div>

                    <!-- Harga Barang -->
                    <div class="mb-4">
                        <label for="barang_nama" class="block text-gray-700 text-sm font-bold mb-2">Harga Barang:</label>
                        <input type="text" id="barang_harga" name="barang_harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="<?php echo htmlspecialchars($barang->barang_harga); ?>" required>
                    </div>


                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>