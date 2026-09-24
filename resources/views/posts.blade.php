    <x-layout>
        <x-slot:title>
            <span class="inline-flex mx-2 gap-3">
                <svg class="w-6 h-6 text-gray-800 my-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30"
                    height="30" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4">
                </svg>
                {{ $title }}
            </span>
        </x-slot:title>
        <div class="py-4 px-4 mx-auto max-w-7xl lg:px-6">
            <!-- Tombol Tambah Artikel Baru -->
            <div class="mb-3 flex justify-end">
                <a href="/posts/create"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary-700 hover:bg-primary-800 rounded-lg focus:ring-4 focus:ring-primary-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Artikel Baru
                </a>
            </div>

            <div class="mx-auto max-w-3xl sm:text-center">
                <form {{-- action="/posts" method="GET" --}}>
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900">Search</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input
                                class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Search article" type="search" id="search" name="search"
                                autocomplete="off">
                        </div>
                        <div>
                            <button type="submit"
                                class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{ $posts->links() }}
        {{-- <section class="bg-white"> --}}
        <div class="py-4 px-4 mx-auto max-w-7xl lg:py-4 lg:px-0">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($posts as $post)
                    {{-- <article class="py-8 border-b border-gray-300">
                <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                    <h2 class="mb-3 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}
                    </h2>
                </a>
                <div>
                    By
                    <a href="/authors/{{ $post->author->username }}"
                        class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
                    In <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-base text-gray-500">{{ $post->category->name }} </a>
                    |
                    {{ $post->created_at->diffForHumans() }}
                </div>
                <p class="my-4 font-light">
                    {{ Str::limit($post['body'], 100) }}
                </p>
                <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline ">Read more
                    &raquo;</a>
            </article> --}}


                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
                        <div
                            class="flex flex-col xl:flex-row  xl:justify-between xl:items-center gap-2 mb-5 text-gray-500">
                            <a href="/posts?category={{ $post->category->slug }}" class="sef-start">
                                <span
                                    class="bg-{{ $post->category->color }}-200 text-black text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                                    {{ $post->category->name }}
                                </span>
                            </a>
                            <span class="text-sm xl:text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight hover:underline text-gray-900">
                            <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                        </h2>
                        <p class="mb-5 font-light text-gray-500">{{ Str::limit($post->body, 150) }}
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-3">
                                <x-avatar :name="$post->author->name" :img="$post->author->img" class="w-8 h-8 shrink-0 rounded-full" />
                                <a href="/posts?author={{ $post->author->username }}"
                                    class="inline-flex items-center font-medium hover:underline">
                                    <span class="font-medium text-sm">
                                        {{ $post->author->name }}
                                    </span>
                                </a>
                            </div>
                            <a href="/posts/{{ $post->slug }}"
                                class="inline-flex items-center text-sm font-medium text-primary-600 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="flex flex-col col-span-full items-center justify-center text-center py-12">
                        @if (request('search') || request('category') || request('author'))
                            <svg class="w-16 h-16 text-gray-300 mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <p class="text-lg font-medium text-gray-900 mb-1">Article Not Found</p>
                            <p class="text-sm  text-gray-500 mb-3">Tidak ada hasil untuk<span class="font-medium">
                                    {{ request('search') }}</span></p>
                            <a href="/posts"
                                class="inline-flex items-center text-m font-medium text-primary-600 hover:underline mb-3">
                                &larr; Back To Post
                            </a>
                        @else
                            <svg class="w-16 h-16 text-gray-300 mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                            </svg>
                            <p class="text-lg font-medium text-gray-900 mb-1">Belum ada artikel</p>
                            <p class="text-sm text-gray-500 mb-3">Yuk mulai tulis artikel pertamamu</p>
                            <a href="/posts/create"
                                class="inline-flex items-center text-m font-medium text-primary-600 hover:underline mb-3">
                                + Buat Artikel Baru
                            </a>
                            @endif
                    </div>
                @endforelse
            </div>
        </div>
        {{ $posts->links() }}
        {{-- </section> --}}
    </x-layout>
