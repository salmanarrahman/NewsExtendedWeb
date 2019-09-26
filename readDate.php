<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include 'database.php';
include 'post.php';

//db connect
$database = new Database();

$db = $database->connect();

$post = new post($db);

//blog post query
$result = $post->readDate();

$num = $result->rowCount();

if($num >0){

    //post array
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $post_item = array (
            'dateID' => $dateid,
            'date_' => $date_
        );

        //push data

        array_push($post_arr['data'],$post_item);

    }

    //turn into json
    echo json_encode($post_arr);


}else{
    echo json_encode(
        array('message' => 'No post found')
    ) ;
}

?>