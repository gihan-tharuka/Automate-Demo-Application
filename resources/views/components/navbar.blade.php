<nav class="bg-white shadow sticky top-0 z-50" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="flex items-center gap-2">
            {{-- <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6"/></svg> --}}
            <span class="text-2xl font-bold tracking-wide text-blue-900">Padmasiri Auto Electricals</span>
        </a>
        <button class="md:hidden block text-blue-900 focus:outline-none" @click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
        <ul class="hidden md:flex space-x-8 font-medium">
            <li><a href="#" class="text-blue-900 hover:text-blue-600 transition">Home</a></li>
            <li><a href="#services" class="text-blue-900 hover:text-blue-600 transition">Services</a></li>
            <li><a href="#about" class="text-blue-900 hover:text-blue-600 transition">About</a></li>
            <li><a href="#contact" class="text-blue-900 hover:text-blue-600 transition">Contact</a></li>
        </ul>
        <div class="hidden md:flex items-center space-x-4">
            @auth
                <a href="{{ route('reviews.general.create') }}" class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold shadow hover:bg-yellow-600 transition flex items-center gap-1">
                    <span>⭐</span> Leave Review
                </a>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition">Log out</button>
                </form>
            @else
                <a href="/login" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition">Login</a>
                <a href="/register" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Register</a>
            @endauth

        </div>
    </div>
    <!-- Mobile Menu -->
    <div class="md:hidden" x-show="open" @click.away="open = false">
        <ul class="flex flex-col space-y-2 px-4 py-2 font-medium bg-white border-t">
            <li><a href="#" class="text-blue-900 hover:text-blue-600 transition">Home</a></li>
            <li><a href="#services" class="text-blue-900 hover:text-blue-600 transition">Services</a></li>
            <li><a href="#about" class="text-blue-900 hover:text-blue-600 transition">About</a></li>
            <li><a href="#contact" class="text-blue-900 hover:text-blue-600 transition">Contact</a></li>
        </ul>
        <div class="flex flex-col space-y-2 px-4 py-2 bg-white border-b">
            @auth
                <a href="{{ route('reviews.general.create') }}" class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold shadow hover:bg-yellow-600 transition flex items-center gap-1">
                    <span>⭐</span> Leave Review
                </a>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition w-full text-left">Log out</button>
                </form>
            @else
                <a href="/login" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition">Login</a>
                <a href="/register" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Register</a>
            @endauth

        </div>
    </div>
</nav>
