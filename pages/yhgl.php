<?php
require('./common/nav.php');
require('../function/db.class.php');
?>

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">用户管理</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            用户管理表
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>用户名</th>
                                            <th>权限</th>   
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                               <?php
                               	$a=new db();
                               	$sql="select * from users;";
                               	$result=$a->querysql($sql);
                               while($row=mysqli_fetch_array($result))
                                        echo <<< END
                                        <tr class=\"gradeA\">
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[3]</td>
                                            </td>
                                        </tr>
END;
                                        ?>
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


<?php
require('./common/footer.php');
?>

