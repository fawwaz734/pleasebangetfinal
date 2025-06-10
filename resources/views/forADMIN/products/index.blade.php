
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
    <a href="{{ route('forADMIN.products.create') }}" class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">Tambah Produk</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Gambar</th>
                <th class="py-2">Nama</th>
                <th class="py-2">Harga</th>
                <th class="py-2">Stok</th>
                <th class="py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="py-2">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-gray-400">Tidak ada gambar</span>
                    @endif
                </td>
                <td class="py-2">{{ $product->name }}</td>
                <td class="py-2">Rp{{ number_format($product->price) }}</td>
                <td class="py-2">{{ $product->stock ?? '-' }}</td>
                <td class="py-2">
                    <a href="{{ route('forADMIN.products.edit', $product->id) }}" class="text-yellow-600">Edit</a>
                    <form action="{{ route('forADMIN.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection