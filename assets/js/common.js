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

function nl2br (str, is_xhtml) {   
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
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

$(document).on("keypress", ".numberOnly", function(event) {
    toastr.remove();
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        toastr.error("Please Enter Number Only");
        $(this).focus();
        event.preventDefault();
    }
});