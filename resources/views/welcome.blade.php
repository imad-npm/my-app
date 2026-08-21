<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ChatGPT') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="bg-[#343541] text-[#ECECF1] font-['Inter',sans-serif] antialiased h-full flex flex-col justify-between">

    <!-- Top Navigation Bar -->
    <header class="w-full px-6 py-4 flex justify-between items-center border-b border-gray-700/50">
        <div class="flex items-center gap-2 font-semibold text-lg text-white">
            <svg class="w-7 h-7 text-[#10a37f]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22.2819 9.8211a5.9847 5.9847 0 0 0-.5157-4.9108 6.0462 6.0462 0 0 0-6.5098-2.9 6.0651 6.0651 0 0 0-4.981-2.492 6.063 6.063 0 0 0-5.7013 3.921 6.0287 6.0287 0 0 0-3.928 2.78 6.053 6.053 0 0 0 .5209 6.843 5.9847 5.9847 0 0 0 .5157 4.9108 6.0462 6.0462 0 0 0 6.5098 2.9 6.0651 6.0651 0 0 0 4.981 2.492 6.063 6.063 0 0 0 5.7013-3.921 6.0287 6.0287 0 0 0 3.928-2.78 6.053 6.053 0 0 0-.5209-6.843zm-8.8687 11.4587a4.526 4.526 0 0 1-2.2222-.5812c.0886-.0488.24-.1318.3371-.1906l4.298-2.4812a.768.768 0 0 0 .3851-.6667v-5.9188l1.7702 1.022a.7475.7475 0 0 0 .3852.1028.7617.7617 0 0 0 .3851-.1028l4.4751-2.5857a4.5376 4.5376 0 0 1 .4527 3.9142 4.5678 4.5678 0 0 1-2.2882 2.7237l-4.1024 2.3683a4.5492 4.5492 0 0 1-3.7906.4063z"/>
            </svg>
            <span>{{ config('app.name', 'ChatGPT') }}</span>
        </div>

        @if (Route::has('login'))
            <nav class="flex gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md bg-[#10a37f] hover:bg-[#1a7f64] text-white text-sm font-medium transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-md bg-[#40414f] hover:bg-[#4d4d5f] text-white text-sm font-medium transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-[#10a37f] hover:bg-[#1a7f64] text-white text-sm font-medium transition">
                            Sign up
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Main Hero / Prompt Area -->
    <main class="max-w-3xl mx-auto w-full px-4 flex-1 flex flex-col justify-center items-center text-center py-12">
        <div class="mb-8 p-4 rounded-full bg-[#40414f]/50 border border-gray-600/30">
            <svg class="w-12 h-12 text-[#10a37f]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10 10 10 0 0 0 10-10A10 10 0 0 0 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
            </svg>
        </div>

        <h1 class="text-3xl sm:text-4xl font-bold text-white mb-3">What can I help with today?</h1>
        <p class="text-gray-400 text-sm sm:text-base max-w-md mb-8">
            Get started by logging in to chat, explore options, or run automated workflows.
        </p>

        <!-- Mock Prompt Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 w-full mb-8">
            <a href="{{ route('login') }}" class="p-4 rounded-xl bg-[#202123] border border-gray-700/60 hover:bg-[#2A2B32] text-left transition group">
                <p class="text-sm font-semibold text-white group-hover:text-[#10a37f]">Start a new conversation</p>
                <p class="text-xs text-gray-400 mt-1">Ask questions, brainstorm ideas, or process data.</p>
            </a>
            <a href="{{ route('login') }}" class="p-4 rounded-xl bg-[#202123] border border-gray-700/60 hover:bg-[#2A2B32] text-left transition group">
                <p class="text-sm font-semibold text-white group-hover:text-[#10a37f]">Explore Capabilities</p>
                <p class="text-xs text-gray-400 mt-1">Check out available tools and API integrations.</p>
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full text-center py-4 text-xs text-gray-500 border-t border-gray-800">
        <p>{{ config('app.name', 'ChatGPT') }} can make mistakes. Verify important information.</p>
    </footer>

</body>
</html>