$(".book").click(function()
{
    var timeslot = $(this).attr("data-timeslot");
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#modal_TS").modal("show");
})
