@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Nuevo '.ucfirst($campo))
@section('titlePag','Nuevo '.ucfirst($campo))
@section('navbar')
    @include('_partials._navbar')
@endsection
@section('breadcrumbs')
{{-- {{ Breadcrumbs::render('campaignElementos') }} --}}
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
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formelemento" role="form" method="POST" action="{{ route($route) }}">
                                @csrf
                                <div class="card-body">
                                <input type="text" class="d-none" id="id" name="id"
                                    value="{{$datos->id}}">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label col-form-label-sm" for="store">{{ucfirst($campo)}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-sm form-control" id={{$campo}} name={{$campo}} value="{{old($campo)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')

<script>
    $('#menucampaign').addClass('active');
    $('#navelemento').toggleClass('activo');
</script>

@endpush