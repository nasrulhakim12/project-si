<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artikel - Admin</title>

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
            margin-bottom: 25px;
            gap: 20px;
        }

        h1 {
            margin: 0;
        }

        .header p {
            margin-bottom: 0;
            color: #6b7280;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
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

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-edit {
            background: #2563eb;
            color: white;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f9fafb;
        }

        .article-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .no-image {
            color: #9ca3af;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pagination {
            margin-top: 20px;
        }

        @media (max-width: 700px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-buttons {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Artikel</h1>
            <p>Kelola artikel perusahaan</p>
        </div>

        <div class="header-buttons">

            <a
                href="{{ route('articles.create') }}"
                class="btn btn-primary"
            >
                + Tambah Artikel
            </a>

            <a
                href="{{ route('articles.report') }}"
                class="btn btn-edit"
            >
                🖨️ Cetak Report PDF
            </a>

        </div>

    </div>


    @if (session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>

            </thead>


            <tbody>

                @forelse ($articles as $article)

                    <tr>

                        <td>
                            {{ $articles->firstItem() + $loop->index }}
                        </td>


                        <td>

                            @if ($article->image)

                                <img
                                    src="{{ asset('storage/' . $article->image) }}"
                                    alt="{{ $article->title }}"
                                    class="article-image"
                                >

                            @else

                                <span class="no-image">
                                    Tidak ada
                                </span>

                            @endif

                        </td>


                        <td>

                            <strong>
                                {{ $article->title }}
                            </strong>

                        </td>


                        <td>
                            {{ Str::limit($article->content, 80) }}
                        </td>


                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('articles.show', $article) }}"
                                    class="btn btn-primary"
                                >
                                    Lihat
                                </a>


                                <a
                                    href="{{ route('articles.edit', $article) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>


                                <form
                                    action="{{ route('articles.destroy', $article) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus artikel ini?')"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td
                            colspan="5"
                            style="text-align: center;"
                        >
                            Belum ada artikel.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        <div class="pagination">
            {{ $articles->links() }}
        </div>

    </div>

</div>

</body>
</html>