<!DOCTYPE html>
<html lang="en">
<head>
  <?php include ".\lib\head_config.php"?>
</head>
<body id="page-top">
  <?php include ".\lib\body_config.php"?>
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">NRI Web Development Chanllenge</a>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
    </ul>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- DataTables -->
        <div class="card mb-3">
        <div class="container mt-3">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="file-input" name="filename">
              <label class="custom-file-label" for="file-input">Choose file</label>
            </div>
            <div>
              <form method="post"> 
                <input type="text" id="demo" name="imported_data" style="display:none;">
                <input id = "btn_new" type="submit" class="btn btn-primary" name="btn_new_file_generate" value = "Generate with New File" onclick = "GenerateNew()"/> 
                <input id = "btn_default"type="submit" class="btn btn-warning right" name="btn_default" value = "Generate with Default File" onclick = "GenerateDefault()"/> 
              </form>
            </div>
        </div>
        <div class="card-header">
          <i class="fas fa-table"></i>
          Imported Data Table
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <?php include ".\lib\import_data.php"?>
            <br/>
          </div>
          <?php
            $date = new DateTime("now", new DateTimeZone('America/New_York') );
          ?>
          <div class="card-footer small text-muted">Updated <?php echo $date->format('Y-m-d H:i:s');?> in Toronto, Canada</div>
        </div>

      </div>
      <!-- /.container-fluid -->
      
    </div>
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class = "left">NRI Web Development Chanllenge by Jessica Lee</span>  
            <span class = "right"><a href = "mailto:jessica.slee4275@gmail.com">jessica.slee4275@gmail.com</a></span>
          </div>
        </div>
      </footer>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
</html>
