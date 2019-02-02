<?php
/**
 * Created by PhpStorm.
 * User: kudaliar
 * Date: 11/6/18
 * Time: 7:43 PM
 * @property Indonesia_model $indonesia_model
 * @property Registrasi_model $registrasi_model
 * @property Admin_model $admin_model
 */
class Registrasi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->model('registrasi_model');
        $this->load->model('indonesia_model');
        $this->load->model('admin_model');
    }

    function index() {
        if (isset($_SESSION['nik'])) {
            redirect('admin');
        } else {
            $this->load->view('registrasi/index');
        }
    }

    function index_post() {
        $nik = $this->input->post('nik');
        $email = $this->input->post('email');

        // configurasi email
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'userkopol001@gmail.com',
            'smtp_pass' => 'sikaku123',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");


        $password = random_string('alpha', 4);

        $pesan = "NIK: ".$nik."<br/>Password: ".$password;

        $this->email->from('userkopol001@gmail.com', 'SIKAKU');
        $this->email->to($email);
        $this->email->subject('PASSWORD LOGIN SIKAKU');
        $this->email->message($pesan);

        $send = $this->email->send();

        if ($send) {
            $this->registrasi_model->registrasiBaru($nik, $email, $password);
            redirect('login');
        } else {
            $this->session->set_flashdata('registrasi_gagal', true);
            redirect('registrasi');
        }
    }

    function data_kartu_keluarga() {
        if (!isset($_SESSION['user_id'])) {
            redirect('registrasi');
        }

        if ($this->registrasi_model->cekDataKaKa($this->session->userdata('user_id'))) {
            redirect('admin');
        }

        $data['data_provinsi'] = $this->indonesia_model->getProvinsi();

        $this->load->view('registrasi/data_kartu_keluarga', $data);
    }

    function send_kartu_keluarga() {
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $rt = sprintf("%03s", $this->input->post('rt'));
        $rw = sprintf("%03s", $this->input->post('rw'));

        $nama_kota = $this->indonesia_model->getName($provinsi, $kabupaten, $kecamatan, $kelurahan);

        $tanggal_data = date('dmy');

        $nkk = $provinsi.$kabupaten.$kecamatan.$tanggal_data;

        $no_seri_kk = $this->registrasi_model->noSeriKaKa($nkk);

        $data_form = array(
            'user_id' => $this->session->userdata('user_id'),
            'no_kk' => $nkk.$no_seri_kk,
            'alamat' => strtoupper($this->input->post('alamat')),
            'rt_rw' => $rt.'/'.$rw,
            'kelurahan' => $nama_kota['kel'],
            'kecamatan' => $nama_kota['kec'],
            'kabupaten' => $nama_kota['kab'],
            'kode_pos' => $this->input->post('kodepos'),
            'provinsi' => $nama_kota['prov'],
            'cetak' => 0
        );

        if ($this->registrasi_model->kirimKaruKeluarga($data_form)) {
            redirect('admin');
        } else {
            redirect('registrasi/data_kartu_keluarga');
        }
    }

    function data_kepala_keluarga() {
        if (!isset($_SESSION['user_id'])) {
            redirect('registrasi');
        }

        if ($this->admin_model->cekDataKeluarga($this->session->userdata('nkk')) > 0) {
            redirect('admin');
        } else {
            $this->load->view('registrasi/data_kepala_keluarga');
        }
    }

    function send_kepala_keluarga() {
        $data_send = array(
            'nik' => $this->session->userdata('nik'),
            'no_kk' => $this->session->userdata('nkk'),
            'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => strtoupper($this->input->post('tempat_lahir')),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'agama' => strtoupper($this->input->post('agama')),
            'pendidikan' => $this->input->post('pendidikan'),
            'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
            'status_perkawinan' => $this->input->post('status_perkawinan'),
            'hubungan_keluarga' => "KEPALA KELUARGA",
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            'no_paspor' => $this->input->post('no_paspor'),
            'no_kitap' => $this->input->post('no_kitap'),
            'nama_ayah' => strtoupper($this->input->post('nama_ayah')),
            'nama_ibu' => strtoupper($this->input->post('nama_ibu'))
        );

        if ($this->registrasi_model->kirimKepalaKeluarga($data_send)) {
            redirect('admin');
        } else {
            redirect('registrasi/data_kepala_keluarga');
        }
    }

    function upload_berkas() {
        if (!isset($_SESSION['user_id'])) {
            redirect('registrasi');
        }

        if (!$this->admin_model->cekDataKeluarga($this->session->userdata('nkk')) > 0) {
            redirect('admin');
        }

        if ($this->admin_model->cekBerkas($this->session->userdata('nkk')) > 0) {
            redirect('admin');
        } else {
            $this->load->view('registrasi/upload_berkas');
        }
    }

    function send_berkas() {
        $config['upload_path'] = './files/pengantar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $uploaded = array();
        if ($this->upload->do_upload('ktp')) {
            $up = $this->upload->data();
            $uploaded['ktp'] = $up['file_name'];
        } else {
            echo $this->upload->display_errors('<p>', '</p>');
        }

        if ($this->upload->do_upload('pengantar_rtrw')) {
            $up = $this->upload->data();
            $uploaded['pengantar_rtrw'] = $up['file_name'];
        } else {
            echo $this->upload->display_errors('<p>', '</p>');
        }

        if ($this->upload->do_upload('pengantar_kelurahan')) {
            $up = $this->upload->data();
            $uploaded['pengantar_kelurahan'] = $up['file_name'];
        } else {
            echo $this->upload->display_errors('<p>', '</p>');
        }

        $data_form = array(
            'no_kk' => $this->session->userdata('nkk'),
            'ktp' => $uploaded['ktp'],
            'pengantar_rtrw' => $uploaded['pengantar_rtrw'],
            'pengantar_kelurahan' => $uploaded['pengantar_kelurahan'],
            'verifikasi' => 'T'
        );

        if ($this->registrasi_model->uploadBerkas($data_form)) {
            redirect('admin');
        } else {
            redirect('registrasi/upload_berkas');
        }
    }
}