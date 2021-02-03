<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

   <div class="row">
      <div class="col-lg-8">
         <form action="" method="post">
            <div class="form-group row">
               <input type="hidden" id="id" name="id" value="<?= $submenu['id'] ?>">
               <label for="title " class="col-sm-2 col-form-label ">Nama Submenu</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control " id="title" name="title" value="<?= $submenu['title'] ?>">
                  <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="form-group row">
               <label for="menu_id " class="col-sm-2 col-form-label ">Pilih Menu</label>
               <div class="col-sm-9">
                  <select name="menu_id" id="menu_id" class="form-control">
                     <option value="<?= $menu_id['id'] ?>"><?= $menu_id['menu'] ?></option>
                     <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
            </div>
            <div class="form-group row">
               <label for="url " class="col-sm-2 col-form-label ">URL</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control " id="url" name="url" value="<?= $submenu['url'] ?>">
                  <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="form-group row">
               <label for="icon " class="col-sm-2 col-form-label ">Ikon</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control " id="icon" name="icon" value="<?= $submenu['icon'] ?>">
                  <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="form-group row">
               <label for="is_active" class="col-sm-2 col-form-label ">Status Aktif</label>
               <div class="col-sm-9">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                     <label class="form-check-label" for="is_active">
                        Aktif
                     </label>
                  </div>
               </div>
            </div>
            <div class="form-group row justify-content-end">
               <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit</button>
               </div>
            </div>
         </form>
      </div>
   </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->