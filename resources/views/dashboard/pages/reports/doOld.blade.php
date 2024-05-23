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

.bor thead{background: #ececf1}
.bor thead tr td {
    border: 2px solid #000;
    padding: 10px;
    font-weight: bold;
    font-size: 15px;

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
 
table,
tbody tr td {

    border-collapse: collapse;
    text-transform: capitalize;
    color: #000;
    font-weight: bold;
    text-align: center;
    font-size:13px;
    padding: 0 4px;
    border: 2px solid #000
}

 

</style>
</head>
<body>
<div class="init-content">
        <div id="content-wrap">



        <h2 style="text-align:center">لجنه الكهنه</h2>
                <table class="bor" style=" " border="7">
                    <thead>
                        <tr >
                       
                            <td style=""  >م   </td>
                            <td style=""  >النوع   </td>
                            <td style=""  >الطراز   </td>
                            <td style=""  >الرقم المسلسل   </td>
                            <td style=""  >الملاحظات     </td>
 
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($oldTrans as $key => $trans)
                            <tr style="height: 40px;width:100%" class="sub-table">
                                    <td style="">{{$key+1}}</td>
                                    <td style="width:25%">{{$trans->item->type}}</td>
                                    <td style="width:35%">{{$trans->item->model}}</td>
                                    <td style="width:25%">{{$trans->sn}}</td>
                                    <td style="width:30%"> </td>
                                   
                                </tr>
                          
                        @endforeach



                    </tbody>
                </table>
        </div>

    </div>
</body>
</html>
