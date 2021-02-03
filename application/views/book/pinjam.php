<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

   <!-- Main Table -->
   <div class="row">
      <div class="col-lg">


         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Judul Buku</th>
                           <th>Tanggal Pinjam</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Judul Buku</th>
                           <th>Tanggal Pinjam</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pinjam as $p) : ?>
                           <tr>
                              <th scope="row"><?= $i++ ?></th>
                              <td><?= $p['name'] ?></td>
                              <td><?= $p['judul'] ?></td>
                              <td><?= date('d F Y', $p['date_created']) ?></td>

                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>


         <!-- End Table -->
      </div>
   </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->