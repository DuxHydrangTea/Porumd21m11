<?php
$data = array();
if (isset($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_path = 'uploads/' . $file_name;
    $file_exension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    if ($file_exension == 'jpg' || $file_exension == 'jpeg' || $file_exension == 'png') {

        if (move_uploaded_file($_FILES['upload']['tmp_name'], $file_path)) {
            $data['file'] = $file_name;
            $data['url'] = $file_path;
            $data['uploaded'] = 1;
        } else {
            $data['uploaded'] = 0;
            $data['error']['message'] = 'file not uploaded';
        }

    } else {
        $data['uploaded'] = 0;
        $data['error']['message'] = 'invalid exxtension';
    }
}
echo json_encode($data);
?>