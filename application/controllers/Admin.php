<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("ASIA/JAKARTA");
        $this->load->helper(array('form', 'url', 'tgl_indo'));
        if ($this->session->userdata('jabatan') != "admin") {
            redirect('auth/admin');
        }
    }

    public function index()
    {
        $data['dbinfo'] = $this->m_ppdb->getinfo();
        // $data['dbuser'] = $this->m_ppdb->getuserdas();
        $data['content'] = 'admin/dasboard';

        $this->load->view('admin/templating', $data);
    }

    public function jumlah()
    {
        // $data['dbklsmts'] = $this->m_ppdb->getkls_mts();
        // $data['dbklsma'] = $this->admin_model->getkls_ma();
        // $data['dbklssmp'] = $this->admin_model->getkls_smp();
        // $data['dbklssmk'] = $this->admin_model->getkls_smk();
        $data['content'] = 'admin/jumlah';

        $this->load->view('admin/templating', $data);
    }

    public function logout()
    {
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Log Out',text: 'Anda telah metu'}");
        redirect('auth/admin');
        $this->session->sess_destroy();
    }

    // ========================== Get Siswa ==========================
    public function data($par)
    {
        $tabel              = 'db_' . $par;
        $data['tabel_cek']  = $par;
        $data['cari']       = $this->m_ppdb->getdata($tabel);
        $data['content']    = 'admin/dataview';

        $this->load->view('admin/templating', $data);
    }
    // ========================== Get RESIDU Siswa ==========================
    public function residu($par)
    {
        $tabel              = 'db_' . $par;
        $data['tabel_cek']  = $par;
        $data['cari']       = $this->m_ppdb->getresidu($tabel);
        $data['content']    = 'admin/residuview';

        $this->load->view('admin/templating', $data);
    }
    // ========================== Get NON AKTIF Siswa ==========================
    public function nonaktif($par)
    {
        $tabel              = 'db_' . $par;
        $data['tabel_cek']  = $par;
        $data['cari']       = $this->m_ppdb->getnonaktif($tabel);
        $data['content']    = 'admin/nonaktifview';

        $this->load->view('admin/templating', $data);
    }

    // ========================== View Siswa ==========================
    public function form()
    {
        $pilih                = 'db_setting';
        $id                   = 1;
        $data['cari']         = $this->db->get_where($pilih, ["id" => $id])->row();
        $data['content']    = 'admin/form-add';

        $this->load->view('admin/templating', $data);
    }

    public function view()
    {
        $data['cari']         = $this->m_ppdb->view_peserta();
        $data['content']    = 'admin/view';

        $this->load->view('admin/templating', $data);
    }

    // ========================== Tambah Siswa Baru dari Panitia ==========================
    public function save_pan($par)
    {
        // $par 	= $this->session->userdata('par');
        $dbcek    = 'db_' . $par;
        $dariDB = $this->m_ppdb->get_kode($dbcek);
        $urut     = (int)substr($dariDB, 11, 3);
        $nikqr  = md5($this->input->post('nik'));
        $this->m_ppdb->qrcode($nikqr, $par);

        if ($par == "MTS") {
            $nus = "538";
        } elseif ($par == "MA") {
            $nus = "510";
        } elseif ($par == "SMP") {
            $nus = "209";
        } else {
            $nus = "265";
        }

        //Fungsi db_mts
        date_default_timezone_set("ASIA/JAKARTA");
        $data                 = $this->input->post();
        $data['id_enc']        = md5($this->input->post('nik'));
        $data['No_Reg']        = $nus . "-" . date("ymd") . "-" . sprintf('%03d', $urut + 1);
        $data['progres']     = date("Y-m-d H:i:s");
        $data['editor']        = $this->session->userdata('nama');
        $data['jalur']         = $this->m_ppdb->getset();
        $data['status']     = 'RESIDU';

        $this->db->insert('db_' . $par, $data);

        //Fungsi db_user_pengguna
        $data2['nik']        = $this->input->post('nik');
        $data2['nama']        = $this->input->post('nama');
        $data2['email']        = $this->input->post('email');
        $data2['telp']        = $this->input->post('telp');
        $data2['par']        = strtoupper($par);
        $data2['status']    = 'NON AKTIF';
        $data2['jabatan']    = 'USER';
        $data2['echo']        = '1';
        $data2['last']        = date("Y-m-d H:i:s");
        $this->db->insert('db_user_pendaftar', $data2);

        //==============================================================================

        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Data residu berhasil ditambahkan'}");
        redirect('admin/data/' . $par, 'refresh');
    }

    // ========================== edit Siswa ==========================
    public function edit()
    {
        $data['cari']         = $this->m_ppdb->view_peserta();
        $data['content']      = 'admin/edit';

        $this->load->view('admin/templating', $data);
    }

    public function editsave($par, $id)
    {
        $pilih                  = 'db_' . $par;
        $data                   = $this->input->post();
        $data['editor']         = $this->session->userdata('nama');
        $data['progres']        = date("Y-m-d H:i:s");
        $nikqr                  = md5($this->input->post('nik'));
        $this->m_ppdb->qrcode($nikqr, $par);

        $uricek = $this->uri->segment(2);
        $this->m_ppdb->updatedata($data, $id, $pilih);
        $kirim  =   'Data ' . $this->input->post('nama') . ' berhasil di edit';
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: '$kirim'}");
        // redirect('admin/'.$uricek.'/'.$par, 'refresh');
        redirect('admin/data/' . $par, 'refresh');
    }

    public function delete($par, $id)
    {
        $tabel  = 'db_' . $par;
        $this->m_ppdb->del_pd($tabel, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/data/' . $par, 'refresh');
    }

    // ========================== cetak bukti ==========================
    public function bukti()
    {
        $data['data']       = $this->m_ppdb->view_peserta();
        $data['form']       = 'bukti';
        $data['content']    = 'border';

        $this->load->view('admin/templating', $data);
    }

    // ========================== User admin ==========================
    public function user_admin()
    {
        $data['dbuser'] = $this->m_ppdb->getuser();
        $data['content'] = 'admin/data_admin';

        $this->load->view('admin/templating', $data);
    }

    public function adduser()
    {
        $dariDB                   = $this->m_ppdb->get_kodepan();
        $data                     = $this->input->post();
        $data['codex']            = md5($dariDB + 1);
        $data['status']           = '1';
        $data['last']             = date("Y-m-d H:i:s");

        $this->m_ppdb->adduser($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
        redirect('admin/user_admin', 'refresh');
    }

    public function edituser()
    {
        $id                     = $this->input->post('id');
        $data                   = $this->input->post();
        $data['last']           = date("Y-m-d H:i:s");

        $this->m_ppdb->updateuser($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/user_admin', 'refresh');
    }

    public function deluser($id)
    {
        $this->m_ppdb->deluser($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/user_admin', 'refresh');
    }

    // ========================== User Peserta ==========================
    public function user_peserta()
    {
        $data['dbuser_pes'] = $this->m_ppdb->getuser_pes();
        $data['content'] = 'admin/data_peserta';

        $this->load->view('admin/templating', $data);
    }

    public function adduser_pes()
    {
        $ceknik     = $this->input->post('nik');
        $jmlnik     = $this->db->get_where('db_user_pendaftar', array("nik" => $ceknik))->num_rows();

        if ($jmlnik != 0) {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Simpan Gagal',text: 'Data sudah terdaftar sebelumnya'}");
            redirect('admin/user_peserta', 'refresh');
        } else {
            $data                     = $this->input->post();
            $data['jabatan']         = 'user';
            $data['status']         = 'AKTIF';
            $data['echo']             = '0';
            $data['last']             = date("Y-m-d H:i:s");

            $this->m_ppdb->adduser_pes($data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
            redirect('admin/user_peserta', 'refresh');
        }
    }

    public function edituser_pes()
    {
        $data                     = $this->input->post();
        $id                     = $this->input->post('id');
        $data['jabatan']         = 'user';
        $data['last']             = date("Y-m-d H:i:s");

        $this->m_ppdb->updateuserpes($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/user_peserta', 'refresh');
    }

    public function deluser_pes($id)
    {
        $this->m_ppdb->deluser_pes($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/user_peserta', 'refresh');
    }

    // =============================== SETTING =======================================

    public function setting()
    {
        $pilih                = 'db_setting';
        $id                   = 1;
        $data['cari']         = $this->db->get_where($pilih, ["id" => $id])->row();
        $data['content']      = 'admin/setting';

        $this->load->view('admin/templating', $data);
    }

    public function updatesetting()
    {
        $id                        = 1;
        $data['jalur']             = $this->input->post('jalur');
        $this->m_ppdb->updateset($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah',text: 'Berhasil disimpan',}");
        redirect('admin/setting', 'refresh');
    }

    // =============================== sekolah asal SD / MI =======================================

    public function sdmi()
    {
        $data['dbsdmi'] = $this->m_ppdb->getsdmi();
        $data['content']      = 'admin/sdmi';

        $this->load->view('admin/templating', $data);
    }

    public function addsdmi()
    {
        $data                     = $this->input->post();
        $this->m_ppdb->addsdmi($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
        redirect('admin/sdmi', 'refresh');
    }

    public function editsdmi()
    {
        $id                     = $this->input->post('id');
        $data                   = $this->input->post();

        $this->m_ppdb->updatesdmi($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/sdmi', 'refresh');
    }

    public function delsdmi($id)
    {
        $this->m_ppdb->delsdmi($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/sdmi', 'refresh');
    }

    // =============================== sekolah asal SMP / MTs =======================================
    public function smpmts()
    {
        $data['dbsmpmts'] = $this->m_ppdb->getsmpmts();
        $data['content']      = 'admin/smpmts';

        $this->load->view('admin/templating', $data);
    }

    public function addsmpmts()
    {
        $data                     = $this->input->post();
        $this->m_ppdb->addsmpmts($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Tambah data berhasil'}");
        redirect('admin/smpmts', 'refresh');
    }

    public function editsmpmts()
    {
        $id                     = $this->input->post('id');
        $data                   = $this->input->post();

        $this->m_ppdb->updatesdmi($data, $id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Alhamdulillah!',text: 'Edit data berhasil'}");
        redirect('admin/smpmts', 'refresh');
    }

    public function delsmpmts($id)
    {
        $this->m_ppdb->delsmpmts($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Data telah di hapus'}");
        redirect('admin/smpmts', 'refresh');
    }

    // =============================== Download =======================================
    public function download()
    {
        $data['content']      = 'admin/download';

        $this->load->view('admin/templating', $data);
    }

    // =============================== Upload =======================================
    public function uploadsdmi()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 4; $row <= $highestRow; $row++) {

                    $npsn = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $lembaga = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                    $data[] = array(
                        'npsn'          => $npsn,
                        'lembaga'          => $lembaga,
                        'alamat'          => $alamat,
                    );
                }
            }

            $this->db->insert_batch('db_sdmi', $data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Berhasil',text: 'Data Berhasil Di Upload'}");
            redirect('admin/sdmi');
        } else {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Gagal',text: 'Upload Gagal'}");
            redirect('admin/sdmi');
        }
    }
    public function uploadsmpmts()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 4; $row <= $highestRow; $row++) {

                    $npsn = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $lembaga = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                    $data[] = array(
                        'npsn'          => $npsn,
                        'lembaga'          => $lembaga,
                        'alamat'          => $alamat,
                    );
                }
            }

            $this->db->insert_batch('db_smpmts', $data);
            $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Berhasil',text: 'Data Berhasil Di Upload'}");
            redirect('admin/smpmts');
        } else {
            $this->session->set_flashdata('pesan', "{icon: 'error', title: 'Gagal',text: 'Upload Gagal'}");
            redirect('admin/smpmts');
        }
    }
    // =============================== Info =======================================
    public function saveinfo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']     = date("Y/m/d");
        $data['waktu']         = date("h:i:s");
        $data['user']         = $this->input->post('user');
        $data['jabatan']     = $this->input->post('jabatan');
        $data['status']     = $this->input->post('status');

        $this->m_ppdb->savinfo($data);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Berhasil',text: 'Info Berhasil Di Tambahkan'}");
        redirect('admin');
    }

    function del_info($id)
    {
        $this->m_ppdb->delinfo($id);
        $this->session->set_flashdata('pesan', "{icon: 'success', title: 'Hapus',text: 'Info telah di hapus'}");
        redirect('admin');
    }
}

/* End of file Admin.php */
