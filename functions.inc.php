<?php
function pr($arr){
    echo '<pre>';
    print_r($arr);
}
function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}
function get_services($con,$limit='',$cat_id='',$service_id=''){
    $sql="select services.*,categories.categories from services,categories where services.status=1 and services.categories_id=$cat_id and services.id and services.categories_id=categories.id order by services.id desc " ; 
	if($cat_id!=''){
		$sql.=" and services.categories_id=$cat_id ";
    }
	if($service_id!=''){
		$sql.=" and services.id=$service_id ";
    }
    $sql.=" and services.categories_id=categories.id ";
	$sql.=" order by services.id desc";
    if($limit!=''){
        $sql.=" services.limit $limit";
    }
    $res=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}

?>