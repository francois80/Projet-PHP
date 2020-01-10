<?php
// Contains all kinds of form controls used to validate the data that will be transfered through the form
include 'formControls.php';
if (!empty($_GET['param'])) {
  $param = $_GET['param'];
} else {
  $param = 0;
}
$dom = $page = $node = $children = $name = $title =  $sendForm = '';
// If a file named source.xml exists
if (file_exists('source.xml')) {
  // $sendForm become true
  $sendForm = true;
  // An new DOM document is created
  $dom = new DomDocument;
  // The file 'source.xml' is loaded as the content of the DOM document located in $dom
  $dom->load('source.xml');
  // All the tags <page> are detected
  $page = $dom->getElementsByTagName('page');
  // The ids of the page are used to distinguish one from the others with the help of $param and stocked as nodes of data
  $node = $page->item($param);
  // All child elements of the nodes are stored inside $children
  $children = $node->childNodes;
  // For each child node
  foreach ($children as $child) {
    // We take the node name of the node wich is locate in the title tag.
    $name = $child->nodeName;
    // If the name is the same string as the one located between the <title></title> tags
    if ($name == 'title') {
      // Saves this string as $title
      $title = $child->nodeValue;
    }
  }
  // Create an empty array
  $libMenu = [];
  $valueMenu1 = '';
  $count = 0;
  // For each page, we get all the values in a string
  foreach( $page as $pageValue )
  {
    $xmlMenu = $pageValue->getElementsByTagName('menu');
    $valueMenu = $xmlMenu->item(0)->nodeValue;
    $libMenu[$count] = $valueMenu;
    $count ++;
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/88460e48d7.js" crossorigin="anonymous"></script>
  <title><?= $title ?></title>
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- Navbar debut -->
      <nav id="navSettings" class="row navbar navbar-expand-md justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-warning"><i class="fa fa-bars fa-2x" aria-hidden="true"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
          <a class="nav-link col-md-2 logoNav" href="page1.html"><img class="logoNav" src="assets/img/logo.png" alt="logo Ocordo"></a>
          <?php
          // Display the values of the <menu> inside the navbar
          for($count = 0; $count < count($libMenu); $count++){ ?>
            <a class="nav-link navLinkSettings" href="page<?= $count+1 ?>.html"><?= $libMenu[$count] ?></a>
            <?php
          }
          ?>
          <div id="contactAndAdressNav" class="col-md-2 mt-2">
            <p class="text-warning">03 22 72 22 22</p>
            <p>31 Rue Alexandre</p>
            <p>80000 Amiens</p>
          </div>
        </nav>
        <!-- Navbar end -->
        <div id='xmlPagesContent' class="d-flex flex-column align-items-center justify-content-center col-12">
          <?php
          // Prevent the <title> from displaying outside of the <head>
          if ($sendForm) {
            foreach ($children as $child) {
              $name = $child->nodeName;
              if ($name == 'title' || $name == 'menu') {
                $title = $child->nodeValue;
                $child->nodeValue = '';
              }else{
                echo $child->nodeValue;
              }
            }
          }
          if (isset($_POST['Envoi']) && (count($formError) == 0)) { ?>
          <?php } else { ?>
            <p><?= !empty($formError['your-name']) ? $formError['your-name'] : '' ?></p>
            <p><?= !empty($formError['your-tel-615']) ? $formError['your-tel-615'] : '' ?></p>
            <p><?= !empty($subjectError) ? $subjectError : '' ?></p>
            <p><?= !empty($countryError) ? $countryError : '' ?></p>
            <p><?= !empty($formError['your-message']) ? $formError['your-message'] : '' ?></p>
            <p><?= !empty($emailError) ? $emailError : '' ?></p>
          <?php }
          ?>
        </div>
      </div>
      <?php
      include 'footer.php';
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
  </html>
