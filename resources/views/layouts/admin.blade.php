<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white min-h-screen">

    <header class="bg-black p-4">
        <h1 class="text-xl">Admin Dashboard</h1>
    </header>

    <main class="p-6">
        {{ $slot }}
    </main>

</body>
</html>
