'use strict';

var propDatum = new Bloodhound({
    datumTokenizer: function(e) {
        return Bloodhound.tokenizers.whitespace(e);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // prefetch: {
    //   url: '/properties/search?query=%QUERY',
    //   transform: function(response) {
    //     console.log(response);
    //     var column = response.column;
    //     return $.map(response.locations, function(_object) {
    //       var _value = '';
    //       var suffix = _object.city_title +', ' + _object.province_title;
    //       var _column = '';
    //
    //       if (column == 'brgy') {
    //         _column = 'area';
    //         _value = _object.brgy + ' '+suffix;
    //       }
    //       else if (column == 'street_address') {
    //         _column = 'area';
    //         _value = _object.street_address +' '+suffix;
    //       }
    //       else if (column == 'village') {
    //         _column = 'area';
    //         _value = _object.village + ' '+suffix;
    //       }
    //       else if (column == 'city') {
    //         _column = 'city';
    //         _value = suffix;
    //       }
    //       else if (column == 'province') {
    //         _column = 'province';
    //         _value = suffix;
    //       }
    //       return {
    //         value: _value,
    //         column: _column,
    //         data: _object
    //       };
    //     });
    //   }
    // },
    remote: {
        url: '/properties/search?query=%QUERY',
        filter: function(response) {
            console.log(response);
            var column = response.column;   
            return $.map(response.locations, function(_object) {
              var _value = '';
              var suffix = _object.city_title +', ' + _object.province_title;
              var _column = '';
    
              if (column == 'brgy') {
                _column = 'area';
                _value = _object.brgy + ', '+suffix;
              }
              else if (column == 'street_address') {
                _column = 'area';
                _value = _object.street_address +', '+suffix;
              }
              else if (column == 'village') {
                _column = 'area';
                _value = _object.village + ', '+suffix;
              }
              else if (column == 'city') {
                _column = 'city';
                _value = suffix;
              }
              else if (column == 'province') {
                _column = 'province';
                _value = suffix;
              }
              return {
                value: _value,
                column: _column,
                location: column,
                data: _object
              };
            });
            // console.log(resp);
        }
    }
});
