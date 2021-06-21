<div class="panel panel-default">
  <div class="panel-heading">
    Affiliates 
    <span class="label label-info pull-right">2 Affiliates</span>
  </div>
  <div class="panel-body">
    <div class="media">
      <a class="pull-left">
        <img alt="Bootstrap Media Another Preview" width="50px" height="50px" src="/img/default-picture.jpg" class="img-circle media-object" />
      </a>
      <div class="media-body">
        <small class="pull-right">5m ago</small>
        <strong>Eric Jun Locop</strong> wants to be your Affiliate.
        <small>Today 5:60 pm - 4.22.2016</small>
        <div class="pull-right">
          <form action='/users/affiliates/confirm' method='POST'>
            <input type='hidden' name='affiliate_id' value='7' />
            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
          <a href="" class="btn btn-xs btn-primary">Accept</a>
          <a href="" class="btn btn-xs btn-default">Decline</a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>