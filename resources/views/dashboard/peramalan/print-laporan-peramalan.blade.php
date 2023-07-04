<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Penjualan - Print Hasil Peramalan Penjualan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('stisla') }}/assets/css/components.css">

    <style>
        body {
            background-color: #fff;
        }
    </style>

</head>

<body>

    <div class="container mt-2 mb-2">

        <div class="row mt-4 mb-2">
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                <h3 class="text-dark">Hasil Peramalan Penjualan</h3>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">

                <table id="" class="display table table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-dark mr-auto">
                                Total MAPE : {{ round($maper, 2) }}
                            </th>
                        </tr>
                    </thead>
                </table>

                <table id="" class="display table table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-dark">No.</th>
                            <th scope="col" class="text-dark">Nama Produk</th>
                            <th scope="col" class="text-dark">Kategori</th>
                            <th scope="col" class="text-dark">Ukuran</th>
                            <th scope="col" class="text-dark">Jumlah Penjualan Aktual</th>
                            <th scope="col" class="text-dark">Periode</th>
                            <th scope="col" class="text-dark">Perhitungan Simple Moving Average</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($penjualan as $index => $data)
                            <tr>
                                <td class="text-dark">{{ $index + 1 }}</td>
                                <td class="text-dark">{{ $data->barang->barang_nama }}</td>
                                <td class="text-dark">{{ $data->barang->barang_kategori }}</td>
                                <td class="text-dark">{{ $data->barang->barang_ukuran }}</td>
                                <td class="text-dark">{{ $data->penjualan_jumlah }}</td>
                                <td class="text-dark">{{ date('M', strtotime($data->penjualan_bulan_awal)) }}</td>
                                <td class="text-dark">{{ $hasilMovingAverage[$index] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            window.onload = function() {
                window.print();
            }
        });
    </script>
</body>

</html>
