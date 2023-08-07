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

        td {
            vertical-align: top;
        }
    </style>
</head>

<body>
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
                        <table style="width: 95%;margin:auto;">
                            <tr>
                                <td>
                                    Nomor
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $surat->nomor_surat }}
                                </td>
                                <td colspan="2">

                                </td>
                                <td>
                                    Samarinda, {{ date('d F Y', strtotime($surat->tanggal_surat)) }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Klasifikasi
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $surat->klasifikasi_surat }}
                                </td>
                                <td colspan="3">

                                </td>

                            </tr>
                            <tr>
                                <td>
                                    Lampiran
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $surat->file_lampiran ? basename($surat->file_lampiran) : '-' }}
                                </td>
                                <td colspan="3">

                                </td>

                            </tr>
                            <tr>
                                <td>
                                    Perihal
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $surat->perihal_surat }}
                                </td>
                                <td colspan="2">

                                </td>
                                <td>
                                    Kepada <br>
                                    Yth, {{ $surat->kepada }}
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td colspan="2">

                                </td>
                                <td>
                                    di - <br>
                                    <u>Samarinda</u>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <br>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    Dengan Hormat
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <table style="width: 100%">
                                        <tr>
                                            <td >1.</td>
                                            <td colspan="5" style="text-align: justify;">
                                                Sesuai dengan PERMENHUB No. 152 Tahun 2016 Tentang Penyelenggaraan dan
                                                Pengusahaan Bongkar Muat dari dan ke Kapal, bersama ini kami PT. Mahakam Sentosa
                                                Jaya Lestari (PBM/Perusahaan Angkutan Laut) menyampaikan RKBM di Pelabuhan/jetty
                                                sebagai berikut:
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                Nama Kapal
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->nama_kapal }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                GT
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->gt }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                LOA
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->loa }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                Bendera
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->bendera }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                Agent
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->agent }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                Dari
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->pelabuhan_asal }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                Tujuan
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->pelabuhan_tujuan }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                Muatan
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->muatan }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                Tanggal
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ date("d-m-Y",strtotime($surat->tanggal)) }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td >
                                                No. SIUP PBM
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                {{ $surat->no_siup_pbm }}
                                            </td>
                                            <td colspan="2">
            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                              
                                                <br>
                                                <table style="width: 95%;margin:auto;">
                                                    <tr>
                                                        <td style="width: 100px;">
                                                            Jasa Kapal
                                                        </td>
                                                        <td style="width: 10px;">
                                                            :
                                                        </td>
                                                        <td>
                                                            {{ $surat->jasa_kapal?? "-" }}
                                                        </td>
                                                        <td style="width: 30%;"></td>
                                                        <td style="width: 100px;">
                                                            Jasa Barang
                                                        </td>
                                                        <td style="width: 10px;">
                                                            :
                                                        </td>
                                                        <td>
                                                            {{ $surat->jasa_barang ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 100px;">
                                                            Jasa Labuh
                                                        </td>
                                                        <td style="width: 10px;">
                                                            :
                                                        </td>
                                                        
                                                        <td>
                                                            {{ $surat->jasa_labuh?? "-" }}
                                                        </td>
                                                        <td style="width: 30%;"></td>
                                                        <td style="width: 100px;">
                                                            Jasa PBM
                                                        </td>
                                                        <td style="width: 10px;">
                                                            :
                                                        </td>
                                                        <td>
                                                            {{ $surat->jasa_pbm?? "-" }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>2.</td>
                                            <td colspan="5" style="text-align: justify;">
                                                Demikian permohonan ini di buat, atas perhatian dan kerjasamanya di ucapkan terima kasih.
            
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td style="text-align: center;">
                        Hormat kami <br>br
                        {{ SettingHelper::get('app_name') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: center;">
                        <u>Mahmudin,SE</u>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                   <td colspan="2" style="text-align: center;">
                    Head Office : Jl. Sultan Alimuddin ( Jl. Padat Karya ) <br>
                    No. 60 RT. 03 Sambutan Samarinda 75117</td> 
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
