<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');

include 'database.php';
include 'post.php';

//db connect
$database = new database();
$db = $database->connect();

//
$post = new post($db);


$data = json_decode(file_get_contents("php://input"));

$post->dateID = $data->dateID;

//get post 

$result = $post->breakingNews();
$num = $result->rowCount();

if($num >0 ){

    //post array
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $post_item = array (
            'id' => $id,
            'dateid' => $dateid,
            'headline' => $headline,
            'reporter' => $reporter,
            'news' => $news,
            'thumbnail' => $thumbnail
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