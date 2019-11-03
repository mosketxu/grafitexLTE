<div class="text-center">
        @if($campaign_state===0)
                <i class="fas fa-circle text-primary fa-lg"></i>
        @elseif($campaign_state===1)
                <i class="fas fa-circle text-warning fa-lg"></i>
        @else
                <i class="fas fa-circle text-success fa-lg"></i>
        @endif
        &nbsp; &nbsp;&nbsp;
        <a href="{{route('campaign.elementos', $id ) }}" title="Elementos"><i class="far fa-eye text-success fa-lg mr-1"></i></a>
        <a href="{{route('campaign.filtrar', $id) }}" title="Edit"><i class="fas fa-filter text-primary fa-lg mx-1"></i></a>
        <a href="{{route('campaign.destroy', $id )}}" title="Delete"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
</div>