<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


   <!-- <a href="/perpustakaan/create" class="btn btn-primary mb-3">Tambah Data Buku</a> -->

   <!-- <div class="alert alert-success" role="alert"> </div> -->


   <!-- Main Table -->

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
                     <th>Sampul</th>
                     <th>Judul</th>
                     <th>Penulis</th>
                     <th>Penerbit</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>No</th>
                     <th>Sampul</th>
                     <th>Judul</th>
                     <th>Penulis</th>
                     <th>Penerbit</th>
                     <th>Aksi</th>

                  </tr>
               </tfoot>
               <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($book as $b) : ?>
                     <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><img src="<?= base_url('assets/img/sampul/' . $b['sampul']) ?>" class="sampul" alt=""></td>
                        <td><?= $b['judul'] ?></td>
                        <td><?= $b['penulis'] ?></td>
                        <td><?= $b['penerbit'] ?></td>
                        <td><a href="<?= base_url('book/detailbuku/' . $b['slug']) ?>" class="btn btn-success">Detail</a></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>


   <!-- End Table -->



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->