'use strict';

$.fn.disable = function() {
	this.attr('disabled', true);
};
$.fn.enable = function() {
	this.attr('disabled', false);
};
var chat = {

	init : function() {
		var self = this;
		$('.btn-new-chat').on('click', self.newChat);
		$('.thread-list').on('click', self.retrieveReplies);
		self.loadReplies();
		self.initTypeahead();
	},

	retrieveReplies: function() {
		// alertify.alert('selected');
		$('#scrollbox3').fadeIn();
		$('#scrollbox3').scrollTop($('#scrollbox3').scrollHeight);
		$('#loadingDiv').fadeIn();
		$('.chat-new').hide();
		// $('.chat-replies').fadeOut();
		// $('.chat-replies').fadeIn();
		$('.chat-input').enable();
		$('.btn-send').enable();
		$('#sender-msg').hide();
		$('#ownership').val('reply');
		// $('.from-label').text('Ter');
		// $('.chat-recepient').text("New Message");

		var $this = $(this),
		start = function() {

			$('.thread-list.media').removeClass('active');
			$this.addClass('active');
			var message = '';
			var sender = '';
			var con = $('#sender-msg');
			var ret = '<div class="media" id="bubble-message">';
			var to = $this.attr('id');
			var id = $('#user_id').attr('value');
			// var profile_image = $('.profile_image').attr('id');
			if(id == to){
				// if($('.badge').text() == 1){
					$('.badge').fadeOut();
				// }
				$.post('/dashboard/message/read', {
					_token: csrf_token ,
					id : id
				}).done(function(data){
					// console.log('success'+data);
				})
			}
			$.get('/dashboard/message/thread/' + $this.attr('id'),function (data) {0
				$('#sender-msg').fadeIn();
				$('.chat-replies').fadeIn();
				$.each(data, function (i , v) {
					// $('.chat-new').val(v.to.user_fname + ' ' + v.to.user_lname);
					// $('.chat-new').prop('disabled',true);
					// $('.chat-new').fadeOut();
					message = message + JSON.stringify(v);
					// console.log(to);
					if(v.to_id != id){
						$('.title-message').text(v.to.user_fname + ' ' + v.to.user_lname);
					}else {
						$('.title-message').text(v.from.user_fname + ' ' + v.from.user_lname);
					}
					if(v.to_id == to){
							ret += '<a href="#" class="pull-left">'
								+ '<img class="img-circle media-object" width="50px" height="50px" src="/avatars/'+v.from.profile_image+'" alt="msg Object">'
								+ '</a><div class="well well-sm" style="display:inline-block; border-radius:3px 20px 20px 20px;">'
								+ '<b class="from-label">'+ v.from.user_fname + ' ' + v.from.user_lname +'</b>'
								+ '<p class="from-label">'+v.subject+'</p></div><br>';
					}
					$('#to_id').val(v.to_id);
					con.html(ret);
				});
				// ret += '</div>';
				// console.log(message);
			}).done(function () {
				$('#loadingDiv').fadeOut();
				$('.chat-replies').fadeIn.fadeIn(500);
			}).fail(function () {
				alertify.alert('Failed');
			});
		}

		start();
	},
	loadReplies: function() {
		// var message = '';
		// var sender = '';
		// var con = $('#sender-msg');
		// var ret = '<div class="media" id="bubble-message">';
		// var to = 1;
		// var id = 1;
		// // var profile_image = $('.profile_image').attr('id');
		// if(id == to){
		// 	// if($('.badge').text() == 1){
		// 	$('.badge').fadeOut();
		// 	// }
		// 	$.post('/dashboard/message/read', {
		// 		_token: csrf_token ,
		// 		id : id
		// 	}).done(function(data){
		// 		// console.log('success'+data);
		// 	})
		// }
		// $.get('/dashboard/message/thread/' + 1,function (data) {0
		// 	$('#sender-msg').fadeIn();
		// 	$('.chat-replies').fadeIn();
		// 	$.each(data, function (i , v) {
		// 		// $('.chat-new').val(v.to.user_fname + ' ' + v.to.user_lname);
		// 		// $('.chat-new').prop('disabled',true);
		// 		// $('.chat-new').fadeOut();
		// 		message = message + JSON.stringify(v);
		// 		// console.log(to);
		// 		if(v.to_id != id){
		// 			$('.title-message').text(v.to.user_fname + ' ' + v.to.user_lname);
		// 		}else {
		// 			$('.title-message').text(v.from.user_fname + ' ' + v.from.user_lname);
		// 		}
		// 		if(v.to_id == to){
		// 			ret += '<a href="#" class="pull-left">'
		// 				+ '<img class="img-circle media-object" width="50px" height="50px" src="/avatars/'+v.from.profile_image+'" alt="msg Object">'
		// 				+ '</a><div class="well well-sm" style="display:inline-block; border-radius:3px 20px 20px 20px;">'
		// 				+ '<b class="from-label">'+ v.from.user_fname + ' ' + v.from.user_lname +'</b>'
		// 				+ '<p class="from-label">'+v.subject+'</p></div><br>';
		// 		}
		// 		$('#to_id').val(v.to_id);
		// 		con.html(ret);
		// 	});
		// 	// ret += '</div>';
		// 	// console.log(message);
		// }).done(function () {
		// 	$('#loadingDiv').fadeOut();
		// 	$('.chat-replies').fadeIn.fadeIn(500);
		// }).fail(function () {
		// 	alertify.alert('Failed');
		// });
	},

	newChat : function(e) {
		e.preventDefault();
		var start = function() {
			
			$('#ownership').val('new-thread');
			$('.chat-new').fadeIn();
			$('.chat-replies').hide();
			$('.chat-input').disable();
			$('.btn-send').disable();
			$('.chat-new').prop('disabled',false);
			$('.chat-new').val('');
			$('.title-message').text("New Message");
		};
		start();
	},

	initTypeahead : function() {
		var start = function() {
      affDatum.initialize();
			$('.chat-new').typeahead(null, {
				minLength: 3,
				displayKey: 'value',
				source: affDatum.ttAdapter(),
				templates: {
					suggestion: function(data) {
						var d = data;
						return '<div class="sugg-list">'+
								'<img class="sugg-img" src="/avatars/' + d.data.profile_image+'"/>'+
								'<span class="sugg-name">'+ d.value+'</span>'+
								'<span class="sugg-email">'+d.data.email+'</span>'+
							'</div>';
					}
				}
			}).on('typeahead:selected', affSelected);
		},
		affSelected = function(elem, obj) {
			console.log(obj.data);
			$('.chat-input').enable();
			$('.btn-send').enable();
			$('.title-message').text(obj.value);
			// $('.chat-recepi	ent').text(obj.value);
			$('#to_id').val(obj.data.id);
		};

		start();
	},
};