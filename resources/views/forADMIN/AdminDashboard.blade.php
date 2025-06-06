@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-3xl font-extrabold text-gray-800">Daftar Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center">
            + Tambah Produk Baru
        </a>
    </div>

    <form method="GET" action="{{ route('admin.products.index') }}" class="mb-8 p-4 bg-white rounded-lg shadow-sm flex flex-col sm:flex-row gap-4 items-center">
        <div class="flex-grow w-full sm:w-auto">
            <label for="search-input" class="sr-only">Cari produk...</label>
            <input type="text" id="search-input" name="search" placeholder="Cari berdasarkan nama produk..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out"
                   value="{{ request('search') }}">
        </div>

        <div class="w-full sm:w-auto">
            <label for="filter-select" class="sr-only">Filter stok</label>
            <select id="filter-select" name="filter"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                <option value="">Semua Stok</option>
                <option value="low-stock" @selected(request('filter') == 'low-stock')>Stok Rendah ( &lt;= 5 )</option>
            </select>
        </div>

        <button type="submit"
                class="w-full sm:w-auto px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            Filter
        </button>
        <a href="{{ route('admin.products.index') }}"
           class="w-full sm:w-auto px-5 py-2 bg-gray-300 text-gray-800 font-medium rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition duration-150 ease-in-out text-center">
            Reset
        </a>
    </form>

    @if($products->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <p class="text-gray-600 text-lg">Tidak ada produk ditemukan dengan kriteria tersebut.</p>
            <a href="{{ route('admin.products.create') }}" class="mt-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Tambahkan Produk Pertama Anda?</a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    <div class="relative h-48 w-full bg-gray-200 flex items-center justify-center overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover h-full w-full">
                        @else
                            <svg class="h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                        <p class="text-lg font-bold text-gray-700 mb-2">Rp{{ number_format($product->price) }}</p>
                        <p class="text-sm text-gray-600">Stok:
                            <span class="{{ $product->stock <= 5 ? 'font-bold text-red-600' : 'text-gray-800' }}">
                                {{ $product->stock }}
                            </span>
                        </p>
                    </div>
                    <div class="px-5 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                           Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection