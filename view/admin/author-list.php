<?php include_once 'header.php' ?>
<?php
$page = (isset($_GET['trang'])) ? $_GET['trang'] : 1;
$countSTT = (($page - 1) * 9) + 1;
$html_author_management="";
foreach ($author_management as $item){
    $html_author_management.='<div class="list-row author-grid ">
    <div class="list-item flex-center">'.$countSTT++.'</div>
    <div class="list-item">'.$item['name'].'</div>
    <div class="list-item">'.$item['email'].'</div>
    <div class="list-item">'.$item['information'].'</div>
    <div class="list-item flex-center">'.$item['dob'].'</div>
    <div class="list-item flex-center">
        <a href="?mod=admin&act=author-edit&id='.$item['id'].'" class="function-edit">Sửa</a>
        <a href="?mod=admin&act=author-delete&id='.$item['id'].'" class="function-delete">Xóa</a>
    </div>
</div>';
}
?>
<link rel="stylesheet" href="view/admin/css/list.css">
    <section>
        <div class="container">
            <div class="title">
                <div class="title-content">Quản lý Tác Giả</div>
                <a href="?mod=admin&act=author-add" class="title-add">Thêm Tác Giả</a>
            </div>
            <div class="list">
                <div class="list-row list-row_title author-grid ">
                    <div class="list-item flex-center">STT</div>
                    <div class="list-item">Họ và Tên</div>
                    <div class="list-item">Email</div>
                    <div class="list-item">Thông Tin</div>
                    <div class="list-item flex-center">Ngày sinh</div>
                    <div class="list-item flex-center">Chức năng</div>
                </div>
                <?=$html_author_management; ?>
                <div class="product-page">
                    <?=$html_number_page;?>
                    </div>
            </div>
        </div>
    </section>  
</main>