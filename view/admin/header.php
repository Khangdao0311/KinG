<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/admin/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <header>
        <a href="?mod=admin&act=category-list"><img class="header-logo" src="view/images/logo.png" alt=""></a>
        <div class="header-account">
            <img src="view/images/user/<?=$_SESSION['user']['image'];?>" class="header_account-img">
            <div class="header_account-name"><?= $_SESSION['user']['name'];?></div>
        </div>
    </header>
    <main>
        <nav>
            <form method="post"   class="search-box">
                <input class="search-text" name="search" type="text" placeholder="Tìm kiếm...">
                <input hidden id="search-submit" type="submit" name="btn_search">
                <label   class="search-submit" for="search-submit">
                    <div class="search_submit-icon"><span class="material-symbols-outlined">search</span></div> 
                </label>
            </form>
            <a href="?mod=admin&act=category-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">splitscreen</span></div>
                <div class="nav_item-content">Quản lý danh mục</div>
            </a>
            <a href="?mod=admin&act=product-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">local_mall</span></div>
                <div class="nav_item-content">Quản lý sản phẩm</div>
            </div>
            <a href="?mod=admin&act=user-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">contacts_product</span></div>
                <div class="nav_item-content">Quản lý khách hàng</div>
            </a>
            <a href="?mod=admin&act=order-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">shopping_cart</span></div>
                <div class="nav_item-content">Quản lý đơn hàng</div>
            </a>
            <a href="?mod=admin&act=author-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">manage_accounts</span></div>
                <div class="nav_item-content">Quản lý tác giả</div>
            </a>
            <a href="?mod=admin&act=publisher-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">groups</span></div>
                <div class="nav_item-content">Quản lý nhà xuất bản</div>
            </a>
            <a href="?mod=admin&act=comment-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">comment</span></div>
                <div class="nav_item-content">Quản lý bình luận</div>
            </a>
            <a href="?mod=admin&act=voucher-list" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">loyalty</span></div>
                <div class="nav_item-content">Quản lý Voucher</div>
            </a>
            <a href="?mod=admin&act=statistical" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">donut_small</span></div>
                <div class="nav_item-content">Thống kê</div>
            </a>
            <a href="?mod=user&act=logout" class="nav-item">
                <div class="nav_item-icon"><span class="material-symbols-outlined">exit_to_app</span></div>
                <div class="nav_item-content">Đăng xuất</div>
            </a>
        </nav>
</body>
</html>