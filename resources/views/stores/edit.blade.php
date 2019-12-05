@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Editar Store')
@section('titlePag','Edición de Stores')
@section('navbar')
    @include('_partials._navbar')
@endsection
@section('breadcrumbs')
{{-- {{ Breadcrumbs::render('campaignGaleria') }} --}}
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
                    <h5>Edición Store</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                                <form method="post" action="{{ route('store.store') }}">
                                        @csrf
                                        <input  type="hidden" class="form-control form-control-sm" id="pais" name="pais" value="si no lo pongo da error ¿¿?? algun resto de memoria">
                                        <div class="row">
                                            <div class="form-group col-2">
                                                <label for="id">Store</label>
                                                <input  type="text" class="form-control form-control-sm" id="id" name="id" value="{{old('id')}}">
                                            </div>
                                            <div class="form-group  col-4">
                                                <label for="name">Nombre</label>
                                                <input  type="text" class="form-control form-control-sm" id="name" name="name" value="{{old('name')}}">
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="country">Country</label>
                                                <select class="form-control form-control-sm" id="country" name="country" >
                                                    <option value="">Selecciona</option>
                                                    <option value="ES">ES</option>
                                                    <option value="PT">PT</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="area">Area</label>
                                                <select class="form-control form-control-sm" id="area_id" name="area_id" >
                                                    <option value="">Selecciona</option>
                                                    @foreach($areas as $area )
                                                    <option value="{{$area->id}}" {{old('area_id')==$area->id ? 'selected' : ''}}>{{$area->area}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="segmento">Segmento</label>
                                                <select class="form-control form-control-sm" id="segmento" name="segmento" >
                                                    <option value="">Selecciona</option>
                                                    @foreach($segmentos as $segmento )
                                                    <option value="{{$segmento->id}}" {{old('segmento')==$segmento->id ? 'selected' : ''}}>{{$segmento->segmento}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="concepto">Concepto</label>
                                                <select class="form-control form-control-sm" id="concepto_id" name="concepto_id" >
                                                    <option value="">Selecciona</option>
                                                    @foreach($conceptos as $concepto )
                                                    <option value="{{$concepto->id}}" {{old('concepto_id')==$concepto->id ? 'selected' : ''}}>{{$concepto->storeconcept}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones</label>
                                            <input  type="text" class="form-control form-control-sm" id="observaciones" name="observaciones" value="{{old('observaciones')}}">
                                        </div>
    
    
                                        
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" name="Guardar" onclick="form.submit()">Guardar</button>
                                    </div>
                                </form>
                        </div>
                        <div class="col-4">
                            Aqui va la imagen
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scriptchosen')
{{-- <script src="{{ asset('js/campaignElementos.js')}}"></script> --}}

<script>
    $(document).ready(function (e) {
        var token= $('#token').val();
        let timestamp = Math.floor( Date.now() );
        $('#imageUploadForm').on('submit',(function(e) {
            $('#original').attr('src', '');
            $.ajaxSetup({
                headers: { "X-CSRF-TOKEN": $('#token').val() },
            });
  
            e.preventDefault();
  
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('campaign.galeria.update') }}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    $('#uploadForm + img').remove();
                    $('#original').attr('src', '/storage/galeria/'+ data.campaign_id+'/'+ data.imagen+'?ver=' + timestamp);
                },
                error: function(data){
                    console.log(data);
                }
            });
        }));
    });

    function subirImagen(formulario,imagenId){
        var token= $('#token').val();
        let timestamp = Math.floor( Date.now() );
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('#token').val() },
        });
        
        var formElement = document.getElementById(formulario);
        var formData = new FormData(formElement);
        formData.append("imagenId", imagenId);
        
        $.ajax({
            type:'POST',
            url: "{{ route('campaign.galeria.updateimagenindex') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                // $('#'+formulario +' img').remove();
                $('#original').attr('src', '/storage/galeria/'+ data.campaign_id+'/'+ data.imagen+'?ver=' + timestamp);
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

</script> 

<script>
    $('#menucampaign').addClass('active');
    $('#navgaleria').toggleClass('activo');
</script>

@endpush