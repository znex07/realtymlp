'use strict';

var affDatum = new Bloodhound({
  datumTokenizer: function(e) {
    return Bloodhound.tokenizers.whitespace(e);
  },
  queryTokenizer: Bloodhound.tokenizers.whitespace,

  remote: {
    url: '/users/search?query=%QUERY',
    filter: function(response) {
      return $.map(response.data, function(object) {
        return {
          value: object.user_fname + " " + object.user_lname,
          data: object
        };
      });
    }
  }
});
