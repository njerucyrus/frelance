<?php
//for($i=0; $i<count($_FILES['file']['name']); $i++) {
//    $target_path = "uploads/";
//    $ext = explode('.', basename($_FILES['file']['name'][$i]));
//    $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
//
//    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
//        echo "The file has been uploaded successfully <br />";
//    } else {
//        echo "There was an error uploading the file, please try again! <br />";
//    }
//}
//
?>

<html>
<head>
    <title>PHP upload file demo</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" name="formUploadFile">
    <label>Select single file to upload</label>
    <input type="file" name="files[]" multiple="multiple" />
    <input type="submit" value="Upload File" name="btnSubmit"/>
</form>
<?php
if(isset($_POST["btnSubmit"])) {
    $errors = array();
    $uploadedFiles = array();
    $extension = array("jpeg", "jpg", "png", "pdf", "doc", "docx", "xls");
    $bytes = 1024;
    $KB = 1024;
    $totalBytes = $bytes * $KB;
    $UploadFolder = "UploadFolder";

    $counter = 0;
    if (sizeof($_FILES["files"]["tmp_name"]) <= 5) {

        foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
            $temp = $_FILES["files"]["tmp_name"][$key];
            $name = $_FILES["files"]["name"][$key];

            if (empty($temp)) {
                break;
            }

            $counter++;
            $UploadOk = true;

            if ($_FILES["files"]["size"][$key] > $totalBytes) {
                $UploadOk = false;
                array_push($errors, $name . " file size is larger than the 1 MB.");
            }

            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if (in_array($ext, $extension) == false) {
                $UploadOk = false;
                array_push($errors, $name . " is invalid file type.");
            }

            if (file_exists($UploadFolder . "/" . $name) == true) {
                $UploadOk = false;
                array_push($errors, $name . " file is already exist.");
            }

            if ($UploadOk == true) {
                move_uploaded_file($temp, $UploadFolder . "/" . $name);
                array_push($uploadedFiles, $name);
            }
        }

        if ($counter > 0) {
            if (count($errors) > 0) {
                echo "<b>Errors:</b>";
                echo "<br/><ul>";
                foreach ($errors as $error) {
                    echo "<li>" . $error . "</li>";
                }
                echo "</ul><br/>";
            }

            if (count($uploadedFiles) > 0) {
                echo "<b>Uploaded Files:</b>";
                echo "<br/><ul>";
                foreach ($uploadedFiles as $fileName) {
                    echo "<li>" . $fileName . "</li>";
                }
                echo "</ul><br/>";

                echo count($uploadedFiles) . " file(s) are successfully uploaded.";
            }
        } else {
           echo  "Please, Select file(s) to upload.";
        }
    }
}else{
    $error.= "Only 5 attachments are allowed";
}
?>
</body>
</html>



<!--<html>-->
<!--<head></head>-->
<!--<body>-->
<!--<form enctype="multipart/form-data" action="upload.php" method="post">-->
<!--    <input name="file[]" type="file" />-->
<!--    <button class="add_more">Add More Files</button>-->
<!--    <input type="button" value="Upload File" id="upload"/>-->
<!--</form>-->
<!--<script src="public/assets/js/jquery-1.10.2.min.js"></script>-->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $('.add_more').click(function(e){-->
<!--            e.preventDefault();-->
<!--            $(this).before("<input name='file[]' type='file'/>");-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--</body>-->
<!--</html>-->
