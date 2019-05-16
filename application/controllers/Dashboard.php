<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_data','Mod_kategori','Mod_klasifikasi'));
    }

    function index()
    {
        
        $data['akurasi']=$this->_akurasi();  
        $data['dataset'] = $this->Mod_data->total_dataset();
        $data['restore']=$this->Mod_kategori->total_temp();
        $this->template->load('layoutbackend', 'dashboard/dashboard_data',$data);
    }

    function _akurasi(){
        $sql_tagama="SELECT count(tagama) as total from prediksi where tagama=1 and keaktifan=1";
            $sql_fagama="SELECT count(fagama) as total from prediksi where fagama=1 and keaktifan=1";
            $sql_tsastra="SELECT count(tsastra) as total from prediksi where tsastra=1 and keaktifan=1";
            $sql_fsastra="SELECT count(fsastra) as total from prediksi where fsastra=1 and keaktifan=1";
            $sql_tumum="SELECT count(tumum) as total from prediksi where tumum=1 and keaktifan=1";
            $sql_fumum="SELECT count(fumum) as total from prediksi where fumum=1 and keaktifan=1";
            $sql_ttek="SELECT count(ttek) as total from prediksi where ttek=1 and keaktifan=1";
            $sql_ftek="SELECT count(ftek) as total from prediksi where ftek=1 and keaktifan=1";
            $sql_tmsain="SELECT count(tmsain) as total from prediksi where tmsain=1 and keaktifan=1";
            $sql_fmsain="SELECT count(fmsain) as total from prediksi where fmsain=1 and keaktifan=1";
            
            ///tagama
            $tagamaCount=$this->db->query($sql_tagama);
            $Counttagama=$tagamaCount->row_array();
            ///fagama
            $fagamaCount=$this->db->query($sql_fagama);
            $Countfagama=$fagamaCount->row_array();
            ///tsastra
            $tsastraCount=$this->db->query($sql_tsastra);
            $Counttsastra=$tsastraCount->row_array();
            ///fsastra
            $fsastraCount=$this->db->query($sql_fsastra);
            $Countfsastra=$fsastraCount->row_array();
            ///tumum
            $tumumCount=$this->db->query($sql_tumum);
            $Counttumum=$tumumCount->row_array();
            ///fumum
            $fumumCount=$this->db->query($sql_fumum);
            $Countfumum=$fumumCount->row_array();
            ///ttek
            $ttekCount=$this->db->query($sql_ttek);
            $Countttek=$ttekCount->row_array();
            ///ftek
            $ftekCount=$this->db->query($sql_ftek);
            $Countftek=$ftekCount->row_array();
            ///tmsain
            $tmsainCount=$this->db->query($sql_tmsain);
            $Counttmsain=$tmsainCount->row_array();
            ///fmsain
            $fmsainCount=$this->db->query($sql_fmsain);
            $Countfmsain=$fmsainCount->row_array();
            ///
            $hasil_tagama=$Counttagama['total'];
            $hasil_fagama=$Countfagama['total'];
            $hasil_tsastra=$Counttsastra['total'];
            $hasil_fsastra=$Countfsastra['total'];
            $hasil_tumum=$Counttumum['total'];
            $hasil_fumum=$Countfumum['total'];
            $hasil_ttek=$Countttek['total'];
            $hasil_ftek=$Countftek['total'];
            $hasil_tmsain=$Counttmsain['total'];
            $hasil_fmsain=$Countfmsain['total'];

            if($hasil_tagama==0&&$hasil_tsastra==0&&$hasil_tumum==0&&$hasil_ttek==0&&$hasil_tmsain==0){
                return "0"."%";
            }
            else{
                ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            
            return number_format($akurasi,2)."%";
            }
            

    }
        
    


}
/* End of file Controllername.php */
 