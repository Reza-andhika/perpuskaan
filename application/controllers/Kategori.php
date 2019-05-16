<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

/**
* 
*/
class Kategori extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kategori');
    }

    public function all_temp()
    {
        $data['list']=$this->Mod_kategori->getAll_temp()->result();
        $this->template->load('layoutbackend','laporan/restore',$data);
    }

    public function index()
    {
        $data['kategori']=$this->Mod_kategori->getall()->result();

        if($this->uri->segment(3)=="create-success"){
            $data['message']="<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'kategori/kategori_input', $data); ///nanti diganti kategori/kategori_data
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message']="<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>";    
            $this->template->load('layoutbackend', 'kategori/kategori_input', $data); ///nanti diganti kategori/kategori_data
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message']="<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Hapus...!</p></div>";    
            $this->template->load('layoutbackend', 'kategori/kategori_input', $data); ///nanti diganti kategori/kategori_data
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'kategori/kategori_input', $data);
    }
}
    public function insert(){
        if(isset($_POST['save'])){
           
            $this->_set_rules();
             
            if($this->form_validation->run()==true){

                $kategori = $this->input->post('kategori');
                $cek=$this->Mod_kategori->cek_kategori($kategori);
                if($cek->num_rows()>0){
                $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>KATEGORI</strong> Sudah Di Inputkan...!</p></div>"; 
                    $data['kategori']= $this->Mod_kategori->getall()->result();
                    $this->template->load('layoutbackend', 'kategori/kategori_input', $data); 
                }
                else{
                    $save = array('kategori' => $this->input->post('kategori'),
                                  'keaktifan' => 1 );
                    $this->Mod_kategori->insert_kategori("kategori",$save);
                    redirect('kategori/index/create-success');
                }
            }
            else{
            $data['message']="";
            $data['kategori']= $this->Mod_kategori->getall()->result();
            $this->template->load('layoutbackend', 'kategori/kategori_input', $data);
            }
        }

    }

    public function delete(){
        $kategori = $this->input->post('kode');

        $data_temp = array('kategori' =>$kategori ,
                    'keaktifan' => 1 );

        $this->Mod_kategori->hapus_kategori($data_temp);
        $data = array('kategori' =>$kategori ,
                    'keaktifan' => 0 );
        $this->Mod_kategori->update_list($kategori,$data);
        $this->Mod_kategori->update_stem($kategori,$data);
        ///$this->Mod_kategori->update_kategori($kategori,$data);
        $this->Mod_kategori->update_list_prediksi($kategori,$data);
        $this->Mod_kategori->update_klasifikasi($kategori,$data);
        $this->Mod_kategori->update_prediksi($kategori,$data);
        // echo "berhasil"; die();
        $this->Mod_kategori->delete_kategori($kategori);
        redirect('kategori/index/delete-success');
    }

    public function restore(){
        $kategori = $this->input->post('kategori');

        $this->Mod_kategori->hapus_temp($kategori);
        $data = array('kategori' =>$kategori ,
                    'keaktifan' => 1 );
        $this->Mod_kategori->update_list($kategori,$data);
        $this->Mod_kategori->update_stem($kategori,$data);
        ///$this->Mod_kategori->update_kategori($kategori,$data);
        $this->Mod_kategori->update_list_prediksi($kategori,$data);
        $this->Mod_kategori->update_klasifikasi($kategori,$data);
        $this->Mod_kategori->update_prediksi($kategori,$data);
        // echo "berhasil"; die();
        $this->Mod_kategori->insert_kategori("kategori",$data);

        if($this->uri->segment(3)=="create-success"){
            $data['message']="<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'kategori/kategori_input', $data); ///nanti diganti kategori/kategori_data
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'kategori/kategori_input', $data);
        }

    }

    public function _set_rules()
    {
        $this->form_validation->set_rules('kategori','Kategori','required|max_length[50]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }
}
?>