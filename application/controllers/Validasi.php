<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Validasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_ppdb");
        date_default_timezone_set("ASIA/JAKARTA");
        $this->load->helper(array('form', 'url', 'tgl_indo'));
    }

    // public function index()
    // {
    //     $par = $this->uri->segment(2);
    //     $id = $this->uri->segment(3);

    //     $data['cari']         = $this->m_ppdb->view_cek($par, $id);
    //     // $data['content']      = 'admin/edit';

    //     $this->load->view('cekdata', $data);
    // }

    public function data($par, $id)
    {
        $data['cari']         = $this->m_ppdb->view_cek($par, $id);
        $data['form']       = 'bukti';
        $data['content']    = 'border';

        $this->load->view('cekdata', $data);
    }
}
