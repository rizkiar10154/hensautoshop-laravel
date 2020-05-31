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

<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                    <tr>
                        <td bgcolor="#70bbd9" style="padding: 10px 30px 10px 30px;">
                            <H6>Hensautoshop Indonesia</H6>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td border="0" cellpadding="0" cellspacing="0" width="100%">

                                        <h4>Yth {{$brand->brand_pemilik_nama}},</h4>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0;">
                                        <span>
                                            <p style="line-height: 2em;" align=”justify”>Selamat bergabung bersama Marketresto Partner. Silahkan masuk melalui Brand Partner App dengan nomor ponsel (+{{$brand->brand_phone}}) brand Anda. Kembangkan terus binis
                                                Anda bersama kami. Mari wujudkan semangat bisnis kewirausaan bersama kami. Terima kasih telah mempercayakan kami sebagai rekan usaha anda</p>
                                        </span><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <H4 align="right">Brand Partner</H4>
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