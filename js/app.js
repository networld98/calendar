function set_cookie ( name, value, exp_y, exp_m, exp_d, path, domain, secure )
{
    var cookie_string = name + "=" + escape ( value );
    if ( exp_y )
    {
        var expires = new Date ( exp_y, exp_m, exp_d );
        cookie_string += "; expires=" + expires.toGMTString();
    }
    if ( path )
        cookie_string += "; path=" + escape ( path );
    if ( domain )
        cookie_string += "; domain=" + escape ( domain );
    if ( secure )
        cookie_string += "; secure";
    document.cookie = cookie_string;
}

var selectDate;
var selectMonth;
$(".date").click(function(){
    selectDate = $(this).data("date");
    selectMonth = $(this).data("month");
    $(".date").removeClass("active");
    $(this).addClass("active");
    $(".error").hide();
    set_cookie ( "month", selectMonth );
});
$("#btn").click(function(){
    var note = $("#note").val();
    if (selectDate != null) {
        $.ajax({
            type: "POST",
            url: "post-note.php",
            data: {
                date: window.selectDate,
                month: window.selectMonth,
                note: note,
            },
            success: function(html){
                $("#btn").text("Сохранено");
                $("#btn").attr('disabled','disabled');
                $("#btn").css("cursor","auto");
                $(".conteiner-notes").load("ajax-note.php")
            }
        });
    } else {
        $(".error").show();
    }
});
$("#note").focus(function () {
    $("#btn").text("Сохранить");
    $("#btn").removeAttr('disabled');
    $("#btn").css("cursor","pointer");
});

$("#prev").click(function () {
    var prev = $(this).data("prev");
    window.location.href="?month="+prev;
});
$("#next").click(function () {
    var next = $(this).data("next");
    window.location.href="?month="+next;
});
