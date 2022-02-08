var controller = "inventory";
var rurl = $("#rurl").val();
$(function () {
  $(document).ready(function () {
    $("#mainTable").DataTable({
      dom: "lBfrtip",
      buttons: {
        buttons: [
          {
            extend: "excelHtml5",
            className: "btn btn-primary",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            },
            filename: "Due Payment List",
          },
          {
            extend: "csvHtml5",
            className: "btn btn-default",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            },
            filename: "Due Payment List",
          },
        ],
      },
    });
    $("#mainGroupNav").addClass("active");
    $("#manageGroupNav").addClass("active");
  });
});

function Delete(id) {
  $("#main_id").val(id);
  $("#myModalDelete").modal("show");
}

$(document).on("click", "#confirmdelete", function (e) {
  e.preventDefault();
  toastr.remove();
  var btnid = $(this).attr("id");
  var formId = $(this).data("form");
  var form = $("#" + formId).serialize();
  $(".btn").prop("disabled", true);
  $.ajax({
    type: "POST",
    url: base_url + "Api/" + controller + "/" + rurl + "_delete",
    data: form,
    dataType: "json",
    beforeSend: function () {
      $("#" + btnid).startLoading();
    },
    success: function (resData) {
      console.log("resData " + JSON.stringify(resData));
      var { status, validate, message } = resData;
      if (validate === false) {
        $.each(message, function (k, v) {
          if (v !== "") {
            toastr.error(v);
            $("#" + formId + " input[name='" + k + "']").focus();
            return false;
          }
        });
      } else if (status === false) {
        toastr.error(message);
      } else {
        $("#myModalDelete").modal("hide");
        toastr.success(message);
        window.setTimeout(function () {
          window.location.href = base_url + rurl;
        }, 1500);
      }
    },
    error: function () {
      $("#" + btnid).stopLoading();
    },
    complete: function (data) {
      $("#" + btnid).stopLoading();
    },
  });
});

$(document).on("click", ".getdetail", function (e) {
  var id = $(this).data("id");
  $("#totalPayment,#previouspaid").html(0);
  $("#stock_master_id,#ramount").val(0);
  e.preventDefault();
  toastr.remove();
  $.ajax({
    type: "POST",
    url: base_url + "Api/inventory/getdetail",
    data: { id: id },
    dataType: "json",
    success: function (resData) {
      console.log(resData);
      var { status, message, total, amount } = resData;
      if (status === true) {
        $("#payNowModal").modal("show");
        $("#totalPayment").html(total);
        $("#previouspaid").html(amount);
        $("#ramount").val(parseFloat(total) - parseFloat(amount));
        $("#stock_master_id").val(id);
      } else if (status == false) {
        toastr.warning(message);
        return false;
      }
    },
    error: function (err) {
      $("#totalPayment,#previouspaid").html(0);
      $("#stock_master_id,#ramount").val(0);
      console.log(JSON.stringify(err));
    },
  });
  return false; //stop the actual form post !important!
});

$(document).on("click", "#paynow", function (e) {
  var stock_master_id = $("#stock_master_id").val();
  var paid_amount = $("#paid_amount").val();
  var restaurant_id = $("#restaurant_id").val();
  var ramount = $("#ramount").val();

  e.preventDefault();
  toastr.remove();
  $.ajax({
    type: "POST",
    url: base_url + "Api/inventory/paydueamount",
    data: {
      stock_master_id: stock_master_id,
      paid_amount: paid_amount,
      restaurant_id: restaurant_id,
      ramount: ramount,
    },
    dataType: "json",
    success: function (resData) {
      console.log(resData);
      var { status, validate, message } = resData;
      if (validate === false) {
        $.each(message, function (k, v) {
          if (v !== "") {
            toastr.error(v);
            $("#" + formId + " #'" + k).focus();
            return false;
          }
        });
      } else if (status === false) {
        toastr.error(message);
      } else {
        toastr.success(message);
        window.setTimeout(function () {
          window.location.href = base_url + "duepayment";
        }, 1500);
      }
    },
    error: function (err) {
      $("#totalPayment,#previouspaid").html(0);
      console.log(JSON.stringify(err));
    },
  });
  return false; //stop the actual form post !important!
});

$(document).on("keyup", "#paid_amount", function (e) {
  toastr.remove();
  var camount = $(this).val();
  var ramount = $("#ramount").val();
  var totalPayment = $("#totalPayment").text();
  var previouspaid = $("#previouspaid").text();
  if (parseFloat(camount) > parseFloat(ramount)) {
    toastr.warning(`Max Amount should be ${totalPayment - previouspaid}`);
    $("#paid_amount").val("").focus();
  }
});
