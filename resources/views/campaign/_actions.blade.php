<div class="text-center">
@if($campaign_state===0)
        <i class="fas fa-circle text-primary fa-xs"></i>
@elseif($campaign_state===1)
        <i class="fas fa-circle text-warning fa-xs"></i>
@else
        <i class="fas fa-circle text-success fa-xs"></i>
@endif
&nbsp; &nbsp;
<a href="{{route('campaign.edit', $id ) }}" title="Show"><i class="far fa-eye text-success"></i></a>
<a href="{{route('campaign.edit', $id) }}" title="Edit"><i class="far fa-edit text-primary"></i></a>
<a href="{{route('campaign.destroy', $id )}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
</div>