<?php
$zip = isset($_GET['file'])? $_GET['file'] : '';
if($zip){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP Zip Archiver</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Open Archive</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="index.php" class="btn btn-primary" style="margin-top:12px"><i class="fa fa-chevron-left"></i> Back</a>
            </div>
        </div>
        <div class="btn-group" role="group" aria-label="basic">
            <button type="button" data-toggle="modal" data-target="#myModal-addfile" class="btn btn-primary"><i class="fa fa-file-o"></i> Add File</button>
            <button type="button" data-toggle="modal" data-target="#myModal-addfolder" class="btn btn-success"><i class="fa fa-folder"></i> Add Folder</button>
            <button type="button" data-toggle="modal" data-target="#myModal-extracto" class="btn btn-warning"><i class="fa fa-file-archive-o"></i> Extract to</button>
        </div>
        <div class="btn-group" role="group" aria-label="pro">
            <button type="button" data-toggle="modal" data-target="#myModal-setpassword" class="btn btn-danger"><i class="fa fa-key"></i> Set Password</button>
            <button type="button" data-toggle="modal" data-target="#myModal-comment" class="btn btn-default"><i class="fa fa-comment"></i> Comment</button>
        </div>
        <!-- Modal addfile -->
        <div class="modal fade" id="myModal-addfile" tabindex="-1" role="dialog" aria-labelledby="myModaladdfile">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModaladdfile">Add File</h4>
                </div>
                <form method="get" action="function.php">
                <div class="modal-body">
                    <input type="hidden" name="file" value="<?php echo $zip ?>"/>
                    <input type="hidden" name="exec" value="addfile"/>
                    <div class="form-group">
                        <input type="text" name="des" class="form-control" placeholder="Add New File or Destination File"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="src" class="form-control" placeholder="Source New File"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Process</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Modal addfolder -->
        <div class="modal fade" id="myModal-addfolder" tabindex="-1" role="dialog" aria-labelledby="myModaladdfolder">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModaladdfolder">Add Folder</h4>
                </div>
                <form method="get" action="function.php">
                <div class="modal-body">
                    <input type="hidden" name="file" value="<?php echo $zip ?>"/>
                    <input type="hidden" name="exec" value="addfolder"/>
                    <div class="form-group">
                        <input type="text" name="src" class="form-control" placeholder="Add New Folder"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Process</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Modal extracto -->
        <div class="modal fade" id="myModal-extracto" tabindex="-1" role="dialog" aria-labelledby="myModalextracto">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalextracto">Extract to</h4>
                </div>
                <form method="get" action="function.php">
                <div class="modal-body">
                    <input type="hidden" name="file" value="<?php echo $zip ?>"/>
                    <input type="hidden" name="exec" value="extracto"/>
                    <div class="form-group">
                        <input type="text" name="src" class="form-control" placeholder="Extract to ..."/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Process</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Modal password -->
        <div class="modal fade" id="myModal-setpassword" tabindex="-1" role="dialog" aria-labelledby="myModalsetpassword">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalsetpassword">Set Password</h4>
                </div>
                <form method="get" action="function.php">
                <div class="modal-body">
                    <input type="hidden" name="file" value="<?php echo $zip ?>"/>
                    <input type="hidden" name="exec" value="setpassword"/>
                    <div class="form-group">
                        <input type="password" name="src" class="form-control" placeholder="Set Password"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Process</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Modal comment -->
        <div class="modal fade" id="myModal-comment" tabindex="-1" role="dialog" aria-labelledby="myModalcomment">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalcomment">Comment</h4>
                </div>
                <form method="get" action="function.php">
                <div class="modal-body">
                    <input type="hidden" name="file" value="<?php echo $zip ?>"/>
                    <input type="hidden" name="exec" value="comment"/>
                    <div class="form-group">
                        <textarea name="src" class="form-control" placeholder="Add Comment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Process</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        <a href="./archives/<?php echo $zip ?>" class="btn btn-info"><i class="fa fa-download"></i> Download</a>
        <p><br/></p>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>Compressed Size</th>
                    <th>Compression Method</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $za = zip_open('./archives/'.$zip);
                if ($za) {
                    while ($zip_entry = zip_read($za)) {
                ?>
                <tr>
                    <td><?php echo $fn = zip_entry_name($zip_entry) ?></td>
                    <td><?php echo zip_entry_filesize($zip_entry) ?></td>
                    <td><?php echo zip_entry_compressedsize($zip_entry) ?></td>
                    <td><?php echo zip_entry_compressionmethod($zip_entry) ?></td>
                    <td>
                        <a target="_blank" href="function.php?file=<?php echo $zip ?>&exec=viewfile&src=<?php echo $fn ?>"><i class="fa fa-eye"></i></a> &nbsp;
                        <a href="function.php?file=<?php echo $zip ?>&exec=delfile&src=<?php echo $fn ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <p><br/><br/></p>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    <script>
    $('table').dataTable();
    </script>
  </body>
</html>
<?php
} else{
    echo "<script>location.href='index.php'</script>";
}
?>