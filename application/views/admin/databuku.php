<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

   <!-- Main Table -->
   <div class="row">
      <div class="col-lg">

         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger col-lg mx-auto text-center" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('pesan'); ?>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#bukuBaruModal">Tambah Data Buku</a>
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
                              <td>
                                 <a href="<?= base_url('admin/editbuku/' . $b['slug']) ?>" class="btn btn-primary">Edit</a>
                                 <a href="<?= base_url('admin/deletebuku/' . $b['slug']) ?>" class="btn btn-danger">Hapus</a>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Table -->

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Data Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('admin/databuku'); ?>
         <div class="modal-body">
            <div class="form-group">
               <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku">
            </div>
            <div class="form-group">
               <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis">
            </div>
            <div class="form-group">
               <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
            </div>
            <div class="custom-file">
               <input type="file" class="form-control custom-file-input" id="sampul" name="sampul" placeholder="Upload Gambar">
               <label class="custom-file-label" for="sampul">Sampul buku...</label>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
         </div>
      </div>
   </div>
</div>