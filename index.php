<?php
    session_start();
    // session_destroy();
    if (!isset($_SESSION['user'])) $_SESSION['user'] = [];
    $user_information = ($_SESSION['user']) ? $_SESSION['user']['username'] : "IPCOMPUTER" ;
    if (!isset($_SESSION['cart'][$user_information])) $_SESSION['cart'][$user_information] = [];
    if (!isset($_SESSION['like'][$user_information])) $_SESSION['like'][$user_information] = [];
    require_once 'model/global.php';
    require_once 'model/pdo.php';
    require_once 'model/category.php';
    require_once 'model/publisher.php';
    require_once 'model/author.php';
    require_once 'model/product.php';
    require_once 'model/user.php';
    require_once 'model/gallery.php';
    require_once 'model/mailer.php';
    require_once 'model/comment.php';
    require_once 'model/order.php';
    require_once 'model/voucher.php';
    require_once 'model/statistical.php';
    if (isset($_GET['mod'])) {
        switch ($_GET['mod']) {
            case 'page':
                include_once 'controller/user/page.php';
                break;
            case 'cart':
                include_once 'controller/user/cart.php';
                break;
            case 'user':
                include_once 'controller/user/account.php';
                break;
            case 'admin':
                include_once 'controller/admin/admin.php';
                break;
            default:
                header('location: ?mod=page&act=home');
                break;
        }
    } else {
        header('location: ?mod=page&act=home');
    }
?>
