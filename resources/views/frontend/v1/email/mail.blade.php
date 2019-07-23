<head>
    <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,700italic,900);

    body {
        font-family: 'Roboto', Arial, sans-serif !important;
    }

    a[href^="tel"] {
        color: inherit;
        text-decoration: none;
        outline: 0;
    }

    a:hover,
    a:active,
    a:focus {
        outline: 0;
    }

    a:visited {
        color: #FFF;
    }

    span.MsoHyperlink {
        mso-style-priority: 99;
        color: inherit;
    }

    span.MsoHyperlinkFollowed {
        mso-style-priority: 99;
        color: inherit;
    }
    </style>
</head>

<body style="margin: 0; padding: 0;background-color:#EEEEEE;">
    <table cellspacing="0" style="margin:0 auto; width:100%; border-collapse:collapse; background-color:#EEEEEE; font-family:'Roboto', Arial !important">
        <tbody>
            <tr>
                <td align="center" style="padding:20px 23px 0 23px">
                    <table width="600" style="background-color:#FFF; margin:0 auto; border-radius:5px">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table width="500" style="margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="padding:40px 0 35px 0"><a href="https://dathangnhanhre.com" style="color:#128ced; text-decoration:none;outline:0;">DATHANGNHANHRE.COM</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="font-family:'Roboto', Arial !important">
                                                    <h2 style="margin:0; font-weight:bold; font-size:40px; color:#444; text-align:center; font-family:'Roboto', Arial !important">
                                                        Đặt Hàng Thành Công
                                                    </h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding:0 0 15px 0; font-family:'Roboto', Arial !important">
                                                    <p style="text-align: center;">
                                                        <img src="https://www.chewy.com/static/cms/lp/email/shipping_confirmation_animated_truck.gif" border="0">
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" cellspacing="0" style="padding:0 0 30px 0; vertical-align:middle">
                                    <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border:1px solid #E5E5E5">
                                        <tbody>
                                            <tr>
                                                <td width="276" style="vertical-align:top; border-right:1px solid #E5E5E5">
                                                    <table style="width:100%; border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align:top; padding:18px 18px 8px 23px; font-family:'Roboto', Arial !important">
                                                                    <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                                                        Tóm Tắt
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr style="">
                                                                <td style="vertical-align:top; padding:0 18px 18px 23px">
                                                                    <table width="100%" style="border-collapse:collapse">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                        Số Đơn #:
                                                                                    </p>
                                                                                </td>
                                                                                <td align="left" style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                        {{ $order['code'] }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                        Ngày Tạo:
                                                                                    </p>
                                                                                </td>
                                                                                <td align="left" style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                        {{ $order['created_at'] }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                                                                        Tổng Giá Trị:
                                                                                    </p>
                                                                                </td>
                                                                                <td align="left" style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                                                                        {{$order['total']}}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="vertical-align:top">
                                                    <table width="100%" style="border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align:top; padding:18px 18px 8px 23px; font-family:'Roboto', Arial !important">
                                                                    <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                                                        Địa Chỉ Giao Hàng:
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align:top; padding:0 18px 18px 23px; font-family:'Roboto', Arial !important">
                                                                    <table width="100%" style="border-collapse:collapse">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                        {{ $order['customer_name'] }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-family:'Roboto', Arial !important">
                                                                                    <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                        {{ $order['address'] }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-family:'Roboto', Arial !important;">
                                                                                    <p style="font-size:16px; color:#000; margin:0;padding:0; font-family:'Roboto', Arial !important">
                                                                                        {{ $member['contact_number'] }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" cellspacing="0" style="padding:0; vertical-align:middle">
                                    <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border-bottom:1px solid #E5E5E5">
                                        <tbody>
                                            <tr>
                                                <td align="left" style="padding:15px 0 15px 15px; font-family:'Roboto', Arial !important" width="117"></td>
                                                <td align="left" width="200">
                                                </td>
                                                <td width="60" align="right" style="font-family:'Roboto', Arial !important">
                                                    <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:center;">
                                                        SỐ LƯỢNG</p>
                                                </td>
                                                <td width="60" align="right" style="font-family:'Roboto', Arial !important">
                                                    <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:center;">
                                                        CHI TIẾT</p>
                                                </td>
                                                <td width="80" align="right" style="font-family:'Roboto', Arial !important;padding-right:10px;">
                                                    <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:right;">
                                                        GIÁ</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @foreach($orderDetails as $row)
                            <tr>
                                <td style=" font-family:'Roboto', Arial !important;padding:0;" align="center">
                                    <table width="550" style="border-collapse:collapse;margin: 0 auto;border-bottom: 1px solid #EBEBEB">
                                        <tbody>
                                            <tr>
                                                {{-- <td width="117" align="right" style="padding:24px 0 24px 10px; text-align:left;">
                                                    <a target="_blank" style="text-decoration:none; color:#000; outline:0;">
                                                        <img src="https://img.chewy.com/is/catalog/89528_MAIN._AC_SS115_V1452725780_.jpg" border="0">
                                                    </a>
                                                </td> --}}
                                                <td width="270" style="vertical-align:middle; padding:0 0 0 10px; font-family:'Roboto', Arial !important;">
                                                    <p style="font-size:16px; margin:0; color:#000; line-height:20px; font-family:'Roboto', Arial !important">
                                                        <a target="_blank" style="text-decoration:none; color:#000; outline:0;"> {{ $row['product_name'] }}</a>
                                                    </p>
                                                </td>
                                                <td align="center" width="60" style="vertical-align:middle; font-family:'Roboto', Arial !important;padding:0;">
                                                    <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important;text-align:center;">
                                                        {{ $row['quantity'] }}
                                                    </p>
                                                </td>
                                                <td align="center" width="60" style="vertical-align:middle; font-family:'Roboto', Arial !important;padding:0;">
                                                    <p style="font-size:15px; color:#000; margin:0; font-family:'Roboto', Arial !important;text-align:center;">
                                                        {{ $row['size'] }} / {{ $row['color'] }}
                                                    </p>
                                                </td>
                                                <td align="center" width="80" style="font-family:'Roboto', Arial !important;padding:0 10px 0 0;">
                                                    <p style="font-size:18px; color:#bc0101; margin:0; font-family:'Roboto', Arial !important;text-align:center;font-weight:bold;text-align: right;">
                                                        {{ $row['price'] }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td align="center" style="padding-top:24px; padding-bottom:20px">
                                    <table width="520" style="border-collapse:collapse">
                                        <tbody>
                                            <tr>
                                                <td align="right" width="425" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                    <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                        Số Lượng ({{$quantity}} món)
                                                    </p>
                                                </td>
                                                {{-- <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                    <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                        {{$order['total']}}
                                                    </p>
                                                </td> --}}
                                            </tr>
                                            <tr>
                                                <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                    <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                        Phí Vận Chuyển:
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                    <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important;color:#15a6e9;font-weight:bold;">
                                                    {{$order['ship_fee']}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                    <p style="font-size:18px; color:#000; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                                        Tổng Cộng Hóa Đơn:
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                    <p style="font-size:18px; color:#bc0101; font-weight:bold; margin:0; font-family:'Roboto', Arial !important">
                                                        {{$order['total']}}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            {{-- <tr>
                <td align="center" style="padding-top:20px">
                    <table width="604" style="border-collapse:collapse;background-color:#FFF; font-family:'Roboto', Arial !important; border-radius:5px">
                        <tbody>
                            <tr>
                                <td colspan="4" style="vertical-align:middle;background-color: #128ced;border-radius: 5px 5px 0 0;">
                                    <table style="background-color:#128ced; width:100%; border-radius:5px 5px 0 0; border-collapse:collapse">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="vertical-align:middle; padding:22px 0; font-family:'Roboto', Arial !important">
                                                    <p style="color:#FFF; font-size:18px; margin:0; font-family:'Roboto', Arial !important">
                                                        Gọi chúng tôi theo số<a href="tel:1-800-672-4399" target="_blank" style="text-decoration:none; color:#FFF; font-weight:bold;outline:0;">1-800-672-4399</a>
                                                        hoặc trả lời mail này để được hỗ trợ !
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr> --}}
        </tbody>
    </table>
</body>