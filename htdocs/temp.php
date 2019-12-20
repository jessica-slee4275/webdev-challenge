<!DOCTYPE html>
<html lang="en">
<head>
  <title>NRI Web Development Challenge</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php 
  // $date           = $_POST["date"];          // 전송받은 데이터 대입
  // $category       = $_POST["category"];
  // $lot_title      = $_POST["lot_title"];
  // $lot_location   = $_POST["lot_location"];
  // $lot_condition  = $_POST["lot_condition"];
  // $pre_tax_amount = $_POST["pre_tax_amount"];
  // $tax_name       = $_POST["tax_name"];
  // $tax_amount     = $_POST["tax_amount"];
  $total_amount_pre_tax_month     = [];
  $total_amount_pre_tax_category  = [];
  $category_array = array("Construction" => 0,"Mining" => 0,"Plastics & Rubber" => 0, "Computer - Hardware" => 0, "Computer - Software" => 0);
  $total_amount_post_tax_month    = [];
  $total_amount_post_tax_category = [];

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://quarrelsome-decorat.000webhostapp.com/"><span class="glyphicon glyphicon-log-in"></span> Portfolio</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="https://github.com/nrigroup/webdev-challenge">Project Description</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>NRI Web Development Chanllenge</h1>
      <p></p>
      <div class="container mt-3">
        <form action="/action_page.php">
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile" name="filename">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <div>
            <button type="button" class="btn btn-primary" onclick="openFileExplorer()">Generate</button>
            <button type="button" class="btn btn-warning right">Generate with Default File</button>
          </div>
        </form>
      </div>
      <p id="demo"></p>
      <hr>
      <?php 
        $fp = fopen("C:\Users\jeslee\Downloads/data.csv", 'r');
        $allContent = "";
        while(!feof($fp)){             
          // save each word to $char  
          $char = fgetc($fp);          
          // make a line for each order
          if($char == "\n")  
          {
            $char = "<br/>";
          }  
          $allContent .= $char;       
          // if(!feof($fp))
          //     echo $char;
        }
        fclose($fp);
        $OrderRow = (explode("<br/>",$allContent)); 
        echo "Found ".  count($OrderRow) ."orders.<br/>";
        //foreach ($OrderRow as $row) {
          //echo "$row <br>";
        //}
        list($date, $category, $lot_title, $lot_location, $lot_condition, $pre_tax_amount, $tax_name, $tax_amount) = explode(",", $OrderRow[0]);
        ?>
      <div class="container">     
        <table class="table table-hover">
          <thead>
            <tr>
              <th><?php echo $date?></th>
              <th><?php echo $category?></th>
              <th><?php echo $lot_title?></th>
              <th><?php echo $lot_location?></th>
              <th><?php echo $lot_condition?></th>
              <th><?php echo $pre_tax_amount?></th>
              <th><?php echo $tax_name?></th>
              <th><?php echo $tax_amount?></th>
            </tr>
          </thead>
          <tbody>
          <?php
          for ($x = 1; $x < count($OrderRow); $x++) {
            $lot_location = (explode("\"", $OrderRow[$x])[1]);
            $OrderRow[$x] = str_replace("\"$lot_location\",","",$OrderRow[$x]);
            list($date, $category, $lot_title, $lot_condition, $pre_tax_amount, $tax_name, $tax_amount) = explode(",", $OrderRow[$x]);
            $month = explode("/", $date)[0];
            $total_amount_pre_tax_month[$month] += $pre_tax_amount;
            $total_amount_post_tax_month[$month] += $tax_amount;
            foreach($category_array as $key => $item) {
              if($key == $category)
              {
                $total_amount_pre_tax_category[$key] += $pre_tax_amount;
                $total_amount_post_tax_category[$key] += $tax_amount;
              }
            }
          ?>
          <tr>
            <td><?php echo $date?></td>
            <td><?php echo $category?></td>
            <td><?php echo $lot_title?></td>
            <td><?php echo $lot_location?></td>
            <td><?php echo $lot_condition?></td>
            <td><?php echo $pre_tax_amount?></td>
            <td><?php echo $tax_name?></td>
            <td><?php echo $tax_amount?></td>
          </tr>
          <?php
            }
          ?>
          </tbody>
      </table>
    </div>
      <!-- <form action="request.php" method="post">
        date : <input type="text" name="date"><br>
        category : <input type="text" name="category"><br>
        lot_title : <input type="text" name="lot_title"><br>
        lot_location : <input type="text" name="lot_location"><br>
        lot_condition : <input type="text" name="lot_condition"><br>
        pre_tax_amount : <input type="text" name="pre_tax_amount"><br>
        tax_name : <input type="text" tax_name ="tax_name"><br>
        tax_amount : <input type="text" name="tax_amount"><br>

      </form>
      -->
      <?php
        // echo $date;
        // echo $category;
        // echo $lot_title;
        // echo $lot_location;
        // echo $lot_condition;
        // echo $pre_tax_amount;
        // echo $tax_name;
        // echo $tax_amount;
      ?> 
      <hr>
      <h3>Generated Total Amount by Month</h3>
      <div class="container">     
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Tax</th>
              <th>Jan</th>
              <th>Feb</th>
              <th>Mar</th>
              <th>Apr</th>
              <th>May</th>
              <th>Jun</th>
              <th>Jul</th>
              <th>Aug</th>
              <th>Sep</th>
              <th>Oct</th>
              <th>Nov</th>
              <th>Dec</th>
              <th>Annual</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <?php
              $total = 0; 
              foreach ($total_amount_pre_tax_month as $val) {
                $total += $val;
              }
            ?>
            <td>Pre-Tax Amount</td>
            <td><?php echo $total_amount_pre_tax_month[1]?></td>
            <td><?php echo $total_amount_pre_tax_month[2]?></td>
            <td><?php echo $total_amount_pre_tax_month[3]?></td>
            <td><?php echo $total_amount_pre_tax_month[4]?></td>
            <td><?php echo $total_amount_pre_tax_month[5]?></td>
            <td><?php echo $total_amount_pre_tax_month[6]?></td>
            <td><?php echo $total_amount_pre_tax_month[7]?></td>
            <td><?php echo $total_amount_pre_tax_month[8]?></td>
            <td><?php echo $total_amount_pre_tax_month[9]?></td>
            <td><?php echo $total_amount_pre_tax_month[10]?></td>
            <td><?php echo $total_amount_pre_tax_month[11]?></td>
            <td><?php echo $total_amount_pre_tax_month[12]?></td>
            <td><?php echo $total?></td>
          </tr>
          <tr>
            <?php
              $total = 0; 
              foreach ($total_amount_post_tax_month as $val) {
                $total += $val;
              }
            ?>
            <td>Post-Tax Amount</td>
            <td><?php echo $total_amount_post_tax_month[1]?></td>
            <td><?php echo $total_amount_post_tax_month[2]?></td>
            <td><?php echo $total_amount_post_tax_month[3]?></td>
            <td><?php echo $total_amount_post_tax_month[4]?></td>
            <td><?php echo $total_amount_post_tax_month[5]?></td>
            <td><?php echo $total_amount_post_tax_month[6]?></td>
            <td><?php echo $total_amount_post_tax_month[7]?></td>
            <td><?php echo $total_amount_post_tax_month[8]?></td>
            <td><?php echo $total_amount_post_tax_month[9]?></td>
            <td><?php echo $total_amount_post_tax_month[10]?></td>
            <td><?php echo $total_amount_post_tax_month[11]?></td>
            <td><?php echo $total_amount_post_tax_month[12]?></td>
            <td><?php echo $total?></td>
          </tr>
          </tbody>
      </table>
    </div>
    <h3>Generated Total Amount by Category</h3>
      <div class="container">     
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Tax</th>
              <th>Construction</th>
              <th>Mining</th>
              <th>Plastics & Rubber</th>
              <th>Computer - Hardware</th>
              <th>Computer - Software</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $total = 0; 
              foreach ($total_amount_pre_tax_category as $val) {
                $total += $val;
              }
          ?>
          <tr>
            <td>Pre-Tax Amount</td>
            <td><?php echo $total_amount_pre_tax_category["Construction"]?></td>
            <td><?php echo $total_amount_pre_tax_category["Mining"]?></td>
            <td><?php echo $total_amount_pre_tax_category["Plastics & Rubber"]?></td>
            <td><?php echo $total_amount_pre_tax_category["Computer - Hardware"]?></td>
            <td><?php echo $total_amount_pre_tax_category["Computer - Software"]?></td>
            <td><?php echo $total?></td>
          </tr>
          <tr>
          <?php
              $total = 0; 
              foreach ($total_amount_post_tax_category as $val) {
                $total += $val;
              }
          ?>
            <td>Post-Tax Amount</td>
            <td><?php echo $total_amount_post_tax_category["Construction"]?></td>
            <td><?php echo $total_amount_post_tax_category["Mining"]?></td>
            <td><?php echo $total_amount_post_tax_category["Plastics & Rubber"]?></td>
            <td><?php echo $total_amount_post_tax_category["Computer - Hardware"]?></td>
            <td><?php echo $total_amount_post_tax_category["Computer - Software"]?></td>
            <td><?php echo $total?></td>
          </tr>
          </tbody>
      </table>
    </div>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="../storage/data.csv">Download Sample Data</a></p>
      </div>
    </div>
  </div>
</div>

<!-- <footer class="container-fluid text-center">
  <div>
    <div class="left">NRI Web Development Challenge by Jessica Lee</div>
    <div class="right"><a href="mailto:jessica.slee4275@gmail.com">jessica.slee4275@gmail.com</a></div>
  </div>
</footer> -->

</body>
</html>
