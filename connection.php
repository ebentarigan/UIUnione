<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connections"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil semua user
$sql = "SELECT id_pengguna, username FROM user WHERE role = 'users'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Connections</title>
</head>
<body class="bg-gray-100 font-bold">
    <!-- Navbar -->
    <div class="bg-black text-white sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-2">
            <div class="flex space-x-8">
                <a href="#" class="hover:text-gray-300">Home</a>
                <a href="#" class="hover:text-gray-300">Jobs</a>
                <a href="#" class="hover:text-gray-300">Course</a>
                <a href="#" class="hover:text-gray-300">Connection</a>
                <a href="#" class="hover:text-gray-300">Community</a>
                <input type="text" placeholder="Search..." class="px-20 py-1 rounded bg-white text-black focus:outline-none" />
                <a href="#" class="hover:text-gray-300">Newspaper</a>
                <a href="#" class="hover:text-gray-300">Help</a>
                <a href="#" class="hover:text-gray-300">Profile</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto p-6 grid grid-cols-3 gap-3">
        <!-- Add More Connections Section -->
        <section class="col-span-2 bg-white p-3 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Add More Connections</h2>
            <div class="space-y-6 overflow-auto h-34 border box-border p-3">
                <?php
                if ($result->num_rows > 0) {
                    // Loop melalui data user
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <img src="default-profile.jpg" alt="User Image" class="w-10 h-10 rounded-full">
                                <span class="text-gray-700">' . htmlspecialchars($row["username"]) . '</span>
                            </div>
                            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Add Connection
                            </button>
                        </div>';
                    }
                } else {
                    echo '<p class="text-gray-500">No users available to connect.</p>';
                }
                ?>
            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Popular People to Follow</h2>
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="default-profile.jpg" alt="User Image" class="w-10 h-10 rounded-full">
                        <div>
                            <span class="text-gray-700 block font-medium">Example User</span>
                            <span class="text-gray-500 text-sm">Sample Description</span>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                        Follow
                    </button>
                </div>
            </div>
        </aside>
    </main>

    <!-- Footer -->
    <footer class="bg-white p-4 mt-8 text-center text-gray-600">
        <div class="container mx-auto space-y-2">
            <div class="space-x-4">
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Accessibility</a>
                <a href="#" class="hover:underline">Help Center</a>
                <a href="#" class="hover:underline">Privacy & Terms</a>
                <a href="#" class="hover:underline">Ad Choices</a>
            </div>
            <div class="space-x-4">
                <a href="#" class="hover:underline">Business Services</a>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
