@if($user->user_subscription == '1') 
<label class="label label-default">Free</label> 
@elseif($user->user_subscription == '2') 
<label class="label label-primary">Premium</label> 
@endif 