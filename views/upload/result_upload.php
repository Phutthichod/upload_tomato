<style>
.mdi.mdi-minus{
    margin-right: 0px;
}
.red{
    color : red;
}
</style>

<div class="card">
    <div class="card-body">
        <h2>Total Data Updated / Added</h2>
        <?php if (isset($this->no_row)) : ?>
        <div class="alert alert-primary" role="alert"> <i class="mdi mdi-checkbox-marked-circle-outline"></i> Data is up to date. No data that needs to be updated or added. </div>
        <?php elseif (isset($this->num_row)) : ?>
        <?php $num_row = $this->num_row; ?>
        <?php $detail = $this->detail; ?>
        <div class="alert alert-success" role="alert"> <i class="mdi mdi-checkbox-marked-circle-outline"></i> Data updated/added  <?php echo $num_row["true"]; ?>  rows</div>
        <div class="alert alert-danger" role="alert"> <i class="mdi mdi-close-circle-outline"></i> Data updated/added fail  <?php echo $num_row["false"]; ?>  rows </div>
        <?php if ($num_row["false"] > 0) : ?>
        <div class="alert alert-danger" role="alert">
        <?php foreach ($detail as $key => $value) :?>
                <?php echo "<i class='mdi mdi-minus'></i>".$value."<br/>" ;?>
        <?php endforeach; ?>
        
        </div>
       
        <?php endif; ?>
        <?php if($num_row['true'] + $num_row['false'] == 1) :?>
        <p>Total  <span class="red"> <?php echo $num_row['true'] + $num_row['false'] ;?>  </span> row.</p>
        <?php else : ?>
        <p>Total  <span class="red"> <?php echo $num_row['true'] + $num_row['false'] ;?>  </span> rows.</p>
        <?php endif; ?>
        <?php endif; ?>
       
    </div>
</div> 