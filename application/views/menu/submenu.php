<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



   <div class="row">
      <div class="col-lg">

         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger col-lg mx-auto text-center" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('pesan'); ?>

         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#submenuBaruModal">Tambah Submenu baru</a>
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Sub Menu</th>
                  <th scope="col">Menu</th>
                  <th scope="col">URL</th>
                  <th scope="col">Ikon</th>
                  <th scope="col">Aktif/Tidak</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($subMenu as $sm) { ?>
                  <tr>
                     <th scope="row"><?= $i++ ?></th>
                     <td><?= $sm['title'] ?></td>
                     <td><?= $sm['menu'] ?></td>
                     <td><?= $sm['url'] ?></td>
                     <td><?= $sm['icon'] ?></td>
                     <td><?= $sm['is_active'] ?></td>
                     <td>
                        <a href="<?= base_url('menu/updatesubmenu/' . $sm['id']) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= base_url('menu/deletesubmenu/' . $sm['id']) ?>" class="btn btn-danger">Delete</a>
                     </td>
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
<div class="modal fade" id="submenuBaruModal" tabindex="-1" aria-labelledby="submenuBaruModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="submenuBaruModalLabel">Tambah Submenu Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('menu/submenu') ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Nama Submenu">
               </div>
               <div class="form-group">
                  <select name="menu_id" id="menu_id" class="form-control">
                     <option value="">Pilih Menu</option>
                     <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" id="url" name="url" placeholder="URL">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon">
               </div>
               <div class="form-group">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                     <label class="form-check-label" for="is_active">
                        Aktif ?
                     </label>
                  </div>
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