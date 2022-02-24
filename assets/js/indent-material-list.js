var table;
$(document).on("click", ".saveChange", function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid = $(this).attr('id');
    var formId = $(this).data('form');
    var form = $("#"+formId).serialize();
    var selected_items         = [];
    var rawmaterial = table.$(".rawmaterial", {"page": "all"});
    var stock       = table.$(".stock", {"page": "all"});
    var unit       = table.$(".unit", {"page": "all"});
    rawmaterial.each(function(index,elem){
        var rawmaterial_val  = $(rawmaterial[index]).val();
        var stock_val  = $(stock[index]).val();
        var unit_val  = $(unit[index]).val();
        // var res = course.split(",");
        selected_items.push({'stock' : stock_val,'unit' : unit_val, 'rawmaterial': rawmaterial_val}); //selected_items + id + ",";
    });
    console.log('form'+JSON.stringify(form,null,4))
    console.log('rawmaterial'+JSON.stringify(rawmaterial,null,4))
    console.log('selected_items'+JSON.stringify(selected_items,null,4))
    $.ajax({
        type: "POST",
        url: base_url + "Api/item/take",
        data: {selected_items},
        dataType: "html",
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success: function(resData) {
            console.log(resData);
            // $('#printDiv').html(resData);
            newWin = window.open("");
            newWin.document.write(resData);
            newWin.print();
            newWin.close();
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
    });
})


$(function () {
    $(document).ready(function() {
        table = $('#printTable').DataTable({
            dom: 'lBfrtip',
            "ordering": false,
            buttons: {
                buttons: [
                {
                    extend: "excelHtml5",
                    className: "btn btn-primary",
                    exportOptions: {
                    columns: [0,1,2,3]
                    },filename: "Indent List",
                },
                {
                    extend: "csvHtml5",
                    className: "btn btn-default",
                    exportOptions: {
                        columns: [0,1,2,3]
                    },
                    filename: "Indent List",
                },
                ],
            },
        });
    });
});