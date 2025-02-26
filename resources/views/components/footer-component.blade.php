<footer class="w-full px-4 py-5 bg-gray-900 text-white">
    <div class="container mx-auto flex justify-between items-center text-sm">
        <p>All rights reserved. {{ date('Y') }} {{ config('app.name')}}</p>
        <nav class="flex gap-4">
            <a href="/privacy" class="hover:text-zinc-300 transition-colors">Privacy</a>
            <a href="/cookies" class="hover:text-zinc-300 transition-colors">Cookies</a>
            <a href="/terms" class="hover:text-zinc-300 transition-colors">Terms</a>
        </nav>
    </div>
</footer>
