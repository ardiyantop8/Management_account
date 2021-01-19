<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
        	<div class="col-lg-10">
        		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>');  ?>

        		<?= $this->session->flashdata('message');  ?>

        		<!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a> -->
        		<table class="table table-hover">
        			<thead>
        				<tr>
        					<th>No</th>
        					<th>NIK</th>
        					<th>Nama</th>
        					<th>Email</th>
        					<th>Role</th>
                            <th>Aktif</th>
        					<th colspan="3">Action</th>
                            
        				</tr>
        			</thead>
        			<tbody>
        				<?php $i = 1; ?>
        				<?php foreach($getkandidat->result_array() as $u) : 
        					$id        =$u['id_user'];
                            $nik       =$u['nik'];
        					$name      =$u['name'];
        					$email     =$u['email'];
        					$role_id   =$u['role_id'];
                            $is_active  =$u['is_active'];

        					?>
        				<tr>
        					<th scope="row"><?= $i;  ?></th>
        					<td><?= $nik;  ?></td>
        					<td><?= $name;  ?></td>
        					<td><?= $email;  ?></td>
        					<td><?= $role_id;  ?></td>
        					<td><?= $is_active;  ?></td>               
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin ingin melihat data ini ?')"><?= anchor('admin/lihat_data_kandidat/'.$id, '<div class="btn btn-primary btn-sm"><i class="fa fa-search-plus"> Lihat</i></div>')  ;?>
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?= anchor('admin/hapus_data_kandidat/'.$id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></div>')  ;?>
                            </td>
                           
        				</tr>
        				<?php $i++; ?>
        			<?php endforeach; ?>
        			</tbody>
        		</table>
        	</div>	 	
         </div>
         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->