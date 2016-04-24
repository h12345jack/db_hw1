<?php
require('./common/nav.php');
?>

                <!--表单 -->
                <hr/>
                <div class="row">
                    <div class="col-md-4">
                        <h3>新增用户</h3>
                        <form role="form" method="post" id="documentForm">
                            <fieldset>
                                <div class="form-group incline">
                                    <label>用户名:</label>
                                    <input class="form-control" placeholder="Username" name="username" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <lable>密码:</lable>
                                    <input class="form-control" id="password" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <lable>再输入一次:</lable>
                                    <input class="form-control" id="password2" placeholder="Password" name="password2" type="password" value="">
                                </div>
                                <lable id="output"></lable>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="" id="submit1" class="btn btn-lg btn-primary btn-block">提交</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
        
 <?php
require('./common/footer.php');
?>
<script src="../js/jackhuang.js"></script>