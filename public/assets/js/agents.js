'use strict';

var agent = {

  init: function() {
    $('[data-trigger=add-affiliate]').on('click', agent.addAffiliate);
    $('[data-trigger=remove-affiliate]').on('click', agent.removeAffiliate);
    $('[data-trigger=accept-request]').on('click', agent.acceptAffiliate);
    $('[data-trigger=reject-request]').on('click', agent.rejectAffiliate);
    $('[data-trigger=cancel-request]').on('click', agent.rejectAffiliate);
  },

  addAffiliate: function() {
    var btn = $(this),
        affiliate_id = btn.data('id'),
        start = function() {
          btn.attr('disabled',true);
          var ajx = $.post('/agents/ajax/add', {
                _token: csrf_token,
                affiliate_id: affiliate_id
              });
          ajx.done(next);
        },
        next = function(data) {
          location.reload();
          // btn.attr('disabled',false);
        };
    start();
  },

  removeAffiliate: function() {
    var btn = $(this),
        affiliate_id = btn.data('id'),
        start = function() {
          // btn.attr('disabled',true);
          var ajx = $.post('/agents/ajax/remove', {
                _token: csrf_token,
                affiliate_id: affiliate_id
              });
          ajx.done(next);
        },
        next = function(data) {
          location.reload();
          // btn.attr('disabled',false);
        };
    start();
  },

  acceptAffiliate: function() {
    var btn = $(this),
        affiliate_id = btn.data('id'),
        start = function() {
          // btn.attr('disabled',true);
          var ajx = $.post('/agents/ajax/accept', {
                _token: csrf_token,
                affiliate_id: affiliate_id
              });
          ajx.done(next);
        },
        next = function(data) {
          location.reload();
          // btn.attr('disabled',false);
        };
    start();
  },

  acceptAffiliate: function() {
    var btn = $(this),
        affiliate_id = btn.data('id'),
        start = function() {
          // btn.attr('disabled',true);
          var ajx = $.post('/agents/ajax/reject', {
            _token: csrf_token,
            affiliate_id: affiliate_id
          });
          ajx.done(next);
        },
        next = function(data) {
          location.reload();
          // btn.attr('disabled',false);
        };
    start();
  },

  rejectAffiliate: function() {
      var btn = $(this),
          affiliate_id = btn.data('id'),
          start = function() {
            // btn.attr('disabled',true);
            var ajx = $.post('/agents/ajax/reject', {
              _token: csrf_token,
              affiliate_id: affiliate_id
            });
            ajx.done(next);
          },
          next = function(data) {
            location.reload();
            // btn.attr('disabled',false);
          };
      start();
    },

};
