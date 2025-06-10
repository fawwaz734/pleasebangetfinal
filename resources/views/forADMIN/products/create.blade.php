@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-lg shadow-xl">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Tambah Produk Baru
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Isi detail produk di bawah ini
            </p>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('forADMIN.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="name" class="sr-only">Nama Produk</label>
                    <input id="name" name="name" type="text" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Nama Produk">
                </div>
            </div>

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="price" class="sr-only">Harga</label>
                    <input id="price" name="price" type="number" step="0.01" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Harga">
                </div>
            </div>

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="stock" class="sr-only">Stok</label>
                    <input id="stock" name="stock" type="number" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Stok">
                </div>
            </div>

            <div>
                <label for="description" class="sr-only">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                          placeholder="Deskripsi Produk"></textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">
                    Gambar Produk
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Unggah file</span>
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

            <!-- Tombol Submit yang Lebih Terlihat -->
            <div>
                <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-6 border border-transparent text-base font-semibold rounded-lg text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition duration-300 ease-in-out shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-300">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-white group-hover:text-gray-200" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd" />
                        </svg>
                    </span> 
                    Tambahkan Produk  <class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    
            
                </button>
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