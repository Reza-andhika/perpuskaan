<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kategori extends CI_Model {

    function getKategori()
    {
        return $this->db->get('kategori');
    }

    function getAll()
    {
        $this->db->order_by('kategori.id desc');
        return $this->db->get('kategori');
    }

    function getAll_temp()
    {
        $this->db->order_by('temp.id asc');
        return $this->db->get('temp');
    }

    function total_temp(){
    
        return $this->db->count_all_results('temp');
    
    }

    function insert_kategori($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cek_kategori($kode)
    {
        $this->db->where("kategori", $kode);
        return $this->db->get("kategori");
    }

    function delete_kategori($kategori){
        $this->db->where('kategori',$kategori);
        $this->db->delete("kategori");
    }

    function hapus_kategori($data){
        $insert = $this->db->insert("temp", $data);
        return $insert;
    }

    function hapus_temp($kategori){
        $this->db->where('kategori',$kategori);
        $this->db->delete("temp");
    }

    function update_list($kategori,$data){
        $this->db->where('kategori',$kategori);
        $this->db->update("list",$data);        
    }

    function update_stem($kategori,$data){
        $this->db->where('kategori',$kategori);
        $this->db->update("stem",$data);
    }

    function update_kategori($kategori,$data){
        $this->db->where('kategori',$kategori);
        $this->db->update("kategori",$data);
    }

    function update_list_prediksi($kategori,$data){
        $this->db->where('kategori',$kategori);
        $this->db->update("list_prediksi",$data);
    }

    function update_klasifikasi($kategori,$data){
        $this->db->where('kategori',$kategori);
        $this->db->update("klasifikasi",$data);
    }

    function update_prediksi($kategori,$data){
        $this->db->where('kategori',$kategori);
        $this->db->update("prediksi",$data);
    }

}
?>