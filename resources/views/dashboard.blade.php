<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #111827;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            margin: 0;
        }

        .subtitle {
            color: #6b7280;
            margin-top: 8px;
        }

        .logout-form {
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-primary {
            background: #111827;
            color: white;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        .stat-title {
            color: #6b7280;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
        }

        .menu-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        .menu-card h2 {
            margin-top: 0;
        }

        .menu {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        @media (max-width: 700px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .header {
                align-items: flex-start;
                gap: 20px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Dashboard Admin</h1>

            <div class="subtitle">
                Selamat datang di halaman administrator.
            </div>
        </div>

        <form
            action="{{ route('logout') }}"
            method="POST"
            class="logout-form"
        >
            @csrf

            <button
                type="submit"
                class="btn btn-danger"
            >
                Logout
            </button>
        </form>

    </div>


    {{-- Statistik --}}

    <div class="stats">

        <div class="stat-card">

            <div class="stat-title">
                Total Artikel
            </div>

            <div class="stat-number">
                {{ $articleCount }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-title">
                Total Produk
            </div>

            <div class="stat-number">
                {{ $productCount }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-title">
                Total Galeri
            </div>

            <div class="stat-number">
                {{ $galleryCount }}
            </div>

        </div>

    </div>


    {{-- Menu --}}

    <div class="menu-card">

        <h2>Menu Pengelolaan</h2>

        <div class="menu">

            <a
                href="{{ route('articles.index') }}"
                class="btn btn-primary"
            >
                Kelola Artikel
            </a>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-primary"
            >
                Kelola Produk
            </a>

            <a
                href="{{ route('galleries.index') }}"
                class="btn btn-primary"
            >
                Kelola Galeri
            </a>

        </div>

    </div>

</div>

</body>
</html>