
    

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-12 text-gray-800"><?= $title; ?></h1>
            <div class="card mb-3" style="max-width: 940px;">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $detail->name ;?></h6>
                </div>
              <div class="row no-gutters">
                <div class="col-md-3">
                  <img src="<?= base_url('assets/img/profile/') . $detail->image; ?>" class="card-img" >
                </div>
              
                
                <div class="col=md-8">
                  <div class="card-body">
                    <h5 class="card-title">NIK    : <?= $detail->nik ;?></h5>
                    <p class="card-text">Email    : <?= $detail->email ;?></p>
                    <p class="card-text">Password : <?= $detail->password ;?></p>
                    <p class="card-text"><smaill>Member since <?= date('d F Y',$user['date_created'])  ;?></smaill></p>                   
                  </div>
                  <td onclick="javascript: return confirm('Anda yakin ingin kembali ?')"><?= anchor('admin/datapemilih', '<div class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left"> kembali</i></div>')  ;?>
                  </td>
                </div>
              </div>  


            </div>
           
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->