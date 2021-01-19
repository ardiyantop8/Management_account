

    

    

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <?php foreach($tbl_user as $u){ ?>

            <form action="<?= base_url().'admin/update_data_pemilih';  ?>" method="post">
              <div class="form-group">
                <label>NIK</label>
                <input type="hidden" name="id_user" class="form-control" value="<?= $u->id_user ?>">
                <input type="text" name="nik" class="form-control" value="<?= $u->nik ?>">
              </div>

              <div class="form-group">
                <label>Nama Pemilih</label>
                <input type="text" name="name" class="form-control" value="<?= $u->name ?>">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= $u->email ?>">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="">
              </div>
              <td onclick="javascript: return confirm('Anda yakin ingin kembali ?')"><?= anchor('admin/datapemilih', '<div class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left"> kembali</i></div>')  ;?>
              </td>
              <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-edit"> Update</i></button>
            </form> 

          <?php } ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
