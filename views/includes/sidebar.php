<div class="bg-gradient-to-r from-gray-800 to-gray-700 text-white w-64 p-4 h-screen shadow-lg border-r border-gray-600">
    <div class="p-4 font-bold text-lg">Menu</div>
    <ul class="mt-4 space-y-2">
        <li class="group">
            <div class="px-4 py-2 cursor-pointer hover:bg-gray-600">
                <a href="/index.php?modul=role" class="focus:outline-none focus:bg-gray-600">Master Data Role</a>
            </div>
        </li>
        <li class="group">
            <div class="px-4 py-2 cursor-pointer hover:bg-gray-600">
                <a href="/index.php?modul=user" class="focus:outline-none focus:bg-gray-600">Master Data User</a>
            </div>
        </li>
        <li class="group">
            <div class="px-4 py-2 cursor-pointer hover:bg-gray-600">
                <a href="/index.php?modul=barang" class="focus:outline-none focus:bg-gray-600">Master Data Barang</a>
            </div>
        </li>
        <li class="group">
            <div class="px-4 py-2 cursor-pointer hover:bg-gray-600">Menu Transaksi</div>
            <ul class="ml-4 space-y-1 hidden group-hover:block transition-all duration-200">
                <li class="px-4 py-2 hover:bg-gray-600 cursor-pointer">
                    <a href="/index.php?modul=transaksi&fitur=add" class="focus:outline-none focus:bg-gray-600">Insert Transaksi</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-600 cursor-pointer">
                    <a href="/index.php?modul=transaksi" class="focus:outline-none focus:bg-gray-600">List Transaksi</a>
                </li>
            </ul>
        </li>
    </ul>
</div>