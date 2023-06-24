<?php
function upload($abc){
  $file = $abc;
  $filename= $file['name'];
  $filename= explode('.', $filename);
  $ext = end($filename);
  $new_file= uniqid().'.'.$ext;
   
  $errors=[];
  $allow_size=100;
  //kiểm tra định dạng
  $allow_ext=['png', 'jpg', 'jpeg', 'gif', 'jfif'];
  if (in_array($ext, $allow_ext)){
    $size= $file['size']/1024/1024; //convert to MB
    if ($size <= $allow_size){
      $target= '../uploads/'.$new_file;
      $upload= move_uploaded_file($file['tmp_name'], $target);
      if (!$upload){
        $errors[]='upload_err';
      }else {
        echo "Upload file thành công";
        return $target;
      }
    }else {
      $errors[]= 'size_err';
    }
  }else {
    $errors[]= 'ext_err';
  }
  
  if (!empty($errors)){
    $mess='';
    if (in_array('ext_err', $errors)){
      $mess=$mess.'Định dạng file không hợp lệ';
    }elseif (in_array('size_err', $errors)){
      $mess=$mess.'Kích thước file quá lớn. >100MB';
    }else {
      $mess=$mess.'Không thể upload tại thời điểm này, hãy thử lại!';
    }
    echo $mess;
  }else {
    echo 'Upload thành công';
  }
  return null;
}

?>