<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/nav');
$this->load->view('guru/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Form Perbaikan Data Siswa SMP</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formulir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php 
          if(validation_errors() != false)
          {
            ?>
            <div class="alert alert-danger" role="alert">
              <?php echo validation_errors(); ?>
            </div>
            <?php
          }
          if(isset($error))
          {
              echo "ERROR UPLOAD : <br/>";
              print_r($error);
              echo "<hr/>";
          }
        ?>
        <?php echo $this->session->flashdata('pesan'); ?>
        <!-- form start -->
        <form method="post" action="<?php echo base_url(); ?>guru/updatesmp" enctype="multipart/form-data">
            <!-- Horizontal Form -->

              <!-- DATA SISWA -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">DATA SISWA</h3>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="Nis" class="col-sm-4 col-form-label">NIS</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id" id="id" value="<?php echo $dbsmp->id; ?>"/>
                      <input type="text" name="nis" class="form-control" id="Nis" value="<?php echo $dbsmp->nis; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Nisn" class="col-sm-4 col-form-label">NISN</label>
                    <div class="col-sm-8">
                      <input type="text" name="nisn" class="form-control" id="Nisn" placeholder="0000000000" value="<?php echo $dbsmp->nisn; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Nama Lengkap" class="col-sm-4 col-form-label">NAMA LENGKAP</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Sesuai Ijazah" value="<?php echo $dbsmp->nama; ?>" required>
                    </div>
                  </div>
                  <!-- OPTION -->
                  <div class="form-group row">
                    <label for="Jenis Kelamin" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-8">
                    <select type="text" name="jk" id="Jenis Kelamin"  class="form-control select2" required>
                      <option value="L" <?php if($dbsmp->jk=="L"){echo "selected";} ?>>Laki-laki</option>
                      <option value="P" <?php if($dbsmp->jk=="P"){echo "selected";} ?>>Perempuan</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tmp_lahir" class="col-sm-4 col-form-label">TEMPAT LAHIR</label>
                    <div class="col-sm-8">
                      <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" value="<?php echo $dbsmp->tmp_lahir; ?>">
                    </div>
                  </div>
                  <!-- TANGGAL -->
                  <div class="form-group row">
                    <label for="Tanggal Lahir" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                    <div class="col-sm-6">
                      <div class="input-group"> 
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dbsmp->tgl_lahir; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik" class="form-control" id="nik" placeholder="35xxxxxxxxxxxxxx" value="<?php echo $dbsmp->nik; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="agama" class="col-sm-4 col-form-label">AGAMA</label>
                    <div class="col-sm-8">
                    <select type="text" name="agama" id="agama"  class="form-control select2">
                      <option value="Islam" <?php if($dbsmp->agama=="Islam"){echo "selected";} ?>>Islam</option>
                      <option value="Kristen" <?php if($dbsmp->agama=="Kristen"){echo "selected";} ?>>Kristen</option>
                      <option value="Katholik" <?php if($dbsmp->agama=="Katholik"){echo "selected";} ?>>Katholik</option>
                      <option value="Hindu" <?php if($dbsmp->agama=="Hindu"){echo "selected";} ?>>Hindu</option>
                      <option value="Budha" <?php if($dbsmp->agama=="Budha"){echo "selected";} ?>>Budha</option>
                      <option value="Khonghucu" <?php if($dbsmp->agama=="Khonghucu"){echo "selected";} ?>>Khonghucu</option>
                      <option value="Kepercayaan Kepada Tuhan YME" <?php if($dbsmp->agama=="Kepercayaan Kepada Tuhan YME"){echo "selected";} ?>>Kepercayaan Kepada Tuhan YME</option>
                      <option value="Lainnya" <?php if($dbsmp->agama=="Lainnya"){echo "selected";} ?>>Lainnya</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label">ALAMAT</label>
                    <div class="col-sm-8">
                      <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Jl. kebaikan" value="<?php echo $dbsmp->alamat; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Rt" class="col-sm-4 col-form-label">RT / RW</label>
                    <div class="col-sm-4">
                      <input type="text" name="rt" class="form-control" id="Rt" placeholder="000" value="<?php echo $dbsmp->rt; ?>">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="rw" class="form-control" id="Rw" placeholder="000" value="<?php echo $dbsmp->rw; ?>">
                    </div>
                  </div>
                </div>
              </div>                        
              <div class="col-md-6">                
                <div class="card-body">                   
                  <div class="form-group row">
                    <label for="Dusun" class="col-sm-4 col-form-label">DUSUN</label>
                    <div class="col-sm-8">
                      <input type="text" name="dusun" class="form-control" id="Dusun" placeholder="Dusun" value="<?php echo $dbsmp->dusun; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Kelurahan" class="col-sm-4 col-form-label">KELURAHAN</label>
                    <div class="col-sm-8">
                      <input type="text" name="kelurahan" class="form-control" id="Kelurahan" placeholder="Kelurahan" value="<?php echo $dbsmp->kelurahan; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Kecamatan" class="col-sm-4 col-form-label">KECAMATAN</label>
                    <div class="col-sm-8">
                      <input type="text" name="kecamatan" class="form-control" id="Kecamatan" placeholder="Kecamatan" value="<?php echo $dbsmp->kecamatan; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Kabupaten" class="col-sm-4 col-form-label">KABUPATEN</label>
                    <div class="col-sm-8">
                      <input type="text" name="kabupaten" class="form-control" id="Kabupaten" placeholder="Kabupaten" value="<?php echo $dbsmp->kabupaten; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Propinsi" class="col-sm-4 col-form-label">PROPINSI</label>
                    <div class="col-sm-8">
                      <input type="text" name="propinsi" class="form-control" id="Propinsi" placeholder="Propinsi" value="<?php echo $dbsmp->propinsi; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Jenis Tinggal" class="col-sm-4 col-form-label">JENIS TINGGAL</label>
                    <div class="col-sm-8">
                    <select type="text" name="jns_tinggal" id="Jenis Tinggal"  class="form-control select2" >
                      <option value="" <?php if($dbsmp->jns_tinggal==""){echo "selected";} ?>>Tidak Diketahui</option>
                      <option value="Dusun" <?php if($dbsmp->jns_tinggal=="Dusun"){echo "selected";} ?>>Dusun</option>
                      <option value="Salaf Putri" <?php if($dbsmp->jns_tinggal=="Salaf Putri"){echo "selected";} ?>>Salaf Putri</option>
                      <option value="Salaf Putra" <?php if($dbsmp->jns_tinggal=="Salaf Putra"){echo "selected";} ?>>Salaf Putra</option>
                      <option value="Rusunnawa" <?php if($dbsmp->jns_tinggal=="Rusunnawa"){echo "selected";} ?>>Rusunnawa</option>
                      <option value="Ashri" <?php if($dbsmp->jns_tinggal=="Ashri"){echo "selected";} ?>>Ashri</option>
                      <option value="AGA PUTRA" <?php if($dbsmp->jns_tinggal=="AGA PUTRA"){echo "selected";} ?>>AGA PUTRA</option>
                      <option value="AGA PUTRI" <?php if($dbsmp->jns_tinggal=="AGA PUTRI"){echo "selected";} ?>>AGA PUTRI</option>
                      <option value="Tahfid" <?php if($dbsmp->jns_tinggal=="Tahfid"){echo "selected";} ?>>Tahfid</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Transportasi" class="col-sm-4 col-form-label">TRANSPORTASI</label>
                    <div class="col-sm-8">
                      <input type="text" name="alat_trans" class="form-control" id="Transportasi" placeholder="Transportasi" value="<?php echo $dbsmp->alat_trans; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Rt" class="col-sm-4 col-form-label">No Telp/ HP</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" name="telp" value="<?php echo $dbsmp->telp; ?>"
                             data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Email" class="col-sm-4 col-form-label">E-MAIL</label>
                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control" id="Email" placeholder="elang@gmail.com" value="<?php echo $dbsmp->email; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Anak ke" class="col-sm-4 col-form-label">ANAK KE-</label>
                    <div class="col-sm-4">
                      <input type="text" name="anak_ke" class="form-control" id="Anak ke" placeholder="00" value="<?php echo $dbsmp->anak_ke; ?>">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="jml_sdr" class="form-control" id="Jumlah Saudara" placeholder="00" value="<?php echo $dbsmp->jml_sdr; ?>">
                    </div>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- DATA AYAH -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">DATA AYAH</h3>
                </div>
                <div class="card-body">              
                  <div class="form-group row">
                    <label for="nm_ayh" class="col-sm-4 col-form-label">NAMA AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="nm_ayh" class="form-control" id="nm_ayh" placeholder="Nama Ayah" value="<?php echo $dbsmp->nm_ayh; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nik_ayh" class="col-sm-4 col-form-label">NIK AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik_ayh" class="form-control" id="nik_ayh" placeholder="NIK Ayah" value="<?php echo $dbsmp->nik_ayh; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="lahir_ayh" class="col-sm-4 col-form-label">TAHUN LAHIR AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="lahir_ayh" class="form-control" id="lahir_ayh" placeholder="Lahir Ayah" value="<?php echo $dbsmp->lahir_ayh; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Pend_Ayah" class="col-sm-4 col-form-label">PENDIDIKAN AYAH</label>
                    <div class="col-sm-8">
                      <select type="text" name="pend_ayh" id="pend_ayh"  class="form-control select2">
                        <option value="" <?php if($dbsmp->pend_ayh==""){echo "selected";} ?>>Tidak Diketahui</option>
                        <option value="Tidak Sekolah" <?php if($dbsmp->pend_ayh=="Tidak Sekolah"){echo "selected";} ?>>Tidak Sekolah</option>
                        <option value="Putus SD" <?php if($dbsmp->pend_ayh=="Putus SD"){echo "selected";} ?>>Putus SD</option>
                        <option value="SD Sederajad" <?php if($dbsmp->pend_ayh=="SD Sederajad"){echo "selected";} ?>>SD Sederajad</option>
                        <option value="SMP Sederajad" <?php if($dbsmp->pend_ayh=="SMP Sederajad"){echo "selected";} ?>>SMP Sederajad</option>
                        <option value="SMA Sederajad" <?php if($dbsmp->pend_ayh=="SMA Sederajad"){echo "selected";} ?>>SMA Sederajad</option>
                        <option value="D1" <?php if($dbsmp->pend_ayh=="D1"){echo "selected";} ?>>D1</option>
                        <option value="D2" <?php if($dbsmp->pend_ayh=="D2"){echo "selected";} ?>>D2</option>
                        <option value="D3" <?php if($dbsmp->pend_ayh=="D3"){echo "selected";} ?>>D3</option>
                        <option value="D4/S1" <?php if($dbsmp->pend_ayh=="D4/S1"){echo "selected";} ?>>D4/S1</option>
                        <option value="S2" <?php if($dbsmp->pend_ayh=="S2"){echo "selected";} ?>>S2</option>
                        <option value="S3" <?php if($dbsmp->pend_ayh=="S3"){echo "selected";} ?>>S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kerja_ayh" class="col-sm-4 col-form-label">PEKERJAAN AYAH</label>
                    <div class="col-sm-8">
                      <select type="text" name="kerja_ayh" id="kerja_ayh"  class="form-control select2">
                        <option value="" <?php if($dbsmp->pend_ayh==""){echo "selected";} ?>>Tidak Diketahui</option>
                        <option value="Tidak bekerja" <?php if($dbsmp->pend_ayh=="Tidak bekerja"){echo "selected";} ?>>Tidak bekerja</option>
                        <option value="Nelayan" <?php if($dbsmp->pend_ayh=="Nelayan"){echo "selected";} ?>>Nelayan</option>
                        <option value="Petani" <?php if($dbsmp->pend_ayh=="Petani"){echo "selected";} ?>>Petani</option>
                        <option value="Peternak" <?php if($dbsmp->pend_ayh=="Peternak"){echo "selected";} ?>>Peternak</option>
                        <option value="PNS/TNI/POLRI" <?php if($dbsmp->pend_ayh=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
                        <option value="Karyawan Swasta" <?php if($dbsmp->pend_ayh=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
                        <option value="Pedagang Kecil" <?php if($dbsmp->pend_ayh=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
                        <option value="Pedagang Besar" <?php if($dbsmp->pend_ayh=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
                        <option value="Wiraswasta" <?php if($dbsmp->pend_ayh=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
                        <option value="Wirausaha" <?php if($dbsmp->pend_ayh=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
                        <option value="Buruh" <?php if($dbsmp->pend_ayh=="Buruh"){echo "selected";} ?>>Buruh</option>
                        <option value="Pensiunan" <?php if($dbsmp->pend_ayh=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hasil_ayh" class="col-sm-4 col-form-label">PENGHASILAN AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="hasil_ayh" class="form-control" id="hasil_ayh" placeholder="Rp. 000.000" value="<?php echo $dbsmp->hasil_ayh; ?>">
                    </div>
                  </div>
                </div>
              </div>   
            </div>
            <div class="col-md-6">
              <!-- DATA IBU -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">DATA IBU</h3>
                </div>
                <div class="card-body">              
                  <div class="form-group row">
                    <label for="nm_ibu" class="col-sm-4 col-form-label">NAMA IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="nm_ibu" class="form-control" id="nm_ibu" placeholder="Nama Ibu" value="<?php echo $dbsmp->nm_ibu; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nik_ibu" class="col-sm-4 col-form-label">NIK IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" placeholder="NIK Ibu" value="<?php echo $dbsmp->nik_ibu; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="lahir_ibu" class="col-sm-4 col-form-label">TAHUN LAHIR IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="lahir_ibu" class="form-control" id="lahir_ibu" placeholder="Lahir Ibu" value="<?php echo $dbsmp->lahir_ibu; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Pend_Ibu" class="col-sm-4 col-form-label">PENDIDIKAN IBU</label>
                    <div class="col-sm-8">
                      <select type="text" name="pend_ibu" id="pend_ibu"  class="form-control select2">
                        <option value="" <?php if($dbsmp->pend_ibu==""){echo "selected";} ?>>Tidak Diketahui</option>
                        <option value="Tidak Sekolah" <?php if($dbsmp->pend_ibu=="Tidak Sekolah"){echo "selected";} ?>>Tidak Sekolah</option>
                        <option value="Putus SD" <?php if($dbsmp->pend_ibu=="Putus SD"){echo "selected";} ?>>Putus SD</option>
                        <option value="SD Sederajad" <?php if($dbsmp->pend_ibu=="SD Sederajad"){echo "selected";} ?>>SD Sederajad</option>
                        <option value="SMP Sederajad" <?php if($dbsmp->pend_ibu=="SMP Sederajad"){echo "selected";} ?>>SMP Sederajad</option>
                        <option value="SMA Sederajad" <?php if($dbsmp->pend_ibu=="SMA Sederajad"){echo "selected";} ?>>SMA Sederajad</option>
                        <option value="D1" <?php if($dbsmp->pend_ibu=="D1"){echo "selected";} ?>>D1</option>
                        <option value="D2" <?php if($dbsmp->pend_ibu=="D2"){echo "selected";} ?>>D2</option>
                        <option value="D3" <?php if($dbsmp->pend_ibu=="D3"){echo "selected";} ?>>D3</option>
                        <option value="D4/S1" <?php if($dbsmp->pend_ibu=="D4/S1"){echo "selected";} ?>>D4/S1</option>
                        <option value="S2" <?php if($dbsmp->pend_ibu=="S2"){echo "selected";} ?>>S2</option>
                        <option value="S3" <?php if($dbsmp->pend_ibu=="S3"){echo "selected";} ?>>S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kerja_ibu" class="col-sm-4 col-form-label">PEKERJAAN IBU</label>
                    <div class="col-sm-8">
                      <select type="text" name="kerja_ibu" id="kerja_ibu"  class="form-control select2">
                        <option value="" <?php if($dbsmp->pend_ibu==""){echo "selected";} ?>>Tidak Diketahui</option>
                        <option value="Tidak bekerja" <?php if($dbsmp->pend_ibu=="Tidak bekerja"){echo "selected";} ?>>Tidak bekerja</option>
                        <option value="Nelayan" <?php if($dbsmp->pend_ibu=="Nelayan"){echo "selected";} ?>>Nelayan</option>
                        <option value="Petani" <?php if($dbsmp->pend_ibu=="Petani"){echo "selected";} ?>>Petani</option>
                        <option value="Peternak" <?php if($dbsmp->pend_ibu=="Peternak"){echo "selected";} ?>>Peternak</option>
                        <option value="PNS/TNI/POLRI" <?php if($dbsmp->pend_ibu=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
                        <option value="Karyawan Swasta" <?php if($dbsmp->pend_ibu=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
                        <option value="Pedagang Kecil" <?php if($dbsmp->pend_ibu=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
                        <option value="Pedagang Besar" <?php if($dbsmp->pend_ibu=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
                        <option value="Wiraswasta" <?php if($dbsmp->pend_ibu=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
                        <option value="Wirausaha" <?php if($dbsmp->pend_ibu=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
                        <option value="Buruh" <?php if($dbsmp->pend_ibu=="Buruh"){echo "selected";} ?>>Buruh</option>
                        <option value="Pensiunan" <?php if($dbsmp->pend_ibu=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hasil_ibu" class="col-sm-4 col-form-label">PENGHASILAN IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="hasil_ibu" class="form-control" id="hasil_ibu" placeholder="Rp. 000.000" value="<?php echo $dbsmp->hasil_ibu; ?>">
                    </div>
                  </div>
                </div>
              </div>  
            </div>   
          </div>    

          <div class="row">
            <div class="col-md-6">
              <!-- DATA WALI -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">DATA WALI</h3>
                </div>
                <div class="card-body">              
                  <div class="form-group row">
                    <label for="nm_wl" class="col-sm-4 col-form-label">NAMA WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="nm_wl" class="form-control" id="nm_wl" placeholder="Nama Wali" value="<?php echo $dbsmp->nm_wl; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nik_wl" class="col-sm-4 col-form-label">NIK WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik_wl" class="form-control" id="nik_wl" placeholder="NIK Wali" value="<?php echo $dbsmp->nik_wl; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="lahir_wl" class="col-sm-4 col-form-label">TAHUN LAHIR WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="lahir_wl" class="form-control" id="lahir_wl" placeholder="Lahir Wali" value="<?php echo $dbsmp->lahir_wl; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pend_wl" class="col-sm-4 col-form-label">PENDIDIKAN WALI</label>
                    <div class="col-sm-8">
                      <select type="text" name="pend_wl" id="pend_wl"  class="form-control select2">
                        <option value="" <?php if($dbsmp->pend_wl==""){echo "selected";} ?>>Tidak Diketahui</option>
                        <option value="Tidak Sekolah" <?php if($dbsmp->pend_wl=="Tidak Sekolah"){echo "selected";} ?>>Tidak Sekolah</option>
                        <option value="Putus SD" <?php if($dbsmp->pend_wl=="Putus SD"){echo "selected";} ?>>Putus SD</option>
                        <option value="SD Sederajad" <?php if($dbsmp->pend_wl=="SD Sederajad"){echo "selected";} ?>>SD Sederajad</option>
                        <option value="SMP Sederajad" <?php if($dbsmp->pend_wl=="SMP Sederajad"){echo "selected";} ?>>SMP Sederajad</option>
                        <option value="SMA Sederajad" <?php if($dbsmp->pend_wl=="SMA Sederajad"){echo "selected";} ?>>SMA Sederajad</option>
                        <option value="D1" <?php if($dbsmp->pend_wl=="D1"){echo "selected";} ?>>D1</option>
                        <option value="D2" <?php if($dbsmp->pend_wl=="D2"){echo "selected";} ?>>D2</option>
                        <option value="D3" <?php if($dbsmp->pend_wl=="D3"){echo "selected";} ?>>D3</option>
                        <option value="D4/S1" <?php if($dbsmp->pend_wl=="D4/S1"){echo "selected";} ?>>D4/S1</option>
                        <option value="S2" <?php if($dbsmp->pend_wl=="S2"){echo "selected";} ?>>S2</option>
                        <option value="S3" <?php if($dbsmp->pend_wl=="S3"){echo "selected";} ?>>S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kerja_wl" class="col-sm-4 col-form-label">PEKERJAAN WALI</label>
                    <div class="col-sm-8">
                      <select type="text" name="kerja_wl" id="kerja_wl"  class="form-control select2">
                        <option value="" <?php if($dbsmp->pend_wl==""){echo "selected";} ?>>Tidak Diketahui</option>
                        <option value="Tidak bekerja" <?php if($dbsmp->pend_wl=="Tidak bekerja"){echo "selected";} ?>>Tidak bekerja</option>
                        <option value="Nelayan" <?php if($dbsmp->pend_wl=="Nelayan"){echo "selected";} ?>>Nelayan</option>
                        <option value="Petani" <?php if($dbsmp->pend_wl=="Petani"){echo "selected";} ?>>Petani</option>
                        <option value="Peternak" <?php if($dbsmp->pend_wl=="Peternak"){echo "selected";} ?>>Peternak</option>
                        <option value="PNS/TNI/POLRI" <?php if($dbsmp->pend_wl=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
                        <option value="Karyawan Swasta" <?php if($dbsmp->pend_wl=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
                        <option value="Pedagang Kecil" <?php if($dbsmp->pend_wl=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
                        <option value="Pedagang Besar" <?php if($dbsmp->pend_wl=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
                        <option value="Wiraswasta" <?php if($dbsmp->pend_wl=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
                        <option value="Wirausaha" <?php if($dbsmp->pend_wl=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
                        <option value="Buruh" <?php if($dbsmp->pend_wl=="Buruh"){echo "selected";} ?>>Buruh</option>
                        <option value="Pensiunan" <?php if($dbsmp->pend_wl=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hasil_wl" class="col-sm-4 col-form-label">PENGHASILAN WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="hasil_wl" class="form-control" id="hasil_wl" placeholder="Rp. 000.000" value="<?php echo $dbsmp->hasil_ibu; ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-md-6">   
              <!-- KARTU KESEJAHTERAAN -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">KARTU KESEJAHTERAAN</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="no_kps" class="col-sm-4 col-form-label">NO KPS</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_kps" class="form-control" id="no_kps" value="<?php echo $dbsmp->no_kps; ?>" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_kip" class="col-sm-4 col-form-label">NO KIP</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_kip" class="form-control" id="no_kip" value="<?php echo $dbsmp->no_kip; ?>" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_kis" class="col-sm-4 col-form-label">NO KIS</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_kis" class="form-control" id="no_kis" value="<?php echo $dbsmp->no_kis; ?>" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_pkh" class="col-sm-4 col-form-label">NO PKH</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_pkh" class="form-control" id="no_pkh" value="<?php echo $dbsmp->no_pkh; ?>" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="beasiswa" class="col-sm-4 col-form-label">Beasiswa</label>
                    <div class="col-sm-8">
                      <input type="text" name="beasiswa" class="form-control" id="beasiswa" value="<?php echo $dbsmp->beasiswa; ?>" placeholder="Kartanu">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- ROMBEL -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">ROMBEL</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="kelas_7" class="col-sm-4 col-form-label">History</label>
                    <div class="col-sm-2">
                      <input type="text" name="kelas_7" class="form-control" id="kelas_7" placeholder="kelas_7" value="<?php echo $dbsmp->kelas_7; ?>">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" name="kelas_8" class="form-control" id="kelas_8" placeholder="kelas_8"  value="<?php echo $dbsmp->kelas_8; ?>">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" name="kelas_9" class="form-control" id="kelas_9" placeholder="kelas_9"  value="<?php echo $dbsmp->kelas_9; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas_aktf" class="col-sm-4 col-form-label">KELAS AKTIF</label>
                    <div class="col-sm-8">
                      <select type="text" name="kelas_aktf" id="kelas_aktf"  class="form-control select2">
                        
                         <?php foreach($cats as $cat) : ?>
                          <option value="<?php echo $cat->kelas;?>" <?php if($dbsmp->kelas_aktf==$cat->kelas){echo "selected";} ?>> <?php echo $cat->kelas; ?></option>
                         <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas_dig" class="col-sm-4 col-form-label">KELAS DIGITAL</label>
                    <div class="col-sm-8">
                      <input type="text" name="kelas_dig" class="form-control" id="kelas_dig" value="<?php echo $dbsmp->kelas_dig; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">STATUS</label>
                    <div class="col-sm-8">
                      <select type="text" name="status" id="status" onChange="opsi(this)" class="form-control select2">
                        <option value="AKTIF" <?php if($dbsmp->status=="AKTIF"){echo "selected";} ?>>AKTIF</option>
                        <option value="NON AKTIF" <?php if($dbsmp->status=="NON AKTIF"){echo "selected";} ?>>NON AKTIF</option>
                      </select>
                    </div>
                  </div>

                  <input type="text" hidden class="form-control" name="editor" id="editor" value="<?php echo $this->session->userdata('nama'); ?>"><?php date_default_timezone_set('Asia/Jakarta'); ?>
                  <input type="text" hidden class="form-control" name="progres" id="progres" value="<?php echo date("d/m/Y h:i:s") ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  
                </div>
              </div> 
            </div> 
            <div class="col-md-6">
              <!-- LEGALITAS -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">LEGALITAS</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="no_un" class="col-sm-4 col-form-label">NO UN SD/MI</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_un" class="form-control" value="<?php echo $dbsmp->no_un; ?>" data-inputmask="'mask': ['9-99-99-99-999-999-9']" data-mask>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_skhun" class="col-sm-4 col-form-label">NO SERI SKHUN</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_skhun" class="form-control" id="no_skhun" value="<?php echo $dbsmp->no_skhun; ?>" placeholder="DN-XX DI XXXXXXX">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_ijazah" class="col-sm-4 col-form-label">NO SERI IJAZAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_ijazah" class="form-control" id="no_ijazah" value="<?php echo $dbsmp->no_ijazah; ?>" placeholder="DN-XX DI XXXXXXX">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- REGISTER MASUK -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">REGISTER MASUK</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="skl_asal" class="col-sm-4 col-form-label">SEKOLAH ASAL</label>
                    <div class="col-sm-8">
                      <input type="text" name="skl_asal" class="form-control" id="skl_asal" value="<?php echo $dbsmp->skl_asal; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="almt_skl" class="col-sm-4 col-form-label">ALAMAT SEKOLAH ASAL</label>
                    <div class="col-sm-8">
                      <input type="text" name="almt_skl" class="form-control" id="almt_skl" value="<?php echo $dbsmp->almt_skl; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jns_masuk" class="col-sm-4 col-form-label">JENIS PENDAFTARAN</label>
                    <div class="col-sm-8">
                      <select type="text" name="jns_masuk" id="jns_masuk"  class="form-control select2" >
                        <option value="Siswa Baru" <?php if($dbsmp->jns_masuk=="Siswa Baru"){echo "selected";} ?>>Siswa Baru</option>
                        <option value="Pindahan" <?php if($dbsmp->jns_masuk=="Pindahan"){echo "selected";} ?>>Pindahan</option>
                        <option value="Kembali Bersekolah" <?php if($dbsmp->jns_masuk=="Kembali Bersekolah"){echo "selected";} ?>>Kembali Bersekolah</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_masuk" class="col-sm-4 col-form-label">TANGGAL MASUK</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" name="tgl_masuk" class="form-control" value="<?php echo $dbsmp->tgl_masuk; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div> 
            <div class="col-md-6">
              <!-- REGISTER KELUAR -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">REGISTER KELUAR</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="ket_out" class="col-sm-4 col-form-label">KETERANGAN KELUAR</label>
                    <div class="col-sm-8">
                      <select type="text" name="ket_out" id="ket_out"  class="form-control select2" disabled>
                        <option value="" <?php if($dbsmp->ket_out==""){echo "selected";} ?>></option>
                        <option value="Lulus" <?php if($dbsmp->ket_out=="Lulus"){echo "selected";} ?>>Lulus</option>
                        <option value="Dikeluarkan" <?php if($dbsmp->ket_out=="Dikeluarkan"){echo "selected";} ?>>Dikeluarkan</option>
                        <option value="Mengundurkan Diri" <?php if($dbsmp->ket_out=="Mengundurkan Diri"){echo "selected";} ?>>Mengundurkan Diri</option>
                        <option value="Putus Sekolah" <?php if($dbsmp->ket_out=="Putus Sekolah"){echo "selected";} ?>>Putus Sekolah</option>
                        <option value="Wafat" <?php if($dbsmp->ket_out=="Wafat"){echo "selected";} ?>>Wafat</option>
                        <option value="Hilang" <?php if($dbsmp->ket_out=="Hilang"){echo "selected";} ?>>Hilang</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_out" class="col-sm-4 col-form-label">TANGGAL KELUAR</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" name="tgl_out" id="tgl_out" class="form-control" value="<?php echo $dbsmp->tgl_out; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alasan_out" class="col-sm-4 col-form-label">ALASAN KELUAR</label>
                    <div class="col-sm-8">
                      <input type="text" name="alasan_out" class="form-control" id="alasan_out" value="<?php echo $dbsmp->alasan_out; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nosrt_out" class="col-sm-4 col-form-label">NO SURAT</label>
                    <div class="col-sm-8">
                      <input type="text" name="nosrt_out" class="form-control" id="nosrt_out" value="<?php echo $dbsmp->nosrt_out; ?>" disabled>
                    </div>
                  </div>
                  
                </div>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- UPLOAD FOTO -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">FOTO</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name="foto_old" value="<?php echo $dbsmp->foto; ?>">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>             
              </div>
            </div> 
            <div class="col-md-6">
              <!-- PROSES -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">PROSES</h3>
                </div>
                <div class="card-body">
                  <div class="form-check">
                    <input type="checkbox" name="terms" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="exampleCheck2">Data sesuai dengan berkas yang telah di ajukan</label>
                  </div>
                 </div>             
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Update Data</button>
                 
                </div>                    
              </div>  
            </div>
          </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_form');
?>
</body>
</html>