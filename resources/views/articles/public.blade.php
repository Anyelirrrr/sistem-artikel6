<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Artikel</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#F5F1EC] min-h-screen flex flex-col">

<!-- HEADER -->
<header class="bg-[#6F4E37] text-white py-6 shadow">
    <div class="text-center">
        <h1 class="text-3xl font-bold flex justify-center items-center gap-2">
             Sistem Artikel
        </h1>
        <p class="text-sm mt-1">Artikel Ilmiah & Populer</p>
    </div>
</header>

<!-- CONTENT -->
<main class="flex-grow flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl w-full p-8">

        <!-- LOGIN PEMBACA -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center border-t-4 border-[#A67C52]">
            <h2 class="text-xl font-bold text-[#3E2723] mb-2">
                 Pembaca
            </h2>
            <p class="text-sm text-gray-600 mb-6">
                Login sebagai pembaca untuk membaca artikel
            </p>

            <a href="{{ route('login') }}"
               class="inline-block bg-[#A67C52] hover:bg-[#8c6844] text-white px-6 py-2 rounded-lg font-semibold">
                Login Pembaca
            </a>
        </div>

        <!-- LOGIN ADMIN -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center border-t-4 border-[#A67C52]">
            <h2 class="text-xl font-bold text-[#3E2723] mb-2">
                 Admin
            </h2>
            <p class="text-sm text-gray-600 mb-6">
                Login sebagai admin untuk mengelola artikel
            </p>

            <a href="{{ route('login') }}"
               class="inline-block bg-[#A67C52] hover:bg-[#8c6844] text-white px-6 py-2 rounded-lg font-semibold">
                Login Admin
            </a>
        </div>

    </div>
</main>

</body>
</html>
