<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelBuku extends CI_Model
{
    //menejemen buku
    public function getBuku()
    {
        return $this->db->get('buku');
    }
    
    public function bukuWhere($where)
    {
        return $this->db->get_where('buku', $where);
    }

    public function simpanBuku($data = null)
    {
        $this->db->insert('buku', $data);
    }

    public function updateBuku($data = null, $where = null)
    {
        $this->db->update('buku', $data, $where);
    }

    public function hapusBuku($where = null)
    {
        $this->db->delete('buku', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->from('buku');
        return $this->db->get()->row($field);
    }
    //menejemen kategori
    public function getKategori()
    {
        return $this->db->get('ketgori');
    }

    public function ketgoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }

    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori', $where);
    }

    public function updatKategoriBuku($where)
    {
        $this->db->select('buku.id_kategori, ketegori.kategori');
        $this->db->from('buku');
        $this->db->join('kategoru', 'kategori.id buku.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }
}