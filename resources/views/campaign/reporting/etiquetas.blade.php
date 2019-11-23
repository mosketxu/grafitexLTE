<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Etiquetas</title>

    <!-- Styles -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/pdf.css')}}">
    
    <style>
        body {
            font-family: DejaVu Sans;
        }
    </style>
</head>

<body>
    {{$today}}
    <div class="container">
        @foreach($etiquetas as $store)            
        {{$store->store_id}} {{$store->store}}
                <table>
                    <thead>
                        <tr>
                            <th>Store</th>
                            <th>Mobiliario</th>
                            <th>Propxelemento</th>
                            <th>Carteleria</th>
                            <th>Medida</th>
                            <th>Material</th>
                            <th>Unit x Prop</th>
                            <th>Imagen</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                   <tbody>
                        @foreach($store->campaignelementos as $etiqueta)
                        <tr>
                            <td>{{$etiqueta['store'] }}</td>
                            <td>{{$etiqueta['mobiliario'] }}</td>
                            <td>{{$etiqueta['propxelemento'] }}</td>
                            <td>{{$etiqueta['carteleria'] }}</td>
                            <td>{{$etiqueta['medida'] }}</td>
                            <td>{{$etiqueta['material'] }}</td>
                            <td>{{$etiqueta['unitxprop'] }}</td>
                            <td>{{$etiqueta['imagen'] }}</td>
                            <td>{{$etiqueta['observaciones'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div style="page-break-after:always;"></div>
        @endforeach
    </div>
</body>

</html>