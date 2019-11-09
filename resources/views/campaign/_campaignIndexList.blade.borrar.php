<div class="card mb-3">
    <div class="card-header text-primary">
        <div class="row">
                <div class="col-auto ">
                    <i class="fas fa-fw fa-address-card"></i>
                    Campañas
                </div>
                <div class="col-auto mr-auto">
                    <a  href="" role="button" data-toggle="modal" data-target="#campaignCreateModal"><i class="fas fa-plus-circle fa-lg text-primary"></i></a>
                </div>

                <div class="col-auto">
                    <form method="GET" action="{{route('campaign.index') }}">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search fa-sm text-primary"></i></span>
                            </div>
                            <input id="busca" name="busca"  type="text" class="form-control" name="search" value='' placeholder="Search for..."/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @include('campaign._campaignsTable')
    </div>
</div>