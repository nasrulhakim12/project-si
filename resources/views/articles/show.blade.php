<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Admin</title>

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
            max-width: 850px;
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
            margin-bottom: 10px;
        }

        .date {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .article-image {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .content {
            line-height: 1.8;
            white-space: pre-line;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
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

        .btn-edit {
            background: #2563eb;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>
            {{ $article->title }}
        </h1>

        <div class="date">
            Dibuat pada:
            {{ $article->created_at->format('d F Y, H:i') }}
        </div>

        @if ($article->image)

            <img
                src="{{ asset('storage/' . $article->image) }}"
                alt="{{ $article->title }}"
                class="article-image"
            >

        @endif

        <div class="content">
            {{ $article->content }}
        </div>

        <div class="actions">

            <a
                href="{{ route('articles.index') }}"
                class="btn btn-primary"
            >
                Kembali
            </a>

            <a
                href="{{ route('articles.edit', $article) }}"
                class="btn btn-edit"
            >
                Edit Artikel
            </a>

        </div>

    </div>

</div>

</body>
</html>