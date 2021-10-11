<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML 2 PDF</title>
    <style type="text/css">
        .center {
            text-align: center;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .card-body {
            flex: 1 1 auto;
            padding: 1rem 1rem;
        }
        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0;
        }
        .invoice {
            position: relative;
            background-color: #fff;
            min-height: 680px;
            padding: 15px;
        }
        .invoice .invoice-details {
            text-align: right;
            float: right;
            margin-top: -70px;
        }
        .overflow-auto {
            overflow: auto !important;
        }
        .col {
            flex: 1 0 0% !important;
            width: 50%;
        }
        .cols {
            flex: 1 0 0% !important;
            width: 60%;
        }
        .inv {
            margin-top: -25px;
        }
        .invoice .company-details {
            text-align: left;
        }
        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0;
        }
        .invoice .contacts {
            margin-bottom: 20px;
        }
        .invoice main {
            padding-bottom: 50px;
        }
        .invoice .invoice-to {
            text-align: left;
        }
        table {
            display: table;
            border-collapse: separate;
            border-collapse: collapse;
            box-sizing: border-box;
            text-indent: initial;
            border-spacing: 2px;
            border-color: grey;
        }
        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }
        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border: none !important;
        }
        .invoice table th {
            white-space: nowrap;
            font-size: 16px;
        }
        .invoice table td,
        .invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff;
        }
        th {
            display: table-cell;
            vertical-align: inherit;
            font-weight: bold;
            text-align: -internal-center;
        }
        .invoice .contacts {
            margin-bottom: 20px;
        }
        .rounded {
            border-radius: .25rem !important;
        }
        .p-4 {
            padding: 1.5rem !important;
        }
        .border {
            border: 1px solid #dee2e6 !important;
        }
        td {
            display: table-cell;
            border: none !important;
            vertical-align: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        tfoot {
            display: table-footer-group;
            vertical-align: middle;
            border-color: inherit;
            border: none !important;
        }
        .invoice table tfoot tr td:first-child,
        .invoice table tfoot tr td:nth-child(2) {
            border: none !important;
        }
        .invoice table tfoot tr:first-child td {
            border-top: none;
        }
        .invs {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            height: 80%;
        }
        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            border-collapse: collapse;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa;
            border-width: 0.2;
        }
        .text-center {
            text-align: center !important;
        }
        .rows {
            margin-top: 90px;
        }
        .email {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div id="invoic">
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row inv">
                                    <div class="col">
                                        <a href="javascript:;">
                                            <img src="{{ asset('assets/images/webtechlogo.svg') }}" width="100"
                                                alt="" />
                                        </a>
                                        <div class="cols company-details">
                                            <h4 class="name">
                                                {{ $comname }}
                                            </h4>
                                            <div>{{ $comaddress }}</div>
                                            <div>{{ $comemail }}</div>
                                            <div>{{ $comphone }}</div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <hr>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">INVOICE TO:</div>
                                        <h6 class="to">{{ $names }}</h6>
                                        <div class="address">{{ $company }}</div>
                                        <div class="address">{{ $address }}</div>
                                        <div class="email">{{ $email }}
                                        </div>
                                    </div>
                                    <div class="col invoice-details">
                                        <div class="date">Date of Invoice: {{ date('Y-m-d ') }}</div>
                                    </div>
                                </div>
                                <div class="rows">
                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th colspan="3">Particulars</th>
                                                <th class="text-center">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $first = 1;
                                                $second = 1;
                                            @endphp
                                            @foreach ($particular as $par)
                                                @foreach ($amount as $amo)
                                                    @if ($first === $second)
                                                        <tr>
                                                            <td> </td>
                                                            <td colspan="3">{{ $par }}</td>
                                                            <td class="amount text-center">{{ $amo }}</td>
                                                        </tr>
                                                    @endif
                                                    @php
                                                        $second++;
                                                    @endphp
                                                @endforeach
                                                @php
                                                    $second = 1;
                                                    $first++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">SUBTOTAL</td>
                                                <td class="text-center">{{ $subtotal }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">TAX 13%</td>
                                                <td class="text-center">{{ $vat }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">GRAND TOTAL</td>
                                                <td class="text-center">{{ $vatsubtotal }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    {{-- <div class="thanks">Thank you!</div> --}}
                                </div>
                            </main>
                            <footer>Invoice was created on a computer and is valid without the signature and seal.
                            </footer>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
