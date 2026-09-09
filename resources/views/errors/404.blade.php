<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found</title>

    <!-- tailwindcss cdn -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <!-- 顔の輪郭 -->
            <circle cx="100" cy="100" r="80" fill="#FFDAB9" stroke="#333" stroke-width="4" />

            <!-- 目（左） -->
            <circle cx="70" cy="80" r="10" fill="#333" />
            <!-- 目（右） -->
            <circle cx="130" cy="80" r="10" fill="#333" />

            <!-- 眉毛（困った形） -->
            <path d="M60 60 Q70 50 80 60" stroke="#333" stroke-width="4" fill="none" />
            <path d="M120 60 Q130 50 140 60" stroke="#333" stroke-width="4" fill="none" />

            <!-- 口（困った形） -->
            <path d="M70 130 Q100 110 130 130" stroke="#333" stroke-width="4" fill="none" />

            <!-- テキスト -->
            <text x="100" y="180" text-anchor="middle" font-family="sans-serif" font-size="16" fill="#666">Oh no! 404
                Not Found</text>
        </svg>

        <div>
            <div class="mb-4 text-center">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">404- Page Not Found</h1>
                <p class="text-lg text-gray-600 mb-4">URL有効期限が切れているか、対応していないようです。</p>
                <a href="{{ route('urls.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">短縮URLTOPへ</a>
            </div>
        </div>
    </div>

</body>

</html>
