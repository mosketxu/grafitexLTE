@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Tarifa Editar')
@section('titlePag','Edición de la tarifa')
@section('navbar')
{{-- @include('campaign._navbarcampaign') --}}
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
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
                @endif
            <div class="card">
                <form id="formcampaign" role="form" method="POST" action="{{ route('tarifa.update',$tarifa->id) }}">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="card-header">
                        <h5>Tarifa {{$tarifa->tipo===0 ? 'Materiales' : $tarifa->tipo===1 ? 'Picking' : 'Transportes'}}</h3> 

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col">
                                <label for="familia">Tarifa</label>
                                <input type="text" class="form-control form-control-sm" name="familia" value="{{ $tarifa->familia }}" readonly/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="tramo1">Tramo 1</label>
                                <input type="number" class="form-control form-control-sm" id="tramo1" name="tramo1" value="{{ old('tramo1',$tarifa->tramo1) }}"/>
                            </div>
                            <div class="form-group col">
                                <label for="tarifa1">Tarifa 1</label>
                                <input type="number" step="0.01" class="form-control form-control-sm" id="tarifa1" name="tarifa1" value="{{ old('tarifa1',$tarifa->tarifa1) }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="tramo2">Tramo 2</label>
                                <input type="number" class="form-control form-control-sm" id="tramo2" name="tramo2" value="{{ old('tramo2',$tarifa->tramo2) }}"/>
                            </div>
                            <div class="form-group col">
                                <label for="tarifa2">Tarifa 2</label>
                                <input type="number"  step="0.01" class="form-control form-control-sm" id="tarifa2" name="tarifa2" value="{{ old('tarifa2',$tarifa->tarifa2) }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="tramo3">Tramo 3</label>
                                <input type="number" class="form-control form-control-sm" id="tramo3" name="tramo3" value="{{ old('tramo3',$tarifa->tramo3) }}"/>
                            </div>
                            <div class="form-group col">
                                <label for="tarifa3">Tarifa 3</label>
                                <input type="number"  step="0.01" class="form-control form-control-sm" id="tarifa3" name="tarifa3" value="{{ old('tarifa3',$tarifa->tarifa3) }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <input type ='button' class="btn btn-default" onclick="javascript:history.back()" value="Volver"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scriptchosen')
{{-- <script src="{{ asset('js/campaignElementos.js')}}"></script> --}}

<script>

</script>

<script>
    $('#menucampaign').addClass('active');
    $('#navcampaignedit').toggleClass('activo');
</script>

@endpush
