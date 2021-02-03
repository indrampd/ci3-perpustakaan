<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

   <div class="row">
      <div class="col-lg-5">
         <?= $this->session->flashdata('pesan') ?>
         <form action="" method="post">
            <div class="form-group">
               <label for="menu">Menu Saat Ini</label>
               <input type="hidden" id="id" name="id" value="<?= $menu['id'] ?>">
               <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu'] ?>">
               <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class=" form-group">
               <button type="submit" class="btn btn-primary">Ubah Menu</button>
            </div>
         </form>
      </div>
   </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->