<div class="text-right">
        @if($campaign_state===0)
                <i class="fas fa-circle text-primary fa-lg"></i>
        @elseif($campaign_state===1)
                <i class="fas fa-circle text-warning fa-lg"></i>
        @else
                <i class="fas fa-circle text-success fa-lg"></i>
        @endif
        &nbsp; &nbsp;&nbsp;
        <a href="{{route('campaign.filtrar', $id) }}" title="Filtrar"><i class="fas fa-filter text-indigo fa-lg mx-1"></i></a>
        <a href="{{route('campaign.elementos', $id ) }}" title="Elementos"><i class="fab fa-elementor text-navy fa-lg mr-1"></i></a>
        <a href="{{route('campaign.galeria', $id ) }}" title="Galeria"><i class="far fa-images text-purple fa-lg mr-1"></i></a>
        <a href="{{route('campaign.presupuesto', $id ) }}" title="Presupuesto"><i class="fas fa-money-fuchsia text-success fa-lg mr-1"></i></a>
        <a href="{{route('campaign.albaranes', $id ) }}" title="Albaranes"><i class="fas fa-truck text-orange fa-lg mr-1"></i></a>
        <a href="{{route('campaign.destroy', $id )}}" title="Delete"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
</div>