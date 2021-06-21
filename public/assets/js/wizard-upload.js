'use strict';
if (!Array.prototype.last){
    Array.prototype.last = function(){
        return this[this.length - 1];
    };
};
var conf = {
	maximumUploadSize : 2e+6,
  maximumUploadSizePerImage : 1e+6,
	dzOpts: {
		img: {
			type: 'img',
			paramName: 'attcImage',
			elem: '#dropzone-image',
			previewsContainer: '.dropzone-previews-img',
			acceptedFiles: '.png, .jpg, .gif, .bmp',
			counterElem: '.img-ctr'
		},
		doc: {
			type: 'doc',
			paramName: 'attcDocs',
			elem: '#dropzone-docs',
			previewsContainer: '.dropzone-previews-doc',
			acceptedFiles: '.docx, .pdf, .xls, .txt, .rtf, .ppt, .pptx, .csv, .png, .jpg, .gif, .bmp, .doc',
			counterElem: '.doc-ctr'
		}
	},

};

var dz = {
	token: $('#_token').val(),
	property_code: $("input[name=property_code]").val(),
	dzImg: null,
	dzDoc: null,
	currentUploadSize : 0,
	f_imgProgress : 0,
	f_docProgress : 0,
	f_progress : 0,
	f_imgReady: false,
	f_docReady: false,
	// thumbnail
	thumbnail_index: 0,
	thumbnail_title: '',
	thumbnail_size: 0,
	thumbs: {
		names: [],
		sizes: []
	},
  //images
  filelist: [],
  resizeImgList: [],
	// errors
	removedFiles: {
		exceed_space : [],
		not_supported : []
	},
	called: false,
  	canvas: document.createElement('canvas'),
	// methods

	init: function() {
		Dropzone.autoDiscover = false;
		dz.leavePage();

		dz.dzImg = dz.makeDropzone(conf.dzOpts.img);
		dz.dzDoc = dz.makeDropzone(conf.dzOpts.doc);

		wiz.dzImg = dz.dzImg;
    	wiz.dzDocs = dz.dzDocs;
	},

	showMsg: function(type) {

		setTimeout(function() {
			var dzType = conf.dzOpts[type].acceptedFiles;
			if (!dz.called) {
				var msg_exceed = '<br>The following was not included because they exceed your available space of '+ (dz.getMB(dz.getRemainingBit()) )+ 'MB. <br>';
				var msg_not = 'The following was not included because we only accept '+ dzType + '<br>';

				dz.called = true;
				if (dz.removedFiles.exceed_space.length > 0 && dz.removedFiles.not_supported.length <= 0) {
					var complete = msg_exceed + dz.completeMsg('exceed_space');
					alertify.alert().setting({
						title: 'Heads up!',
						message: complete,
						onok: function() {
							dz.called = false;
							dz.clearMsg();
						}
					}).show();
				}
				else if (dz.removedFiles.exceed_space.length <= 0 && dz.removedFiles.not_supported.length > 0) {
					var complete = msg_not + dz.completeMsg('not_supported');
					alertify.alert().setting({
						title: 'Heads up!',
						message: complete,
						onok: function() {
							dz.called = false;
							dz.clearMsg();
						}
					}).show();
				}
				else if (dz.removedFiles.exceed_space.length > 0 && dz.removedFiles.not_supported.length > 0) {
					var complete = msg_not + dz.completeMsg('not_supported') + '<br>'+ msg_exceed + '' +dz.completeMsg('exceed_space');
					alertify.alert().setting({
						title: 'Heads up!',
						message: complete,
						onok: function() {
							dz.called = false;
							dz.clearMsg();
						}
					}).show();
				}
			}

		},500);
	},

	completeMsg: function(type) {
		if (type == 'not_supported') {
			var arrs = '';
			$.each(dz.removedFiles.not_supported, function(i,v) {
				arrs += '<br>-'+v;
			});
			return arrs;
		}
		else if (type == 'exceed_space') {
			var arrs = '';
			$.each(dz.removedFiles.exceed_space, function(i,v) {
				arrs += '<br>-'+v;
			});
			return arrs;
		}
	},

	clearMsg: function() {
		dz.removedFiles.exceed_space.length = 0;
		dz.removedFiles.not_supported.length = 0;
	},

	updateUI: function(elem) {
		var e = $(elem),
			_dz = dz.dzImg;
		
		if (elem == '.doc-ctr') 
			_dz = dz.dzDoc;
		
		var start = function() {
			e.find('.file-size').text(dz.getMB(getSizes(_dz.files)));
			e.find('.file-qty').text(getLength(_dz.files));
		},
		getSizes = function(files) {
			var tmp = 0;
			$.each(files, function(i,v) {
				tmp += v.size;
			});
			return tmp;
		},
		getLength = function(files) {
			console.log(files)
			return files.length;
		};
		start();
	},

	makeDropzone: function(options) {
    var _canvas = document.createElement('canvas');
		var drop = new Dropzone(options.elem, {
			url: '/upload',
			paramName: options.paramName,
			previewsContainer: options.previewsContainer,
			uploadMultiple: true,
			parallelUploads: 100,
			autoProcessQueue: false,
			acceptedFiles: options.acceptedFiles,
      		resizeLimit: conf.maximumUploadSizePerImage,
      // resizeImage: false,
			init: function() {
				this.on('addedfile', function(file) {
					var removeButton  = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px;'>Remove file</button>");
					var _this = this;
         			var ext = dz.getFileExtension(file.name).toLowerCase();
					var type = options.type;
					var _type = $('[name=type]').val();
					
					if (!dz.checkExt(ext,type) && dz.checkSize(file.size)) {
						dz.removedFiles.not_supported.push(file.name);
						dz.showMsg(type);
						_this.removeFile(file);
						return false;
					}
					else if (dz.checkExt(ext,type) && !dz.checkSize(file.size)) {
						dz.removedFiles.exceed_space.push(file.name);
						dz.showMsg(type);
						_this.removeFile(file);
						return false;
					}
					else if (!dz.checkExt(ext,type) && !dz.checkSize(file.size)) {
						dz.removedFiles.not_supported.push(file.name);
						// dz.removedFiles.not_supported.push(file.name);
						dz.showMsg(type);
						_this.removeFile(file);
						return false;
					}
					else if (dz.checkExt(ext,type) && dz.checkSize(file.size)) {
						removeButton.addEventListener("click", function(e) {
							e.preventDefault();
							e.stopPropagation();

							if (_type == 'edit') {
								alertify.confirm().setting({
									title: 'Heads up!',
									message: 'you sure you want to remove this file?',
									onok: function() {
										$.post('/dashboard/edit/ajax/remove', {
											_token: $('[name=_token]').val(),
											property_id: $('[name=property_id]').val(),
											file_id: file.id} ,
										function(data) {
											if (data) {
												dz.currentUploadSize -= file.size;
												dz.updateCounter();
												_this.removeFile(file);
												setTimeout(function() {
													dz.updateUI(options.counterElem );	
												},1000);
											}
										});

									}
								}).show();
							}
							else {
								alertify.success(''+file.name +' removed');
								dz.currentUploadSize -= file.size;
								dz.updateCounter();
								_this.removeFile(file);
								setTimeout(function() {
									dz.updateUI(options.counterElem );	
								},1000);
							}
						});

					}
						dz.thumbs.sizes.push(file.size);
						dz.thumbs.names.push(file.name);
						// dz.createThumbnail(type);
						file.previewElement.appendChild(removeButton);
						$(file.previewElement).find('.dz-image img').attr('data-thumbnail',false);
						dz.currentUploadSize += file.size;
						dz.updateCounter(options.counterElem);
						
						setTimeout(function() {
							dz.updateUI(options.counterElem );	
						},1000)
				});
				this.on('sending', function(file,xhr,formData) {
					var type = options.type;
					formData.append("_token", dz.token);
					formData.append('_type', $('input[name=type]').val());
					formData.append("file_type", type);
					formData.append('property_code',dz.property_code);
					formData.append('thumbnail_index',dz.thumbnail_index);
					formData.append('thumbnail_title', dz.thumbnail_title);
					// TODO: append the user_id;
					// formData.append('user_id',$("input[name=user_id]").val());
				});
				this.on('queuecomplete', function() {
					var type = options.type;
					if (type == 'img')
						dz.f_imgReady = true;
					else if (type == 'doc')
						dz.f_docReady = true;
				});
				this.on('totaluploadprogress', function(totalBytes, totalBytesSent) {

					var type = options.type;
					if (type == 'img')
						dz.f_imgProgress = totalBytes;
					else if (type == 'doc')
						dz.f_docProgress = totalBytes;

					dz.updateProgress();
				});
			}
		});

		return drop;
	},

	set_thumbnail: function() {
		$('input[name=_thumbnail_index]').val(dz.thumbnail_index);
	},

	// delete_file: function(id) {
	// 	id = (typeof id === 'undefined') ? false : id;
	// 	var ret=false;
	// 	var start = function() {
	// 			if (id != false) {
	// 				alertify.confirm().setting({
	// 					title: 'Heads up!',
	// 					message: 'you sure you want to remove this file?',
	// 					onok: function() {
	// 						$.post('/dashboard/edit/ajax/remove', {
	// 							_token: $('[name=_token]').val(),
	// 							property_id: $('[name=property_id]').val(),
	// 							file_id: id}
	// 						, function(data) {
	// 							if (data) {
	// 								alertify.success('File Deleted');
	// 							}
	// 							return data;
	// 						});
	// 					}
	// 				}).show();
	// 			}
	// 			else if (!id)	{
	// 				alertify.success('File Removed.');
	// 			}

	// 		};
	// 	start();
	// },

	createThumbnail: function(ext,type) {
		if (type == 'doc') {
			
		}
	},

	updateProgress: function() {
		var total = (dz.f_imgProgress + dz.f_docProgress) / 2;
		$('#finishProgress').find('.progress-bar').css({
			width: total+'%'
		});
		$('#finishMessage').text('Uploading attachments...' + Math.round(total) + '% out of 100%');
	},

	submit : function(e) {
		// console.log(e);
		// e.preventDefault();
		var start = function() {
				mapa.set_map_options();
				wiz.sharing_set_options();
				dz.set_thumbnail();
				$('#finishProgress').fadeIn();
        $('input[name=property_classification]').val($('#property_classification').val());
				set_files_metadata();
        set_full_address();
				$('#finishModal').modal({
					backdrop: 'static',
					keyboard: false
				})
				.modal('show')
				.on('shown.bs.modal', function() {
					if (dz.dzImg.getQueuedFiles().length > 0 && dz.dzDoc.getQueuedFiles().length > 0) {
						dz.dzImg.processQueue();
						dz.dzDoc.processQueue();
						submit();
					}
					else if (dz.dzImg.getQueuedFiles().length > 0 && dz.dzDoc.getQueuedFiles().length <= 0) {
						dz.f_docReady = true;
            dz.f_docProgress = 100;
						dz.dzImg.processQueue();
						submit();
					}
					else if (dz.dzImg.getQueuedFiles().length <= 0 && dz.dzDoc.getQueuedFiles().length > 0) {
						dz.f_imgReady = true;
            dz.f_imgProgress = 100;
						dz.dzDoc.processQueue();
						submit();
					}
					else if (dz.dzImg.getQueuedFiles().length <= 0 && dz.dzDoc.getQueuedFiles().length <= 0) {
						dz.f_imgReady = true;
						dz.f_docReady = true;
						dz.f_imgProgress = 100;
						dz.f_docProgress = 100;
						dz.updateProgress();
						submit();
					}
				});
			},
			submit = function() {

				setTimeout(function() {
					if (dz.f_imgReady && dz.f_docReady && dz.f_imgProgress == 100 && dz.f_docProgress == 100) {
        		window.onbeforeunload = null;
						$('#finishProgress').find('.progress-bar').css({
							width: '100%'
						});
						$('#finishMessage').text('Uploading attachment done!');
						$('#frm-property').submit();
					}
					else {
						submit();
					}
				},1000);
			},
			files_metadata = {
				remaining_mb : dz.getRemainingBit()
			},
			set_files_metadata = function() {
				$('[name=files_metadata]').val(JSON.stringify(files_metadata));
			},
      set_full_address = function() {
        var province = $('#province option:selected').text(),
            city = $('#city option:selected').text(),
			bld = $('#bldg_name').val(),
            brgy = $('#brgy').val(),
            street_address = $('#street_address').val();
        var full_address = street_address +' '+brgy+' '+city+' '+province;
        $('#full_address').val(full_address);
        $('#lp_street_address').val(street_address);
        $('#lp_brgy').val(brgy);
        $('#lp_city').val(city);
        $('#lp_province').val(province);
      };


		start();
	},

	// helpers
	getFileExtension: function(filename) {
		var ext = /^.+\.([^.]+)$/.exec(filename);
		return ext == null ? "" : ext[1];
	},

	checkExt: function(ext,type) {
		// console.log(type);
		if (type == 'img') {
			if(ext != "png" && ext != "jpg" && ext != "gif" && ext != "bmp") {
				return false;
			}
			return true;
		}
		else if (type == 'doc') {
			if (ext != "docx" && ext != "doc" && ext != "pdf" && ext != "xls" && ext != "txt" && ext != "rtf" && ext != "ppt" && ext != 'pptx' && ext != "csv" && ext != "png" && ext != "jpg" && ext != "gif" && ext != "bmp") {
				return false;
			}
			return true;
		}
	},

	checkSize: function(size) {
		if (size >= dz.getRemainingBit()) {
			return false;
		}
		return true;
	},

	getRemainingBit: function() {
		return Math.abs(conf.maximumUploadSize - dz.currentUploadSize);
	},

	getMB: function(size) {
		return (size / 1048576).toFixed(2);
	},

	updateCounter: function() {
		var percent = ((dz.currentUploadSize / conf.maximumUploadSize) * 1.00) * 100;
		$('#progress-files').find('.progress-bar').css({width:percent +'%'});
		$('#mbCounter').text(dz.getMB(dz.currentUploadSize));
	},

	leavePage : function() {
		window.onbeforeunload = function() {
		    return "If you leave this page, you will lose any unsaved changes.";
		}
	},

  compress: function(file,canvas) {
    var max_w = 800;
		var max_h = 600;

		var reader = new FileReader();
		reader.onload = function(e) {
			var img = new Image();
			img.onload = function() {
				var w = img.width;
				var h = img.height;
				var ratio_w = 1;
				var ratio_h = 1;
				if(w > max_w) {
					ratio_w = max_w / w;
				}
				if(h > max_h) {
					ratio_h = max_h / h;
				}

				var ratio = Math.min(ratio_w, ratio_h);
				w = Math.floor(w * ratio);
				h = Math.floor(h * ratio);
				canvas.width = w;
				canvas.height = h;
				var ctx = canvas.getContext('2d', {preserveDrawingBuffer: true});
				ctx.drawImage(img, 0, 0, w, h);

				var dataURL = canvas.toDataURL(file.type, 0.5);
				var a = dataURL.split(',')[1];
				var blob = atob(a);
				var array = [];
				for(var k = 0; k < blob.length; k++) {
					array.push(blob.charCodeAt(k));
				}
				var data = new Blob([new Uint8Array(array)], {type: file.type});
				dz.resizeImgList.push(data);
        // console.log(data);
			};
			img.src = e.target.result;
		};
		reader.readAsDataURL(file);

  },


};
