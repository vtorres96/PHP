<?php
$zip = new ZipArchive;
$file = isset($_GET['file'])? $_GET['file'] : '';
$exec = isset($_GET['exec'])? $_GET['exec'] : '';
$src = isset($_GET['src'])? $_GET['src'] : '';
$des = isset($_GET['des'])? $_GET['des'] : '';
$res = $zip->open('./archives/'.$file);
if($exec == 'addfile'){
    if($zip->addFile($src, $des)){
        echo "<script>location.href='archiver.php?file=".$file."'</script>";
    }
    $zip->close();
} else if($exec == 'addfolder'){
    if($zip->addEmptyDir($src)) {
        echo "<script>location.href='archiver.php?file=".$file."'</script>";
    }
    $zip->close();
} else if($exec == 'extracto'){
    if($zip->extractTo($src)){
        echo "<script>location.href='archiver.php?file=".$file."'</script>";
    }
    $zip->close();
} else if($exec == 'setpassword'){
    if($zip->setPassword($src)){
        echo "<script>location.href='archiver.php?file=".$file."'</script>";
    }
    $zip->close();
} else if($exec == 'comment'){
    if($zip->setArchiveComment($src)){
        echo "<script>location.href='archiver.php?file=".$file."'</script>";
    }
    $zip->close();
} else if($exec == 'viewfile'){
    echo $zip->getFromName($src);
    $zip->close();
} else if($exec == 'delfile'){
    if($zip->deleteName($src)){
        echo "<script>location.href='archiver.php?file=".$file."'</script>";
    }
    $zip->close();
} else if($exec == 'downloadfile'){
    /*header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$src);
    header('Content-Length: ' . filesize($src));
    readfile($src);*/
} else{
    echo "<script>location.href='index.php'</script>";
}
?>