$("#submit1").click(function(event) {
    event.preventDefault();
    if($("#message1").hasClass('hidden')){
        var path="../function/addwx.php"
        $('#documentForm').attr("action", path).submit();
    
    }
    
});
$("input[name='dno']").blur(function(event) {
    var dno1=$.trim($("input[name='dno']").val())
    if(dno1==""){
         $("#message1").removeClass('hidden');
            $("#output").html("编号不能为空");
    }
    $.ajax({
        url: '../function/submit.php',
        type: 'GET',
         data: {dno: dno1},
    })
    .done(function(data) {
        console.log(data);
        if(data=='1')
        {
            $("#message1").addClass('hidden');
            $("#output").html("");
        }
        else
        {
            $("#message1").removeClass('hidden');
            $("#output").html("该编号已被使用");
        }

        console.log("success");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});
