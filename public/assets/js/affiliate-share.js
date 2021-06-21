/**
 * Created by TJ on 3/18/2017.
 */
'use strict';

var affshare = {

  init: function () {
      var selfie = affshare;
      $('#shareaff').on('shown.bs.modal', selfie.modalShown);
  },

    modalShown: function (e) {
        var triggerButton = $(e.relatedTarget),
      propertyId = triggerButton.parents('.cmd-parent').data('id'),
            sharables = triggerButton.parents('.cmd-parent').find('.sharables').val(),
            categories = triggerButton.parents('.cmd-parent').find('.categories').val(),
            owner = triggerButton.parents('.cmd-parent').find('.owner').val(),
            modal = $(this),
            selectDropdown = modal.find('.modal-body').find('#select');
        // if()

    var start = function () {

            $('#submit_shareaff').on('click',onSubmit)
    },

        onSubmit = function() {
            var selectedUser = selectDropdown.val();
            console.log(categories);
            alertify.confirm(
                'RealtyMLP',
                "Are you sure you want to share this property ?",
                function(closeEvent) {
                    $.post('/dashboard/postShareaff', {
                        _token: csrf_token,
                        id: propertyId,
                        categories: categories,
                        answer: selectedUser,
                        sharables: sharables,
                        owner: owner,
                        property_code: 'PR-031420171489480903',
                        type: 'affiliate'

                    }).done(function(data) {
                        location.reload();
                    });
                    return false;
                },
                function(){}
            );
        };
        start();
    }
};