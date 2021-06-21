

var dropz = {
	init: function(){
		Dropzone.autoDiscover = false;
	 //    token = $("#_token").val();
		// data_container = $('#data-container');
	 //    propertyTemplate = $('#propertyTemplate');
	 //    accordion = $('#accordion');
	 //    propertyCounter = 0;
	 //    dzs = {};
	    dropz.console();
	},
	makeDropzone: function(selector){
		var dz = new Dropzone(selector,{
			url: '/admin/post',
	        paramName: "attcImages",
	        previewsContainer: ".dropzone-previews-brand",
	        // dictDefaultMessage: "Drop Images or Click here to upload<br><small>2MB of filesize used.</small>",
	        uploadMultiple: true,
	        parallelUploads: 100,
	        autoProcessQueue:false,
	        acceptedFiles: ".png, .jpg, .gif, .bmp",
		});
	},
	getFileExtension: function(filename){
		var ext = /^.+\.([^.]+)$/.exec(filename);
    	return ext == null ? "" : ext[1];
	},
	console: function(){
		console.log(this.token;
	}
}