$("#login").click(function(event) {
    event.preventDefault();
    var username1= $.trim($("input[name='username']").val());
    var pass1=$.trim($("input[name='password']").val());
    var yzm=$.trim($("input[name='authnum_session']").val());
    var requestData = {
        username: username1,
        password: pass1,
        authnum_session:yzm
    };
    $.ajax({
        url: '../function/login.php',
        type: 'POST',
        data: requestData,
    })
    .done(function(data) {
        $('#result').html(data);
        if(data==1)
        {
            window.location.href="../pages/index.php";
        }
        
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});