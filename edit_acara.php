<?php
session_start();
require 'functions/config/config.php';
include 'functions/admin/invitations/create_invitations.php';
echo htmlspecialchars($_COOKIE['id']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1877F2; /* Facebook blue */
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #e8e8e8;
        }

        .oval-container {
            background-color: black;
            color: white;
            width: 400px;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 150px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
        }

        .oval-container h1 {
            margin: 0;
            font-size: 24px;
        }

        .oval-container input {
            margin-top: 10px;
            padding: 10px;
            width: 80%;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .oval-container textarea {
            margin-top: 10px;
            padding: 10px;
            width: 80%;
            height: 60px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            resize: none;
        }

        .oval-container button {
            margin-top: 15px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: blue;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }

        .oval-container button:hover {
            background-color: grey;
        }

        .oval-container button svg {
            width: 16px;
            height: 16px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
    <button class="back-button" onclick="goBack()">Kembali</button>
    </form>
    <div class="oval-container">
        <h1>Menambahkan Acara</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="acara" placeholder="Masukkan nama acara">
            <input type="date" name="tanggal" placeholder="Pilih tanggal acara">
            <input type="text" name="lokasi" placeholder="Masukkan link lokasi acara">
            <input type="file" name="gambar" placeholder="Masukkan gambar acara">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah
            </button>
        </form>
    </div>
</body>
</html>
