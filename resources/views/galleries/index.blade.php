<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri - Admin</title>

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
        }

        h1 {
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

        .gallery-image {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
        }

        .no-image {
            color: #9ca3af;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Galeri</h1>
            <p>Kelola galeri perusahaan</p>
        </div>

        <a
            href="{{ route('galleries.create') }}"
            class="btn btn-primary"
        >
            + Tambah Foto
        </a>

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
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($galleries as $gallery)

                    <tr>

                        <td>
                            {{ $galleries->firstItem() + $loop->index }}
                        </td>

                        <td>

                            @if ($gallery->image)

                                <img
                                    src="{{ asset('storage/' . $gallery->image) }}"
                                    alt="{{ $gallery->title }}"
                                    class="gallery-image"
                                >

                            @else

                                <span class="no-image">
                                    Tidak ada
                                </span>

                            @endif

                        </td>

                        <td>
                            <strong>
                                {{ $gallery->title }}
                            </strong>
                        </td>

                        <td>
                            {{ Str::limit($gallery->description, 80) }}
                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('galleries.show', $gallery) }}"
                                    class="btn btn-primary"
                                >
                                    Lihat
                                </a>

                                <a
                                    href="{{ route('galleries.edit', $gallery) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('galleries.destroy', $gallery) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus foto ini?')"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" style="text-align: center;">
                            Belum ada foto di galeri.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="pagination">
            {{ $galleries->links() }}
        </div>

    </div>

</div>

</body>
</html>