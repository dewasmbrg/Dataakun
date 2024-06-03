<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Data Akun</title>
        <style>
            @media print {
                .no-print {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <div class="form-group">
            <h2 style="text-align: center;"><b>Laporan Data Akun</b></h2>
            <table class="table table-bordered table-hover custom-table" style="background-color: rgba(255, 255, 255, 0.3); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 15px; border-collapse: collapse;">
                <thead style="background-color: rgba(218, 218, 218, 0.5); color: #3d3d3d; font-size: 16px; border: 1px solid #cbdddd;">
                    <tr>
                        <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">No</th>
                        <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Kode Akun</th>
                        <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Nama Akun</th>
                        <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Deskripsi</th>
                        <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Tipe Akun</th>
                        <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Kategori Akun</th>
                        <th style="background-color: rgba(218, 218, 218, 0.5); text-align: center; border: 1px solid #cbdddd;">Level Akun</th>
                    </tr>
                </thead>
                <tbody style="background-color: rgba(173, 216, 230, 0.4); font-size: 13px; border: 1px solid #cbdddd;">
                    @foreach ($cetak as $index => $item)
                        <tr>
                            <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $index + 1 }}</td>
                            <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->kode_akun }}</td>
                            <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->nama_akun }}</td>
                            <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->deskripsi }}</td>
                            <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->tipe_akun }}</td>
                            <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->kategori_akun }}</td>
                            <td style="background-color: rgba(243, 231, 231, 0.5); text-align: center; border: 1px solid #cbdddd;">{{ $item->role->nama_level }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>
