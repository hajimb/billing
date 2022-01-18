var controller = "tableorder";

function secondsTimeSpanToHMS(s,id) {
    var h = Math.floor(s / 3600); //Get whole hours
    s -= h * 3600;
    var m = Math.floor(s / 60); //Get remaining minutes
    s -= m * 60;
    $("#seconds_"+id).html((s < 10 ? '0' + s : s));
    $("#minutes_"+id).html((m < 10 ? '0' + m : m));
    $("#hours_"+id).html((h < 10 ? '0' + h : h));
  }
  
$(function () {
    $(document).ready(function() {
        $("#mainGroupNav").addClass('active');
        $("#manageGroupNav").addClass('active');
    });
});

$(document).on("click", ".createorder", function(e) {
    var id = $(this).attr('table_id');
    $("#main_id").val(id);
    var url = base_url+controller+"/create";
    $("#mainfrm").attr('action', url);
    $("#mainfrm").submit();
});

$(document).on("click", ".vieworder", function(e) {
    var id = $(this).attr('table_id');
    $("#main_id").val(id);
    var url = base_url+controller+"/view";
    $("#mainfrm").attr('action', url);
    $("#mainfrm").submit();
});

