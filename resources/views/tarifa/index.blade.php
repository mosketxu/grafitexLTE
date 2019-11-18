@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Tarifas')
@section('titlePag','Tarifas')
@section('navbar')
@include('tarifa._navbartarifa')
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
                </div>
                <div class="col-auto mr-auto">
                    <a href="" role="button" data-toggle="modal" data-target="#tarifaCreateModal">
                        <i class="fas fa-plus-circle fa-lg text-primary mt-2"></i>
                    </a>
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
                </div>
                <div class="card-body">
                    {{-- links  y cuadro busqueda --}}
                    <div class="row">
                        <div class="col-10 row">
                            {{ $tarifas->links() }}
                        </div>
                        <div class="col-2 float-right mb-2">
                            <form method="GET" action="{{route('tarifa.index') }}">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-search fa-sm text-primary"></i></span>
                                    </div>
                                    <input id="busca" name="busca" type="text" class="form-control" name="search"
                                        value='{{$busqueda}}' placeholder="Search for..." />
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive" style="height: 500px">
                        <table id="tTarifas" class="table table-hover table-sm small sortable" cellspacing="0"
                            width=100%>
                            <thead>
                                <tr>
                                    <th>Familia</th>
                                    <th class="text-center">Tramo 1</th>
                                    <th class="bg-light text-center">Tarifa 1</th>
                                    <th class="text-center">Tramo 2</th>
                                    <th class="bg-light text-center">Tarifa 2</th>
                                    <th class="text-center">Tramo 3</th>
                                    <th class="bg-light text-center">Tarifa 3</th>
                                    <th width="150px" class="text-center"><span class="ml-1">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarifas as $tarifa)
                                <tr>
                                    {{-- <form id="form{{$tarifa->id}}" role="form" method="post"
                                    action="javascript:void(0)"> --}}
                                    <td>{{$tarifa->familia}}</td>
                                    <td class="text-center">{{$tarifa->tramo1}} </td>
                                    <td class="bg-light text-center">{{$tarifa->tarifa1}} €</td>
                                    <td class="text-center">{{$tarifa->tramo2}} </td>
                                    <td class="bg-light text-center">{{$tarifa->tarifa2}} €</td>
                                    <td class="text-center">{{$tarifa->tramo3}} </td>
                                    <td class="bg-light text-center">{{$tarifa->tarifa3}} €</td>
                                    <td width="150px">
                                        <form id="form_id" role="form" method="post" action="{{ route('tarifa.destroy',$tarifa->id) }}">
                                            <div class="text-center">
                                                <a href="{{route('tarifa.show', $tarifa->id) }}" title="Asignar Precios">
                                                    <i class="fas fa-filter text-teal fa-2x mx-1"></i>
                                                </a>
                                                <a href="{{ route('tarifa.edit',$tarifa->id) }}" title="Edit">
                                                    <i class="far fa-edit text-primary fa-2x mx-1"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="enlace"><i
                                                            class="far fa-trash-alt text-danger fa-2x ml-1"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tarifaCreateModal" tabindex="-1" role="dialog"
            aria-labelledby="tarifaCreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tarifaCreateModalLabel">Nueva Tarifa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('tarifa.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label for="familia">Familia</label>
                                    <input type="text" class="form-control form-control-sm" id="familia" name="familia"
                                        value="{{ old('familia') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="tramo1">Tramo 1</label>
                                    <input type="number" class="form-control form-control-sm" id="tramo1" name="tramo1"
                                        value="{{ old('tramo1') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="tarifa1">Tarifa 1</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" id="tarifa1"
                                        name="tarifa1" value="{{ old('tarifa1') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="tramo2">Tramo 2</label>
                                    <input type="number" class="form-control form-control-sm" id="tramo2" name="tramo2"
                                        value="{{ old('tramo2') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="tarifa2">Tarifa 2</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" id="tarifa2"
                                        name="tarifa2" value="{{ old('tarifa2') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="tramo3">Tramo 3</label>
                                    <input type="number" class="form-control form-control-sm" id="tramo3" name="tramo3"
                                        value="{{ old('tramo3') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="tarifa3">Tarifa 3</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" id="tarifa3"
                                        name="tarifa3" value="{{ old('tarifa3') }}" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" name="Guardar"
                                    onclick="form.submit()">Guardar</button>
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

<script src="{{ asset('js/sortTable.js')}}"></script>

<script>
   @if(Session::has('message'))
      toastr.options={
         progressBar:true,
         positionClass:"toast-top-center"
      };
      toastr.success("{{ Session::get('message') }}");
   @endif
   @if ($errors->any())
      @foreach ($errors->all() as $error)
         toastr.options={
            closeButton: true,
            progressBar:true,
            positionClass:"toast-top-center",
            showDuration: "300",
            hideDuration: "1000",
            timeOut: 0,
         };
         toastr.error("{{ $error }}");
      @endforeach
   @endif
</script>
<script>
    $(document).ready(function() {
   
    });

    $('#menutarifa').addClass('active');
    $('#navtarifas').toggleClass('activo');

</script>

@endpush