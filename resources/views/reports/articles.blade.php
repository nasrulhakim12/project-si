<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Laporan Artikel</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
        }

        .date {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            vertical-align: top;
        }

        th {
            background: #eeeeee;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>LAPORAN DATA ARTIKEL</h1>

    <div class="date">
        Dicetak pada: {{ now()->format('d-m-Y H:i') }}
    </div>

    <table>

        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Judul</th>
                <th width="60%">Isi Artikel</th>
                <th width="10%">Tanggal</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($articles as $article)

                <tr>
                    <td align="center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $article->title }}
                    </td>

                    <td>
                        {{ $article->content }}
                    </td>

                    <td>
                        {{ $article->created_at->format('d-m-Y') }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" align="center">
                        Belum ada data artikel.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</body>
</html>