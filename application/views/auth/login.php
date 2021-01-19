 

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                    <?= $this->session->flashdata('message');  ?>
                  </div>
                  <form class="user" method="post" action="<?= base_url('auth');  ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Enter NIK..." value="<?= set_value('nik');  ?>">
                      <?= form_error('nik', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                      <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
              
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr><marquee>Aplikasi Sistem E-Voting RT 005 Berbasis Web !!</marquee>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('umum');  ?>">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

