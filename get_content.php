<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body{
  padding: 2rem 0rem;
}
.image-parent {
  max-width: 40px;
}
            </style>
</head>
<body>
<?php

$html_brand = "https://www.imdb.com/list/ls029554549/";
$ch = curl_init();

$headers = array(
    'Content-Type: application/json',
    );
$options = array(
    CURLOPT_URL            => $html_brand,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING       => "",
    CURLOPT_AUTOREFERER    => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT        => 120,
    CURLOPT_MAXREDIRS      => 10,
);
//
curl_setopt_array( $ch, $options );
$response = curl_exec($ch); 
curl_close($ch);

//var_dump($response);die;
//print_r($response);die;
$dom = new DomDocument();
libxml_use_internal_errors(true);

$dom->loadHTML($response);
libxml_use_internal_errors(false);

$xpath = new DomXPath($dom
);

$classname="lister-item-content";
$nodes = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

$node0 = $nodes->item(0);
$text_node0 =  "<p>" . $node0->nodeValue . "</p>";


$node1 = $nodes->item(1);
$text_node1 =  "<p>" . $node1->nodeValue . "</p>";

$node2 = $nodes->item(2);
$text_node2 = "<p>" . $node2->nodeValue . "</p>";


$node3 = $nodes->item(3);
$text_node3 =  "<p>" . $node3->nodeValue . "</p>";

$node4 = $nodes->item(4);
$text_node4 = "<p>" . $node4->nodeValue . "</p>";

$node5 = $nodes->item(5);
$text_node5 = "<p>" . $node5->nodeValue . "</p>";

$node6 = $nodes->item(6);
$text_node6 = "<p>" . $node6->nodeValue . "</p>";

$node7 = $nodes->item(7);
$text_node7 = "<p>" . $node7->nodeValue . "</p>";

$node8 = $nodes->item(8);
$text_node8 = "<p>" . $node8->nodeValue . "</p>";


$node9 = $nodes->item(9);
$text_node9 = "<p>" . $node9->nodeValue . "</p>";

$node10 = $nodes->item(10);
$text_node10 = "<p>" . $node10->nodeValue . "</p>";

$node11 = $nodes->item(11);
$text_node11 = "<p>" . $node11->nodeValue . "</p>";


$node12 = $nodes->item(12);
$text_node12 = "<p>" . $node12->nodeValue . "</p>";

$node13 = $nodes->item(13);
$text_node13 = "<p>" . $node13->nodeValue . "</p>";

$node14 = $nodes->item(14);
$text_node14 = "<p>" . $node14->nodeValue . "</p>";

$node15 = $nodes->item(15);
$text_node15 = "<p>" . $node15->nodeValue . "</p>";

$node16 = $nodes->item(16);
$text_node16 = "<p>" . $node16->nodeValue . "</p>";


$node17 = $nodes->item(17);
$text_node17 = "<p>" . $node17->nodeValue . "</p>";

$node18 = $nodes->item(18);
$text_node18 = "<p>" . $node18->nodeValue . "</p>";

$node19 = $nodes->item(19);
$text_node19 = "<p>" . $node19->nodeValue . "</p>";

$node20 = $nodes->item(20);
$text_node20 = "<p>" . $node20->nodeValue . "</p>";

$classname_img = 'loadlate';
$img_sources = [];
$content = $xpath->query("//div[@class='$classname_img']");

foreach ($content as $img) {
    $img_sources[] = $img->getAttribute('src');
}

$merge_string = $text_node0." , ".$text_node1." , ".$text_node2." , ".$text_node3." , ".$text_node4." , ".$text_node5." , ".$text_node6." , ".$text_node7." , ".$text_node8." , ".$text_node9." , ".$text_node10." , ".$text_node11." , ".$text_node12." , ".$text_node13." , ".$text_node14." , ".$text_node15." , ".$text_node16." , ".$text_node17." , ".$text_node18." , ".$text_node19." , ".$text_node20;

$split_str_data = explode(" , ",$merge_string);
$output = str_replace(array("\\n", "\n"),'',$split_str_data);
//print_r(count($output));exit;
//print_r($split_str_data);

$json_movie_data = json_encode($output,JSON_FORCE_OBJECT,true);
//echo $json_movie_data;
file_put_contents("Curl_data.txt", $json_movie_data);

$strJsonFileContents = file_get_contents("Curl_data.txt");

$array = json_decode($strJsonFileContents, true);
//var_dump($array);
//die;
//echo $array[0]; // outputs #00ffff

?>
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 col-lg-5">
      <h6 class="text-muted"><b>RSS Movie Feed</b></h6> 
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[0];?>          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[1];?>
          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[2];?>          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[3];?>          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[4];?>          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[5];?>          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[6];?>          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $array[7];?>          
        </li>
      </ul>
    </div>
  </div>
</div>
</body>
</html> 