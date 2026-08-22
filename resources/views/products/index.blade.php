<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produk - Admin</title>

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

        .header p {
            margin-top: 6px;
            color: #6b7280;
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

        .btn-primary:hover {
            background: #1f2937;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-edit {
            background: #2563eb;
            color: white;
        }

        .btn-edit:hover {
            background: #1d4ed8;
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
            font-weight: bold;
        }

        .product-image {
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
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .pagination {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                margin: 20px auto;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">

        <div>
            <h1>Produk / Layanan</h1>
            <p>Kelola produk dan layanan perusahaan</p>
        </div>

        <a
            href="{{ route('products.create') }}"
            class="btn btn-primary"
        >
            + Tambah Produk
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    {{-- TABLE --}}
    <div class="card">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>

            </thead>


            <tbody>

                @forelse ($products as $product)

                    <tr>

                        {{-- NOMOR --}}
                        <td>
                            {{ $products->firstItem() + $loop->index }}
                        </td>


                        {{-- GAMBAR --}}
                        <td>

                            @if ($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="product-image"
                                >

                            @else

                                <span class="no-image">
                                    Tidak ada
                                </span>

                            @endif

                        </td>


                        {{-- NAMA --}}
                        <td>

                            <strong>
                                {{ $product->name }}
                            </strong>

                        </td>


                        {{-- DESKRIPSI --}}
                        <td>

                            {{ Str::limit($product->description, 80) }}

                        </td>


                        {{-- HARGA --}}
                        <td>

                            @if ($product->price !== null)

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            @else

                                -

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td>

                            <div class="actions">

                                {{-- LIHAT --}}
                                <a
                                    href="{{ route('products.show', $product) }}"
                                    class="btn btn-primary"
                                >
                                    Lihat
                                </a>


                                {{-- EDIT --}}
                                <a
                                    href="{{ route('products.edit', $product) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('products.destroy', $product) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')"
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
                            colspan="6"
                            style="text-align: center;"
                        >
                            Belum ada produk.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- PAGINATION --}}
        <div class="pagination">

            {{ $products->links() }}

        </div>

    </div>

</div>

</body>
</html>