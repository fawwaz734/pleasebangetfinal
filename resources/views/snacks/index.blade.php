@extends('layouts.app')

@section('content')
<main class="container mt-8">
    <section class="hero-section text-center mb-10">
        <h1 class="text-3xl font-bold text-pink-600 mb-4">🍭 Semua Snack 🍬</h1>
        <p class="text-gray-600">Temukan snack favoritmu di sini!</p>
    </section>

    <section class="featured-products">
        <div class="flex flex-wrap justify-center gap-6">
            @forelse($snacks as $snack)
                <div class="w-64 bg-white border border-pink-100 rounded-xl overflow-hidden shadow hover:shadow-lg transition-shadow duration-300">
                    <div class="relative bg-gray-100 flex items-center justify-center h-40">
                        @if($snack->image)
                            <img src="{{ asset($snack->image) }}" alt="{{ $snack->name }}" class="h-28 object-contain transition-transform duration-300 hover:scale-105">
                        @else
                            <div class="text-gray-400 text-sm">Tidak ada gambar</div>
                        @endif
                        <span class="absolute top-2 right-2 bg-pink-500 text-white text-xs px-2 py-1 rounded-full shadow">
                            Snack
                        </span>
                    </div>
                    <div class="p-4 flex flex-col h-full">
                        <h3 class="text-sm font-semibold text-pink-700 truncate">{{ $snack->name }}</h3>
                        <p class="text-xs text-gray-500 mb-2 truncate">{{ $snack->description }}</p>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-pink-600 font-bold text-sm">Rp{{ number_format($snack->price, 0, ',', '.') }}</span>
                            <span class="text-[10px] font-medium px-2 py-1 rounded-full {{ $snack->stock <= 5 ? 'bg-red-100 text-red-500' : 'bg-green-100 text-green-700' }}">
                                Stok: {{ $snack->stock }}
                            </span>
                        </div>
                        <button class="mt-3 w-full bg-pink-500 hover:bg-pink-600 text-white text-sm py-1.5 rounded-lg font-semibold transition-colors duration-200">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            @empty
                <p class="w-full text-center text-gray-500">Belum ada snack tersedia.</p>
            @endforelse
        </div>
    </section>
</main>
@endsection
