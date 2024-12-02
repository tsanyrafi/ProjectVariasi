<nav class="bg-gradient-to-r from-gray-800 to-gray-700 text-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo atau Title -->
        <div class="text-white font-extrabold text-2xl tracking-widest hover:scale-105 transition duration-300">
            <a href="/index.php?modul=dashboard">
                <h1 class="text-lg font-semibold">Project PBO</h1>
            </a>
        </div>

        <!-- User Info dan Logout Button -->
        <div class="flex items-center space-x-6">
            <div class="bg-gray-700 bg-opacity-0 rounded-md px-4 py-2 flex items-center">
                <span class="mr-2 text-gray-200"><?php echo htmlspecialchars($_SESSION['username']); ?></span> <!-- Menampilkan username -->
                <span class="text-sm text-gray-300">(<?php echo htmlspecialchars($_SESSION['role']->namaPeran); ?>)</span> <!-- Menampilkan role -->
            </div>

            <div class="relative inline-block text-left">
                <div>
                    <button class="flex items-center text-gray-400 hover:text-white focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
                        <svg class="w-5 h-5 text-gray-400 hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
                        </svg>
                    </button>
                </div>
                <!-- Dropdown menu -->
                <div class="absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <div class="py-1" role="none">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Role: <?php echo htmlspecialchars($_SESSION['role']->namaPeran); ?></a>
                        <a href="#" onclick="confirmLogout()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    const dropdownButton = document.getElementById('options-menu');
    const dropdownMenu = document.querySelector('.absolute');

    // Tampilkan dropdown saat tombol diklik
    dropdownButton.onclick = function() {
        dropdownMenu.classList.toggle('hidden');
    };

    // Menyembunyikan dropdown ketika mouse keluar dari dropdown dan tombol
    document.addEventListener('click', function(event) {
        const isClickInside = dropdownButton.contains(event.target) || dropdownMenu.contains(event.target);
        if (!isClickInside) {
            dropdownMenu.classList.add('hidden');
        }
    });

    // Fungsi konfirmasi logout
    function confirmLogout() {
        if (confirm("Apakah Anda yakin ingin logout?")) {
            window.location.href = 'index.php?modul=login';
        }
    }
</script>