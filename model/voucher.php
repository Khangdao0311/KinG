<?php
function voucher_SELECT($page,$view,$hot,$search,$category_id,$limit) {
    $sql = "SELECT * FROM vouchers WHERE 1";
    if ($category_id > 0) $sql .=" AND category_id = $category_id";
    if ($hot) $sql .=" AND noibat = $hot";
    if ($search != "") $sql .=" AND code LIKE '%$search%'";
    if ($view) {
        if (is_int($view) && $view > 0) $sql .=" AND view >= $view";
        $sql .=" ORDER BY view DESC";
    } else {
        $sql .=" ORDER BY id DESC";
    }
    if ($page > 1){
        $begin = (($page-1) * $limit);
        $sql .="  LIMIT  $begin,$limit";
    }else {
        if ($limit > 0) $sql .=" LIMIT  $limit";
    }
    return get_All($sql);   
}
function voucher_add($code,$price,$start_date,$end_date,$quantity,$user_id){
    $sql = "INSERT INTO vouchers(code,price,start_date,end_date,quantity,user_id)
    Value ('$code','$price','$start_date','$end_date','$quantity','$user_id')";
    return edit($sql);
}
function voucher_delete($id){
    $sql = "DELETE FROM vouchers WHERE id=$id";
    return edit($sql);
}
function voucher_ONE($id){
    $sql = "SELECT * FROM vouchers WHERE id=$id";
    return get_ONE($sql);
}
function voucher_eidt($code,$price,$start_date,$end_date,$quantity,$user_id,$id){
    $sql = "UPDATE vouchers SET code='$code', price='$price', start_date = '$start_date', end_date='$end_date', quantity='$quantity', user_id='$user_id' WHERE id=$id";
    return edit($sql);
}
?>