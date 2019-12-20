
<br/><br/>
<div class="card-body">
    <div class="table-responsive">
    <p class="table_title" style ="font-weight: bold; font-size: 120%;">Generated Amount by Month</p>
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
        <?php 
            for($i = 1; $i <= 12; $i++){
        ?>
        <td><?php echo $total_amount_pre_tax_month[$i]?></td>
        <?php }?>
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
        <?php 
            for($i = 1; $i <= 12; $i++){
        ?>
        <td><?php echo $total_amount_post_tax_month[$i]?></td>
        <?php }?>
        <td><?php echo $total?></td>
        </tr>
        </tbody>
    </table>
    </div>
</div>