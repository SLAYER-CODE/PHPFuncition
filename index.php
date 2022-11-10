<?php
$aContext = array('http' => array(
  'method' => 'GET',
  'proxy' => 'tcp://172.17.176.46:3128',
  'request_fulluri' => false,
));

$CsContext  = stream_context_create($aContext);
function getTitle($url)
{
  $page = file_get_contents($url,false,$GLOBALS["CsContext"]);
  $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
  return $title;
}
$InputVariable = "Service inteligencie DEA";
$FormatInput = str_replace(" ", "+", $InputVariable);
$CommandChrome  = "filetype%3Apdf";
$PosterChrome = file_get_contents("https://www.google.com/search?q=$CommandChrome+$FormatInput ", false, $CsContext);
$FileEnd = mb_convert_encoding($PosterChrome, "HTML-ENTITIES", "UTF-8");
$ArrayItems = preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $PosterChrome, $matchers);
$NewArray = array();
foreach ($matchers as $value) {
  foreach ($value as $valueItem) {
    if (strpos($valueItem, ".pdf") != false) {
      array_push($NewArray, explode(".pdf", $valueItem)[0] . ".pdf");
    }
  }
}
foreach ($NewArray as $Item) {
  $Title = "Sin titulo";
  #$Title = getTitle($Item);
  echo "<a href='dowload.php?path=.$Item'>$Title </a>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Desarollo de sistemas laravel</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="container">
    <div class="content">
      <div class="title" title="Laragon">Servicio PDF</div>
    </div>
  </div>
</body>

</html>