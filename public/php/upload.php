<?php
if (empty($_FILES['images'])) {
    echo json_encode(['error'=>'No files found for upload.']);
    return;
}
//$message='';
//switch( $_FILES['images']['error'] ) {
//    case UPLOAD_ERR_OK:
//        $message = 'FALSE';
//        break;
//    case UPLOAD_ERR_INI_SIZE:
//    case UPLOAD_ERR_FORM_SIZE:
//        $message = ' - file too large (limit of '.json_encode(return_bytes(ini_get('post_max_size'))).' bytes).';
//        break;
//    case UPLOAD_ERR_PARTIAL:
//        $message = ' - file upload was not completed.';
//        break;
//    case UPLOAD_ERR_NO_FILE:
//        $message = ' - zero-length file uploaded.';
//        break;
//    default:
//        $message = ' - internal error #'.$_FILES['images']['error'];
//        break;
//}
//function return_bytes($val) {
//    $val = trim($val);
//    $last = strtolower($val[strlen($val)-1]);
//    switch($last) {
//        // The 'G' modifier is available since PHP 5.1.0
//        case 'g':
//            $val *= 1024;
//        case 'm':
//            $val *= 1024;
//        case 'k':
//            $val *= 1024;
//    }
//
//    return $val;
//}
//echo json_encode(['error'=>json_encode($_FILES['images'])]);
//return;

$images = $_FILES['images'];
$folder = isset($_POST['folder']) ? $_POST['folder'] : '';
$success = null;
$paths= [];
$filenames = $images['name'];
for($i=0; $i < count($filenames); $i++){
    //$ext = explode('.', basename($filenames[$i]));
    $target = "../slike/galerije/".$images['name'][$i];
    if(move_uploaded_file($images['tmp_name'][$i], $target)) {
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