<?php
if (empty($_FILES['images'])) {
    echo json_encode(['error'=>'No files found for upload.']);
    return;
}

$images = $_FILES['images'];
$folder = isset($_POST['folder']) ? $_POST['folder'] : '';
$success = null;
$paths= [];
$filenames = $images['name'];
for($i=0; $i < count($filenames); $i++){
    $ext = explode('.', basename($filenames[$i]));
    $target = "slike/galerije/";
    if(move_uploaded_file($images['tmp_name'][$i], '../'. $target. $folder. $images['name'][$i])) {
    $success = true;
    $paths[] = $target;
    } else {
        $success = false;
    break;
    }
}
if ($success === true) {
    $output = '[]';
} elseif ($success === false) {
    $output = ['error'=>'Error while uploading images. Contact the system administrator'];
// delete any uploaded files
    foreach ($paths as $file) {
        unlink($file);
    }
} else {
    $output = ['error'=>'No files were processed.'];
}
echo json_encode($output);
return;

?>