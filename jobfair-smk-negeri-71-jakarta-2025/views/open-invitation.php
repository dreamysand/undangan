<?php
$bulan_indonesia = [
    "January" => "Januari", "February" => "Februari", "March" => "Maret",
    "April" => "April", "May" => "Mei", "June" => "Juni",
    "July" => "Juli", "August" => "Agustus", "September" => "September",
    "October" => "Oktober", "November" => "November", "December" => "Desember"
];

// Array Nama Hari
$hari_indonesia = [
    "Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa",
    "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jumat",
    "Saturday" => "Sabtu"
];

// Ambil nama bulan & hari dalam bahasa Indonesia
$bulan = $bulan_indonesia[date("F", strtotime($acara['f_tanggal_acara']))];
$hari  = $hari_indonesia[date("l", strtotime($acara['f_tanggal_acara']))];
$tahun = date("Y", strtotime($acara['f_tanggal_acara']));
$tanggal = date("d", strtotime($acara['f_tanggal_acara']));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Job Fair</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 to-blue-300">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-[500px] text-center border border-gray-200">
        <h1 class="text-4xl font-bold text-gray-900">YOU ARE <span class="text-blue-600">INVITED!</span></h1>
        <div class="mt-6">
            <img src="asset/schoolview.jpg" alt="Job Fair" class="mx-auto rounded-xl shadow-md">
        </div>
        <h2 class="mt-6 text-2xl font-semibold text-blue-600">JOB FAIR 2025</h2>
        <p class="text-gray-700 text-lg">SMKN 71 Jakarta</p>
        <div class="mt-6 text-gray-600">Tanggal: <span class="font-medium"><?= "$hari, $tanggal $bulan $tahun"?></span></div>
        <form method="POST" action="" class="mt-6">
            <label for="unique_id" class="block text-gray-700 text-lg font-medium">Masukkan kode unik Anda:</label>
            <input type="text" id="unique_id" name="unique_id" class="mt-2 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-center text-lg" placeholder="Masukkan kode unik">
            <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition text-lg font-medium flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12H3m13.5 0l-4.5 4.5m4.5-4.5L12 7.5" />
                </svg>
                Open Invitation
            </button>
        </form>
        <p class="mt-4 text-red-500 text-lg">
        </p>
    </div>
</body>
</html>
