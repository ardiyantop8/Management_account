

      <div class="container">
        <!-- Nested Row within Card Body -->
        <div class="row-center">
          <div class="col-lg-5">
            <div class="p-8">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar User</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukan NIK">
                  <?= form_error('nik', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                </div>

                <div class="form-group">
                <select name="role" id="role" class="form-control">
                <option value="">Pilih user</option>
                <option value="2">Calon</option>
                <option value="3">Pemilih</option>
                </select>
                <?= form_error('role', '<small class="text-danger pl-3">','</small>'); ?>
              </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
              </form>
             
            </div>
          </div>



        </div>

        <div class="col-lg-5">
            <div class="p-8">
              <div class="text-center">
                <?= $this->session->flashdata('message');  ?>
              </div>
            </div>
          </div>  
      </div>

