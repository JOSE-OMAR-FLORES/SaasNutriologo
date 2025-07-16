<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 min-h-screen">

    <header class="bg-green-600 text-white p-4">
        <h1 class="text-xl">Plan Profesional</h1>
    </header>

    <main class="p-6">
        {{ $slot }}
    </main>

</body>
</html>
