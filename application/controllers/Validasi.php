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

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function data($par, $id)
    {
        $cari['data']         = $this->m_ppdb->view_cek($par, $id);
        $cari['form']       = 'bukti';
        $cari['content']    = 'border';

        $this->load->view('cekdata', $cari);
    }
}
