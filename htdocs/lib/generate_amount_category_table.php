
<div class="card-body">
    <div class="table-responsive">
    <p class="table_title" style ="font-weight: bold; font-size: 120%;">Generated Amount by Category</p>
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