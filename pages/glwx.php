<?php
require './common/nav.php';
?>

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">文献管理</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            文献管理表
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>文献编号</th>
                                            <th>标题</th>
                                            <th>作者</th>
                                            <th>是否被处理</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                               <?php

while ($row = mysqli_fetch_array($tables)) {

	echo <<< END
                                        <tr class=\"gradeA\">
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
END;
	if ($row[4] == 1) {
		echo "<td class=\"center\">已处理-----<a href=\"../function/detachword.php?id=$row[0]\" class=\"text-right\">[去倒排档]</a></td>";
	} else {
		echo "<td class=\"center\"><a href=\"../function/WordlePaper.php?id=$row[0]\">[处理]</a></td>";
	}

	echo "</tr>";
}

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
require './common/footer.php';
?>

