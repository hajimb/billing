var controller = "tableorder";
$(document).ready(function() {
    calc()
});

function getitemssearch() {
    var search = $('#search_item').val();
    $('.cat_div_data').removeClass('active');
    $('.cat_div_data').removeClass('show');
    url = base_url+"Api/order/getItemsbysearch/";
    var html = '<div class="row p-2">';
    $.ajax({
        method: "POST",
        url: url,
        data: {
            search: search
        },
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success: function(data) {
            //alert(data);
            console.log(data.items[0].cat_id)
            var item = data.items;

            $.each(item, function(k, v) {
                console.log(v.cat_id);

                html += '<div class="col-md-3 col-lg-3">';
                html += "<span data-json = '" + JSON.stringify(v) + "'>";
                html += '<a onclick="additem_table(' + v.item_id + ');" id="additem_' + v.item_id + '" class="btn bg-white items-btn" role="button" data-prod-id="' + v.item_id + '">';
                html += '<i class="far fa-dot-circle veglogo"></i> ' + v.item_name;
                html += '</a>';
                html += '</span>';
                html += '</div>'
                /// do stuff
            });
            html += '</div>';
            $('#' + id + '_cat').html(html);
            //$('#'+id+'_cat').toggle();
            $('#' + id + '_cat').addClass('active');
            $('#' + id + '_cat').addClass('show');
            //data.items.forEach(element => console.log(element));
        },
        error: function(data) {
            alert("failed");
        }
    });
}

function getitems(id) {

    butId = $(this).attr('id');
    $('.cat_div_data').removeClass('active');
    $('.cat_div_data').removeClass('show');
    $('#' + id + '_cat').html('');
    url = base_url+ "order/getItemsbycategory/"+id;
    var html = '<div class="row p-2">';
    $.ajax({
        method: "GET",
        url: url,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data) {
            //alert(data);
            console.log(data.items[0].cat_id)
            var item = data.items;

            $.each(item, function(k, v) {
                console.log(v.cat_id);

                html += '<div class="col-md-3 col-lg-3">';
                html += "<span data-json = '" + JSON.stringify(v) + "'>";
                html += '<a onclick="additem_table(' + v.item_id + ');" id="additem_' + v.item_id + '" class="btn bg-white items-btn" role="button" data-prod-id="' + v.item_id + '">';
                html += '<i class="far fa-dot-circle veglogo"></i> ' + v.item_name;
                html += '</a>';
                html += '</span>';
                html += '</div>'
                /// do stuff
            });
            html += '</div>';
            console.log(html);
            $('#cat_item').html(html);
            //$('#'+id+'_cat').toggle();
            $('#cat_item').addClass('active');
            $('#cat_item').addClass('show');
            //data.items.forEach(element => console.log(element));
        },
        error: function(data) {
            alert("failed");
        }
    });
}

function additem_table(idd) {
    console.log(idd)
    var data = $('#additem_' + idd).parent('span').attr('data-json')

    data = JSON.parse(data)
    if ($('#dinein tr[data-id="' + data.item_id + '"]').length > 0) {
        var tr = $('#dinein tr[data-id="' + data.item_id + '"]')
        var qty = tr.find('[name="qty[]"]').val();
        qty = parseInt(qty) + 1;
        qty = tr.find('[name="qty[]"]').val(qty).trigger('change')
        calc()
        return false;
    }
    var tr = $('<tr class="o-item"></tr>')
    tr.attr('data-id', data.item_id)
    tr.append('<td>' + data.item_id + '</td>')
    tr.append('<td>' + data.item_name + '</td>')
    tr.append('<td><div><div class="value-button btn-minus" id="decrease" value="Decrease Value">-</div><input class="number" type="number" name="qty[]" id="number_'+idd+'" value="1" /><div class="value-button btn-plus" id="increase"  value="increase Value">+</div></div><input type="hidden" name="item_id[]" id="item_id_' + data.item_id + '" value="' + data.item_id + '"><input type="hidden" name="price[]" id="" value="' + data.price + '"><input type="hidden" name="amount[]" id="" value="' + data.price + '"></td>')
    tr.append('<td>' + data.price + '</td>')
    tr.append('<td><span class="btn btn-sm btn-danger btn-rem"><b><i class="fa fa-times text-white"></i></b></span></td>')
    $('#dinein tbody').append(tr)
    // qty_func()
    calc()
}

$(document).on("click", "#dinein .btn-minus", function(event) {
    var qty = $(this).siblings('input').val()
    console.log($(this).siblings('input').attr('id'));
    console.log('Minus before:'+qty);
    qty = qty > 1 ? parseInt(qty) - 1 : 1;
    console.log('Minus After:'+qty);
    $(this).siblings('input').val(qty)
    calc()
})
$(document).on("click", "#dinein .btn-plus", function(event) {
        var qty = $(this).siblings('input').val()
        console.log($(this).siblings('input').attr('id'));
        console.log('Plus before:'+qty);
        qty = parseInt(qty) + 1;
        console.log('Plus After:'+qty);
        $(this).siblings('input').val(qty)
        calc()
    })
$(document).on("click", "#dinein .btn-rem", function(event) {
    $(this).closest('tr').remove()
    calc()
})

// }

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