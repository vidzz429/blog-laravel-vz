<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="/img/logo vz.png" alt="logo" class="size-9" />
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 e="request()->is('/')text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/posts" :active="request()->is('posts*')">Blog</x-nav-link>
                        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">


                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <button type="button" @click="isOpen = !isOpen"
                            class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <x-avatar :name="auth()->user()->name" :img="auth()->user()->img"
                                class="size-8 w-10 h-10 outline -outline-offset-1 outline-white/10"></x-avatar>
                        </button>

                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 ">
                            <a href="/profile"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Your
                                profile</a>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="block w-full cursor-pointer px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 focus:outline-hidden">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }"viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="isOpen" id="mobile-menu" class="block md:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/posts" :active="request()->is('posts*')">Blog</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
        </div>
        <div class="border-t border-white/10 pt-4 pb-3">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <x-avatar :name="auth()->user()->name" :img="auth()->user()->img"
                        class="size-8 w-10 h-10 outline -outline-offset-1 outline-white/10"></x-avatar>
                </div>
                <div class="ml-3">
                    <div class="text-base/5 font-medium text-white">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="text-sm font-medium text-gray-400">
                        {{ auth()->user()->email }}
                    </div>
                </div>

            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="/profile"
                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-white focus:outline-hidden">Your
                    profile</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="block w-full cursor-pointer px-4 py-2 text-left text-sm text-white hover:bg-white/5 hover:text-white focus:outline-hidden">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
