<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Admin</title>

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
            background: #111827;
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

        <h1>Tambah Produk / Layanan</h1>

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
            action="{{ route('products.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="form-group">
                <label for="name">
                    Nama Produk / Layanan
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama produk"
                >
            </div>

            <div class="form-group">
                <label for="description">
                    Deskripsi
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Masukkan deskripsi produk"
                >{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">
                    Harga
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    min="0"
                    placeholder="Contoh: 500000"
                >
            </div>

            <div class="form-group">
                <label for="image">
                    Gambar Produk
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Produk
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