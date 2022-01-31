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

$(document).ready(function(){
    $("input").attr("autocomplete", "new-password");
    // $('form').disableAutoFill();
});

function print_kot(id, flag){
    start_load()
    var nw = window.open(base_url+'receipt/kotprint?id='+id,"_blank","width=330,height=600")
    if(flag){
        setTimeout(function(){
          nw.print()
          // setTimeout(function(){
          //   nw.close()
          //   end_load()
          // },500)
        },500)
    }
  }
  $('#modal-default-2').on('show.bs.modal', function (e) {
    $("#discount_select").val(0);
  })


  function calc() {
    var sub_total           = 0;
    var total               = 0;
    var grand_total         = 0;
    var vat_percent         = 0;
    var sgst_percent        = 0;
    var cgst_percent        = 0;
    var vat_amt             = 0;
    var sgst_amt            = 0;
    var cgst_amt            = 0;
    var tax_amt             = 0;
    
    var discount_percent    = 0;
    var discount_amt        = 0;

    $('[name="qty[]"]').each(function() {
        // $(this).change(function() {
            var tr = $(this).closest('tr');
            var qty = $(this).val();
            var price = tr.find('[name="amount[]"]').val()
            var amount = parseFloat(qty) * parseFloat(price);
            tr.find('[name="price[]"]').val(amount)
            sub_total = parseFloat(sub_total) + parseFloat(amount)
            tr.find('.amount').text(parseFloat(amount).toLocaleString("en-IN", {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }))

        // })
    })

    // $('[name="price[]"]').each(function() {
    //     total = parseFloat(total) + parseFloat($(this).val())
    // })
    console.log('sub_total:'+sub_total)

    vat_percent = $('#vat_percent').val();
    vat_amt = vat_percent / 100 * total;
    $('#span_vat_percent').text(parseFloat(vat_percent).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))
    $('#span_vat_amt, #vat_amt').text(parseFloat(vat_amt).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))

    sgst_percent = $('#sgst_percent').val();
    sgst_amt = sgst_percent / 100 * total;
    $('#span_sgst_percent').text(parseFloat(sgst_percent).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))
    $('#span_sgst_amt, #sgst_amt').text(parseFloat(sgst_amt).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))

    cgst_percent = $('#cgst_percent').val();
    cgst_amt = cgst_percent / 100 * total;
    $('#span_cgst_percent').text(parseFloat(cgst_percent).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))
    $('#span_cgst_amt, #cgst_amt').text(parseFloat(cgst_amt).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))

    tax_amt = vat_amt + cgst_amt + sgst_amt;

    $('#tax_amt').val(tax_amt);
    
    total = sub_total + tax_amt;
    
    console.log('Total :'+total);
    console.log('Tax :'+tax);
    
    $('#span_sub_total').val(sub_total);
    $('#span_total').val(total);
    $('#span_discount_percent').hide();
    if ($("#discount_percent").val() != 0) {
        discount_percent = $("#discount_percent").val() / 100;
        discount_amt    = (sub_total * discount_percent);
        grand_total     = sub_total - discount_amt;
        $('#span_discount_percent').val("("+discount_percent+" %)");
        $('#span_discount_percent').show();

        $('#span_discount_amt').val(discount_amt);

        $('#span_grand_total').text(parseFloat(grand_total).toLocaleString("en-IN", {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }))
    } else if ($("#dis_fix_val").val() != 0) {

        discount_amt    = (sub_total * discount_percent);
        grand_total     = sub_total - discount_amt;
        $('#span_discount_percent').val("("+discount_percent+" %)");
        $('#span_discount_percent').show();

        $('#span_discount_amt').val(discount_amt);

        $('#span_grand_total').text(parseFloat(grand_total).toLocaleString("en-IN", {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }))

        $("#if_dis_val").show();
        var dis = $("#dis_fix_val").val();
        var dis_val = total - dis;
        $('#final_dis').val(dis);
        $('#discount_val').html('<i class="fas fa-rupee-sign"></i><b> ' + parseFloat(dis).toLocaleString("en-IN", {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }) + '</b>')
        // $('#discount_val').text('<i class="fas fa-rupee-sign">'+parseFloat(dis).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}));
        $('#gtotal_amount').text(parseFloat(dis_val + tax).toLocaleString("en-IN", {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));
        $('[name="g_total_amount"]').val(dis_val + tax);

    } else {
        $('[name="g_total_amount"]').val(total + tax);
        $('#gtotal_amount').text(parseFloat(total + tax).toLocaleString("en-IN", {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));
    }
    $('[name="total_amount"]').val(total);
    $('#total_amount').text(parseFloat(total).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))

}

function cat_func() {
    $('.cat-item').click(function() {
        var id = $(this).attr('data-id')
        console.log(id)
        if (id == 'all') {
            $('.prod-item').parent().toggle(true)
        } else {
            $('.prod-item').each(function() {
                if ($(this).attr('data-category-id') == id) {
                    $(this).parent().toggle(true)
                } else {
                    $(this).parent().toggle(false)
                }
            })
        }
    })
}