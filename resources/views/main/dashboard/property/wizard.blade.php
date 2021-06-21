@extends('main.dashboard.property.base')

@section('styles')
    <link rel="stylesheet" href="/assets/css/basic.min.css">
    <link rel="stylesheet" href="/assets/admincss/select2.min.css">
    <link rel="stylesheet" href="/assets/css/dropzone.min.css">
    <link rel="stylesheet" href="/assets/css/wizard.css">
    <link rel="stylesheet" href="/assets/css/dashboard/dashboard.css">
    <style type="text/css">
        ul {
            float: left;
            list-style: none;
            padding: 0px;

        }
        input, ul{
            width: 250px;
        }
        li:hover{
            color: #ff0000;
        }
    </style>
@endsection

@section('content.inner')
    <div class="col-xs-12 col-sm-9 content">

                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('main.dashboard.property.partial.stepwizard')
                        <form id="frm-property" ectype="multipart/form-data" method="post" action="{{ $type == 'create' ? '/property' : '/property/'.$property->id }}">
                            @if($type == 'edit')
                              @include('main.dashboard.property.hiddens.edit')
                            @else
                            <input type='hidden' name="property_code" value="PR-{{date('mdY').time()}}"/>
                            @endif
                            <input type="hidden" name="type" value="{{ $type }}">
                            <input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}' />

                            <input type='hidden' name='method_type' value='full' />
                            <input type='hidden' name="user_id" value="{{ Auth::user()->id }}" />

                            <input type="hidden" name="files_metadata" value="{{ $property->files_metadata }}">
                            <input type='hidden' id='full_address' name='full_address' value='' />
                                <input type='hidden' id='lp_bldg_name' name='lp_bldg_name' value='' />
                            <input type='hidden' id='lp_street_address' name='lp_street_address' value='' />
                            <input type='hidden' id='lp_brgy' name='lp_brgy' value='' />
                            <input type='hidden' id='lp_village' name='lp_village' value='' />
                            <input type='hidden' id='lp_city' name='lp_city' value='' />
                            <input type='hidden' id='lp_province' name='lp_province' value='' />
                            <input type='hidden' id='_sharables' name="_sharables" value='{{ $property->sharables }}' />
                            <div class="row setup-content" id="step-1">
                                @include('main.dashboard.property.steps.step1')
                            </div>
                            <div class="row setup-content" id="step-2" style="display:none;">
                                @include('main.dashboard.property.steps.step2')
                            </div>
                            <div class="row setup-content" id="step-3" style="display:none;">
                                @include('main.dashboard.property.steps.step3')
                            </div>
                            <div class="row setup-content" id="step-4" style="display:none;">
                                @include('main.dashboard.property.steps.step4')
                            </div>
                            <div class="row setup-content" id="step-5" style="display:none;">
                                @include('main.dashboard.property.steps.step5')
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>

@include('main.dashboard.property.modals.finish')

@endsection

@section('scripts')
    {{-- <script type="text/javascript" src="/assets/adminjs/select2.min.js"></script>
    <script>
      var myOwnSelect2 = $.fn.select2;
    </script> --}}
    <script type="text/javascript" src="/assets/adminjs/select2.min.js"></script>
    <script type='text/javascript' src='/assets/js/wiz.js'></script>
    {{-- <script type='text/javascript' src='/assets/js/dropzone.min.js'></script> --}}
    <script type='text/javascript' src='/assets/js/mod-dropzone.js'></script>
    <script type='text/javascript' src='/assets/js/jquery.numeric.min.js'></script>
    {{--<script src="http://maps.googleapis.com/maps/api/js?v=3.22" type="text/javascript"></script>--}}
    <script language="javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGmn-_-Q4FnEIofsyt2nDTmvLEICgxmgU&v=3&libraries=drawing+geometry"　async defer></script>
    <script type='text/javascript' src='/assets/js/gmaps.js'></script>
    <script type='text/javascript' src='/assets/js/mapa.js'></script>
    {{--<script type='text/javascript' src='/assets/js/gmaps.geometry.min.js'></script>--}}

    <script type='text/javascript' src='/assets/js/sharing.js'></script>
    <script type='text/javascript' src='/assets/js/wizard-upload.js'></script>
    <script type='text/javascript' src='/assets/js/wizard-step.js'></script>


        <script src='/assets/js/global.js'></script>
    {{-- <script type='text/javascript' src='/assets/js/bootstrap-multiselect.js'></script> --}}
    <script type="text/javascript">
        $(document).on('click','li',function(){
            var bldg = $(this).text();
            $('#bldg_name').val(bldg);
            $('#autoCompleteData').html("");
        });
        $(document).ready(function() {
        var _type = $('[name=type]').val();
        dz.init();
        wiz.init();
        $('#brgy').on('cut copy paste',wiz.preventDefault);
        $('#street_address').on('cut copy paste',wiz.preventDefault);
        $('#description').on('cut copy',wiz.preventDefault);
        $('#personal_notes').on('cut copy',wiz.preventDefault);
        $('#property_title').on('cut copy',wiz.preventDefault);
        $('#lot_area').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('#floor_area').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('#selling_price').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('#bedroom').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('#bathroom').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('#maid_room').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('#parking').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('#balcony').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
        $('.stepwizard-step a').click(function(e) {
            e.preventDefault();
        });
        $('input.enter').on('keypress',function(event){
            if ( event.which == 13 || event.which == 13 ) {
                event.preventDefault();
                return false;
            }
        });
        // $("#property_classification").select2({
    		// 	placeholder: "Select a Property Classification",
    		// }).on('select2:select', wiz.loadPropertyType)
        //   .on('select2:unselect', wiz.loadPropertyType);
        $('#property_classification').on('change', wiz.loadPropertyType);

        // $('#property_classification').select2({
        //   placeholder: 'wtf man'
        // });

        // $('input[name=funit_selector]').on('change',function(){
        //     console.log($(this).parent().find('label').text());
        //     $('.sqmsqf').text($(this).parent().find('label').text());
        // });
        $('.list_public').click(function(e) {
            e.preventDefault();
            $('.grid_view').hide();
            $('.list_view').fadeIn(100);
        });
        $('.grid_public').click(function(e) {
            e.preventDefault();
            $('.list_view').hide();
            $('.grid_view').fadeIn(100);
        });
        $('.sharing-viewability-wrapper').hide();

        $('[name=property_status]').on('change', function(e) {
            if ($('[name=property_status]#ps_public').is(':checked')) {
                $('[data-toggle=slide]').removeClass('hidden');
                $('#for_private').hide();
            }
            else {
                $($('[data-toggle=slide]').data('target')).fadeOut(200,function(e) {
                    $('[data-toggle=slide]').addClass('hidden');
                    $('#for_private').show();
                });
            }
        });
        $('[data-toggle=slide]').click(function(e) {
            $($(this).data('target')).slideToggle('fast');
        });
        // sharable options
        $('#scb_province').on('change', function(e) {
            if($(this).is(':checked'))
                $('#scb_city').prop('checked',false).parents('.col-md-3').fadeIn('fast')
            else
                $('#scb_city').prop('checked',false).parents('.col-md-3').fadeOut('fast')
        });
        if (_type == 'edit')
            mapa.init(true);
        else if (_type == 'create')
            mapa.init();
    })

    </script>
    @if($type == 'edit')
    <script type="text/javascript" src="/assets/js/wizard-edit.js"></script>
    <script>
    $(function(e) {
        setTimeout(function(e) {
            edit.init();

        },1000);
    });
    </script>
    @endif


@endsection
