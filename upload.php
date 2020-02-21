<?php
    require_once('backend/lib/db.php');

    $id             = $_POST["id"];
    $nro            = $_POST["nro"];
    $result         = "Sorry, your file was not uploaded.";
    $uploadOk       = 0;
    $target_dir     = "uploads/";

    // descreptar id
    $id = encrypt_decrypt('d', $id);

    if (isset($_FILES) && !empty($_FILES)) {

        $source_file    = $_FILES["file"]["tmp_name"];
        $target_file    = $target_dir.basename($_FILES["file"]["name"]);
        $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $name_file_id   = $id."_ticket_".$nro.".".$imageFileType;
        $target_file_id = $target_dir.$name_file_id;


        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            $result =  "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $result =  "File is not an image.";
            $uploadOk = 0;
        }
    } else {
      $result = "File not load.";
      $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $result = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = -4;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk > 0) {
        if (move_uploaded_file($source_file, $target_file_id)) {
            $result = "The file '". basename( $_FILES["file"]["name"]). "' has been uploaded.";
            update_registro_file($id,$name_file_id);
        } else {
            $result = "Sorry, there was an error uploading your file.";
        }
    }

    log_write('Upload file id '.$id.' '.$result);
    echo $uploadOk;
?>
