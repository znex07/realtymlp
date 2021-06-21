function getFileExtension(filename)
{
    var ext = /^.+\.([^.]+)$/.exec(filename);
    return ext == null ? "" : ext[1];
}
if (!Array.prototype.last){
    Array.prototype.last = function(){
        return this[this.length - 1];
    };
};
$(document).ready(function(){
    Dropzone.autoDiscover = false;
    var token = $("#_token").val(),
        property_code = $("input[name=property_code]").val(),
        SucDzImage = false,
        SucDzDocs = false,
        lastTotalPercentage = 0,
        totalPercentage = 0,
        imgProgress = 0,
        docProgress = 0,
        $progress = $('.progress#finishProgress'),
        $progress_bar = $progress.find('.progress-bar'),
        msg = null,
        imgCounter = 0,
        docsCounter = 0,
        totalCounter= 0,
        textCounter = $('#totalMB'),
        // FIles Progress Bars
        accepted = false,
        maximumUploadSize = 2e+6,
        currentUploadSize = 0,
        $progressFiles = $('#progress-files')
        $mbCounter = $('#mbCounter'),
        filesExcluded = [],
        messages = [],
        _fileTypeAllowed = '',
        fileTypeAllowed = {
            docs : '.docx, .pdf, .xls, .txt, .rtf, .ppt, .csv, .png, .jpg, .gif, .bmp, .doc',
            img : '.png, .jpg, .gif, .bmp'
        },
        fileMsg = {
            exceed_space : 'the following was not included bacause they exceed your available space of ' + (getRemainingBit()  / 1048576).toFixed(2)+'MB.: '+filesExcluded.join(', '),
            not_supported: 'the following was not included because we only accept '+fileTypeAllowed[_fileTypeAllowed] +' .'
        },        
        fileErr = null,
        called = false,
        finalMsg = ''
        errorType = {
            exceed_space : [],
            not_supported : []
        },
        filesAdded = [],
        fileCount = 0,
        lastErrors = {};

    function updateCounter() {
        var percentage = (currentUploadSize / maximumUploadSize) * 1.00;
        percentage *= 100;
        $progressFiles.find('.progress-bar').css({width:percentage +'%'});
    }

    function getRemainingBit() {
        return Math.abs(maximumUploadSize - currentUploadSize);
    }

    function callMsg(type) 
    {
        setTimeout(function(){
            var finalMsg = '';
            if (errorType.exceed_space.length > 0) {
                finalMsg += 'the following was not included bacause they exceed your available space of ' + (getRemainingBit()  / 1048576).toFixed(2)+'MB.: <br>' + errorType.exceed_space.join(', ');
            }
            if (errorType.not_supported.length > 0) {
                finalMsg += '<br>the following was not included because we only accept ' + fileTypeAllowed[type] + '.<br>' + errorType.not_supported.join(', ');
            }

            if(errorType.not_supported.length > 0 || errorType.exceed_space.length > 0) {
                alertify.alert()
                  .setting({
                    'title':'Heads Up!',
                    'message': finalMsg ,
                  }).show();    

                finalMsg = '';
                called = false;
                errorType.exceed_space.length = 0;
                errorType.not_supported.length = 0;
            }           

            
        },1000);
    }

    function checkExt(ext,type) {
        if (type == 'img') {

            if (ext != "png" && ext != "jpg" && ext != "JPG" && ext != "gif" && ext != "bmp") {
                return false;
            }

            return true;

        }
        else if (type == 'docs') {
            if (ext != "docx" && ext != "doc" && ext != "pdf" && ext != "xls" && ext != "txt" && ext != "rtf" && ext != "ppt" && ext != 'pptx' && ext != "csv" && ext != "png" && ext != "jpg" && ext != "gif" && ext != "bmp") {
                return false;
            }

            return true;
        }
        
    }
    function checkSize(size) {
        if (size >= getRemainingBit()) {
            return false;
        }

        return true;
    }

    function getFilesAddedCount(type) 
    {
        setTimeout(function() {
            if (!called) {
                called = true;
                var _exceed_space = 'the following was not included because they exceed your available space of ' +(getRemainingBit() / 1048576).toFixed(2)+'MB. <br>',
                    _not_supported = '<br>the following was not included because we only accept ' + fileTypeAllowed[type] + '.<br>';
                if (errorType.not_supported.length > 0 && errorType.exceed_space.length <= 0) {
                    console.log('hindi tanggap');
                    var _files = $.map(errorType.not_supported, function(i,v) {
                        return '-'+ v + '<br>';
                    });
                    $.each(errorType.not_supported,function(i,v) {
                        _not_supported += ''+v;
                    });
                    alertify.alert().
                        setting({
                            'title' : 'Heads up!',
                            'message' : _not_supported,
                            onok: function() {
                                called = false;
                                errorType.exceed_space.length = 0;
                                errorType.not_supported.length = 0;
                            }
                        })
                        .show();                  
                }
                else if (errorType.exceed_space.length > 0 && errorType.not_supported <= 0) {
                    console.log('sobra');
                    var _files = $.map(errorType.exceed_space, function(i,v) {
                        return '-'+ v + '<br>';
                    });
                    $.each(errorType.exceed_space,function(i,v) {
                        _exceed_space += ''+v;
                    });
                    alertify.alert().
                        setting({
                            'title' : 'Heads up!',
                            'message' : _exceed_space,
                            onok: function() {
                                called = false;
                                errorType.exceed_space.length = 0;
                                errorType.not_supported.length = 0;
                            }
                        })
                        .show();
                }
                else if (errorType.exceed_space.length > 0 && errorType.not_supported.length > 0) {
                    console.log('both');
                    var _files = $.map(errorType.exceed_space, function(i,v) {
                        return '-'+ v + '<br>';
                    });
                    $.each(errorType.exceed_space,function(i,v) {
                        _exceed_space += ''+v;
                    });
                    var _files = $.map(errorType.not_supported, function(i,v) {
                        return '-'+ v + '<br>';
                    });
                    $.each(errorType.not_supported,function(i,v) {
                        _not_supported += ''+v;
                    });

                    alertify.alert().
                        setting({
                            'title' : 'Heads up!',
                            'message' : _not_supported+'<br>'+_exceed_space,
                            onok: function() {
                                called = false;
                                errorType.exceed_space.length = 0;
                                errorType.not_supported.length = 0;
                            }
                        })
                        .show();
                }                
            }
        },500);
    }
    
    var dzImg = new Dropzone("#dropzone-image",{
        url: '/upload',
        paramName: "attcImage",
        previewsContainer: ".dropzone-previews-img",
        dictDefaultMessage: "Drop Images or Click here to upload<br><small>maximum of 2mb per file are allowed.</small>",
        uploadMultiple: true,
        parallelUploads: 100,
        autoProcessQueue:false,
        acceptedFiles: ".png, .jpg, .gif, .bmp",
        init:function(){
            this.on('addedfile',function(file){
                _fileTypeAllowed = 'img';
                var removeButton  = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px;'>Remove file</button>");
                var _this = this;
                var ext = getFileExtension(file.name);
                ext = ''+ext.toLowerCase();

                filesAdded.push(file);

                if (!checkExt(ext,'img') && checkSize(file.size)) {
                    // not allowed
                    errorType.not_supported.push(file.name);
                    _this.removeFile(file);
                }
                else if (!checkSize(file.size) && checkExt(ext,'img')) {
                    // insufficient
                    errorType.exceed_space.push(file.name);
                    _this.removeFile(file);    
                }
                else if (!checkSize(file.size) && !checkExt(ext,'img')) {
                    errorType.exceed_space.push(file.name);
                    errorType.not_supported.push(file.name);
                    _this.removeFile(file);
                }
                else if (checkSize(file.size) && checkExt(ext,'img')) {
                    removeButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        currentUploadSize -= file.size;
                        fileErr = fileMsg.file_removed;
                        var ttl = currentUploadSize / 1048576;
                        $mbCounter.text('' + ttl.toFixed(2));
                        updateCounter();
                        _this.removeFile(file);
                    });
                    file.previewElement.appendChild(removeButton);
                    currentUploadSize += file.size;
                    var ttl = currentUploadSize / 1048576;
                    $mbCounter.text('' + ttl.toFixed(2));
                    updateCounter();
                }

                getFilesAddedCount('img');
            });

            this.on('removedfile', function(file) {
                
                // alertify.error(fileErr + ':'+file.name.substring(0,10));
            });
            this.on("sending", function(file, xhr, formData) {
                formData.append("_token", token);
                formData.append("file_type",'image');
                formData.append('property_code',property_code);
                formData.append('user_id',$("input[name=user_id]").val());
                console.log("sending appended data..");
            });
            this.on('queuecomplete',function(){
                SucDzImage = true;
            });
            this.on("totaluploadprogress", function(totalBytes, totalBytesSent){
                imgProgress = totalBytes;
                totalPercentage = (docProgress + imgProgress)/2;
                $progress_bar.css({
                    width:totalPercentage+'%'
                });
                $('#finishMessage').text('Uploading attachments...' + Math.round(totalPercentage) + '% out of 100%');
            });
        }
    });
    var dzDocs = new Dropzone("#dropzone-docs",{
        url: '/upload',
        paramName: "attcDocs",
        previewsContainer: ".dropzone-previews-doc",
        dictDefaultMessage: "Drop Documents or Click here to upload<br><small>maximum of 2mb per file are allowed.</small>",
        uploadMultiple: true,
        parallelUploads: 100,
        autoProcessQueue:false,
        acceptedFiles: ".docx, .pdf, .xls, .txt, .rtf, .ppt, .pptx, .csv, .png, .jpg, .gif, .bmp, .doc",
        init:function(){
            this.on('addedfile',function(file){
                var removeButton  = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px;'>Remove file</button>");
                var _this = this;
                var ext = getFileExtension(file.name);
                ext = ''+ext.toLowerCase();
                
                if (!checkExt(ext,'docs') && checkSize(file.size)) {
                    // not allowed
                    errorType.not_supported.push(file.name);
                    _this.removeFile(file);
                }
                else if (!checkSize(file.size) && !checkExt(ext,'docs')) {
                    // insufficient
                    errorType.exceed_space.push(file.name);
                    _this.removeFile(file);    
                }
                else if (!checkSize(file.size) && !checkExt(ext,'docs')) {
                    errorType.exceed_space.push(file.name);
                    errorType.not_supported.push(file.name);
                    _this.removeFile(file);
                }
                else if (checkSize(file.size) && checkExt(ext,'docs')) {
                    removeButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        currentUploadSize -= file.size;
                        fileErr = fileMsg.file_removed;
                        var ttl = currentUploadSize / 1048576;
                        $mbCounter.text('' + ttl.toFixed(2));
                        updateCounter();
                        _this.removeFile(file);
                    });

                    file.previewElement.appendChild(removeButton);

                    currentUploadSize += file.size;
                    var ttl = currentUploadSize / 1048576;
                    $mbCounter.text('' + ttl.toFixed(2));
                    updateCounter();
                }

                getFilesAddedCount('docs');

            });
            this.on('removedfile', function(file) {

            });
            this.on("sending", function(file, xhr, formData) {
                formData.append("_token", token);
                formData.append("file_type",'docs');
                formData.append('property_code',property_code);
                formData.append('user_id',$("input[name=user_id]").val());
                console.log("sending appended data..");
            });
            this.on('queuecomplete',function(){
                SucDzDocs = true;
            });
            this.on("totaluploadprogress", function(totalBytes, totalBytesSent){
                docProgress = totalBytes;
                totalPercentage = (docProgress + imgProgress)/2;
                $progress_bar.css({
                    width:totalPercentage+'%'
                });
                $('#finishMessage').text('Uploading attachments...' + Math.round(totalPercentage) + '% out of 100%');
            });
        }
    });
    wiz.dzImg = dzImg;
    wiz.dzDocs = dzDocs;

    $("#btnSubmit").click(function(e){
        e.preventDefault();

        mapa.set_map_options();
        wiz.sharing_set_options();

        $progress.fadeIn(500);
        $(this).attr('disabled',true);                
        $('#finishModal').modal({
                    backdrop:'static',
                    keyboard:false
        })
        .modal('show')
        .on('shown.bs.modal', function() {
            if (dzImg.getQueuedFiles().length > 0 && dzDocs.getQueuedFiles().length > 0) {
                dzImg.processQueue();
                dzDocs.processQueue();
                formSubmit();
            }
            else if(dzImg.getQueuedFiles().length > 0 && dzDocs.getQueuedFiles().length <= 0) {
                SucDzDocs = true;
                docProgress = 100;
                dzImg.processQueue();
                formSubmit();
            }
            else if(dzImg.getQueuedFiles().length <= 0 && dzDocs.getQueuedFiles().length > 0) {
                SucDzImage = true;
                imgProgress = 100;
                dzDocs.processQueue();
                formSubmit();
            }
            else if(dzImg.getQueuedFiles().length <= 0 && dzDocs.getQueuedFiles().length <= 0) {
                SucDzDocs = true;
                SucDzImage = true;
                docProgress = 100;
                imgProgress = 100;
                formSubmit();
            }            
        });
    });
    function formSubmit(){
        console.log("trying to submit..");
        setTimeout(function(){
            if(SucDzDocs === true || SucDzImage === true && totalPercentage >= 100) {
                console.log("form submitting..");                
                $('#finishMessage').text('Uploading attachments done!');
                setTimeout(function(){
                    $("#frm-property").submit();
                },500)
                
            }else{
                formSubmit();
            }
        },1000);
    }
});