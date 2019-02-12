<?php 

    if (isset($_FILES['attachments'])) {
        $msg = "";
        $targetFile = "uploadsband/" . basename($_FILES['attachments']['name'][0]);
        if (file_exists($targetFile))
            $msg = array("status" => 0, "msg" => "File uploads đã tồn tại! Mời bạn chọn file khác");
        else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
            $msg = array("status" => 1, "msg" => "File được uploads thành công!", "path" => $targetFile);

        exit(json_encode($msg));
        
    }
?>