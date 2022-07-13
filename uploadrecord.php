<?php
	// $filesName = $_FILES['upfile']['name'];  //檔名陣列
	// $filesTmpNamew = $_FILES['upfile']['tmp_name'];  //臨時檔名陣列

    if ($_FILES['upfile']['error'] === UPLOAD_ERR_OK){
		if (file_exists('upload/' . $_FILES['upfile']['name'])){
            echo '檔案已存在。<br/>';
          } else {
            // $file = $_FILES['upfile']['tmp_name'];
            // $dest = 'upload/' . $_FILES['upfile']['name'];
        
            // # 將檔案移至指定位置
            // move_uploaded_file($file, $dest);
            $date = date('YmdHis');            
            $upload = $_FILES['upfile']['name'];//得到上傳檔案的名字
            $name = explode('.',$upload);
            $newname = $date.'.'.'mp3';//得到一個新的檔案為'日期時間.mp3',即新的路徑
            $tmpname = $_FILES['upfile']['tmp_name'];
            rename($tmpname,$newname);

            $dest = './upload/' . $newname;
        
            # 將檔案移至指定位置
            move_uploaded_file($upload, $dest);
          }
     }
     else {
        echo '錯誤代碼：' . $_FILES['upfile']['error'] . '<br/>';
      }
?>