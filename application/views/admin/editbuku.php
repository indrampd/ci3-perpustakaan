<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
   <div class="row">
      <div class="col-lg-8">

         <?= form_open_multipart(''); ?>
         <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="judul" name="judul" value="<?= $book['judul'] ?>" readonly>
               <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="penulis " class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $book['penulis'] ?>">
               <?= form_error('penulis', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="penerbit " class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $book['penerbit'] ?>">
               <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
            <div class="col-sm-10">
               <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3"></textarea>
               <?= form_error('sinopsis', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-2">Sampul</div>
            <div class="col-sm-10">
               <div class="row">
                  <div class="col-sm-3">
                     <img src="<?= base_url('assets/img/sampul/' . $book['sampul']) ?>" class="img-thumbnail img-preview">
                  </div>
                  <div class="col-sm-9 ">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sampul" name="sampul" onchange="previewImg()">
                        <?= form_error('sampul', '<small class="text-danger pl-3">', '</small>'); ?>
                        <label class="custom-file-label" for="sampul">Upload gambar</label>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="form-group row justify-content-end">
            <div class="col-sm-10">
               <button type="submit" class="btn btn-primary">Edit</button>
            </div>
         </div>

      </div>
   </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->