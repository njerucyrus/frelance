<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 30/06/2017
 * Time: 22:29
 */

use Hudutech\Entity\Order;
use Hudutech\Controller\OrderController;

$successMsg = '';
$errorMsg = '';

if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['clientEmail'])) {
        $errors = array();
        $uploadedFiles = array();
        $extension = array("jpeg", "jpg", "png", "pdf", "doc", "docx", "xls", "ppt");
        $bytes = 1024;
        $KB = 1024;
        $totalBytes = $bytes * $KB*10;
        $UploadFolder = "uploads/";

        $counter = 0;
        $attachments = array();

        if (sizeof($_FILES["files"]["tmp_name"]) <= 5) {

            foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                $temp = $_FILES["files"]["tmp_name"][$key];
                $name = $_FILES["files"]["name"][$key];
                $attachments[$counter] = $name;
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
                echo "Please, Select file(s) to upload.";
            }
        }  else {
        $error .= "Only 5 attachments are allowed";
    }


    $order = new Order();
    $order->setClientEmail($_POST['clientEmail']);
    $order->setDiscipline($_POST['discipline']);
    $order->setProjectType($_POST['projectType']);
    $order->setPageNo($_POST['pageNo']);
    $order->setFormat($_POST['format']);
    $order->setReferencesNo($_POST['referencesNo']);
    $order->setDeadline($_POST['deadline']);
    $order->setOrderStatus("on_progress");
    $order->setAttachment1(!empty($uploadedFiles[0]) ? $UploadFolder.$uploadedFiles[0] : "not set");
    $order->setAttachment2(!empty($uploadedFiles[1]) ? $UploadFolder.$uploadedFiles[1] : "not set");
    $order->setAttachment3(!empty($uploadedFiles[2]) ? $UploadFolder.$uploadedFiles[2] : "not set");
    $order->setAttachment4(!empty($uploadedFiles[3]) ? $UploadFolder.$uploadedFiles[3] : "not set");
    $order->setAttachment5(!empty($uploadedFiles[4]) ? $UploadFolder.$uploadedFiles[4] : "not set");


        $orderCtrl = new OrderController();
        $created = $orderCtrl->create($order);
        if ($created === true) {
            $successMsg .= "Order created successfully";
        } elseif (array_key_exists('error', $created)) {
            $errorMsg .= "{$created['error']}";

        }
     else {
        $errorMsg .= "KEY  FIELDS REQUIRED";
    }
}
} else {

}

?>