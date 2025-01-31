<?php
    $html_show_category = '';
    $linksearch = (isset($_GET['search'])) ? '&search='.$_GET['search'] : '';
    $limit_filter = (isset($_GET['limit'])) ? '&limit='.$_GET['limit'] : '';
    foreach ($category_all as $item) {
        $html_show_category .= '
        <a href="?mod=page&act=product'.$linksearch.'&category_id='.$item['id'].''.$limit_filter.'" class="product_box_nav-item_content">'.$item['name'].'</a>
        '; 
    }
    $html_show_author = '';
    foreach ($author_all as $item) {
        $html_show_author .= '
        <a href="?mod=page&act=product'.$linksearch.'&author_id='.$item['id'].''.$limit_filter.'" class="product_box_nav-item_content">'.$item['name'].'</a>
        '; 
    }
    $html_show_publisher = '';
    foreach ($publisher_all as $item) {
        $html_show_publisher .= '
        <a href="?mod=page&act=product'.$linksearch.'&publisher_id='.$item['id'].''.$limit_filter.'" class="product_box_nav-item_content">'.$item['name'].'</a>
        '; 
    }
    $html_show_product_all = '';
    foreach ($product_all as $item) {
        $like = (isset($_SESSION['like'][$user_information][$item['id']])) ? '<span class="material-symbols-outlined product-icon-active">heart_check</span>' : '<span class="material-symbols-outlined">favorite</span>';
        $html_show_product_all .= '
            <div class="col-3 col t-2 m-2">
                <div class="product-box">
                    <a href="?mod=page&act=product-detail&id='.$item['id'].'" class="product-img"><img src="view/'.$item['image'].'" alt="'.$item['name'].'"></a>
                    <a href="?mod=page&act=product-detail&id='.$item['id'].'" class="product-mane">'.$item['name'].'</a>
                    <div class="product-price_sale">Giá: '.number_format($item['price_sale'],0,',','.').' đ</div>
                    <div class="product-price">Giá gốc: <del>'.number_format($item['price'],0,',','.').' đ</del> </div>
                    <div class="product-view">'.$item['view'].' lượt xem</div>
                     <div class="product-icon_box">';
    if ($item['quantity'] > 0) {
        $html_show_product_all .= '
                    <div onclick="addcart(this)" class="product-icon">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                    <input type="text" hidden value="' . $item['id'] . '">
                    <input type="text" hidden value="1">
                    <input type="text" hidden value="' . $item['quantity'] . '">
                    ';
    }
    if (isset($_SESSION['cart'][$user_information][$item['id']])) {
        $html_show_product_all .= '
                    <input id="quantity_cart"  type="text" hidden value="' . $_SESSION['cart'][$user_information][$item['id']]['quantity_cart'] . '">
                    ';
    } else {
        $html_show_product_all .= '
                    <input id="quantity_cart"  type="text" hidden value="0">
                    ';
    }
    if ($_SESSION['user']) {
        $html_show_product_all .= '
                        <div onclick="like(this)" class="product-icon">
                            '.$like.'
                        </div>
                        <input type="text" hidden value="' . $item['id'] . '">';
    } else {
        $html_show_product_all .= '
                        <a href="?mod=user&act=login" class="product-icon">
                            '.$like.'
                        </a>';
    }
        $html_show_product_all .= '
                    </div>
                </div>
            </div>
        ';
    }
?>
<?php include_once 'header.php' ?>
<title>Sản Phẩm</title>
<link rel="stylesheet" href="view/user/css/product.css">
<link rel="stylesheet" href="view/user/css/reponsive/product.css">
<section class=" link_page">
    <div class="container">
        <div class="link_page-text">Trang chủ / Home</div>
    </div>
</section>
<section>
    <div class="container product-container">
        <?php  if($product_all != []): ?>
        <div class="product-limit">
        <?php if($search): ?>    
        <div class="product-search">Tìm được <b><?= count($data) ?></b> sản phẩm có tên là <b>"<?= $search ?>"</b></div>
        <?php endif; ?>    
            <form action="?mod=page&act=product" method="post" class="product_limit-box">
                <label class="pc-0 t-0" for="check_nav_category"><span class="material-symbols-outlined ">menu</span></label>
                <div class="product_limit_box-text">Show:
                    <select name="limit" id="item-number" data-select-like-alignement="never" >
                        <option hidden value="<?= $limit?>"><?= $limit?></option>
                        <option value="6">6</option>
                        <option value="9">9</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                    </select>
                    <input hidden name="search" value="<?= $search ?>" type="text">
                    <input hidden name="category_id" value="<?= $category_id ?>" type="text">
                    <input hidden name="author_id" value="<?= $author_id ?>" type="text">
                    <input hidden name="publisher_id" value="<?= $publisher_id ?>" type="text">
                    <input hidden name="search" value="<?= $search ?>" type="text">
                    <input name="btn_limit" class="product_limit_box-button" type="submit" value="Xem">
                </div>
            </form>
        </div>
        <div class="product_box">
            <input hidden id="check_nav_category" type="checkbox">
            <label class="product_layout_dark" for="check_nav_category"></label>
            <div class="product_box-nav m-0">
                <div class="product_box_nav-item">
                    <a href="?mod=page&act=product" class="product_box_nav-item_title">Danh Mục</a>
                    <div class="product_box_nav-item_box">
                        <?= $html_show_category ?>
                    </div> 
                   
                </div>
                <div class="product_box_nav-item">
                    <a href="?mod=page&act=product" class="product_box_nav-item_title">Tác Giả</a>
                    <div class="product_box_nav-item_box">
                        <?= $html_show_author ?>
                    </div> 
                   
                </div>
                <div class="product_box_nav-item">
                    <a href="?mod=page&act=product" class="product_box_nav-item_title">Nhà Xuất Bản</a>
                    <div class="product_box_nav-item_box">
                        <?= $html_show_publisher ?>
                    </div> 
                   
                </div>
            </div>
            <div class="product_box-show m-1">
                <div class="product-show row">
                     <?= $html_show_product_all ?>
                </div>
                <div class="product-page_division">
                    <?= $page_division ?>
                  
                </div>
            </div>
        </div>
        <?php  else: ?>
            <a href="?mod=page&act=product"><span class="material-symbols-outlined button_undo">undo</span></a>
            <h1 class="product-NaN">Không có kết quả bạn muốn tìm <?= $search ?></h1>
        <?php endif; ?>
    </div>
</section>
<?php include_once 'footer.php' ?>
<script src="view/user/js/script.js"></script>
