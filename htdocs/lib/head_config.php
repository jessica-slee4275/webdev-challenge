<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>NRI Web Development Challenge</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin.css" rel="stylesheet">
<script src="../js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Inria+Serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/main.css">
<?php 
    global $total_amount_pre_tax_month, $total_amount_pre_tax_category, $category_array, $total_amount_post_tax_month, $total_amount_post_tax_category;
    $total_amount_pre_tax_month     = [];
    $total_amount_pre_tax_category  = [];
    $category_array = array("Construction" => 0,"Mining" => 0,"Plastics & Rubber" => 0, "Computer - Hardware" => 0, "Computer - Software" => 0);
    $total_amount_post_tax_month    = [];
    $total_amount_post_tax_category = [];
?>