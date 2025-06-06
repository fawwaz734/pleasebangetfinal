@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-lg shadow-xl">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Edit Produk
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Perbarui detail produk ini
            </p>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="name" class="sr-only">Nama Produk</label>
                    <input id="name" name="name" type="text" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Nama Produk" value="{{ old('name', $product->name) }}">
                </div>
            </div>

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="price" class="sr-only">Harga</label>
                    <input id="price" name="price" type="number" step="0.01" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Harga" value="{{ old('price', $product->price) }}">
                </div>
            </div>

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="stock" class="sr-only">Stok</label>
                    <input id="stock" name="stock" type="number" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Stok" value="{{ old('stock', $product->stock) }}">
                </div>
            </div>

            <div>
                <label for="description" class="sr-only">Deskripsi</label>
                <textarea id="description" name="description" rows="4" required
                          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                          placeholder="Deskripsi Produk">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-32 w-32 object-cover rounded-md shadow-sm border border-gray-200">
                @else
                    <p class="text-gray-500 italic text-sm">Tidak ada gambar saat ini.</p>
                @endif
            </div>

            <div>
                <label for="image-upload" class="block text-sm font-medium text-gray-700">
                    Unggah Gambar Baru (opsional)
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Pilih file</span>
                                <input id="image-upload" name="image" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">atau seret dan lepas</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF hingga 10MB
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">
                <button type="submit"
                        class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L9 9.586V4a1 1 0 011-1z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M5 15a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Perbarui Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Batal</a>
            </div>
        </form>

        @if($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-md">
            <h3 class="text-lg font-medium">Ada beberapa masalah dengan input Anda:</h3>
            <ul class="mt-2 text-sm list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection