<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Body Mass Index</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="container max-w-2xl mx-auto mt-32 ">
            <div class="flex justify-between mb-5">
                <h1 class="text-2xl">Cek IMT Anda</h1>
                <div><a>Lihat data lain</a></div>
            </div>

             @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif

            <form action="{{ route('bmi.store') }}" method="post">
                @csrf
                <div class="flex mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex-1 pt-2">Nomor HP</label>
                    <input type="text" id="phone" name="phone" value="" class=" flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nomor HP" required />
                </div>

                <div class="flex mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex-1 pt-2">Nama</label>
                    <input type="text" id="name" name="name" value="" class=" flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required />
                </div>

                <div class="flex mb-5">
                    <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex-1 pt-2">Tinggi Badan</label>
                    <input type="number" id="height" name="height" value="" min=0 class=" flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tinggi Badan" required />
                </div>

                <div class="flex mb-5">
                    <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex-1 pt-2">Berat badan</label>
                    <input type="number" id="weight" name="weight" value="" min=0 class=" flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Berat badan" required />
                </div>

                @if(Session::has('result'))
                <p>Berat Badan Anda <b>{{ Session::get('result') }}</b></p>
                @endif

                <button type="submit" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </form>
        </div>
    </body>
</html>
