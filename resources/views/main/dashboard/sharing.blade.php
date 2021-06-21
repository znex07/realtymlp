<style>
.tab-attachments{
    display:none;
}

.pop-btn span:nth-child(odd){
	margin: 0 10px 0 0;
}
.pop-btn span:nth-child(even){
	margin: 0 10px 0 10px;
}
.pop-btn{
	cursor: pointer;
}
.pop{
	font-size: 20px;
	padding: 5px;
}

</style>
<div class="modal fade" id="share" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <form method='POST' id="formShare" action='/dashboard/postSharings'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="property_id" value="">
        <div class="modal-content">
            <div class="modal-header" style="background: #2869A0;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h6 class="todo-name">Share Listings</h6>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <div class="tagsinput-primary">
                        <input class="tagsinput tagsinput-typeahead input-lg form-control" value="" placeholder="Name of Affiliate" id="affi_ids" />
                    </div>
                </div>
                {{-- {{ #property }} --}}
                <div id="property" style="border:1px solid;">
                	<div class="panel panel-success">
                		<div class="panel-body thumb-img">
                			<div class="col-md-5 thumb-img">
                				<a href="#">
                					<img src="/img/house_placeholder.png" class="img-responsive">
                				</a>
                			</div>
                			<div class="col-md-7">
                				<div class="thumb-content">
                					<h6 class="property-label">department goes here</h6>
                					<p class="text-muted property-location">
                						<span class="fa fa-map-marker"></span><em> Address goes here</em>
                					</p>


                					<p class="property-description">description goes here</p>

                					<div class="primary">
                						<p class="property-price weak-title">
                							<label class="label label-default"><span class="fa fa-tag"></span>  For Sale</label>
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
                						<label>
                							<strong>Php {{ number_format(1500000) }} </strong>
                						</label>
                					</div>
                				</div><!-- .thumb-content -->
                			</div><!-- .col-md-7 -->
                		</div><!-- .panel-body -->
                	</div><!-- .panel -->
                </div>
                <div id="poptab-container">
                   <div class="poptab" id="poptab-locations" style="position: absolute; bottom: 5px; width:96.7%">
                      <div class="panel panel-success">
                         <div class="panel-body">
                            <div>
                                <form class="form-group">
                                    <label>Location :</label>
                                    <label class="checkbox" for="checkbox1">
                                        <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox" class="custom-checkbox">
                                        <span class="icons">
                                            <span class="icon-unchecked"></span>
                                            <span class="icon-checked"></span>
                                        </span>
                                        Unchecked
                                    </label>
                                </form>
                            </div>
                       </div>
                   </div>
               </div>
               <div class="poptab" id="poptab-details" style="display: none;">
                  <div class="panel panel-success">
                     <div class="panel-body">

                     </div>
                 </div>
               </div>
               <div class="poptab" id="poptab-attachments" style="display: none;">
                 <div class="panel panel-success">
                    <div class="panel-body">

                       asd

                    </div>
                </div>
               </div>
            </div>
                {{-- {{ #property }} --}}


            </div>
            <div class="modal-footer" style="padding:15px 0;">
				<div class="pop pull-left">
            		<a class="pop-btn" id="pop-location" title="Click to show Location"><span><i class="fa fa-map-marker"></i> </span></a>
            		<a class="pop-btn" id="pop-details" title="Click to show Details"><span><i class="fa fa-info-circle"></i> </span></a>
            		<a class="pop-btn" id="pop-attachments" title="Click to show Attachments"><span><i class="fa fa-paperclip"></i> </span></a>
            	</div>
            	<button type="button" class="btn btn-info" data-dismiss="modal">
            		Cancel
            	</button>
            	<button type="button" id="submitShare" onclick="sharing.other_submit_sharings(this)" class="btn btn-success" style="margin-right: 15px;">
            		<i class="fa fa-share-square"></i> Share
            	</button>
            </div>
        </div>
        </form>
    </div>
    <!-- documents template -->
    <div style="display: none;" id="template">
        <div class="template_wrapper col-md-3 col-xs-3 col-sm-3">
            <div>
                <p>
                    <img src="" class="template_img cb_checked">
                    <label class="checkbox template_label pull-right" data-id="" style="position: absolute; bottom:5px; right:5px; z-index: 10000;" for="">
                        <input data-id="" type="checkbox" data-toggle="checkbox" class="template_input" value="" id="" checked>
                    </label>
                </p>
            </div>
        </div>
    </div>
</div>
