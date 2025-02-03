<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
        Forgot Password
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-b from-white to-blue-100">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-900 mb-8">
            Forgot Password
        </h2>
        <form class="space-y-6" method="POST">
            <?php if (!isset($_SESSION['forgot_password']) || $_SESSION['forgot_password'] == 1): ?>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="email">
                    Email
                </label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="email" type="email" name="email" required />
            </div>
            <?php elseif (isset($_SESSION['forgot_password']) && $_SESSION['forgot_password'] == 2): ?>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="new_password">
                    New Password
                </label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="new_password" type="password" name="new_password" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="confirm_password">
                    Confirm Password
                </label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="confirm_password" type="password" name="confirm_password" />
            </div>
            <?php endif ?>
            <div>
                <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" type="submit">
                    Submit
                </button>
            </div>
        </form>
        <form action="" method="POST">
        <div class="mt-6 text-center">
            <?php
            if (isset($_POST['sesi1'])) {
                header("Location: login.php");
                exit();
            } elseif (isset($_POST['sesi2'])) {
                $_SESSION['forgot_password'] = 1;
                header("Location: forgot-password.php");
                exit();
            }
            ?>
            <button type="submit" name="<?= (isset($_SESSION['forgot_password']) && $_SESSION['forgot_password'] == 2) ? "sesi2" : "sesi1" ?>" class="font-medium text-blue-600 hover:text-blue-500">
                Back to Sign In
            </button>
        </div>
        </form>
    </div>
</body>
</html>