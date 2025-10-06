<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-900 via-gray-900 to-gray-800 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white/10 backdrop-blur-md p-10 rounded-2xl shadow-2xl border border-gray-700">
        <div class="flex flex-col items-center mb-6">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo" class="w-16 h-16 mb-2 drop-shadow-lg">
            <h2 class="text-3xl font-extrabold text-white tracking-tight mb-1">Welcome Back</h2>
            <p class="text-gray-300 text-sm">Sign in to your account</p>
        </div>
        <?php if (!empty($error)): ?>
            <div class="bg-red-600/90 text-white p-2 rounded mb-4 text-center shadow"> <?=htmlspecialchars($error)?> </div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('auth/login') ?>" class="space-y-4">
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-200">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-200">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none" />
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-500 hover:to-blue-400 px-4 py-2 rounded-lg font-bold text-white shadow-lg transition">Sign In</button>
        </form>
        <div class="mt-6 text-center text-sm text-gray-300">
            Don't have an account?
            <a href="<?= site_url('auth/register') ?>" class="text-indigo-400 hover:underline font-semibold">Create one</a>
        </div>
    </div>
</body>
</html>