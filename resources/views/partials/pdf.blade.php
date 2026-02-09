<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura Electrónica</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #000;
            margin: 0;
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .bold { font-weight: bold; }

        /* ===== CABECERA ===== */
        .header td {
            vertical-align: top;
        }

        .company-data {
            font-size: 11px;
        }

        .invoice-box {
            border: 2px solid #000;
            padding: 10px;
            text-align: center;
        }

        .invoice-box h3 {
            margin: 5px 0;
            font-size: 14px;
        }

        /* ===== CLIENTE ===== */
        .client-box {
            border: 1px solid #000;
            padding: 8px;
            margin-top: 15px;
        }

        /* ===== DETALLE ===== */
        .details th {
            border: 1px solid #000;
            padding: 6px;
            background: #f0f0f0;
        }

        .details td {
            border: 1px solid #000;
            padding: 6px;
        }

        /* ===== TOTALES ===== */
        .totals {
            width: 40%;
            float: right;
            margin-top: 10px;
        }

        .totals td {
            border: 1px solid #000;
            padding: 6px;
        }

        /* ===== FOOTER ===== */
        .footer {
            position: fixed;
            bottom: 25px;
            left: 25px;
            right: 25px;
            font-size: 10px;
        }
    </style>
</head>

<body>

    <!-- ===== CABECERA ===== -->
    <table class="header">
        <tr>
            <td width="60%">
                <img src="{{ public_path('img/logo-vesergen.png') }}" width="180"><br>
                <div class="company-data">
                    <strong>GRUPO VESERGENPERU E.I.R.L</strong><br>
                    WWW.VESERGENPERU.COM<br>
                    CALLE CONSTITUCIÓN NRO 435-439, JOSE LEONARDO ORTIZ - CHICLAYO - LAMBAYEQUE<br>
                    RUC: 20604688605<br>
                </div>
            </td>

            <td width="40%">
                <div class="invoice-box">
                    <h3>PEDIDO</h3>
                    <strong>RUC 20604688605</strong><br>
                    <strong>P001 - {{ $orden->id }}</strong>
                </div>
            </td>
        </tr>
    </table>

    <!-- ===== CLIENTE ===== -->
    <div class="client-box">
        <table>
            <tr>
                <td width="70%">
                    <strong>Cliente:</strong> {{ $nombre }} {{ $apellidos }} {{ $empresa }}<br>
                    <strong>Dirección:</strong> {{ $direccion }}<br>
                    @if($ruc != "")
                        <strong>RUC:</strong> {{ $ruc }}
                    @endif
                </td>
                <td width="30%">
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Moneda:</strong> SOLES
                </td>
            </tr>
        </table>
    </div>

    <!-- ===== DETALLE ===== -->
    <table class="details" style="margin-top:15px;">
        <thead>
            <tr>
                <th width="10%">Cant.</th>
                <th width="50%">Descripción</th>
                <th width="20%">P. Unit.</th>
                <th width="20%">Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Cart::content() as $item)
            <tr>
                <td class="text-center">{{ $item->qty }}</td>
                <td>{{ $item->name }}</td>
                <td class="text-right">S/ {{ number_format($item->price, 2) }}</td>
                <td class="text-right">S/ {{ number_format($item->price * $item->qty, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ===== TOTALES ===== -->
    <table class="totals">
        <tr>
            <td>Sub Total</td>
            <td class="text-right">S/ {{ number_format(Cart::subtotal()/1.18, 2) }}</td>
        </tr>
        <tr>
            <td>IGV (18%)</td>
            <td class="text-right">S/ {{ number_format(Cart::subtotal() - Cart::subtotal()/1.18, 2) }}</td>
        </tr>
        <tr>
            <td class="bold">TOTAL</td>
            <td class="text-right bold">S/ {{ number_format(Cart::subtotal(), 2) }}</td>
        </tr>
    </table>

    <!-- ===== FOOTER ===== -->
    <div class="footer">
        <table>
            <tr>
                <td width="20%">
                    <img src="{{ public_path('img/bcp.png') }}" width="90">
                </td>
                <td width="80%">
                    <strong>GRUPO VESERGENPERU E.I.R.L</strong><br>
                    Cta Cte Soles: 305-2597666056
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
