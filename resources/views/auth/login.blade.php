<x-auth-layout title="Login">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-slot name="icon">
        <svg class="w-16 h-16 text-gray-800 dark:text-white mb-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M12 21a9 9 0 1
            0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987
                3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
    </x-slot>

    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
        Masuk ke akun Anda
    </h1>

    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
        @csrf

        <x-form-input name="email" label="Email" type="email" placeholder="name@company.com" required autofocus
            autocomplete="username" />

        <x-form-input name="password" label="Password" type="password" placeholder="••••••••" required
            autocomplete="current-password" />

        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" name="remember" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-500">Ingat saya</label>
                </div>
            </div>
            <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline">
                Lupa password?
            </a>
        </div>

        <button type="submit"
            class="w-full cursor-pointer text-white bg-slate-800 hover:bg-slate-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Masuk
        </button>

        <p class="text-sm font-light text-gray-500">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline">Daftar</a>
        </p>
    </form>
</x-auth-layout>
