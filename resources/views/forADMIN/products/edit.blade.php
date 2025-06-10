
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>
    <form action="{{ route('forADMIN.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Harga</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Stok</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Deskripsi</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Gambar Produk</label>
            @if($product->image)
                <img src="{{ asset($product->image) }}" alt="Gambar Produk" class="w-24 h-24 object-cover mb-2">
            @endif
            <input type="file" name="image" class="w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('forADMIN.products.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection