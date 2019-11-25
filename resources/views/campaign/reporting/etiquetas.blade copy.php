<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Etiquetas campaña {{$campaign->campaign_name}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/pdf.css')}}">
    <style>
            @page { margin: 180px 50px; }
            #header { position: fixed; left: 0px; top: -0px; right: 0px; height: 150px;; text-align: center; }
            #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px;  }
            #footer .page:after { content: counter(page, upper-roman); }
    </style>
</head>

<body>
    <div id="header">
        <table width="100%" cellspacing="0">
            <thead>
                <tr style="background-color: #139cdc;">
                    <th style="text-align: right;" width="25%">
                        <img src="{{asset('storage/grafitexLogo.png')}}" width="50px"></th>
                    <th class="titulo"  width="50%">
                        MATERIAL INTERNO <br>
                        CAMPAÑA {{$campaign->campaign_name}}<br>
                        Grafitex Servicios Digitales, S.A.
                    </th>
                    <th style="color:#ffffff;text-align:center;"  width="25%">
                        Fecha prevista: {{$campaign->campaign_enddate}}
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="">
        @foreach($etiquetas as $store)            
        {{$store->store_id}} {{$store->store}}
                <table width="100%">
                    <thead>
                        <tr>
                            <th width="25%"></th>
                            <th width="25%"></th>
                            <th width="25%"></th>
                            <th width="25%"></th>
                        </tr>
                    </thead>

                   <tbody>
                        @foreach($store->campaignelementos->chunk(4) as $chunk)
                        <tr>
                            @foreach($chunk as $etiqueta)
                            <td class="celda">
                                {{$etiqueta['store'] }}<br>
                                {{$etiqueta['mobiliario'] }}<br>
                                {{$etiqueta['propxelemento'] }}<br>
                                {{$etiqueta['carteleria'] }}<br>
                                {{$etiqueta['medida'] }}<br>
                                {{$etiqueta['material'] }}<br>
                                {{$etiqueta['unitxprop'] }}<br>
                                {{$etiqueta['observaciones'] }}<br>
                                <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$etiqueta['imagen'])}}" 
                                    class="img-thumbnail"/>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div style="page-break-after:always;"><br>
                <br>
                <br>
                <br>
                <br></div>

        @endforeach
    </div>
    <div id="footer">
        <p class="page">Page </p>
    </div>
</body>

</html>