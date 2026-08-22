<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel - Admin</title>

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
            font-size: 15px;
        }

        textarea {
            min-height: 200px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #111827;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Artikel</h1>

        <p>Tambahkan artikel baru ke sistem.</p>

        <form
            action="{{ route('articles.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="form-group">

                <label for="title">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul artikel"
                >

                @error('title')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    placeholder="Masukkan isi artikel"
                >{{ old('content') }}</textarea>

                @error('content')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label for="image">
                    Gambar Artikel
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small>
                    Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                </small>

                @error('image')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="actions">

                <a
                    href="{{ route('articles.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Artikel
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>