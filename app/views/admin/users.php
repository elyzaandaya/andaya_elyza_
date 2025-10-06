<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-900 via-blue-900 to-gray-900 min-h-screen p-10 text-white">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center gap-3 mb-8">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo" class="w-10 h-10 drop-shadow">
            <h1 class="text-3xl font-extrabold text-white drop-shadow-lg tracking-tight">Admin - Users</h1>
        </div>
        <div class="bg-white/10 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <?php $page_q = isset($_GET['page']) ? '?page='.(int)$_GET['page'] : ''; ?>
                <?php if (isset($_GET['q']) && $_GET['q'] !== '') { $page_q = '?q=' . urlencode($_GET['q']) . (isset($_GET['page']) ? '&page='.(int)$_GET['page'] : ''); } ?>
                <a href="<?= site_url('') . $page_q ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded text-sm font-semibold">
                    <i class="fa-solid fa-arrow-left"></i> Back to Users
                </a>
                <div></div>
            </div>
            <table class="w-full text-left bg-white/5 rounded-xl overflow-hidden shadow-lg">
                <thead>
                    <tr class="text-sm text-gray-300 bg-white/10">
                        <th class="p-3">ID</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Role</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-200">
                    <?php foreach ($users as $u): ?>
                        <tr class="border-t border-gray-700 hover:bg-white/10 transition">
                            <td class="p-3"><?= $u['id'] ?></td>
                            <td class="p-3"><?= htmlspecialchars($u['email']) ?></td>
                            <td class="p-3"><?= htmlspecialchars(($u['fname'] ?? '') . ' ' . ($u['lname'] ?? '')) ?></td>
                            <td class="p-3">
                                <span class="inline-block px-2 py-1 rounded text-xs font-bold
                                    <?= (isset($u['role']) && $u['role'] === 'admin') ? 'bg-indigo-600 text-white' : 'bg-gray-700 text-gray-200' ?>">
                                    <?= htmlspecialchars($u['role'] ?? 'user') ?>
                                </span>
                            </td>
                            <td class="p-3">
                                <form method="post" action="<?= site_url('admin/set_role/'.$u['id']) ?><?= isset($_GET['page']) ? '?page='.(int)$_GET['page'] : '' ?>">
                                    <select name="role" class="bg-gray-700 text-white px-2 py-1 rounded">
                                        <option value="user" <?= (isset($u['role']) && $u['role'] === 'user') ? 'selected' : '' ?>>User</option>
                                        <option value="admin" <?= (isset($u['role']) && $u['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                    <button type="submit" class="ml-2 bg-indigo-600 px-3 py-1 rounded font-semibold">Save</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-6">
                <?= $pagination_html ?? '' ?>
            </div>
        </div>
    </div>
</body>
</html>