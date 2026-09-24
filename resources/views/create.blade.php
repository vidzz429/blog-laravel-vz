<x-layout>
    <div class="max-w-3xl mx-auto p-6">
        <!-- Tambahkan slot title di bagian paling atas -->
        <x-slot:title>
            Buat Artikel Baru
        </x-slot:title>

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Judul -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 mt-1 text-sm focus:ring-primary-500 focus:border-primary-500">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category_id" id="category_id" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 mt-1 text-sm focus:ring-primary-500 focus:border-primary-500">
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Isi Artikel -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
                <textarea name="body" id="body" rows="6" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 mt-1 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-1 whitespace-pre-line">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-slate-800 text-white font-semibold px-4 py-2.5 rounded-lg text-sm hover:bg-slate-900">
                Simpan Artikel
            </button>
        </form>
    </div>
</x-layout>
