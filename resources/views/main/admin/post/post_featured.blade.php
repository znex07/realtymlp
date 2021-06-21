@extends('main.admin.base')
@section('styles')
    <link rel="stylesheet" href="/assets/css/basic.min.css">
    <link rel="stylesheet" href="/assets/css/dropzone.min.css">
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <form method="post" id="formFeatured" enctype="multipart/form-data" action="/admin/post/postFeatured">
                <input type='hidden' id="_token" name='_token' value='{{ csrf_token() }}' />
                <input type='hidden' name="property_code" value="PR-{{date('mdY').time()}}"/>
                <div id="data-container">
                    <!-- data contents goes here -->
                </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12 no-padding">
                            <h4 class="phead">Brand</h4>
                            <div class="form-group">
                                <label for="name" class="text-info">Name: </label>
                                <textarea id="name" name="name" class="form-control" style="resize: vertical;" placeholder="Name"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="type">Type: </label>
                                        <input type="text" class="form-control" name="type" id="type" placeholder='Type'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="municipality">Municipality: </label>
                                        <input type="text" class="form-control" name="municipality" id="municipality" placeholder='Municipality'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="text-info">Description: </label>
                                <textarea id="description" name="description" class="form-control" style="height: 150px;resize: vertical;" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="sub_description" class="text-info">Sub Description: </label>
                                <textarea id="sub_description" name="sub_description" class="form-control" style="height: 150px;resize: vertical;" placeholder="Sub Description"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 no-padding">
                            <h4 class="phead">Upload Pictures</h4>
                            <div class="" id="BrandTitleContainer" style="padding:0 !important;">
                                <div class="form-group dropzone" id="dropzone-brand">
                                    <div class="dropzone-previews-brand"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 no-padding">
                            <button type="submit" id="btnGo" class="btn btn-info"><span><i class="fa fa-ok"></i> Submit</span></button>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col-lg-12 no-padding">
                            

                            <div class="form-group">
                                <button type="button" id="addProperty" class="btn btn-primary"><span style="font-size: 16px;">Add Property <i class="fa fa-plus"></i><span></button>
                                <button type="button" id="collapseAll" class="btn btn-primary" style="display:none;"><span style="font-size: 16px;">Collapse All <i class="fa fa-eye "></i></span></button>
                            </div>
                            
                            <div class="panel-group" id="accordion" role="tablist">

                            </div>
                        </div>
                    </div>
                    
                </form>
            </div><!--/row -->
        </section>
    </section>
    <div class="panel panel-primary" id="propertyTemplate" style="display:none;" style="margin-top:5px; margin-bottom:5px;">
        <div class="panel-heading" role="tab" id="heading">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse">
                    Unit 1
                </a>
            </h4>
        </div>

        <div id="collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <div class="form-group">
                    <label for="txtPropertyTitle">Title</label>
                    <textarea id="txtPropertyTitle" class="form-control" placeholder="Title" style="resize: vertical;" name="title[]"></textarea>
                    <input type="hidden" name="unit_code[]" id="unit_code">
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                    <label class="input-group-addon" for="min_price1" id="addon-min"><small>MIN</small></label>
                                    <input type="text" name="min_price[]" autocomplete='off' class="form-control numeric" id="min_price1" placeholder="Price" aria-describedby="addon-min">
                                </div>
                            </div>
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                    <label class="input-group-addon" for="max_price1" id="addon-max"><small>MAX</small></label>
                                    <input type="text" name="max_price[]" autocomplete='off' class="form-control numeric" id="max_price1" placeholder="Price" aria-describedby="addon-max">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="txtPropertyBath">Baths</label>
                            <select name="baths[]" class="form-control" id="txtPropertyBath">
                                <option value="default" selected>Baths</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="2+">2+</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="txtPropertyParking">Parking</label>
                            <select name="parking[]" id="txtPropertyParking" class="form-control">
                                <option value="default" selected>Parking</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="2+">2+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="txtPropertyFloor">Floor Area</label>
                            <input type="text" class="form-control" id="txtPropertyFloor" name="floor_area[]" placeholder="Floor Area">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="txtPropertyAvailability">Available At</label>
                            <input type="text" class="form-control" id="txtPropertyAvailability" name="available_at[]" placeholder="Available at..">
                        </div>
                    </div>
                </div>
                <div class="form-group dropzone dropzone-property" id="dropzone-property">
                    <div class="_dropzone-previews dropzone-previews-property"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="loadingModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Please wait...</h4>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar active progress-bar-success progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span><span id="percent">40%</span> Complete (success)</span>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
<script type='text/javascript' src='/assets/js/jquery.numeric.min.js'></script>script>
<script src='/assets/js/dropzone.min.js'></script>
<script>
$(function(){
    
    Dropzone.autoDiscover = false;
    var token = $("#_token").val(),
        property_code = $("input[name=property_code]").val();
        data_container = $('#data-container'),
        propertyTemplate = $('#propertyTemplate'),
        accordion = $('#accordion'),
        propertyCounter = 0,
        dzs = [],
        $modal = $('#loadingModal'),
        totalPercentage = 0,
        brandProgress = 0,
        unitsProgress = [],
        unitsTotalProgress = 0,
        brandSuccess = false,
        UnitSuccess = false;
        

    

    var dzBrand = new Dropzone('#dropzone-brand',{
        url: '/admin/post/postImage',
        paramName: "attcImage",
        previewsContainer: ".dropzone-previews-brand",
        // dictDefaultMessage: "Drop Images or Click here to upload<br><small>2MB of filesize used.</small>",
        uploadMultiple: true,
        parallelUploads: 100,
        autoProcessQueue:false,
        acceptedFiles: ".png, .jpg, .gif, .bmp",
        init : function(){
            this.on('addedfile',function(file){
                var removeButton  = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px;'>Remove file</button>");
                var _this = this;
                var ext = getFileExtension(file.name);
                ext = ''+ext.toLowerCase();
                if(ext != "png" && ext != "jpg" && ext != "gif" && ext != "bmp")
                    _this.removeFile(file);
                else {
                    removeButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        _this.removeFile(file);
                    });
                    file.previewElement.appendChild(removeButton);    
                }
            });
            this.on("sending", function(file, xhr, formData) {
                formData.append("_token", token);
                formData.append("file_category",1);
                formData.append("property_code",property_code);
                console.log("sending appended data..");
            });
            this.on('queuecomplete',function(){
                console.log('sending brand complete');
                brandSuccess = true;
            });
        }
    });
    $("#addProperty").on('click',function (e) {
        
        ++propertyCounter;
        console.log();
        $('.collapse.in').collapse('hide');
        var property = propertyTemplate.clone();
        var appnd = property_code.substr(property_code.length - 5,property_code.length - 1);
        var unit_code = 'UR-'+appnd+''+generateID();
        property
            .find('input#unit_code')
            .val(unit_code);
        property.attr({id:''})
            .find('div[role=tab]')
            .attr({id:'heading'+propertyCounter})
                .find('a')
                .attr({href:'#collapse'+propertyCounter}).text('Unit ' +propertyCounter);
        property.find('div[role=tabpanel]').attr({id:'collapse'+propertyCounter,'aria-labelledby':'heading'+propertyCounter}).addClass('in');
        property
            .find('div.dropzone-property')
            .attr({id:'dropzone-property'+propertyCounter})
                .find('._dropzone-previews')
                .attr({id:'dropzone-previews-property'+propertyCounter});
        property.find('input.numeric').numeric(",");
        makeDZ('#dropzone-property'+propertyCounter,'#dropzone-previews-property'+propertyCounter,'dz_property'+propertyCounter,unit_code);
        property.fadeIn();
        accordion.append(property);
    });

    $('#btnGo').on('click', function(e) {
        e.preventDefault();
        $(this).attr({'disabled':true});
        dzBrand.processQueue();
        $.each(dzs,function(i,v){
            v.processQueue();
        });
        formSubmit();
    });

    function formSubmit(){
        $.each(dzs,function(i,v){
            if(v.getQueuedFiles().length <= 0) {
                UnitSuccess = true;
            }
        });
        if(dzBrand.getQueuedFiles().length <= 0) {
            brandSuccess = true;
        }
        setTimeout(function(){
            if(UnitSuccess === true || brandSuccess === true) {
                $('#btnGo').attr({'disabled':false});
                console.log("form submitting..");
                $("form#formFeatured").submit();
                
            }else{
                formSubmit();
            }
        },1000);
    }

    function makeDZ(elem,prev,name,unit_code){
        setTimeout(function(){
            UnitSuccess = false;
            var dz = new Dropzone(elem,{
                url: '/admin/post/postImage',
                paramName: "attcImage",
                previewsContainer: prev,
                        // dictDefaultMessage: "Drop Images or Click here to upload<br><small>2MB of filesize used.</small>",
                uploadMultiple: true,
                parallelUploads: 100,
                autoProcessQueue:false,
                acceptedFiles: ".png, .jpg, .gif, .bmp",
                init : function(){
                    this.on('addedfile',function(file){
                        var removeButton  = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px;'>Remove file</button>");
                        var _this = this;
                        var ext = getFileExtension(file.name);
                        ext = ''+ext.toLowerCase();
                        if(ext != "png" && ext != "jpg" && ext != "gif" && ext != "bmp")
                            _this.removeFile(file);
                        else {
                            removeButton.addEventListener("click", function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                _this.removeFile(file);
                            });
                            file.previewElement.appendChild(removeButton);    
                        }
                    });
                    this.on("sending", function(file, xhr, formData) {
                        formData.append("_token", token);
                        formData.append("file_category",2);
                        formData.append('unit_code',unit_code);
                        formData.append("property_code",property_code);
                    });
                    this.on('queuecomplete',function(){
                        console.log('sending units complete');
                        UnitSuccess = true;
                    });
                }
            });
            dzs.push(dz);            
        },500);
    }
    function getFileExtension(filename)
    {
        var ext = /^.+\.([^.]+)$/.exec(filename);
        return ext == null ? "" : ext[1];
    }
    function generateID(){
        return Date.now();
    }
});


</script>
{{-- <script src="/assets/js/action.dropzone.js"></script> --}}
{{--<script>
    // dropz.init();
</script>--}}
{{-- <script src="/assets/adminjs/post_featured.js"></script> --}}
@endsection