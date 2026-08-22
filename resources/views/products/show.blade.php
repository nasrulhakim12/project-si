<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - Produk</title>

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
            max-width: 800px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        .product-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin: 20px 0;
        }

        .price {
            font-size: 22px;
            font-weight: bold;
            margin: 15px 0;
        }

        .description {
            line-height: 1.7;
            white-space: pre-line;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            background: #111827;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>{{ $product->name }}</h1>

        @if ($product->image)
            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                class="product-image"
            >
        @endif

        @if ($product->price !== null)
            <div class="price">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>
        @endif

        <h3>Deskripsi</h3>

        <div class="description">
            {{ $product->description }}
        </div>

        <a
            href="{{ route('products.index') }}"
            class="btn"
        >
            ← Kembali
        </a>

    </div>

</div>

</body>
</html>