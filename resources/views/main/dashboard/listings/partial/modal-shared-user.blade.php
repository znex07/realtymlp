<!-- Modal -->
<div class="modal fade" id="shared-users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="z-index: 1400;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1">View Shared Users</h4>
      </div>
      <div class="modal-body">

        <div class="shared-user-template" style="display: none;">
          <div class="col-xs-12 wrapper" style="margin: 2px 0;">
            <div class="col-xs-2" align="center" style="">
              <img src="/img/img_placeholder.png" alt="" style="width: auto;height: 50px; ">
            </div>
            <div class="col-xs-7" style="padding-top: 10px; height: 50px;">
              <span class='shared-user-fullname' style='text-transform: capitalize;'>Full name</span>
              <span class='' style='position: absolute;right: 10px; margin: 10px 0;text-transform: capitalize; color: #B1B1B1; font-size: 10px;'> Shared at <span class='shared-user-date'></span></span>
            </div>
            <div class="col-xs-3 pull-right" style="padding-top: 10px; height: 50px;">
              <input type="hidden" class="pivots">
              <button class="btn btn-xs btn-info" data-target='#shared-users-edit-dataset' data-toggle='modal' data-user-id=''><i class="fa fa-edit"></i> Edit Data-set</button>
            </div>
          </div>
        </div>
        {{-- template --}}
        {{-- container --}}
        <div class="row shared-user-container">

        </div>
        {{-- //container --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary" id="save_changes">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="shared-users-edit-dataset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="z-index: 1600;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2">Edit Dataset for <span id="share-fullname" style="text-transform: capitalize;"></span></h4>
      </div>
      <div class="modal-body">
        @include('main.dashboard.profile.checkbox')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" data-user='' data-property='' class="btn btn-primary" id="save_dataset">Save changes</button>
      </div>
    </div>
  </div>
</div>