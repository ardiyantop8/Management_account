

    

    

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
           <div class="row">
           	<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pemilih</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datapemilih;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>
                	<div class="col mr-2">
                		<a href="<?= base_url('admin/datapemilih')  ;?>" class="small-box-footer">Ayo Lihat <i class="fa fa-arrow-circle-right"></i></a>
              		</div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Kandidat</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datakandidat;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-address-card fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>
                	<div class="col mr-2">
                		<a href="<?= base_url('admin/datakandidat')  ;?>" class="small-box-footer">Ayo Lihat <i class="fa fa-arrow-circle-right"></i></a>
              		</div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Submenu Aktif</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datasubmenu;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-folder-open fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>
                	<div class="col mr-2">
                		<a href="<?= base_url('menu/submenu')  ;?>" class="small-box-footer">Ayo Lihat <i class="fa fa-arrow-circle-right"></i></a>
              		</div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Menu Publik</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datamenupublik;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-folder fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>
                	<div class="col mr-2">
                		<a href="<?= base_url('menu/menupublik')  ;?>" class="small-box-footer">Ayo Lihat <i class="fa fa-arrow-circle-right"></i></a>
              		</div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Edit Profil</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-edit fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>
                  <div class="col mr-2">
                    <a href="<?= base_url('menu/menupublik')  ;?>" class="small-box-footer">Ayo Lihat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Register</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-plus fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>
                  <div class="col mr-2">
                    <a href="<?= base_url('menu/menupublik')  ;?>" class="small-box-footer">Ayo Lihat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Role</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-retweet fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>
                  <div class="col mr-2">
                    <a href="<?= base_url('menu/menupublik')  ;?>" class="small-box-footer">Ayo Lihat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            </div>

           </div>
         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
