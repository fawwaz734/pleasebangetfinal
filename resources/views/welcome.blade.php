<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Shop</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <style>
       
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .top-bar {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-bar a {
            color: white;
            margin-left: 15px;
            text-decoration: none;
        }
        header {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .logo a {
            font-size: 1.5em;
            color: #ff6b6b;
            text-decoration: none;
            font-weight: bold;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 25px;
            width: 300px;
            margin-right: 10px;
        }
        .search-bar button {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
        }
        .navigation ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: center;
        }
        .navigation ul li {
            display: inline;
            margin: 0 15px;
        }
        .navigation ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .hero-section {
            background: linear-gradient(135deg, #fceabb, #f8b8d4);
            padding: 60px 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .hero-section h1 {
            font-size: 2.5em;
            color: #e44d26;
            margin-bottom: 10px;
        }
        .hero-section p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 20px;
        }
        .hero-section button {
            background-color: #e44d26;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .hero-section button:hover {
            background-color: #d1421e;
        }
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .category-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 15px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }
        .category-item:hover {
            transform: scale(1.05);
        }
        .category-item img {
            max-width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        .category-item a {
            text-decoration: none;
            color: #333;
        }
        .featured-products h2, .popular-categories h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .product-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .product-card h3 {
            color: #333;
            margin-bottom: 5px;
        }
        .product-card p {
            color: #777;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        .product-card button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .product-card button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="top-bar">
        <div class="container mx-auto flex justify-end items-center">
            <div>
                <a href="#">Help</a>
                <a href="{{ route('dashboard') }}'">Account</a>
                <a href="#">Basket</a>
                <a href="{{ route('login') }}">Login</a> 
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </div>

    <header>
        <div class="container mx-auto flex justify-between items-center">
            <div class="logo">
                <a href="/">Sweet Shop</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Cari permen favoritmu" class="rounded-full px-4 py-2 w-64">
                <button type="submit">Cari</button>
            </div>
        </div>
        <nav class="navigation">
            <div class="container mx-auto">
                <ul class="flex space-x-4 justify-center">
                    <li><a href="#">Permen</a></li>
                     <
                    <li><a href="#">Makanan Ringan</a></li>
                    <li><a href="#">Berdasarkan Merek</a></li>
                    <li><a href="#">Berdasarkan Warna</a></li>
                    <li><a href="#">Berdasarkan Rasa</a></li>
                    <li><a href="#">Sesuai Acara</a></li>
                   
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mt-8">
        <section class="hero-section">
            <h1>Jual Permen & Snack Online</h1>
            
            <button>Lihat Semua Snack</button>
        </section>

        <section class="py-8 popular-categories">
            <h2>Kategori Populer</h2>
            <div class="category-grid">
                <div class="category-item">
                    <a href="#">
                        <img src="https://via.placeholder.com/80/f08080/ffffff?Text=Kabel" alt="Kabel & Renda">
                        <p>Kabel & Renda</p>
                    </a>
                </div>
                <div class="category-item">
                    <a href="#">
                        <img src="https://via.placeholder.com/80/87ceeb/ffffff?Text=Kotak" alt="Kotak Permen">
                        <p>Kotak Permen Penuh</p>
                    </a>
                </div>
                <div class="category-item">
                    <a href="#">
                        <img src="https://via.placeholder.com/80/98fb98/ffffff?Text=Natal" alt="Permen Natal">
                        <p>Permen & Hadiah Natal</p>
                    </a>
                </div>
                <div class="category-item">
                    <a href="#">
                        <img src="https://via.placeholder.com/80/dda0dd/ffffff?Text=Cokelat" alt="Cokelat">
                        <p>Cokelat</p>
                    </a>
                </div>
                <div class="category-item">
                    <a href="#">
                        <img src="https://via.placeholder.com/80/ffdab9/000000?Text=Karet" alt="Permen Karet">
                        <p>Permen Karet</p>
                    </a>
                </div>
                <div class="category-item">
                    <a href="#">
                        <img src="https://via.placeholder.com/80/fa8072/ffffff?Text=Asam" alt="Permen Asam">
                        <p>Permen Asam</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-8 featured-products">
            <h2>Produk Unggulan Kami</h2>
            <div class="featured-grid">
                <div class="product-card">
                    <img src="https://via.placeholder.com/200/ffc0cb/ffffff?Text=Produk+1" alt="Produk 1">
                    <h3>Nama Produk 1</h3>
                    <p>Deskripsi singkat produk 1.</p>
                    <button>Lihat Detail</button>
                </div>
                <div class="product-card">
                    <img src="https://via.placeholder.com/200/add8e6/ffffff?Text=Produk+2" alt="Produk 2">
                    <h3>Nama Produk 2</h3>
                    <p>Deskripsi singkat produk 2.</p>
                    <button>Lihat Detail</button>
                </div>
                <div class="product-card">
                    <img src="https://via.placeholder.com/200/90ee90/ffffff?Text=Produk+3" alt="Produk 3">
                    <h3>Nama Produk 3</h3>
                    <p>Deskripsi singkat produk 3.</p>
                    <button>Lihat Detail</button>
                </div>
            </div>
        </section>
    </main>