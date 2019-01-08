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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container">
        <?php
        if(isset($_POST['an'])){
            $sr = $_POST['sr'];
            $na = $_POST['na'];
            $source = $sr;
            $filename = $na.".zip";
            class CustomArchive extends ZipArchive {
                public function addDir($location, $name) {
                    $this->addEmptyDir($name);
                    $this->addDirDo($location, $name);
                }
                private function addDirDo($location, $name) {
                    $name .= '/';         
                    $location .= '/';
                    $dir = opendir ($location);
                    while ($file = readdir($dir))    {
                        if ($file == '.' || $file == '..') continue;
                            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
                            $this->$do($location . $file, $name . $file);
                    }
                } 
            }

            $zip = new CustomArchive;
            $res = $zip->open("./archives/".$filename, ZipArchive::CREATE);
            if($res === TRUE)    {
                $zip->addDir($source, basename($source)); $zip->close();
            } else  { 
                echo 'Could not create a zip archive';
            }
        }
        if(isset($_GET['delfile'])){
            if(unlink('./archives/'.$_GET['delfile'])){
                echo "<script>location.href='index.php'</script>";
            }
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <h3>New Archive</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="na">Name Archive</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="na" name="na" placeholder="phptoziparchiver" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">.zip</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sr">Source</label>
                        <input type="text" class="form-control" id="sr" name="sr" placeholder="C:\xampp\htdocs\project\phptoziparchiver"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="an" name="an"/><i class="fa fa-plus"></i> Create New Archive</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h3>List Archive</h3>
                <ul class="list-group">
                <?php
                if ($handle = opendir('./archives')) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {
                            ?>
                            <li class='list-group-item'>
                                <span onclick="window.location.href='?delfile=<?php echo $entry ?>'" class='badge'><i class='fa fa-trash'></i></span>
                                <a href='archiver.php?file=<?php echo $entry ?>'><?php echo $entry ?></a>
                            </li>
                            <?php
                        }
                    }
                    closedir($handle);
                }
                ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>