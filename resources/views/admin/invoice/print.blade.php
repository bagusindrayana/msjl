<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ SettingHelper::get('app_name') }}</title>
    <style>
        table.detail,
        table.detail th,
        table.detail td {
            border: 1px solid;
            padding: 10px;
        }

        table.detail {
            width: 100%;
            border-collapse: collapse;
        }

        table.detail thead {
            background-color: black !important;
            color: white !important;
            s
        }

        @media print {
            table.detail thead {
                background-color: black !important;
                print-color-adjust: exact;
            }
        }

        @media print {
            table.detail thead {
                color: white !important;
            }
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body onload="window.print();">
    <div id="wrapper" style="width: 90%;display: block;margin:auto;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>
                        <img src="{{ url(SettingHelper::get('app_logo')) }}" alt="" width="150">
                    </th>
                    <th>
                        <h1 style="color:red;margin:0px;">{{ SettingHelper::get('app_name') }}</h1>
                        <span><b>STEVEDOORING, CARGODOORING, RECEIVING AND DELIVERY</b></span>

                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <hr>
                        <hr>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">
                        <table style="width: 95%;margin: auto;">
                            <tr>
                                <td colspan="4" style="width: 55%;">

                                </td>
                                <td colspan="2">
                                    <h2>INVOICE</h2>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Kepada:
                                </td>
                                <td>
                                    Date
                                </td>
                                <td>
                                    : {{ $invoice->tanggal_invoice }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Yth, <b>{{ $invoice->customer->nama_customer }}</b>
                                </td>
                                <td>
                                    No
                                </td>
                                <td>
                                    : {{ $invoice->nomor_invoice }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <br>
                                    Di -
                                    <br>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="6">
                                    <br>
                                    <u>{{ $invoice->customer->alamat_customer ?? 'SAMARINDA' }}</u>
                                    <br>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="6">
                                    <br>
                                    <p>{{ $invoice->keterangan_invoice ?? '-' }}</p>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="detail">
                            <thead>
                                <tr>
                                    <th>
                                        DESKRIPSI
                                    </th>
                                    <th>
                                        PERIODE
                                    </th>
                                    <th>
                                        TOTAL
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice->invoice_details as $item)
                                    <tr>
                                        <td>
                                            {{ $item->deskripsi }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ number_format($item->jumlah, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        TOTAL
                                    </td>
                                    <td>{{ number_format($invoice->jumlah_invoice, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
            </tbody>
        </table>
        </td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                <br>
                <br>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td style="text-align: center;">
                Hormat kami <br>
                {{ SettingHelper::get("app_name") }}
            </td>
        </tr>
        <tr>
            <td >
                Rekening
                <br>
                An. MAHMUDIN
                <br>
                Bank Mandiri
                <br>
                No. 148-00-0316013-5
            </td>
            <td style="text-align: center;">
                <u>Mahmudin,SE</u>
            </td>
        </tr>
        </tbody>
        </table>
    </div>
</body>

</html>
