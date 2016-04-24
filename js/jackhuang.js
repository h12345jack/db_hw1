$("#submit1").click(function(event) {
    event.preventDefault();
    var pass1 = $.trim($("#password2").val());
    var pass2 = $.trim($("#password").val());
    if (pass1 != pass2) {
        var message = "对不起,两次输入的密码不一致";
        $("#output").html(message);
        console.log("%s is", message);
        return;
    } else
        $("#output").html("");
    var requestData = {
        username: $("#username").val(),
        password: pass1
    };
    var path="../function/adduser.php"
    $('#documentForm').attr("action", path).submit();
    
});
