<x-auth-layout title="Register">
    <x-slot name="icon">
        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6
                0 3 3 0 0 1 6 0Z" />
        </svg>

    </x-slot>
    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
        Buat akun anda
    </h1>

    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}">
        @csrf
        <x-form-input name="name" label="Nama" required autofocus autocomplete="name"
            placeholder="Johnson"></x-form-input>
        <x-form-input name="username" label="Username" required autocomplete="username"
            placeholder="John cars"></x-form-input>
        <x-form-input name="email" label="Email" type="email" placeholder="name@company.com" required
            autocomplete="email" />
        <x-form-input name="password" label="Password" type="password" placeholder="••••••••" required
            autocomplete="new-password" />
        <x-form-input name="password_confirmation" label="Konfirmasi password" type="password" placeholder="••••••••"
            required autocomplete="new-password"></x-form-input>

        <button type="submit"
            class="w-full cursor-pointer text-white bg-slate-800 hover:bg-slate-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
           Mendaftar
        </button>

        <p class="text-sm font-light text-gray-500">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline">Masuk</a>
        </p>
    </form>
</x-auth-layout>
