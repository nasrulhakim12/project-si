<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Admin</title>

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
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .current-image {
            width: 180px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
            display: block;
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

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Produk / Layanan</h1>

        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('products.update', $product) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="name">
                    Nama Produk / Layanan
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                >

            </div>

            <div class="form-group">

                <label for="description">
                    Deskripsi
                </label>

                <textarea
                    id="description"
                    name="description"
                >{{ old('description', $product->description) }}</textarea>

            </div>

            <div class="form-group">

                <label for="price">
                    Harga
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    min="0"
                    value="{{ old('price', $product->price) }}"
                >

            </div>

            <div class="form-group">

                <label>
                    Gambar Saat Ini
                </label>

                @if ($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="current-image"
                    >

                @else

                    <p>Tidak ada gambar.</p>

                @endif

            </div>

            <div class="form-group">

                <label for="image">
                    Ganti Gambar
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small>
                    Kosongkan jika tidak ingin mengganti gambar.
                </small>

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Produk
            </button>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>