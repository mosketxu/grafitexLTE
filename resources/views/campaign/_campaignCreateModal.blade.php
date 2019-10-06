<!-- Modal -->
<div class="modal fade" id="campaignCreateModal" tabindex="-1" role="dialog" aria-labelledby="campaignCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="campaignCreateModalLabel">Nueva campaña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- @include('partials._errores') --}}
                    <form method="post" action="{{ route('campaign.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="campaign_name">Campaña</label>
                                <input type="text" class="form-control form-control-sm" id="campaign_name" name="campaign_name" value="{{ old('campaign_name') }}" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col">
                                <label for="campaign_initdate">Fecha Inicio</label>
                                <input type="date" class="form-control form-control-sm" id="campaign_initdate" name="campaign_initdate" value="{{ old('campaign_initdate') }}"/>
                            </div>
                            <div class="form-group col">
                                <label for="campaign_enddate">Fecha Finalización</label>
                                <input type="date" class="form-control form-control-sm" id="campaign_enddate" name="campaign_enddate" value="{{ old('campaign_enddate') }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group input-group-sm mb-3 col-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-store text-primary"></i></span>
                                </div>
                                <select id="listastores" data-placeholder="Stores..." class="form-control select2" style="width:90%;" multiple  name="campaign_storeId[]">
                                    @foreach ($stores as $store )
                                        <option value="{{$store->id}}">{{$store->id}} {{$store->store_name}}</option>                                
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" name="Guardar" onclick="form.submit()">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @push('scriptchosen')
        <script>
            $(document).ready(function() {
            
            $('.select2').select2({
                placeholder: 'Stores de la campaña'
                });
            });
        </script>
    @endpush
