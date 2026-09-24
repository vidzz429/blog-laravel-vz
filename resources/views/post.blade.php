    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>
        {{-- <article class="py-8 ">
            <h2 class="mb-3 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}
            </h2>
            <div>
                By
                <a href="/authors/{{ $post->author->username }}"
                    class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
                In <a href="/categories/{{ $post->category->slug }}"
                    class="hover:underline text-base text-gray-500">{{ $post->category->name }} </a>
                |
                {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ $post['body'] }}
            </p>
            <a href="/posts" class="font-medium text-blue-500 hover:underline ">&laquo; Back </a>
        </article> --}}
        <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-7xl ">
                <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue">
                    <header class="mb-4 lg:mb-6 not-format">
                        <a href="/posts"
                            class="inline-flex items-center text-m font-medium text-primary-600 hover:underline">
                            &larr; Back</a>
                        <address class="flex items-center my-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                                <x-avatar :name="$post->author->name" :img="$post->author->img" class="mr-4 w-14 h-14 rounded-full" />
                                <div>
                                    <a href="/posts?author={{ $post->author->username }}" rel="author"
                                        class="text-xl font-bold hover:underline text-gray-900">{{ $post->author->name }}</a>
                                    <a href="/posts?category={{ $post->category->slug }}" class="sef-start">
                                        <span
                                            class="bg-{{ $post->category->color }}-200 text-black text-xs font-medium flex w-fit items-center px-2.5 py-0.5 rounded">
                                            {{ $post->category->name }}
                                        </span>
                                    </a>
                                    <p class="text-sm mt-1 text-gray-500">
                                        {{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </address>
                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                            {{ $post->title }}</h1>
                    </header>
                    <p class=" whitespace-pre-line">{{ $post->body }}</p>
                </article>
            </div>
        </main>
    </x-layout>
