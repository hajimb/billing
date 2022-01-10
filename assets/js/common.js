'use strict';

var base_url = $('meta[name=base_url]').attr("content");

(function( $ ) {
    
    $.fn.startLoading = function() {
        // alert()
        return this.each(function() {
            $(this).attr("disabled", true).addClass("disabled");
            var icon = $(this).find('i');
            icon.show();
            icon.data('loader-icons', icon.attr('class'))
            icon.removeAttr('class');
            icon.addClass("fa").addClass("fa-spin").addClass("fa-spinner");
        });
    }
 
    $.fn.stopLoading = function() {
        return this.each(function() {
            $(this).removeAttr("disabled").removeClass("disabled");
            let icon = $(this).find('i');
            icon.hide();
            icon.removeAttr('class');
            icon.attr('class', icon.data('loader-icons'));
        });
    }
 
}( jQuery ));

$(document).on("click", ".goBack" , function(e) {
    // alert();
    window.history.back();
});

function showConfirmMessage(id, msg) {
    Swal.fire({
        title: "Are you sure?",
        text: msg,
        icon: "warning",
        // buttons: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          confirmdelete(id);
        } else {
          Swal.fire("No Changes! ",{
              timer : 2000
          });
        }
    });
}