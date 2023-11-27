<?php
ob_start();
include '../config/config.php';
include '../layout/header.php';
if (!isset($_SESSION['username'])) {
    header('location: /DoAnTTCN/account/login.php');
}
?>

<div class="container-fluid center-form">
    <form method="post" enctype="multipart/form-data" class="form-main">
        <div class="createpost-attribute">
            <label for="">
                Thể loại
                <select name="categoryid" id="">
                    <?php
                    $cate = $conn->query("select * from tbl_category");
                    while ($row = $cate->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['categoryid'] ?>">
                            <?php echo $row['categoryname'] ?>
                        </option>

                        <?php
                    }
                    ?>
                </select>
            </label>

        </div>
        <div class="createpost-attribute">
            <label for="">
                Title
                <input type="text" name='title'>
            </label>
        </div>
        <div class="createpost-attribute">
            <label for="">
                Mô tả
                <input type="text" name='asbtract'>
            </label>
        </div>
        <div class="createpost-attribute">
            <label for="">
                Thumnail
                <input type="file" name='thumnail' class="file-create-post">
            </label>
        </div>
        <div class="createpost-attribute textarea-create">
            <label for="">
                Content

            </label>
            <textarea id="editor" name="content"> Here </textarea>
        </div>

        <div class="createpost-attribute btn-create-flex">
            <button type="submit" name="btn_create" class="btn-create"> Đăng </button>
        </div>

    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: 'ck_upload.php'
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['btn_create'])) {
    $date = date('Y-m-d');
    $target_dir = '../admin/uploads/';
    $name_img = rand(0, 99) . basename($_FILES['thumnail']['name']);
    $thumnail = $target_dir . $name_img;
    $acc_thumnail = '/DoAnTTCN/admin/uploads/' . $name_img;
    $add = array($_POST['title'], $_POST['asbtract'], $acc_thumnail, $_POST['content'], $_POST['categoryid'], $date, $_SESSION['username']);
    if (move_uploaded_file($_FILES['thumnail']['tmp_name'], $thumnail)) {
        $query_posting = "insert into tbl_post values (NULL,'$add[0]','$add[1]','$add[2]','$add[3]',$add[4],'$add[5]','$add[6]',0)";
        if ($conn->query($query_posting)) {
            echo "Đăng bài thành công!!!!";
        } else {
            echo "Thất bại";
        }
    }
}



?>

<?php
include '../layout/footer.php'
    ?>