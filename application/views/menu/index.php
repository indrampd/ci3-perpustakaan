<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



   <div class="row">
      <div class="col-lg-12">
         <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
         <?= $this->session->flashdata('pesan'); ?>

         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#menuBaruModal">Tambah Menu baru</a>
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($menu as $m) { ?>
                  <tr>
                     <th scope="row"><?= $i++ ?></th>
                     <td><?= $m['menu'] ?></td>
                     <td>
                        <a href="<?= base_url('menu/updatemenu/' . $m['id']) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= base_url('menu/deletemenu/' . $m['id']) ?>" class=" btn btn-danger">Delete</a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class=" modal fade" id="menuBaruModal" tabindex="-1" aria-labelledby="menuBaruModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="menuBaruModalLabel">Tambah Menu Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('menu') ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- Modal -->
<!-- <div class=" modal fade" id="updateMenuModal" tabindex="-1" aria-labelledby="updateMenuModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="updateMenuModalLabel">Ubah Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('menu/updatemenu') ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="updatemenu" name="updatemenu" value="<?= $menu ?>">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </form>
      </div>
   </div> -->