$(".date").click(function(){
    var selectDate = $(this).data("date");
    $(".date").removeClass("active");
    $(this).addClass("active");
    alert(Date);
});
$("#btn").click(function(){
    var note = $("textarea[name='note']").val();
    alert(note);
    $.ajax({
        type: "POST",
        url: "/note.php",
        data: note,
        success: function(html){
            $("#btn").text("Сохранено");
        }
    });
});

