@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Galeria Editar')
@section('titlePag','Selección de Imagenes de la Campaña')
@section('navbar')
@include('campaign._navbaredit')
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('campaignGaleria') }}
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
                                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                                        disabled />
                                </div>
                                <div class="form-group col">
                                    <label for="campaign_initdate">Fecha Inicio</label>
                                    <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                                        name="campaign_initdate"
                                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}" disabled />
                                </div>
                                <div class="form-group col">
                                    <label for="campaign_enddate">Fecha Finalización</label>
                                    <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                                        name="campaign_enddate"
                                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <form role="form" method="post" action="{{ route('campaign.galeria.update') }}" --}}
                    <form id="imageUploadForm" role="form" method="post" action="javascript:void(0)" enctype="multipart/form-data" id="uploadimage">
                        <input type="hidden" name="_tokenStore" value="{{ csrf_token()}}" id="tokenStore">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="idcampaigngaleria">Campaña</label>
                                <input type="text" class="form-control" id="idcampaigngaleria" name="idcampaigngaleria"
                                    value="{{$campaigngaleria->id}}">
                                <input type="text" class="form-control" id="campaign_id" name="campaign_id"
                                    value="{{$campaigngaleria->campaign_id}}">
                            </div>
                            <div class="form-group">
                                <label for="elemento">Elemento</label>
                                <input type="text" class="form-control" id="elemento" name="elemento"
                                    value="{{$campaigngaleria->elemento}}">
                                <label for="imagen">Imagen</label>
                                <input type="text" class="form-control" id="imagen" name="imagen"
                                    value="{{$campaigngaleria->imagen}}">
                            </div>
                            <div class="form-group">
                                <div class>
                                    <embed src="{{asset('storage/galeria/'.$campaigngaleria->imagen)}}" id="original" class="img-fluid" />
                                    {{-- <img src="" id="original" class="img-fluid" /> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <input type="file" class="form-control" id="inputFile" name="photo">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
                    $('#original').attr('src', '/storage/galeria/'+ data.imagen+'?ver=' + timestamp);
                },
                error: function(data){
                    console.log(data);
                }
            });
        }));
    });
</script> 

<script>
    $('#menucampaign').addClass('active');
    $('#navgaleria').toggleClass('activo');
</script>

@endpush