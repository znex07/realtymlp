$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
  
});
(function($) {
  $.fn.extend({
    triggerAll: function (events, params) {
      var el = this, i, evts = events.split(' ');
      for (i = 0; i < evts.length; i += 1) {
        el.trigger(evts[i], params);
      }
      return el;
    },
    disable: function() {
      return this.attr('disabled', true);
    },
    enable: function() {
      return this.attr('disabled', false);      
    },
  });

})(jQuery);