@extends('main.partials.base')
@section('styles')
<style>

body {
    background: #fff !important;
}
.container {
	margin-top: 70px;
}
</style>
<div class="container-full">
<iframe src="https://mapsengine.google.com/map/embed?mid=z45Ttv047_IU.k_4UeRgAyHPI" width="100%" height="400"></iframe>
</div>
<div class="container">
    <h1 class="text-center"><strong>CONTACT US</strong></h1>
	<p class="text-center">USE THE INFORMATION PROVIDED BELOW TO REACH US OR LEAVE US A MESSAGE USING CONTACT FORM.</p>
	<hr>
	<div class="col-md-12">
	<p>Send us a message</p>
	</div>
	<div class="col-md-6">
        <form method="post" action="/feature/contact/message">
            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
            <div class="form-group">
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">          
            </div>
            <div class="form-group">
                <input name="subject" type="text" class="form-control" id="inputsubject" placeholder="Subject">         
            </div>
            <div class="form-group">            
                <textarea name="message" class="form-control" style="resize:none;" placeholder="Message" rows="3" id="textArea"></textarea>                         
            </div>
            <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
        </form>
        
	</div>
	<div class="col-md-6 ">		
		<div class="col-md-1"><i class="fa fa-map-marker" style="font-size:40px"></i></div>
		<div class="col-md-11">7461, Heart Building, Bagtikan Street, San Antonio, 1200, Makati, Metro Manila</div>
		<div class="col-md-12">
		<hr>
		</div>
		<div class="col-md-1"><i class="fa fa-mobile" style="font-size:40px"></i></div>
		<div class="col-md-11">Mobile: +63 (999) 999.999</div>
		<div class="col-md-12">
		<hr>
		</div>
		<div class="col-md-1"><i class="fa fa-phone" style="font-size:40px"></i></div>
		<div class="col-md-11">Phone: +63 (99) 999.9999</div>
		<div class="col-md-12">
		<hr>
		</div>
	</div>
</div>