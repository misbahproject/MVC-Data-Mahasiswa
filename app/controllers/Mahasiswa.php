<?php 

class Mahasiswa extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            Flasher::setFlasher('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit; 
        } else {
            Flasher::setFlasher('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit; 
        }
    } 

    
    public function hapus($id) {
        if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
            Flasher::Flash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit; 
        } else {
            Flasher::Flash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit; 
        }
    }

    public function getedit() {
        json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function edit() {
        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            Flasher::Flash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit; 
        } else {
            Flasher::Flash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit; 
        }
    } 

    public function cari() {
        // $data['judul'] = 'Daftar Mahasiswa';
        // $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        // $this->view('templates/header', $data);
        // $this->view('mahasiswa/index', $data);
        // $this->view('templates/footer');
        $keyword = $_POST['keyword'];

        $result = $this->model('Mahasiswa_model')->cariDataMahasiswa($keyword);
        print_r($result);

    }
}