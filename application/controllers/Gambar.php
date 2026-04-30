<?php
defined('BASEPATH') OR exit('Akses langsung tidak diizinkan.');

class Gambar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gambar_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Data Gambar';
        $data['gambar'] = $this->Gambar_model->all();
        $this->load->view('templates/header', $data);
        $this->load->view('gambar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Gambar';
        $this->load->view('templates/header', $data);
        $this->load->view('gambar/form', array('action' => site_url('gambar/simpan'), 'item' => NULL));
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $upload = $this->upload_gambar(TRUE);
        if ($upload['error']) {
            $this->session->set_flashdata('error', $upload['message']);
            redirect('gambar/tambah');
        }

        $this->Gambar_model->insert(array(
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'file_gambar' => $upload['file_name']
        ));

        $this->session->set_flashdata('success', 'Gambar berhasil ditambahkan.');
        redirect('gambar');
    }

    public function detail($id)
    {
        $item = $this->find_item($id);
        $data['title'] = $item->judul;
        $data['item'] = $item;
        $this->load->view('templates/header', $data);
        $this->load->view('gambar/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Gambar';
        $data['item'] = $this->find_item($id);
        $data['action'] = site_url('gambar/update/' . $id);
        $this->load->view('templates/header', $data);
        $this->load->view('gambar/form', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $item = $this->find_item($id);
        $data = array(
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE)
        );

        $upload = $this->upload_gambar(FALSE);
        if ($upload['error'] && $upload['message'] !== 'no_file') {
            $this->session->set_flashdata('error', $upload['message']);
            redirect('gambar/edit/' . $id);
        }

        if (!$upload['error']) {
            $this->hapus_file($item->file_gambar);
            $data['file_gambar'] = $upload['file_name'];
        }

        $this->Gambar_model->update($id, $data);
        $this->session->set_flashdata('success', 'Gambar berhasil diperbarui.');
        redirect('gambar');
    }

    public function hapus($id)
    {
        $item = $this->find_item($id);
        $this->Gambar_model->delete($id);
        $this->hapus_file($item->file_gambar);
        $this->session->set_flashdata('success', 'Gambar berhasil dihapus.');
        redirect('gambar');
    }

    private function find_item($id)
    {
        $item = $this->Gambar_model->find($id);
        if (!$item) {
            show_404();
        }
        return $item;
    }

    private function upload_gambar($required)
    {
        if (empty($_FILES['file_gambar']['name'])) {
            return array('error' => TRUE, 'message' => $required ? 'Pilih file gambar terlebih dahulu.' : 'no_file');
        }

        $config = array(
            'upload_path' => FCPATH . 'uploads/gambar/',
            'allowed_types' => 'jpg|jpeg|png|gif|webp',
            'max_size' => 2048,
            'encrypt_name' => TRUE
        );

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file_gambar')) {
            return array('error' => TRUE, 'message' => strip_tags($this->upload->display_errors('', '')));
        }

        return array('error' => FALSE, 'file_name' => $this->upload->data('file_name'));
    }

    private function hapus_file($file_name)
    {
        $path = FCPATH . 'uploads/gambar/' . $file_name;
        if ($file_name && is_file($path)) {
            unlink($path);
        }
    }
}
