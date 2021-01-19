

    

    

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <form method="post" action="calon/edit">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" >
              </div>
              <div class="col=md-8">
                <div class="card-body">
                  <h5 class="card-title">NIK        :<?= $user['nik'] ;?></h5>
                  <p class="card-text"  >Name       :<?= $user['name'] ;?></p>
                  <p class="card-text"  >Email      :<?= $user['email'] ;?></p>
                  <p class="card-text"  ><smaill>Member since <?= date('d F Y',$user['date_created'])  ;?></smaill></p>
                                     
                </div>
              </div>
            </div>
          </div>
          </form>  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
