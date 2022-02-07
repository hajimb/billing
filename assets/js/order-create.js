var controller = "order";
$(document).ready(function() {
    calculate(true)
});

$(document).on("click", "#save_kot", function(e) {
    Sendkot(e, false);
});

$(document).on("click", "#kot_print", function(e) {
    Sendkot(e, true);
});

function Sendkot(event, printkot){
    event.preventDefault();
    var form = $("#mainfrm").serialize();    //start_load()
    // $.ajax({
    //     type: "POST",
    //     url:base_url+'Api/order/add',
    //     data: form,
    //     processData: false,  // Important!
    //     contentType: false,
    //     cache   : false,
    //     dataType: "json",
    //     success:function(resp){
    //     }
    // });

    $.ajax({
        type: "POST",
        url: base_url + "Api/order/add",
        data: form,
        dataType: "json",
        beforeSend: function() {
            // $("#"+btnid).startLoading();
        },
        success: function(resData) {
            console.log("resData " + JSON.stringify(resData));
            var {status,validate,message, data} = resData;
            if (validate === false) {
                $.each(message, function(k, v) {
                    if (v !== "") {
                        toastr.error(v)
                        $("#"+formId+" input[name='" + k + "']").focus();
                        return false
                    }
                });
            } else if (status === false) {
                toastr.error(message)
            } else {
                toastr.success(message);
                print_kot(data,printkot)
                window.setTimeout(function() {
                    window.location.href = base_url+"tableorder";
                }, 1000);
            }
        }, error: function(){
            // $("#"+btnid).stopLoading();
        }, complete:function(data){
            // $("#"+btnid).stopLoading();
        }
    });
    return false;
}

$(document).on("click", "#searchtext", function(e) {
    var formId = "searchForm";
    var form = $("#"+formId).serialize();
    $('.cat_div_data').removeClass('active');
    $('.cat_div_data').removeClass('show');
    // console.log(form);
    // url = base_url+"Api/order/search/";
    var html = '<div class="row p-2">';
    $.ajax({
        type: "POST",
        url: base_url + "Api/"+controller+"/search",
        data: form,
        dataType: "json",
        beforeSend: function() {
            // $("#"+btnid).startLoading();
        },
        success: function(resData) {
            // console.log("resData " + JSON.stringify(resData));
            var {status,validate,message, data} = resData;
            if (validate === false) {
                $.each(message, function(k, v) {
                    if (v !== "") {
                        toastr.error(v)
                        $("#"+formId+" input[name='" + k + "']").focus();
                        return false
                    }
                });
            } else if (status === false) {
                toastr.error(message)
            } else {
                toastr.success(message)
                var item = data.items;
                $.each(item, function(k, v) {
                    // console.log(v.cat_id);
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
                $('#cat_item').html(html);
                $('#cat_item').addClass('active');
                $('#cat_item').addClass('show');

            }
        }, error: function(){
            // $("#"+btnid).stopLoading();
        }, complete:function(data){
            // $("#"+btnid).stopLoading();
        }
    });
});


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
            console.log(data);
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
            // console.log(html);
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
        qty = tr.find('[name="qty[]"]').val(qty);
        calculate(false)
        return false;
    }
    var tr = $('<tr class="o-item"></tr>')
    tr.attr('data-id', data.item_id)
    tr.append('<td>' + data.item_id + '</td>')
    tr.append('<td>' + data.item_name + '</td>')
    tr.append('<td><div><div class="value-button btn-minus" id="decrease" value="Decrease Value">-</div><input class="number" type="number" name="qty[]" id="number_'+idd+'" value="1" /><div class="value-button btn-plus" id="increase"  value="increase Value">+</div></div></td>')
    tr.append('<td>' + data.price + '</td>')
    tr.append('<td><div><input class="text" type="text" name="instruction[]" id="instruction_'+idd+'" value="" /></div></td>')
    tr.append('<td><span class="btn btn-sm btn-danger btn-rem"><b><i class="fa fa-times text-white"></i></b></span></td>')
    tr.append('<input type="hidden" name="item_id[]" id="item_id_' + data.item_id + '" value="' + data.item_id + '"><input type="hidden" name="price[]" id="" value="' + data.price + '"><input type="hidden" name="amount[]" id="" value="' + data.price + '">')
    $('#dinein tbody').append(tr)
    // qty_func()
    calculate(false)
}

$(document).on("click", "#dinein .btn-minus", function(event) {
    var qty = $(this).siblings('input').val()
    console.log($(this).siblings('input').attr('id'));
    console.log('Minus before:'+qty);
    qty = qty > 1 ? parseInt(qty) - 1 : 1;
    console.log('Minus After:'+qty);
    $(this).siblings('input').val(qty)
    calculate(false)
})
$(document).on("click", "#dinein .btn-plus", function(event) {
        var qty = $(this).siblings('input').val()
        console.log($(this).siblings('input').attr('id'));
        console.log('Plus before:'+qty);
        qty = parseInt(qty) + 1;
        console.log('Plus After:'+qty);
        $(this).siblings('input').val(qty)
        calculate(false)
    })
$(document).on("click", "#dinein .btn-rem", function(event) {
    $(this).closest('tr').remove()
    calculate(false)
})

// }
