<?php
require 'functions/config/config.php';
include 'functions/login/login.php';
?>
<html>
<head>
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gradient-to-b from-white to-blue-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-80">
        <h2 class="text-2xl font-bold text-center text-blue-900 mb-6">LOGIN</h2>
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block text-sm font-bold text-blue-900 mb-2" for="email">EMAIL</label>
                <input class="w-full px-3 py-2 border border-blue-900 rounded" type="email" id="email" name="email" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-blue-900 mb-2" for="password">PASSWORD</label>
                <input class="w-full px-3 py-2 border border-blue-900 rounded" type="password" id="password" name="password" required>
            </div>
            <div class="mb-6 flex items-center">
                <input class="mr-2" type="checkbox" id="remember" name="remember">
                <label class="text-sm text-blue-900" for="remember">Remember Me</label>
            </div>
            <div class="text-center">
                <button class="bg-blue-900 text-white font-bold py-2 px-4 rounded-full w-full" type="submit">LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>