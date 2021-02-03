<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?> | <?= $role['role'] ?></h1>



   <div class="row">
      <div class="col-lg-12">
         <?= $this->session->flashdata('pesan'); ?>

         <a href="<?= base_url('admin/role') ?>" class="btn btn-primary mb-3">Kembali</a>
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Akses</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($menu as $m) { ?>
                  <tr>
                     <th scope="row"><?= $i++ ?></th>
                     <td><?= $m['menu'] ?></td>
                     <td>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']) ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                        </div>
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