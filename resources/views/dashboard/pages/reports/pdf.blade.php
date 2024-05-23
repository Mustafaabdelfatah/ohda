<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .init-content {
            position: relative;
            min-height: 100vh;
        }



        #footer {

            margin-top: 20px
        }

        #footer div {
            padding: 0 140px;
            display: inline-block
        }

        #footer div p {
            margin: 0px;
        }

        .page-content {
            padding: 0 !important
        }


        .bor thead tr td {
            border: 2px solid #000
        }


        .test {
            display: flex;
            justify-content: space-around;
        }

        p,
        span {
            color: #000;
            font-weight: bold
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #000
        }


        thead {

            border: 1px solid #000;
        }

        thead td {
            font-weight: bold;
            font-size: 11px;
            color: #000;
            text-align: center
        }

        .sub-table td {
            font-weight: bold;
            font-size: 12px
        }

        table,
        tbody td {

            border-collapse: collapse;
            text-transform: capitalize;
            color: #000;
            font-weight: 500;
            text-align: left;
            padding: 0 4px;
            font-size: 12px;
        }

        .table1,
        tbody td {
            border: 2px solid #000;
        }

        .table1 tbody td {
            text-align: center
        }

        .main-content {
            margin-right: 0px !important
        }

        .content span {
            padding: 0px 140px;
            font-weight: bold;
            font-size: 24px
        }

        .footer-tawqe3 p {
            margin-top: 30px
        }
    </style>
</head>

<body>
    <div class="init-content">
        <div id="content-wrap">
            <div class="content" style="margin-bottom: 15px">
                <span>وزاره الدفاع</span>
                <span>مستند خصم | اضافه | ارتجاع</span>
                <span>(نموذج 2 أ ت)</span>
            </div>

            <div>
                <table style="float:right;width:22%;margin-left:20px;margin-bottom:10px;" class="table1">
                    <tbody>
                        <tr style="height:15px;">
                            <td style="  " colspan="2">خصم</td>
                        </tr>
                        <tr>
                            <td style="  height:15px;">رقم</td>
                            <td style="  height:15px;">تاريخ</td>
                        </tr>
                        <tr>
                            <td style="  height:15px; "></td>
                            <td style="  height:20px;"></td>
                        </tr>
                    </tbody>
                </table>
                <table style="float:right;width:22%;margin-left:20px;margin-bottom:10px;" class="table1">
                    <tbody>
                        <tr style="height:15px;">
                            <td style="  height:15px" colspan="2">اضافه</td>
                        </tr>
                        <tr>
                            <td style="  height:15px">رقم</td>
                            <td style="  height:15px">تاريخ</td>
                        </tr>
                        <tr>
                            <td style="  height:20px"></td>
                            <td style=" height:20px">{{ $date }}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="float:right;width:22%;margin-left:20px;margin-bottom:10px;" class="table1">
                    <tbody>
                        <tr style="height:20px;">
                            <td style="  height:20px; ">رقم المخزن</td>
                            <td style="  height:20px;">رقم الوحده</td>
                            <td style="  height:20px;">رقم القسم</td>
                        </tr>
                        <tr style="height:25px">
                            <td style="  height:25px;"> </td>
                            <td style="  height:25px;"> </td>
                            <td style="  height:25px;"> </td>
                        </tr>
                    </tbody>
                </table>

                <table style="float:right;width:22%; ;margin-left:20px;margin-bottom:10px; height:50px">
                    <tr>
                        <td style="text-align: center">ختم الوحده</td>
                    </tr>
                </table>
                <p style="clear:both;content:''"></p>
            </div>
            <div class="test" style="">
                <h4 style="float:right;width:40%;"> وارد من : {{ $settings->recieve ?? ' ' }} <h4>
                        <h4 style="float:right;width:20% "> جهه : {{ $settings->side ?? ' ' }} <h4>
                                <h4 style="float:right;width:20% "> وارد الي : {{ $main ?? ' ' }} <h4>
                                        {{-- @dd($sub) --}}
                                        <h4 style="float:right;width:20% "> قسم : @foreach ($sub as $sub)
                                                {{ $sub }} ,
                                            @endforeach
                                            <h4>
                                                <p style="clear:both;content:''"></p>

            </div>

            <table class="bor" style="width: 100%;" border="7">
                <thead>
                    <tr style="">
                        <td style=" width: 2.693%;" rowspan="2">كود التصنيف</td>
                        <td style=" width: 2.15464%;" rowspan="2">رقم العينه </td>
                        <td style=" width: 22.15464%;" rowspan="2"> الصنف</td>
                        <td style=" width: 2.15464%;" rowspan="2">كود الصنف</td>
                        <td style=" width: 2.15464%;" rowspan="2">الوحده </td>
                        <td style=" width: 2.15464%;" rowspan="2">الحاله </td>
                        <td style=" width: 2.15464%;" rowspan="2">الكميه </td>
                        <td style=" width: 2.15464%;" rowspan="2">رقم القيد بدفتر المخزن </td>
                        <td style=" width: 14.15464%;" rowspan="4" colspan="2">مكان الصنف بالمخزن </td>
                        <td style=" width: 14.15464%;" rowspan="4" colspan="2">مكان الصنف بالمخزن </td>
                        <td style=" width: 15.4639%;" colspan="2">فئة الوحدة </td>
                        <td style=" width: 15.4639%;">ثمن الأصناف </td>
                    </tr>
                    <tr style="">
                        <td style=" width: 4.15464%;">قرش</td>
                        <td style=" width: 4.15464%;">جنيه</td>
                        <td style=" width: 3%;">ع. ق .أ</td>
                    </tr>
                </thead>
                <tbody>
                    @if (!$data->isEmpty() && !empty($main))

                        @foreach ($data as $test)
                            <tr style="height: 40px;" class="sub-table">
                                <td style="height: 40px; width: 4%;"></td>
                                <td style="height: 40px; width: 4%;"></td>
                                <td style="height: 10px; width: 30%; direction: ltr ">
                                    {{ $test['item']['type'] }} / {{ $test['item']['model'] }}
                                    &nbsp;&nbsp;&nbsp;
                                    {{ $test['ram'] ? 'RAM :' . $test['ram'] : ' ' }}
                                    {{ $test['cpu'] ? 'CPU :' . $test['cpu'] : ' ' }}
                                    {{ $test['hd'] ? 'HD :' . $test['hd'] : ' ' }}

                                </td>
                                <td style="height: 40px; width: 4%;"> </td>
                                <td style="height: 40px; width: 4%;"> </td>
                                <td style="height: 40px; width: 4%;"> </td>
                                <td style="height: 40px; width: 4%; text-align:center"> {{ $test['quantity'] }}</td>
                                <td style="height: 40px; width: 4%;"> </td>
                                <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">

                                    {{ $test['sn'] ? '  S N :' . $test['sn'] : ' ' }}

                                </td>
                                <td style="height: 40px; width: 13%;  text-align:center" colspan="2">
                                    <span
                                        style="font-size:15px; text-align:center">{{ $test['screen_type'] ? $test['screen_type'] . ' - ' . $test['screen_serial'] : ' ' }}</span>
                                </td>

                                <!-- <td style="height: 40px; width: 4%;"  > </td> -->
                                <td style="height: 40px; width: 4%;"> </td>
                                <td style="height: 40px; width: 4%;"> </td>
                                <td style="height: 40px; width: 4%;"> </td>

                            </tr>
                        @endforeach
                    @else
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                        <tr style="height: 40px;" class="sub-table">
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 40px; width: 4%;"></td>
                            <td style="height: 10px; width: 30%; direction: ltr ">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%; text-align:center"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 13%; text-transform:none;  " colspan="2">


                            </td>
                            <td style="height: 40px; width: 4%;"> </td>

                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>
                            <td style="height: 40px; width: 4%;"> </td>

                        </tr>
                    @endif



                </tbody>
            </table>
        </div>

        <section id="footer" style="">
            <div class="footer-tawqe3" style=" ">
                <p style="margin-top:10px" style="margin-right:50px">المسلم</p>
                <p style="margin-top:10px">درجه / {{ $settings->take_degree ?? ' ' }}</p>
                <p style="margin-top:10px">اســـــم / {{ $settings->take_name ?? ' ' }}</p>
                <p style="margin-top:10px">رقم عسكرى / {{ $settings->take_num_mil ?? ' ' }}</p>
                <p style="margin-top:10px">التوقيع /</p>
            </div>
            <div style=" ">
                <p style="margin-top:10px" style="margin-right:50px">المستلم</p>
                <p style="margin-top:10px">درجه /</p>
                <p style="margin-top:10px">اســـــم /</p>
                <p style="margin-top:10px">رقم عسكرى /</p>
                <p style="margin-top:10px">التوقيع /</p>
            </div>

            <div style=" ;">
                <p style="margin-top:10px" style="margin-right:50px">يعتمد</p>
                <p style="margin-top:10px">الرتبه / {{ $settings->degree ?? ' ' }}</p>
                <p style="margin-top:10px">الاسم / {{ $settings->name ?? ' ' }}</p>
                <p style="margin-top:10px"> {{ $settings->boss ?? ' ' }}</p>
                <p style="margin-top:10px">التوقيع /</p>

            </div>
        </section>


    </div>
</body>

</html>
