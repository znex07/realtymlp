@extends('main.dashboard.properties.base')
@section('content')
@section('content.inner')


<div class="row">
    <div class="col-md-9">
        <div class="row">
            <section id="public">             
              <div class="col-md-12 well well-sm">                      
                 <div class="pull-right">
                    <label>View Mode: </label>                      
                    <div class="btn-group">
                      <a class="list_public btn-sm btn btn-primary" href="#fakelink"><span class="fui-list-numbered"></span></a>
                      <a class="grid_public btn-sm btn btn-primary" href="#fakelink"><span class="fui-list-small-thumbnails"></span></a>
                  </div>                       
              </div>
              <div class=" col-md-3">                      
                  <select class="form-control" id="sel1">
                    <option>Sort</option>
                    <option>Sort by Date</option>
                    <option>Sort by Area</option>                        
                </select>
            </div>            
        </div>

    </section>
</div>

{{-- <div class="row">
    @for($img = 0; $img<=5;$img++)
    <div class="col-md-4 grid_view" style="display:none">
            <div class="panel panel-default">
                <div class="panel-body thumb-img">                  
                    <div class="ih-item square effect3 bottom_to_top">
                        <a href="#">
                            <div class="img"><img src="images/assets/rect/1.jpg" alt="img"></div>
                            <div class="info">
                                <h3>Heading here</h3>
                                <p>Description goes here</p>
                            </div>
                        </a>
                    </div>



                    <div class="thumb-content">                 
                        <h6>
                            <a href="#">One Bedroom Unit</a>                        
                        </h6>
                        <p class="text-muted"><span class="fa fa-map-marker"></span><em> Makati City</em></p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p> 
                        <div class="btn-group dropup pull-right">
                            <button data-toggle="dropdown" type="button" class="btn btn-info btn-xs dropdown-toggle">More<span class="caret"></span></button>                                
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>                               
                        </div>
                        <p>
                            <span class="label label-info"><i class="fa fa-tag"></i> For Sale</span>
                        </p>
                        <table class="thumb-table table text-center table-bordered">                      
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-expand"></i> 2,000 Sq ft</td>
                                    <td><i class="fa fa-bed"></i> 3 </td>
                                    <td><i class="fa fa-tint"></i> 2 </td>
                                    <td><i class="fa fa-car"></i> 2 </td>       
                                    <td><i class="fa fa-home"></i> 1 </td>                    
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="btn-group pull-right">
                            <a href="#" class="btn btn-link"><i class="fa fa-share-alt"></i></a>
                            <a href="#" class="btn btn-link"><i class="fa fa-star-o"></i></a>
                        </div>
                        <label>
                            <strong>Php 200,000</strong>
                        </label>

                    </div>

                </div>
            </div>
        </div>
            


            
        <div class="col-md-12 list_view portfolio-item">
            <div class="panel panel-default">
                <div class="panel-body thumb-img">
                    <div class="col-md-5 thumb-img">                
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                        </a>
                    </div>
                    <div class="col-md-7">  
                        <div class="thumb-content">                     
                            <h6>
                                <a href="#">One Bedroom Unit</a>                        
                            </h6>
                            <p class="text-muted"><span class="fa fa-map-marker"></span><em> Makati City</em></p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p> 
                            <div class="btn-group dropup pull-right">
                                <button data-toggle="dropdown" type="button" class="btn btn-info btn-xs dropdown-toggle">More<span class="caret"></span></button>                                
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <p>
                                <span class="label label-info"><i class="fa fa-tag"></i> For Sale</span>
                            </p>
                            <table class="thumb-table table text-center table-bordered">                      
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-expand"></i> 2,000 Sq ft</td>
                                        <td><i class="fa fa-bed"></i> 3 </td>
                                        <td><i class="fa fa-tint"></i> 2 </td>
                                        <td><i class="fa fa-car"></i> 2 </td>       
                                        <td><i class="fa fa-home"></i> 1 </td>                    
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="btn-group pull-right">
                                <a href="#" class="btn btn-link"><i class="fa fa-share-alt"></i></a>
                                <a href="#" class="btn btn-link"><i class="fa fa-star-o"></i></a>
                            </div>
                            <label>
                                <strong>Php 200,000</strong>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
</div> --}}

{{-- <div class="col-md-3 col-xs-offset-8" data-spy="affix">
   <div class="panel panel-defaultproperty-card">
      <div class="panel-body">
        <h6 class="text-center" style="font-weight:300;">SEARCH PROPERTY</h6>
        <hr style="margin-left:40px;margin-right:40px;">          
        
    <div class="form-group col-md-12">
      <div class="input-group">
        <span class="input-group-btn">
          <button type="submit" class="btn"><span class="fui-location"></span></button>
      </span>
      <input class="form-control" id="navbarInput-01" type="search" placeholder="Location">

  </div>
</div>

<div class="text-center">
    <a class="text-center collapsed" data-toggle="collapse" data-parent="#panel-75497" href="#panel-element-372244">Advanced Option</a></div>
    <div id="panel-element-372244" class="panel-collapse collapse">

     <div class="col-md-6">
        <label>Floor Area</label>
        <div class="input-group">
            <input class="form-control" id="navbarInput-01" type="search">
            <span class="input-group-btn">
            </span>
        </div>
    </div>
    <div class="col-md-6">
        <label>Land Area</label>
        <div class="input-group">
            <input class="form-control" id="navbarInput-01" type="search">
            <span class="input-group-btn">
            </span>
        </div>
    </div>
    <div class="col-md-6">
       <label>Bedroom</label>
       <select class="form-control">
           <option>1</option>
           <option>2</option>
           <option>3</option>
           <option>3+</option>
       </select>
    </div>
    <div class="col-md-6">
        <label>Bathroom</label>
        <select class="form-control">
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>3+</option>
        </select>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Minimum Price</label>
            <select class="form-control">
               <option>PHP 1000</option>
           </select>
       </div>
   </div>

   <div class="col-md-6">
       <div class="form-group">
        <label>Maximum Price</label>
        <select class="form-control">
           <option>PHP 10000</option>
        </select>
       </div>
    </div>

</div>
<div class="col-md-12">
    <a href="#fakelink" class="btn btn-block btn-lg btn-danger"> Search</a>
</div>
</div>
</div>    
</div> --}}
</div>

</div>



@endsection
@endsection


@section('scripts')
<script src="/assets/js/datum/cities.js"></script>
<script>
$(function(e){
    $('.nav-properties').addClass('accented-btn');
    var storageSupported = typeof(Storage) !== "undefined" ? true : false;

    $('#province').on('change',function(e){
        var selVal = $(this).val();
        selText = $(this).find('option:selected').text(),
        $loader = $('.loader');
        $("#city").attr({'disabled':true});
        if (storageSupported) {
            if (!JSON.parse(storageLoad('province_'+selVal))) {
                storageSave('province_'+selVal,true);
                $loader.fadeIn();
                $.get('/resources/getData',{'reqfor':'city','id':selVal}).done(function(data){
                    storageSave('province_'+selVal+'_data',JSON.stringify(data));
                    var select = "<select name='city' class='form-control' id='city'><option selected value='default'>City</option>";
                    $.each(data,function(i,v){
                        select += '<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $loader.fadeOut();
                    select += '</select>';
                    $("#f_city").html(select);
                });
            } else {
                var data = JSON.parse(storageLoad('province_'+selVal+'_data'));
                var select = "<select name='city' class='form-control' id='city'><option selected value='default'>City</option>";
                $loader.fadeIn()
                $.each(data,function(i,v) {
                    select += '<option value="'+v.id+'">'+v.name+'</option>';
                });
                $loader.fadeOut();
                select += '</select>';
                $("#f_city").html(select);
            }
            
        }
    });


function storageSave(key,value){
    localStorage.setItem(key,value);
}
function storageLoad(key){
    return localStorage.getItem(key);
}

});

</script>
@endsection