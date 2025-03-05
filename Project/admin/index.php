<?php
include('includes/authadmin.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>

<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="generatereport.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
    </a>
  </div>

  <!-- Content Row -->
  <div class="row">
    
    <?php
    $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
    
    $queries = [
        'Income (Monthly)' => "SELECT sum(P_AMOUNT) as sum FROM payment WHERE MONTH(P_DATE) = MONTH(NOW()) AND YEAR(P_DATE) = YEAR(NOW())",
        'Expenses (Monthly)' => "SELECT sum(E_AMOUNT) as sum FROM expense WHERE MONTH(E_DATE) = MONTH(NOW()) AND YEAR(E_DATE) = YEAR(NOW())",
        'Total House' => "SELECT count(H_ID) as count FROM house",
        'Allocated House' => "SELECT count(DISTINCT HOUSE_H_ID) as count FROM member",
        'Unsolved Complaints' => "SELECT count(C_ID) as count FROM complaint WHERE C_STATUS='Pending' AND MONTH(C_DATE) = MONTH(NOW()) AND YEAR(C_DATE) = YEAR(NOW())",
        'InProgress Complaints' => "SELECT count(C_ID) as count FROM complaint WHERE C_STATUS='Inprogress' AND MONTH(C_DATE) = MONTH(NOW()) AND YEAR(C_DATE) = YEAR(NOW())",
        'Solved Complaints' => "SELECT count(C_ID) as count FROM complaint WHERE C_STATUS='Solved' AND MONTH(C_DATE) = MONTH(NOW()) AND YEAR(C_DATE) = YEAR(NOW())",
        'Total Complaints' => "SELECT count(C_ID) as count FROM complaint WHERE MONTH(C_DATE) = MONTH(NOW()) AND YEAR(C_DATE) = YEAR(NOW())"
    ];
    
    $icons = [
        'Income (Monthly)' => 'fas fa-rupee-sign',
        'Expenses (Monthly)' => 'fas fa-comments-dollar',
        'Total House' => 'fas fa-clipboard-check',
        'Allocated House' => 'fas fa-comments',
        'Unsolved Complaints' => 'fas fa-file',
        'InProgress Complaints' => 'fas fa-exclamation',
        'Solved Complaints' => 'fas fa-check',
        'Total Complaints' => 'fas fa-paperclip'
    ];
    
    foreach ($queries as $title => $query) {
        $chk = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($chk);
        $value = $row ? $row['sum'] ?? $row['count'] : '0';
    ?>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1"> <?= $title ?> </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <h4><b>₹<?= $value ?></b></h4> </div>
            </div>
            <div class="col-auto">
              <i class="<?= $icons[$title] ?> fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<?php
include('includes/scripts.php');
?>