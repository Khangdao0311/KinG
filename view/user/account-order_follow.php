<?php
    $html_product_order = '';
    foreach ($order_detail as $item) {
        $total = 0;
            $html_product_order .= '
                <div class="account_order_follow-order">';
        foreach ($item as $product_order) {
            $product = product_ONE($product_order['product_id']);
            $order_status = order_SELECT($_SESSION['user']['id'],0,$product_order['order_id'])[0]['order_status'];
            $total += $product['price_sale'] * $product_order['quantity'];
            $link_product_detail = '?mod=page&act=product-detail&id='.$product['id'];
            $html_product_order .= '
                    <div class="account_order_follow-product">
                        <a href="'.$link_product_detail.'" class="account_order_follow_product-img">
                            <img src="view/'.$product['image'].'" alt="'.$product['name'].'">
                        </a>
                        <div class="account_order_follow_product-main">
                            <div class="account_order_follow_product-content">
                                <a href="'.$link_product_detail.'" class="account_order_follow_product-name">'.$product['name'].'</a>
                                <div class="account_order_follow_product-price_box">
                                    <div class="account_order_follow_product-price_sale">'.number_format($product['price_sale'],0,',','.').' đ</div>
                                    <del class="account_order_follow_product-price">'.number_format($product['price'],0,',','.').' đ</del>
                                </div>
                                <div class="account_order_follow_product-quantity">x '.$product_order['quantity'].'</div>
                            </div>
                            <div class="account_order_follow_product-total">'.number_format(($product['price_sale'] * $product_order['quantity']),0,',','.').' đ</div>
                        </div>
                    </div>';
                   
        }
        $html_product_order .= '
                    <div class="account_order_follow_order-total_fun">
                        <div class="account_order_follow_order-total">Tổng '.count($item).' sản phẩm: <b>'.number_format($total,0,',','.').' đ</b></div>
                        <div class="account_order_follow_order-fun">';
                switch ($order_status) {
                case 1:
                    $html_product_order .= '
                            <div class="account_order_follow_order_fun-btn">Hủy</div>
                    ';
                    break;
                case 4:
                    $html_product_order .= '
                            <div class="account_order_follow_order_fun-btn">Đánh giá</div>
                            <div class="account_order_follow_order_fun-btn account_order_follow_order_fun-btn_red">Đặt lại</div>
                    ';
                    break;
                case 5:
                case 6:
                    $html_product_order .= '
                            <div class="account_order_follow_order_fun-btn">Mua lại</div>
                    ';
                    break;
                }
                            
                $html_product_order .= '
                        </div>
                    </div>
                </div>
        ';
    }
?>    
<?php include_once 'header.php' ?>
<title>Theo dõi đơn hàng</title>
<link rel="stylesheet" href="view/user/css/account.css">
<section class=" link_page">
    <div class="container">
        <div class="link_page-text">Trang chủ / Tài khoản</div>
    </div>
</section>
<section>
    <div class="container account-container">
    <div class="account-nav_box">
            <div class="account_nav-title">tài khoản</div>
            <div class="account_nav-box">
                <a href="?mod=user&act=information" class="accuont_nav-item">Thông tin tài khoản</a>
                <a href="?mod=user&act=account-address" class="accuont_nav-item">Địa chỉ giao hàng</a>
                <a href="?mod=user&act=account-order_follow" class="accuont_nav-item accuont_nav-item_focus">theo dõi đơn hàng</a>
                <a href="?mod=user&act=account-voucher" class="accuont_nav-item">ví voucher</a>
                <a href="?mod=user&act=account-change_password" class="accuont_nav-item">Đổi mật khẩu</a>
                <a href="?mod=user&act=account-comment" class="accuont_nav-item">nhận xét của tôi</a>
                <?php if($_SESSION['user']['role']): ?>
                <a href="?mod=admin&act=category-list" class="accuont_nav-item">admin</a>
                <?php endif; ?>    
                <a href="?mod=user&act=logout" class="accuont_nav-item">Đăng xuất</a>
            </div>
        </div>
        <div class="account-main">
            <div class="account-title">Theo dõi đơn hàng</div>
            <div class="account-order_follow">
                <div onclick="order_status(0)" class="account_order_follow-item account_order_follow-item-active">Xem tất cả (<?= count($products_all) ?>)</div>
                <div onclick="order_status(1)" class="account_order_follow-item">Chờ xác nhận</div>
                <div onclick="order_status(2)" class="account_order_follow-item">Vận chuyển</div>
                <div onclick="order_status(3)" class="account_order_follow-item">chờ giao hàng</div>
                <div onclick="order_status(4)" class="account_order_follow-item">Đã giao hàng</div>
                <div onclick="order_status(5)" class="account_order_follow-item">Đã hủy</div>
                <div onclick="order_status(6)" class="account_order_follow-item">Trả hàng</div>
            </div>
            <div class="account_order_follow-product_box">
                
                <?= $html_product_order ?>
                

            </div>
        </div>
    </div>
</section>
<script src="view/user/js/account.js"></script>
<?php include_once 'footer.php' ?>
<!-- <div class="account_order_follow_product-fun">
    <div class="account_order_follow_product-button_box">';
        <div class="account_order_follow_product-button_item">Đánh giá</div>
        <div class="account_order_follow_product-button_item follow_product-button_red">Đặt lại</div>
    </div>
</div>  -->