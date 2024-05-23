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



        .page-content {
            padding: 0 !important
        }

        .bor thead {
            background: #ececf1
        }

        .bor thead tr td {
            border: 2px solid #000;
            padding: 10px;
            font-weight: bold;
            font-size: 15px;

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
            font-size: 12px;
            text-align: center
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
    </style>
</head>

<body>
    <div class="init-content">
        <div id="content-wrap">
           
          
         
        <h2 style="text-align:center">بيان ب {{ $type}} {{$model === null ? '' :'طراز ' .$model}}  {{$type == null && $main == null ? ' بكل الانواع في كل الافرع' : ' الموجود في' }}    {{$main}}   {{$sub == null ? ' ' : ' ' . $sub}}</h2>
          
                <table class="bor" style="width: 100%; margin-bottom:50px" border="7">
                    <thead>
                        <tr> 
                            <td style="height:10px" rowspan="2">م </td>
                            <td style=" width: 2.693%;height:10px" rowspan="2">النوع </td>
                            <td style=" width: 2.693%;height:10px" rowspan="2">الطراز </td>
                            <td style=" width: 2.15464%;height:10px" rowspan="2">الرقم المسلسل </td>
                            <td style=" width: 2.693%;height:10px" rowspan="2">الفرع </td>
                            <td style=" width: 2.15464%;height:10px" rowspan="2">المحور </td>
                            <td style=" width: 2.15464%;height:10px" rowspan="2">نوع الشاشة </td>
                            <td style=" width: 2.15464%;height:10px" rowspan="2">الرقم المسلسل </td>
                            <!-- <td style=" width: 2.15464%;height:10px" rowspan="2">الكميه </td> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $key=>$item)
                            <tr style="height: 40px;" class="sub-table">
                                <td style="height: 40px; width: 0.5%;">{{ $key+1 }}</td>
                                <td style="height: 40px; width: 4%;">{{ $item->item->type }}</td>
                                <td style="height: 40px; width: 10%;">{{ $item->item->model }}</td>
                                <td style="height: 40px; width: 4%;">{{ $item->sn }}</td>
                                <td style="height: 40px; width: 4%;">{{ $item->main_place }}</td>
                                <td style="height: 40px; width: 4%;">{{ $item->sub_place }}</td>
                                <td style="height: 40px; width: 4%;">{{ $item->screen_type }}</td>
                                <td style="height: 40px; width: 4%;">{{ $item->screen_serial }}</td>
                                <!-- <td style="height: 40px; width: 2%;">{{ $item->quantity }}</td> -->
                            </tr>
                             
            @endforeach
                       

                    </tbody>
                </table>
        </div>
    </div>
</body>

</html>
