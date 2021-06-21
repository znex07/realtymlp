<div class="col-xs-12 col-md-10 col-md-offset-1">
    <div class="form-group hidden" style="font-size: 14px;"><span style="color:red;" id="totalMB">0MB</span> of 2.00MB</div>
    <h6 class="h6Header">TOTAL SIZE OF IMAGES &amp; ATTACHMENTS </h6>
    <span id="mbCounter-wrapper" style=""><span id="mbCounter">0</span> mb out of 2 mb</span>
    <div class="form-group">
      <div class="progress" id="progress-files"  style="margin-top:10px;height:20px;">
        <div style="transition:width 1s; background:#5b9bd1 !important;" class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div id="accordion">
      <div class="panel panel-default" style="margin-top: 15px;">
        <div class="panel-heading" id="header-img">
          <a role="button" data-parent="#accordion" data-toggle="collapse" href="#collapse-img" aria-expanded="true" aria-controls="collapse-img">
            <h6 class="panel-title">
              Image Attachments
              <span class="pull-right text-muted img-ctr">
                (
                <b>Files:</b>
                  <span class="att-img-counter file-qty text-primary">0</span> |
                <b>Size:</b>
                  <span class="att-img-size file-size  text-primary">0</span> MB
                )
              </span>
            </h6>
          </a>
        </div>
        <div id="collapse-img" class="panel-collapse collapse" role="tabpanel" aria-labelledby="header-img">
          <div class="panel-body">
            @if ($type == 'edit' && $property->images()->count())
            @foreach($property->images as $img)
              <input type="hidden" class="att-img" data-size="{{ $img->file_size }}" data-id="{{ $img->id }}" data-path="{{ $img->file_path }}" data-name="{{ $img->orig_name }}">
            @endforeach
            @endif
            <div class="form-group dropzone" id="dropzone-image">
              <div class="dropzone-previews-img"></div>
            </div>
          </div>
        </div>
      </div>


      <div class="panel panel-default" style="margin-top: 15px;">
        <div class="panel-heading" id="header-doc">
          <a role="button" data-parent="#accordion" data-toggle="collapse" href="#collapse-doc" aria-expanded="true" aria-controls="collapse-doc">
            <h6 class="panel-title">
              Documents Attachments
              <span class="pull-right text-muted doc-ctr">
                (
                <b>Files:</b>
                  <span class="att-doc-counter file-qty text-primary">0</span> | 
                <b>Size:</b>
                  <span class="att-doc-size file-size text-primary">0</span> MB
                )
              </span>
            </h6>
          </a>
        </div>
        <div id="collapse-doc" class="panel-collapse collapse" role="tabpanel" aria-labelledby="header-doc">
          <div class="panel-body">
            @if ($type == 'edit' && $property->documents()->count())
            @foreach($property->documents as $doc)
              <input type="hidden" class="att-doc" data-size="{{ $doc->file_size }}" data-id="{{ $doc->id }}" data-path="{{ $doc->file_path }}" data-name="{{ $doc->orig_name }}">
            @endforeach
            @endif
            <div class="form-group dropzone" id="dropzone-docs">
              <div class="dropzone-previews-doc"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
      {{-- <h6 class="h6Header">image attachments</h6>
      @if ($type == 'edit' && $property->images()->count())
      @foreach($property->images as $img)
      <input type="hidden" class="att-img" data-size="{{ $img->file_size }}" data-id="{{ $img->id }}" data-path="{{ $img->file_path }}" data-name="{{ $img->orig_name }}">
      @endforeach
      @endif
      <div class="form-group dropzone" id="dropzone-image">
        <div class="dropzone-previews-img"></div>
      </div> --}}

      {{--  <h6 class="h6Header">document attachments</h6>
      @if ($type == 'edit' && $property->documents()->count())
      @foreach($property->documents as $doc)
      <input type="hidden" class="att-doc" data-size="{{ $doc->file_size }}" data-id="{{ $doc->id }}" data-path="{{ $doc->file_path }}" data-name="{{ $doc->orig_name }}">
      @endforeach
      @endif
      <div class="form-group dropzone" id="dropzone-docs">
        <div class="dropzone-previews-doc"></div>
      </div> --}}
      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"  onclick="wiz.gotoStep(5,true);wiz.step_5();" id="fourthStep" ><span>Next <i class='fa fa-arrow-right'></i></span></button>
      <button class="btn btn-primary prevBtn btn-lg pull-right" type="button"  onclick="wiz.gotoStep(3,true);wiz.step_3();" style="margin-right:10px;"><span><i class='fa fa-arrow-left'></i> Previous</span></button>
    </div>
