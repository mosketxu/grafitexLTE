<html>
    <head>
        <style>
            /** Define the margins of your page **/

        </style>
        <link rel="stylesheet" href="{{ asset('css/pdf.css')}}">
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
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
        </header>
        <footer>
            {{now()}} 
        </footer>


        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <div class="">
                @foreach($etiquetas as $store)        
                    <div class="etiquetas">
                        <table width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="25%">
                                        {{$store->store_id}} <br>
                                        {{$store->store}} Segmento
                                    </th>
                                    <th class="titulo2"  width="50%">
                                        {{$store->store}}
                                    </th>
                                    <th style="text-align:center;"  width="25%">
                                        <img src="{{asset('storage/SGH.jpg')}}" height="25px">
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>    
                    {{$store->store}}
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                </tr>
                            </thead>
        
                        <tbody>
                                @foreach($store->campaignelementos->chunk(5) as $chunk)
                                <tr>
                                    @foreach($chunk as $etiqueta)
                                    <td class="celda">
                                        Nombre: {{$etiqueta['carteleria'] }}<br>
                                        Mobiliario: {{$etiqueta['mobiliario'] }}<br>
                                        Material: {{$etiqueta['material'] }}<br>
                                        Medida: {{$etiqueta['medida'] }}<br>
                                        Cantidad: {{$etiqueta['unitxprop'] }}<br>
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
        </main>
    </body>
</html>