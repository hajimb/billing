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
    // $("input").attr("autocomplete", "new-password");
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
    $('[name="qty[]"]').each(function() {
        // $(this).change(function() {
            var tr = $(this).closest('tr');
            var qty = $(this).val();
            var price = tr.find('[name="amount[]"]').val()
            var amount = parseFloat(qty) * parseFloat(price);
            tr.find('[name="price[]"]').val(amount)
            tr.find('.amount').text(parseFloat(amount).toLocaleString("en-IN", {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }))

        // })
    })
    var total = 0;
    $('[name="price[]"]').each(function() {
        total = parseFloat(total) + parseFloat($(this).val())
    })
    console.log(total)
    var tax_vat = $('#tax_vat').val();
    var vat = tax_vat / 100 * total;
    $('#vat').text(parseFloat(vat).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))
    var tax_cgst = $('#tax_cgst').val();
    var cgst = tax_cgst / 100 * total;
    $('#CGST').text(parseFloat(cgst).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))
    var tax_sgst = $('#tax_sgst').val();
    var sgst = tax_sgst / 100 * total;
    $('#SGST').text(parseFloat(sgst).toLocaleString("en-IN", {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))
    var tax = vat + cgst + sgst;
    $('#tax_amount').val(tax);
    // total = total + tax;
    console.log('dsfsfdfds');
    if ($("#dis_per_val").val() != 0) {
        $("#if_dis_val").show();
        var dis = $("#dis_per_val").val() / 100;
        var dis_val = total - (total * dis);
        $('#final_dis').val(total * dis);
        $('#discount_val').text($("#dis_per_val").val() + ' %');
        $('#gtotal_amount').text(parseFloat(dis_val + tax).toLocaleString("en-IN", {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }))
        $('[name="g_total_amount"]').val(dis_val + tax);
    } else if ($("#dis_fix_val").val() != 0) {
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
  function calculate(flag) {
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
    var totalitem           = 0;
    sub_total               = $('#prev_sub_total').val();
    totalitem               = $('#prev_totalitem').val();
    if(flag == false){
        $('[name="qty[]"]').each(function() {
                var tr      = $(this).closest('tr');
                var qty     = $(this).val();
                var price   = tr.find('[name="amount[]"]').val()
                var amount  = parseFloat(qty) * parseFloat(price);
                sub_total   = parseFloat(sub_total) + parseFloat(amount)
                tr.find('[name="price[]"]').val(amount)
                tr.find('.amount').text(ConvertToFloat(amount));
                totalitem++;
            // })
        })
    }
    $('#totalitem').val(totalitem);
    vat_percent = $('#vat_percent').val();
    vat_amt = vat_percent / 100 * sub_total;
    
    vat_percent = ConvertToFloat(vat_percent);
    vat_amt = ConvertToFloat(vat_amt);
    
    $('#span_vat_percent').text(vat_percent)
    $('#span_vat_amt').text(vat_amt);
    $('#vat_amt').val(vat_amt);
    
    sgst_percent = $('#sgst_percent').val();
    sgst_amt = sgst_percent / 100 * sub_total;
    
    sgst_percent = ConvertToFloat(sgst_percent);
    sgst_amt = ConvertToFloat(sgst_amt);
    
    $('#span_sgst_percent').text(sgst_percent);
    $('#span_sgst_amt').text(sgst_amt);
    $('#sgst_amt').val(sgst_amt);
    
    cgst_percent = $('#cgst_percent').val();
    cgst_amt = cgst_percent / 100 * sub_total;
    
    cgst_percent = ConvertToFloat(cgst_percent);
    cgst_amt = ConvertToFloat(cgst_amt);
    
    $('#span_cgst_percent').text(cgst_percent);
    $('#span_cgst_amt').text(cgst_amt);
    $('#cgst_amt').val(cgst_amt);
    
    console.log('sub_total:'+sub_total);
    console.log('vat_percent:'+vat_percent);
    console.log('vat_amt:'+vat_amt);
    console.log('sgst_percent:'+sgst_percent);
    console.log('sgst_amt:'+sgst_amt);
    console.log('cgst_percent:'+cgst_percent);
    console.log('cgst_amt:'+cgst_amt);

    tax_amt = parseFloat(vat_amt) + parseFloat(cgst_amt) + parseFloat(sgst_amt);

    $('#tax_amt').val(tax_amt);
    
    total = parseFloat(sub_total) + parseFloat(tax_amt);
    
    console.log('Total :'+total);
    console.log('Tax :'+tax_amt);
    
    $('#span_sub_total').text(ConvertToFloat(sub_total));
    $('#span_total').text(ConvertToFloat(total));
    $('#sub_total').val(sub_total);
    $('#total').val(total);

    $('#span_discount_percent').hide();
 
    if (parseFloat($("#dis_per_val").val()) > 0) {
        discount_percent = $("#dis_per_val").val();
        discount_amt    = (parseFloat(total) * (parseFloat(discount_percent)/100));
        $('#discount_percent').val(discount_percent);
    }else if($("#dis_fix_val").val() != 0){
        discount_amt    = $("#dis_fix_val").val();
    }
    grand_total     = parseFloat(total) - parseFloat(discount_amt);
    if(discount_percent > 0){
        $('#span_discount_percent').text("("+discount_percent+" %)");
        $('#span_discount_percent').show();
    }
    if(discount_amt > 0){
        $('#span_discount_amt').text(ConvertToFloat(discount_amt));
        $('#discount_amt').val(discount_amt);
    }
    $('#span_grand_total').text(ConvertToFloat(grand_total));
    $('#grand_total').val(grand_total);

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

function ConvertToFloat(str){
    var rtn = 0;
    if(str != ''){
    rtn = parseFloat(str).toLocaleString("en-IN", {
           style: 'decimal',
           minimumFractionDigits: 2,
           maximumFractionDigits: 2
       })
   }
   return rtn;
}

// Add Discount
$("#add_discount").click(function(){
    if($("#discount_select").val() != 0){
        console.log('discount_select:'+$("#discount_select").val());
      var id = $("#discount_select").val();
      $.ajax({
          url:base_url+'discount/getdiscount',
          method:'POST',
          data:{id:id},
          dataType: 'json',
          success:function(resp){
              console.log('Discount returned :'+resp);
              $("#discount_id").val(resp.discount_id);
              $("#dis_per_val").val(resp.discount);
              $("#dis_fix_val").val(0);
              calculate(false);
            }
        })
    }else if($("#dis_per").val() != ''){
        $("#dis_fix_val").val(0);
        $("#dis_per_val").val($("#dis_per").val());
        calculate(false);
    }else if($("#dis_fix").val() != ''){
        $("#dis_per_val").val(0);
        $("#dis_fix_val").val($("#dis_fix").val());
        calculate(false);
    }
    // $("#collapseTwo").removeClass('show');
  })

    $(document).on("click", "#RaiseBill", function(event) {
        event.preventDefault();
        $("#status").val('BillRaised');
        UpdateBill(true);
    });
  
    $(document).on("click", "#PayBill", function(event) {
        event.preventDefault();
        $("#status").val('BillPaid');
        UpdateBill(true);
    });

  //Update Discount in Order View
  function UpdateBill(flag){
    var status = $("#status").val();
    var form = $("#mainfrm").serialize();
    // var dis = $('#final_dis').val();
    // var g_total = $('#g_total_amount').val();
    // var tax = $('#tax_amount').val();
    // var dis_id = $("#discount_select").val();
    $.ajax({
          url: base_url +'Api/order/update_bill',
          method:'POST',
          data:form,
          dataType: 'json',
          async : true,
          success:function(resp){
            if(resp.status == true){
                if(flag){
                    toastr.success(resp.message);
                    if(status == "BillRaised") setTimeout(function(){location.reload();},1000)            
                    if(status == "BillPaid") setTimeout(function(){ window.location.href= base_url + "tableorder";},1000)            
                }
            }else{
                toastr.error(resp.message);
            }
        }
    })
  }

  $(document).on("click", "#PrintBill", function(event) {
    event.preventDefault();
    var bill_id = $(this).attr('data-id');
    console.log(bill_id);
    $.ajax({
        url: base_url +'Api/order/get_bill',
        method:'POST',
        data:{bill_id},
        dataType: 'json',
        success:function(resp){
            console.log(JSON.stringify(resp));
            if(resp.status == true){
                $('#div_print_bill').html(resp.data);
                $("#modal-print-bill").modal('show');
            }else{
                toastr.error(resp.message);
            }
      }
    })
    return false;
});