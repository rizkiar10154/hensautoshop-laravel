<?php

function convert_to_rupiah($angka)
{
    $agk =   substr($angka, 0, -3);
    return       'Rp.' . strrev(implode('.', str_split(strrev(strval($agk)), 3)));
}

function to_rupiah($angka)
{
    return 'Rp.' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <style type="text/css">
        .tab {
            margin: 0 auto;
            border-collapse: collapse;
            border-style: hidden;
        }

        h6 {
            font-family: "Times New Roman", Times, serif;
            font-weight: 300;
            font-size: 19px;
            line-height: 1.4em;
            color: #ffffff;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body onload="window.print()" style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                    <tr>
                        <td bgcolor="#70bbd9" style="padding: 10px 30px 10px 30px;">
                            <H6>MarketResto Indonesia</H6>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <H4 align="center">Invoice</H4>
                                        Order # {{$order->id}}<br>
                                        {{$order->created_at->format('d-m-Y H:i:s')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0;">
                                        <span>Terima Dari</span><br>
                                        <span>{{$order->konsumen->konsumen_nama}}.</span>
                                        <br>{{$order->order_alamat}}<br>
                                        <abbr>+</abbr>{{$order->konsumen->konsumen_phone}}<br>
                                        Metode Bayar : {{$order->order_metode_bayar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="tab" align="center" cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Harga</th>
                                                    <th>Quantity</th>
                                                    <th>Discount(@)</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($subtotal =0 )
                                                @foreach ($order->order_detail as $item)
                                                <tr style="border: 1px solid black">
                                                    <td>{{$item->accesories_nama}}</td>
                                                    <td><?php echo convert_to_rupiah($item->pivot->harga) ?></td>
                                                    <td align="center">{{$item->pivot->qty}}</td>
                                                    <td align="center">{{$item->pivot->discount}}%</td>
                                                    @php($sum = ($item->pivot->harga-($item->pivot->harga*($item->pivot->discount/100)))*$item->pivot->qty)
                                                    <td><?php echo to_rupiah($sum) ?></td>
                                                    @php($subtotal += $sum)
                                                </tr>
                                                @endforeach
                                                <tr style="border: 1px solid black">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Subtotal</td>
                                                    <td><?php echo to_rupiah($subtotal) ?></td>
                                                </tr>
                                                <tr style="border: 1px solid black">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Shipping</td>
                                                    <td><?php echo convert_to_rupiah($order->order_biaya_anatar) ?></td>
                                                </tr>

                                                @php($total = $subtotal +$order->order_biaya_anatar)
                                                @if($order->order_pajak_pb_satu > 0)
                                                <tr style="border: 1px solid black">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>PB1 ({{$order->order_pajak_pb_satu}})</td>
                                                    @php($pb = ($order->order_pajak_pb_satu/100.0)* $total)
                                                    <td><?php echo to_rupiah($pb) ?></td>
                                                </tr>
                                                @php($total = $total + $pb)
                                                @endif

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total</td>

                                                    <td><?php echo to_rupiah($total) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#E74C3C" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                    <td width="75%" style="color:#ffffff ">
                                        &reg; Hensautoshop, {{date('Y')}}<br />
                                        Hensautoshop
                                    </td>
                        </td>
                        <td>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>