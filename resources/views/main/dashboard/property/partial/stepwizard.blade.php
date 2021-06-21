<div class="stepwizard">
    <div class="stepwizard-row setup-panel" >
        <div class="stepwizard-step">
            <a href="#step-1" {{ $type == 'edit' ? 'disabled' : '' }} type="button" class="btn btn-primary btn-circle active stepped" onclick="wiz.gotoWizard(1)"><span class="glyphicon glyphicon-home"></span></a>
            <p class="hidden-xs">Start</p>
        </div>
        <div class="stepwizard-step" style="{{ $type=='create' ? 'visibility: hidden;' : '' }}">
            <a href="#step-2" {{ $type == 'edit' ? 'disabled' : '' }} type="button" class="btn btn-default btn-circle " onclick="wiz.gotoWizard(2);mapa.trigger_map();{{ $type=='edit' ? 'edit.setCenter();' : '' }}"><span class="glyphicon glyphicon-map-marker"></span></a>
            <p class="hidden-xs">Location</p>
        </div>
        <div class="stepwizard-step" style="{{ $type=='create' ? 'visibility: hidden;' : '' }}">
            <a href="#step-3" {{ $type == 'edit' ? 'disabled' : '' }} type="button" class="btn btn-default btn-circle" onclick="wiz.gotoWizard(3);wiz.step_3();"><span class="glyphicon glyphicon-list-alt"></span></a>
            <p class="hidden-xs">Details</p>
        </div>
        <div class="stepwizard-step" style="{{ $type=='create' ? 'visibility: hidden;' : '' }}">
            <a href="#step-4" {{ $type == 'edit' ? 'disabled' : '' }} type="button" class="btn btn-default btn-circle" onclick="wiz.gotoWizard(4,true)"><span class="glyphicon glyphicon-file"></span></a>
            <p class="hidden-xs">Attachments</p>
        </div>
        <div class="stepwizard-step" style="{{ $type=='create' ? 'visibility: hidden;' : '' }}">
            <a href="#step-5" {{ $type == 'edit' ? 'disabled' : '' }} type="button" class="btn btn-default btn-circle" onclick="wiz.gotoWizard(5);wiz.step_5();"><span class="glyphicon glyphicon-ok"></span></a>
            <p class="hidden-xs">Finish</p>
        </div>
    </div>
</div>