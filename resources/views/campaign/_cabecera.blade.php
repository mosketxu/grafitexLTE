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
