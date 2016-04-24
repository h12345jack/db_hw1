<?php
require('./common/nav.php');
?>

                <!--表单 -->
                <hr/>
                <div class="row">
                    <div class="col-md-6">
                        <h3>录入文献</h3>
                        <form role="form" method="post" id="documentForm" >
                            <fieldset>
                                <div class="form-group has-feedback">
                                    <label>编号</label>

                                    <input class="form-control" placeholder="文献编号" name="dno" type="text" autofocus>
                                	<span  id="message1" class="glyphicon glyphicon-warning-sign form-control-feedback hidden" aria-hidden="true"></span>
  									<span id="inputWarning2Status" class="sr-only">(warning)</span>

                                </div>
                                <div class="form-group">
                                    <lable>标题</lable>
                                    <input class="form-control" placeholder="标题" name="title" type="text" value="">
                                </div>
                                
                                <div class="form-group">
                                    <lable>作者</lable>
                                    
                                    <input class="form-control" placeholder="作者" name="author" type="text" value="">
                               		
                                </div>
                                <div class="form-group">
                                    <lable>原文</lable>
                                     <div class="input-group">
                                     	<div class="input-group-addon">
                                     	<span class="glyphicon glyphicon-align-left"></span>
                                     	</div>
                                     <textarea name="content" id="message_ok" class="form-control" rows="16" placeholder="Your message">
                                     </textarea>
                                 	</div>
                                 </div>
                                <div class="form-group">
                                <lable id="output"></lable>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="" id="submit1" class="btn btn-lg btn-primary btn-block">提交</a>
                            	</div>
                            </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
        
 <?php
require('./common/footer.php');
?>
<script src="../js/jackhuang3.js"></script>
