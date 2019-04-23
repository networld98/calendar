$(".date").click(function(){
    var selectDate = $(this).data("date");
    $(".date").removeClass("active");
    $(this).addClass("active");
});
$("#btn").click(function(){
    var note = $("#note").val();
    $.ajax({
        type: "POST",
        url: "/note.php",
        data: {
            data: selectDate,
            note: note,
        },
        success: function(html){
                $("#btn").text("Сохранено");
            }
        });
});