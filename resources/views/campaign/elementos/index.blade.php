@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Elementos Campaña')
@section('titlePag','Elementos de la Campaña')
@section('navbar')
    @include('campaign._navbaredit')
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('campaignElementos') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content header --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto ">
                        <span class="h3 m-0 text-dark">@yield('titlePag')</span>
                        <span class="hidden" id="campaign_id"></span>
                    </div>
                    <div class="col-auto mr-auto">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumbs')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="campaign_name">Campaña</label>
                                        <input type="text" class="form-control form-control-sm" id="campaign_name"
                                            name="campaign_name"
                                            value="{{ old('campaign_name',$campaign->campaign_name) }}" disabled />
                                    </div>
                                    <div class="form-group col">
                                        <label for="campaign_initdate">Fecha Inicio</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                                            name="campaign_initdate"
                                            value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                                            disabled />
                                    </div>
                                    <div class="form-group col">
                                        <label for="campaign_enddate">Fecha Finalización</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                                            name="campaign_enddate"
                                            value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tcampaignElementos" class="table table-hover table-sm small" cellspacing="0" width=100%>
                                <thead>
                                    <tr>
                                        <th class="d-none">#</th>
                                        <th>Store</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Area</th>
                                        <th>Segmento</th>
                                        <th>Store Concept</th>
                                        <th>Ubicación</th>
                                        <th>Mobiliario</th>
                                        <th>Prop x Elemento</th>
                                        <th>Carteleria</th>
                                        <th>Medida</th>
                                        <th>Material</th>
                                        <th>Unit x Prop</th>
                                        <th>Observaciones</th>
                                        <th width="100px">Imagen </th>
                                        <th width="100px" class="text-center"><span class="ml-1">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($elementos as $elemento)
                                   <tr>
                                    <form id="form{{$elemento->id}}" role="form" method="post" action="javascript:void(0)" enctype="multipart/form-data" id="uploadimage{{$elemento->id}}">
                                    {{-- <form id="" role="form" method="post" action="{{ route('campaign.elementos.updateimagenindex') }}" enctype="multipart/form-data" id="uploadimage{{$elemento->id}}"> --}}
                                        @csrf
                                        <input type="text" class="d-none" id="elementoId" name="elementoId" value="{{$elemento->id}}">
                                        <td class="d-none">{{$elemento->id}}</td>
                                        <td>{{$elemento->store}}</td>
                                        <td>{{$elemento->name}}</td>
                                        <td>{{$elemento->country}}</td>
                                        <td>{{$elemento->area}}</td>
                                        <td>{{$elemento->segmento}}</td>
                                        <td>{{$elemento->storeconcept}}</td>
                                        <td>{{$elemento->ubicacion}}</td>
                                        <td>{{$elemento->mobiliario}}</td>
                                        <td>{{$elemento->propxelemento}}</td>
                                        <td>{{$elemento->carteleria}}</td>
                                        <td>{{$elemento->medida}}</td>
                                        <td>{{$elemento->material}}</td>
                                        <td>{{$elemento->unitxprop}}</td>
                                        <td>{{$elemento->observaciones}}</td>
                                        <td>
                                            <div class="">
                                                <input type="file" id="inputFile{{$elemento->id}}" name="photo" style="display:none">
                                                @if(file_exists( 'storage/galeria/'.$campaign->id.'/'.$elemento->imagen ))
                                                    <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$elemento->imagen)}}" alt={{$elemento->imagen}} title={{$elemento->imagen}}
                                                        id="original{{$elemento->id}}" class="img-fluid img-thumbnail" 
                                                        style="width: 100px;cursor:pointer"
                                                        onclick='document.getElementById("inputFile{{$elemento->id}}").click()'/>
                                                @else
                                                    <img src="{{asset('storage/galeria/pordefecto.jpg')}}"  alt={{$elemento->imagen}} title={{$elemento->imagen}}
                                                        id="original{{$elemento->id}}" class="img-fluid img-thumbnail" 
                                                        style="width: 100px;cursor:pointer"
                                                        onclick='document.getElementById("inputFile{{$elemento->id}}").click()'/>
                                                @endif                                        
                                                {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></a> --}}
                                                </div>
                                            </td>
                                            <td width="100px">
                                                <div class="text-center">
                                                <a href="#" name="Upload" onclick="subirImagenIndex('form{{$elemento->id}}','{{$elemento->id}}')"><i class="fas fa-upload text-primary fa-lg mx-1"></i></a>
                                                <a href="{{ route('campaign.elemento.editelemento',[$campaign->id,$elemento->id]) }}" title="Edit"><i class="far fa-edit text-primary fa-lg mx-1"></i></a>
                                                {{-- <a href="" title="Delete"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a> --}}
                                            </div>
                                       </td>
                                    </form>
                                   </tr>
                                   @endforeach
                                   {{ $elementos->links() }}
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')

<script>
    $(document).ready(function() {
   
    });
   function subirImagenIndex(formulario,elementoId){
        var token= $('#token').val();
        let timestamp = Math.floor( Date.now() );
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('#token').val() },
        });
        
        var formElement = document.getElementById(formulario);
        var formData = new FormData(formElement);
        formData.append("elementoId", elementoId);
        
        $.ajax({
            type:'POST',
            url: "{{ route('campaign.elementos.updateimagenindex') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#'+formulario +' img').remove();
                $('#original'+elementoId).attr('src', '/storage/galeria/'+ data.campaign_id+'/'+ data.imagen+'?ver=' + timestamp);
                toastr.info('Imagen actualizada con éxito','Imagen',{
                    "progressBar":true,
                    "positionClass":"toast-top-center"
                });
            },
            error: function(data){
                console.log(data);
                toastr.error("No se ha actualizado la imagen.<br>"+ data.responseJSON.message,'Error actualización',{
                    "closeButton": true,
                    "progressBar":true,
                    "positionClass":"toast-top-center",
                    "options.escapeHtml" : true,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": 0,
                });
            }
        }); 
    }

    $('#menucampaign').addClass('active');
    $('#navelementos').toggleClass('activo');

</script>

@endpush