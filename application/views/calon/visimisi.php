



    

    

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <form method="post" action="<?= base_url('calon/simpanvisimisi')  ;?>">
            <div class="form-group row">
              
                <div class="col-sm-5">
                  <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user'] ;?>">
                  
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ;?>" readonly> 
                </div>
            </div>

            <div class="form-group row">
              <label for="jenis_klmn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-2">
                  <select class="custom-select mr-sm-2" id="jenis_klmn" name="jenis_klmn">
                    <option selected>Choose...</option>
                    <option id="jenis_klmn"  value="Laki - laki">Laki - laki</option>
                    <option id="jenis_klmn"  value="Perempuan">Perempuan</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
              <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                <div class="col-sm-2">
                  <select class="custom-select mr-sm-2" id="pendidikan" name="pendidikan">
                    <option selected>Choose...</option>
                    <option   value="SD">SD</option>
                    <option   value="SD">SMP</option>
                    <option   value="SMA">SMA</option>
                    <option   value="D3">D3</option>
                    <option   value="S1">S1</option>
                    <option   value="S2">S2</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
              <label for="visi" class="col-sm-2 col-form-label">Visi</label>
                <div class="col-sm-5">
                  <textarea class="form-control" id="visi" name="visi" rows="4" placeholder="Tuliskan Visimu .."></textarea>
                </div>  
            </div>

            <div class="form-group row">
              <label for="misi" class="col-sm-2 col-form-label">Misi</label>
                <div class="col-sm-5">
                  <textarea class="form-control" id="misi" name="misi" rows="4" placeholder="Tuliskan Misimu .."></textarea>
                </div>  
            </div>

            <div class="form-group row">
              <div class="col-sm-8 mx-auto">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

