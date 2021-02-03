<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

   <div class="row">


      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Admin</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $admincount ?> Admin</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Member Terdaftar</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $membercount ?> Member</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Buku Perpustakaan</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bookcount ?> Buku </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-book fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Buku Dipinjam</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pinjamcount ?> Buku </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-book fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <!-- Content Column -->
      <div class="col-lg-12 mb-4">

         <!-- Project Card Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Management</h6>
            </div>
            <div class="card-body">
               <h4 class="small font-weight-bold">Jumlah Admin<span class="float-right"><?= $admincount * $admincount / 100 ?>%</span></h4>
               <div class="progress mb-4">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $admincount * $admincount / 100 ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
               <h4 class="small font-weight-bold">Jumlah Member <span class="float-right"><?= $membercount * $membercount / 100 ?>%</span></h4>
               <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $membercount * $membercount / 100 ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
               <h4 class="small font-weight-bold">Jumlah Buku Diperpustakaan<span class="float-right"><?= $bookcount * $bookcount / 100 ?>%</span></h4>
               <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: <?= $bookcount * $bookcount / 100 ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
               <h4 class="small font-weight-bold">Jumlah Buku Dipinjam<span class="float-right"><?= $pinjamcount * $bookcount / 100 ?>%</span></h4>
               <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: <?= $pinjamcount * $bookcount / 100 ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div>
         </div>

         <!-- Color System -->

      </div>





   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->