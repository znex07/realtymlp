@extends('main.dashboard.base')

<style>
.thumb-title p i {
    color: #c6c6c6;
    padding: 0 8px;
}

h6 span {
    font-size: 80% !important;
    font-weight: normal !important;
}
.breadcrumb {
    margin-bottom: 0px !important;
}

.featproj-blowup {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 1px;
}
.thumb-title .prop-loc {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 5px;
}
.thumb-title p {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 15px;
}
.thumb-title h6 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 20px;
}
.thumb-title .text-muted {
  color: #888;
}
.thumb-title {
  padding: 0 10px 10px;
}
.text-muted {
    color: #888 !important;
}
.amenities i {
    padding-right: 10px;
}
.amenities {
    font-weight: normal;
}
.list-group-item {
    padding: 6px 15px !important;
}
.text-normal {
    font-weight: 500;
}
</style>
@section('content')
<input type="hidden" id="map_options" value="">
<div class="container" style="margin-top: 70px;">    
    <div class="col-md-12">
        <div class="col-md-8 panel panel-default">
            <div class="panel-body">
                <div class="row thumb-title">                   
                    <h6>Property Title <span class="label label-title label-info"><i class="fa fa-tag"></i> For Rent</span></h6> 
                    <p class="text-muted prop-loc">
                        <span class="fa fa-map-marker"></span>
                        <em>
                            Property Location
                        </em>
                    </p>
                    <p>
                        <strong class="text-primary">
                         Php 345,000
                     </strong> 
                     <i>|</i> 
                     Property ID:  201354
                     <i>|</i> 
                     <i class="fa fa-expand"></i> 100 sqm
                     <i>|</i>
                     <span data-toggle="tooltip" data-placement="top" title="Bedroom" ><i class="fa fa-bed"></i> 3</span>
                     <i>|</i>
                     <span data-toggle="tooltip" data-placement="top" title="Bathroom" ><i class="fa fa-tint"></i> 2 </span>
                     <i>|</i>
                     <span data-toggle="tooltip" data-placement="top" title="Parking" ><i class="fa fa-car"></i> 2 </span>
                 </p>                        
                 
                    <img src="/img/featured_files/UR-2015-10-01-05-15-15560cc163ac701.jpg" class="img-responsive" width="100%">
               

                <h6 class="property-location">Description</h6>                           
                <p class="featproj-blowup text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id bibendum eros, sit amet placerat est. In hac habitasse platea dictumst. Aenean vehicula dapibus lorem sit amet feugiat. Duis porta neque enim, id tincidunt dolor imperdiet non. Vestibulum porttitor venenatis diam sit amet gravida. Aliquam dictum magna ut hendrerit porta. Aenean mattis arcu at dignissim sodales. Duis tempor ultricies massa a gravida.
                </p>                       

            </div>
            <div class="row thumb-title">
                <h6 class="active">Unit Details</h6>

                <div class="col-md-3">                                    
                    <ul class="list-group text-normal">
                        <li class="list-group-item"> Unit Type  </li>
                        <li class="list-group-item"> Sqm Range </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-group text-muted text-normal">
                        <li class="list-group-item"> One Bedroom  </li>
                        <li class="list-group-item"> 23sqm - 61sqm  </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-group text-normal">
                        <li class="list-group-item"> Turn Over  </li>
                        <li class="list-group-item"> Price Range  </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-group text-muted text-normal">
                        <li class="list-group-item"> 2016  </li>
                        <li class="list-group-item"> 1.91M - 6.93M  </li>
                    </ul>
                </div>
            </div>
            <div class="row thumb-title">
                <ul class="breadcrumb">
                    <li class="active">Amenities</li>
                </ul>
                <div class="col-md-4 col-xs-6">
                    <ul class="list-group text-muted text-normal">
                        <li class="list-group-item"><i class="fa fa-check text-primary"></i> Gym</li>
                        <li class="list-group-item"><i class="fa fa-check text-primary"></i> Outdoor Pool</li>
                        <li class="list-group-item"><i class="fa fa-check text-primary"></i> Security System Installed</li>
                    </ul>
                </div>
            </div>
            <div class="row thumb-title">
            <h6 class="property-location">Vicinity Map</h6>
            <input id="address" type="text" class="hidden">
            <div id="map" style="height:400px; background-color:#f6f6f6;"></div>
            </div>


        </div>
    </div>


    <div class="col-md-4 offset-md-1 ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" data-spy="affix" style="width:350px;">
                    <div class="panel-heading">Contact Agent/Broker</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="media">
                                <a class="pull-left" href="#" style="padding-left: 5px;">

                                    <img style="background-image:url(/avatars/basic.jpg);
                                    width: 50px;
                                    height: 50px;
                                    background-size:cover;
                                    display:inherit;
                                    border-radius: 25px;
                                    -webkit-border-radius: 25px;
                                    -moz-border-radius: 25px;
                                    cursor:pointer;"
                                    alt="" class='avatar'/>

                                    <img style="
                                    width: 100px;
                                    height: 100px;
                                    background-size:cover;
                                    display:inherit;
                                    border-radius: 50px;
                                    -webkit-border-radius: 50px;
                                    -moz-border-radius: 50px;
                                    cursor:pointer;"
                                    alt="" class='avatar'/>

                                </a>
                                <div class="media-body">
                                    <p class="text-info">

                                    </p>
                                    <p  style="font-size: 14px; line-height: 0">
                                        <em>Broker</em>
                                    </p>
                                    <div class="form-group">
                                        <div class="property-card">
                                            <div class="primary">
                                                <h3 id="show_contact" class="text-info" style="font-size:14px; cursor:pointer"><span class="fa fa-phone" style="padding-right:10px;"></span>Show Contact Number</h3>
                                                <div class="secondary" id="phone_number" style="font-size:12px;padding-left:20px;display:none;">
                                                    <h3 class="weak-title">09261066261</h3>
                                                    <h3 class="weak-title">09261066261</h3>
                                                    <h3 class="weak-title">09261066261</h3>
                                                </div>
                                                <h3 id="show_email" class="text-info" style="font-size:14px; cursor:pointer"><span class="fa fa-envelope" style="padding-right:10px;"></span>Show Email Address</h3>
                                                <div class="secondary" id="email_address" style="font-size:12px;padding-left:20px;display:none;">
                                                    <h3 class="weak-title">joramaquinosalinas@gmail.com</h3>
                                                    <h3 class="weak-title">joramaquinosalinas@gmail.com</h3>
                                                    <h3 class="weak-title">joramaquinosalinas@gmail.com</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    

                   
                        <form class="form-vertical property-card" method="post" action="/dashboard/blowup/message">
                         <h3 class="secondary weak-title">ASK ABOUT THE PROPERTY</h3>
                         <input type="hidden" name="_token" >
                         <div class="form-group hidden">
                            <div class="input-group">
                                <input type="text" name="from_id" class="form-control">
                                <span class="input-group-addon">*</span>
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <div class="input-group">
                                <input type="text" name="to_id" class="form-control">
                                <span class="input-group-addon">*</span>
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <div class="input-group">
                                <input type="text" name="property_code" class="form-control">
                                <span class="input-group-addon">*</span>
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <div class="input-group">
                                <input type="text" name="property_id" class="form-control">
                                <span class="input-group-addon">*</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="fullname" class="form-control" placeholder="Fullname">
                                <span class="input-group-addon">*</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" name="email_address" class="form-control" placeholder="Email Address">
                                <span class="input-group-addon">*</span>
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="message" class="form-control" placeholder="Message" style="width:100%; height:125px; resize:none">Please contact me regarding your property </textarea>
                                <span class="input-group-addon">*</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button name="send" type="submit" class="btn btn-info btn-block"><span class="fa fa-envelope" style="padding-right:10px;"></span>Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section('scripts')
<script src="http://maps.googleapis.com/maps/api/js?v=3.20&sensor=true" type="text/javascript"></script>
<script type='text/javascript' src='/assets/js/gmaps.js'></script>
<script type='text/javascript' src='/assets/js/mapa.js'></script>
<script>

$(function() {

    $('[data-toggle=tooltip]').tooltip('hide');

    mapa.init(true);
    var map_options = $.parseJSON($('#map_options').val()) || null;            
    mapa.init_blowup(map_options);

    $('#show_contact').click(function (e) {
        $('#phone_number').show('slow');
    });

    $('#show_email').click(function (e) {
        $('#email_address').show('slow');
        console.log('email');
    });
})

</script>
@endsection