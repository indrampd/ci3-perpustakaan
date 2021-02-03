<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
   <div class="row">
      <div class="col-lg-4">
         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger col-lg mx-auto text-center" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('pesan'); ?>
         <div class="card-body">
            <img src="<?= base_url('assets/img/sampul/' . $book['sampul']) ?>" class="card-img-top" alt="...">
         </div>
      </div>
      <div class="col-lg-8 float-md-right">
         <div class="card-body">
            <h5 class="card-title font-weight-bold"><?= $book['judul'] ?></h5>
            <p class="card-text"><?= $book['sinopsis'] ?></p>
         </div>
         <div class="card-footer">
            <div class="col-lg-5 pl-0">
               <small class="text-muted ">Penulis : <?= $book['penulis'] ?></small>
               <small class="text-muted d-lg-block">Penerbit : <?= $book['penerbit'] ?></small>
               <form action="book/detailbuku" method="POST">
                  <input type="hidden" id="user_id" name="user_id" value="<?= $user['id'] ?>">
                  <input type="hidden" id="book_id" name="book_id" value="<?= $book['id'] ?>">
                  <button class="btn btn-success mt-3 border-top-1">Pinjam</button>
               </form>
            </div>
         </div>
      </div>
   </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
               <div class="col-md-4">
                  <img src="<?= base_url('assets/img/sampul/' . $book['sampul']) ?>" class="card-img" alt="...">
               </div>
               <div class="col">
                  <div class="card-body">
                     <h5 class="card-title">Sinopsis</h5>
                     <p class="card-text"><?= $book['sinopsis'] ?></p>
                  </div>
                  <div class="card-footer">
                     <p class="card-text"><small class="text-muted">Penulis : <?= $book['penulis'] ?></small></p>
                  </div>
               </div>
            </div>
         </div> -->