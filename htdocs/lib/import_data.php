<script>
    function readSingleFile(e) {
        var file = e.target.files[0];
        if (!file) {
          return;
        }
        var reader = new FileReader();
        reader.onload = function(e) {
            var contents = e.target.result;
                displayContents(contents);
            };
            reader.readAsText(file);
    }
      
    function displayContents(contents) {
        var element = document.getElementById('file-content');
        //element.textContent = contents;
        document.getElementById("demo").innerHTML = contents;
    }
    document.getElementById('file-input')
    .addEventListener('change', readSingleFile, false);
</script>
<!-- default -->
<?php 
    $OrderRow = [];
    //  echo "<script>document.write(contents);</script>";
    if(array_key_exists('btn_default', $_POST)) { 
        btn_default(); 
    } 
    function btn_default() { 
        $fp = fopen("storage\data.csv", 'r');
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
        echo "Found ".  count($OrderRow) ." orders.<br/><br/>";
        // foreach ($OrderRow as $result) {
        //     echo $result; 
        //     echo "<br>";
        // } 
        //foreach ($OrderRow as $row) {
            //echo "$row <br>";
        //}
        list($date, $category, $lot_title, $lot_location, $lot_condition, $pre_tax_amount, $tax_name, $tax_amount) = explode(",", $OrderRow[0]);
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr class ="capitalize">
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
        $category_array = array("Construction" => 0,"Mining" => 0,"Plastics & Rubber" => 0, "Computer - Hardware" => 0, "Computer - Software" => 0);
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

<?php
    include ".\lib\generate_amount_month_table.php";
    include ".\lib\generate_amount_category_table.php";
}
?>

<!-- new -->
<?php 
    $OrderRow = [];
    $allContent = "";
    if(array_key_exists('btn_new_file_generate', $_POST)) { 
        btn_new_file_generate(); 
    } 

    function btn_new_file_generate() { 
        //echo "NEW --> <script>document.write(test);</script>";
        $OrderRow = (explode("<br/>",$allContent)); 
        $contentRow = count($OrderRow) - 1; //Except title row
        echo "Found ".  $contentRow ." orders.<br/><br/>";
        if($contentRow > 0){
        list($date, $category, $lot_title, $lot_location, $lot_condition, $pre_tax_amount, $tax_name, $tax_amount) = explode(",", $OrderRow[0]);
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr class ="capitalize">
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
    for ($x = 1; $x < $contentRow ; $x++) {
        $lot_location = (explode("\"", $OrderRow[$x])[1]);
        $OrderRow[$x] = str_replace("\"$lot_location\",","",$OrderRow[$x]);
        list($date, $category, $lot_title, $lot_condition, $pre_tax_amount, $tax_name, $tax_amount) = explode(",", $OrderRow[$x]);
        $month = explode("/", $date)[0];
        $total_amount_pre_tax_month[$month] += $pre_tax_amount;
        $total_amount_post_tax_month[$month] += $tax_amount;
        $category_array = array("Construction" => 0,"Mining" => 0,"Plastics & Rubber" => 0, "Computer - Hardware" => 0, "Computer - Software" => 0);
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
<?php
    }
    if($contentRow > 0){
        include ".\lib\generate_amount_month_table.php";
        include ".\lib\generate_amount_category_table.php";
    }
}
?>