<?php
defined('BASEPATH') OR exit('Akses langsung tidak diizinkan.');

class Gambar_model extends CI_Model
{
    private $table = 'gambar';

    public function __construct()
    {
        parent::__construct();
        $this->create_table_if_needed();
    }

    public function all()
    {
        return $this->db->order_by('created_at', 'DESC')->get($this->table)->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => (int) $id))->row();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->where('id', (int) $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', (int) $id)->delete($this->table);
    }

    private function create_table_if_needed()
    {
        $this->db->query("CREATE TABLE IF NOT EXISTS gambar (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            judul VARCHAR(150) NOT NULL,
            deskripsi TEXT NULL,
            file_gambar VARCHAR(255) NOT NULL,
            created_at DATETIME NULL,
            updated_at DATETIME NULL
        )");
    }
}
