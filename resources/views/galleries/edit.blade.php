<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Galeri - Admin</title>

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
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 160px;
            resize: vertical;
        }

        .current-image {
            width: 220px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin-bottom: 10px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
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
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Foto Galeri</h1>

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
            action="{{ route('galleries.update', $gallery) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="title">
                    Judul Foto
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $gallery->title) }}"
                >

            </div>

            <div class="form-group">

                <label for="description">
                    Deskripsi
                </label>

                <textarea
                    id="description"
                    name="description"
                >{{ old('description', $gallery->description) }}</textarea>

            </div>

            <div class="form-group">

                <label>
                    Foto Saat Ini
                </label>

                @if ($gallery->image)

                    <img
                        src="{{ asset('storage/' . $gallery->image) }}"
                        alt="{{ $gallery->title }}"
                        class="current-image"
                    >

                @else

                    <p>Tidak ada foto.</p>

                @endif

            </div>

            <div class="form-group">

                <label for="image">
                    Ganti Foto
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small>
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Foto
            </button>

            <a
                href="{{ route('galleries.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>