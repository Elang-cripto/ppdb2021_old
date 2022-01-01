<?php

$this->load->view('theme/head');
$this->load->view('theme/hlink_ind12');
$this->load->view('theme/hd_alert');
$this->load->view('theme/nav');
$this->load->view('user/side');
?>
<!-- =============================================================================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dasboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dasboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Timelime example  -->
      <div class="row">
        <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <?php
            $jabatan = $this->session->userdata('jabatan');
            $nama = $this->session->userdata('nama');
            $foto = $this->session->userdata('foto');
            $par = $this->session->userdata('par');
            $jabatan = $this->session->userdata('jabatan');
            $kelas = $this->session->userdata('kelas');
            $file_poto = base_url('') . 'asset/dist/img/' . $foto;
            $file_zonk = base_url('') . 'asset/dist/img/none.png';

            $db_pil = "db_" . $par;

            $clkls = "%L" . $kelas . "AKTIF%";
            $data_L = $this->db->query("SELECT * FROM $db_pil where CONCAT(jk,kelas_aktf,status) LIKE '$clkls'")->num_rows();

            $cpkls = "%P" . $kelas . "AKTIF%";
            $data_P = $this->db->query("SELECT * FROM $db_pil where CONCAT(jk,kelas_aktf,status) LIKE '$cpkls'")->num_rows();

            $cmkls1 = "%" . $kelas . "PENGAJUAN MUTASI%";
            $cmkls2 = "%" . $kelas . "PROSES MUTASI%";
            $data_m = $this->db->query("SELECT * FROM $db_pil where CONCAT(kelas_aktf,status) LIKE '$cmkls1'")->num_rows();

            $pkls = "%" . $kelas . "NON AKTIF%";
            $data_J = $this->db->query("SELECT * FROM $db_pil where CONCAT(kelas_aktf,status) LIKE '$pkls'")->num_rows();

            if (empty($foto)) {
              $gambar = $file_zonk;
            } else {
              $gambar = $file_poto;
            }
            ?>
            <!-- <div class="widget-user-header text-white" style="background: url('<?php echo base_url('') ?>/asset/dist/img/photo1.png') center center;"> -->
            <div class="widget-user-header bg-primary">
              <h3 class="widget-user-username"><b><?php echo strtoupper($nama); ?></b></h3>
              <h5 class="widget-user-desc"><b> === <?php echo strtoupper($jabatan . ' ' . $kelas . ' ' . $par); ?> === </b></h5>
            </div>
            <div class="widget-user-image">

              <img class="img-circle elevation-2" src="<?php echo $gambar; ?>" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="card-body text-center">
                  <h6>
                    Selamat Datang <b><?php echo strtoupper($nama); ?></b>, anda adalah <b><?php echo strtoupper($jabatan . ' ' . $kelas . ' ' . $par); ?></b>.<br>
                    selamat menggunakan Aplikasi Database Online ini. Aplikasi ini membantu anda dalam managemen Data Sekolah. <br>
                    Kami menyadari masih ada beberapa kekurangan dalam aplikasi ini. namun kami akan terus berbenah untuk kedepannya agar
                    aplikasi ini agar menjadi lebih sempurna. <br><br>
                    Salam Satu Data Al Amien
                  </h6>
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>Laki-laki</p>
                  <h3><?php echo $data_L; ?></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klsmts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-info">
                <div class="inner">
                  <p>Perempuan</p>
                  <h3><?php echo $data_P; ?></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klsma" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-warning">
                <div class="inner">
                  <p>Validasi</p>
                  <h3><?php echo $data_m; ?></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klsma" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <p>Siswa Aktif</p>
                  <h3><?php echo $data_L + $data_P; ?></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klssmp" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>Siswa Non Aktif</p>
                  <h3><?php echo $data_J; ?></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klssmk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- <div class="container-fluid"> -->
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Update</h3>
            </div>
            <div class="card-body">
              <!-- The time line -->
              <div class="timeline">
                <!-- timeline item -->
                <?php foreach ($dbinfo as $row) : ?>
                  <div>
                    <i class="fas fa-bullhorn bg-yellow"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> <?php echo $row->tanggal; ?> ( <?php echo $row->waktu; ?> )</span>
                      <h3 class="timeline-header"><a href="#"><?php echo strtoupper($row->jabatan); ?> </a><small class="badge badge-info"> <?php echo $row->user; ?></small></h3>
                      <div class="timeline-body">
                        <?php echo $row->status; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
                <!-- END timeline item -->
                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
      
    </div>
    <!-- /.timeline -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php $this->load->view('user/modal_info'); ?>
<!-- =============================================================================================== -->
<?php

$this->load->view('theme/foot');
$this->load->view('theme/flink_ind12');
$this->load->view('theme/ft_alert');
?>
<script>
  $('#modalinfo').modal('show');
</script>
</body>

</html>