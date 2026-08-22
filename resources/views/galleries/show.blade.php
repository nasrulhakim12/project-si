<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $gallery->title }} - Galeri</title>

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

        .gallery-image {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            border-radius: 10px;
            margin: 20px 0;
        }

        .description {
            line-height: 1.7;
            color: #4b5563;
            white-space: pre-line;
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
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>{{ $gallery->title }}</h1>

        @if ($gallery->image)
            <img
                src="{{ asset('storage/' . $gallery->image) }}"
                alt="{{ $gallery->title }}"
                class="gallery-image"
            >
        @endif

        @if ($gallery->description)
            <h3>Deskripsi</h3>

            <div class="description">
                {{ $gallery->description }}
            </div>
        @endif

        <br>

        <a
            href="{{ route('galleries.edit', $gallery) }}"
            class="btn btn-primary"
        >
            Edit
        </a>

        <a
            href="{{ route('galleries.index') }}"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </div>

</div>

</body>
</html>