<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
class Klasifikasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_klasifikasi');
    }

    public function index()
    {
        $data['kategori']=$this->Mod_klasifikasi->getAll_kat()->result();
        
        
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_index', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_index', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_index', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_index', $data);
        }
        
    }

public function klasifikasi()
    {
        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer  = $stemmerFactory->createStemmer();

        $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopWord = $stopwordFactory->createStopWordRemover();

        if (isset($_POST['klasifikasi'])) {

            $this->_set_rules();
            if ($this->form_validation->run()==true) {
                $judul=$this->input->post('judul');
                $sinopsis=$this->input->post('sinopsis');
                $prediksi=$this->input->post('kategori');
                $fakta=$this->input->post('kategori-harap');
/*
                $cek_judul=$this->Mod_klasifikasi->cek_judul($judul);
                if($cek_judul->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Judul Buku</strong> Sudah Diklasifikasikan!</p></div>"; 
                    $data['kategori']=$this->Mod_klasifikasi->getAll_kat()->result();
                    $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_index', $data); 
                }
                */
            
            $remover=$stopWord->remove($judul." ".$sinopsis);
            $output=$stemmer->stem($remover);

            $separate=explode(" ", $output);

            ////
        $count_agama="SELECT count(*) as total FROM list WHERE kategori='agama' AND keaktifan='1'";
        $count_prediksi_agama="SELECT count(*) as total2 FROM list_prediksi WHERE kategori='agama' AND keaktifan='1'";
        //
        $agamaCount=$this->db->query($count_agama);
        $countAgama = $agamaCount->row_array();
        $pars_agm=$countAgama['total'];
        //
        $agamaCount2=$this->db->query($count_prediksi_agama);
        $countAgama2 = $agamaCount2->row_array();
        $pars_agm2=$countAgama2['total2'];
        //
        $hasilAgama=$pars_agm+$pars_agm2;

        /////
        $count_sastra="SELECT count(*) as total FROM list WHERE kategori='sastra' AND keaktifan='1'";
        $count_prediksi_sastra="SELECT count(*) as total2 FROM list_prediksi WHERE kategori='sastra' AND keaktifan='1'";
        //
        $sastraCount=$this->db->query($count_sastra);
        $countSastra = $sastraCount->row_array();
        $pars_sastra= $countSastra['total'];
        //
        $sastraCount2=$this->db->query($count_prediksi_sastra);
        $countSastra2 = $sastraCount2->row_array();
        $pars_sastra2=$countSastra2['total2'];
        //
        $hasilSastra=$pars_sastra+$pars_sastra2;

        /////
        $count_umum="SELECT count(*) as total FROM list WHERE kategori='umum' AND keaktifan='1'";
        $count_prediksi_umum="SELECT count(*) as total2 FROM list_prediksi WHERE kategori='umum' AND keaktifan='1'";
        //
        $umumCount=$this->db->query($count_umum);
        $countUmum = $umumCount->row_array();
        $pars_umum = $countUmum['total'];
        //
        $umumCount2=$this->db->query($count_prediksi_umum);
        $countUmum2 = $umumCount2->row_array();
        $pars_umum2 = $countUmum2['total2'];
        //
        $hasilUmum=$pars_umum+$pars_umum2;

        /////
        $count_tek="SELECT count(*) as total FROM list WHERE kategori='teknologi' AND keaktifan='1'";
        $count_prediksi_tek="SELECT count(*) as total2 FROM list_prediksi WHERE kategori='teknologi' AND keaktifan='1'";
        //
        $tekCount=$this->db->query($count_tek);
        $countTek = $tekCount->row_array();
        $pars_tek = $countTek['total'];
        //
        $tekCount2=$this->db->query($count_prediksi_tek);
        $counttek2 = $tekCount2->row_array();
        $pars_tek2 = $counttek2['total2'];
        //
        $hasiltek=$pars_tek+$pars_tek2;

        /////
        $count_Msain="SELECT count(*) as total FROM list WHERE kategori='matematika dan sains' AND keaktifan='1'";
        $count_prediksi_Msain="SELECT count(*) as total2 FROM list_prediksi WHERE kategori='matematika dan sains' AND keaktifan='1'";
        //
        $MsainCount=$this->db->query($count_Msain);
        $countMsain = $MsainCount->row_array();
        $pars_Msain = $countMsain['total'];
        //
        $MsainCount2=$this->db->query($count_prediksi_Msain);
        $countMsain2 = $MsainCount2->row_array();
        $pars_Msain2 = $countMsain2['total2'];
        //
        $hasilMsain=$pars_Msain+$pars_Msain2;

        ///
        $count_total="SELECT count(*) as total FROM list where keaktifan='1'";
        $count_prediksi_total="SELECT count(*) as total2 FROM list_prediksi where keaktifan='1'";
        //
        $totalCount=$this->db->query($count_total);
        $countTotal = $totalCount->row_array();
        $pars_total = $countTotal['total'];
        //
        $totalCount2=$this->db->query($count_prediksi_total);
        $countTotal2 = $totalCount2->row_array();
        $pars_total2 = $countTotal2['total2'];
        //
        $hasilTotal=$pars_total+$pars_total2;

        ///p(agama)
        $pAgama=$hasilAgama/$hasilTotal;
        ///p(sastra)
        $pSastra=$hasilSastra/$hasilTotal;
        ///p(umum)
        $pUmum=$hasilUmum/$hasilTotal;
        ///p(teknologi)
        $pTek=$hasiltek/$hasilTotal;
        ///p(Mtk dan Sains)
        $pMsain=$hasilMsain/$hasilTotal;

        $sql="SELECT SUM(count) as total FROM stem where keaktifan='1'";
        $sql_klasifikasi="SELECT SUM(count) as total_klasifikasi from klasifikasi where keaktifan='1'";
        ///stem
        $totalstem=$this->db->query($sql);
        $countstem = $totalstem->row_array();
        ///klasifikasi
        $total_stem_kl=$this->db->query($sql_klasifikasi);
        $count_klasifikasi=$total_stem_kl->row_array();
        ///
        $hasilstem_stem=$countstem['total'];
        $hasilstem_kl=$count_klasifikasi['total_klasifikasi'];

        $hasilstem=$hasilstem_stem+$hasilstem_kl;

        $bodyAgama=$pAgama;
        foreach ($separate as $value) {
            $sql = "SELECT count as total FROM stem where stem='$value' and kategori='agama' and keaktifan=1"; 
            $sql_kl = "SELECT count as total_kl from klasifikasi where stem='$value' and kategori='agama' and keaktifan=1";
            ///
            $sql_stem = "SELECT count(*) as total FROM stem where kategori='sastra' and keaktifan=1"; 
            $sql_klas = "SELECT count(*) as total_kl from klasifikasi where kategori='sastra' and keaktifan=1";
            ///
            $wordCount=$this->db->query($sql);
            $Countword=$wordCount->row_array();
            ///
            $word_kl=$this->db->query($sql_kl);
            $count_kl=$word_kl->row_array();
            ///
            $total_stem=$this->db->query($sql_stem);
            $count_st=$total_stem->row_array();
            ///
            $total_klas=$this->db->query($sql_klas);
            $count_klas=$total_klas->row_array();
            ///
            $hasil_kl=$count_kl['total_kl'];
            $hasil_st=$Countword['total'];
            ///
            $hasil_stt=$count_st['total'];
            $hasil_klas=$count_klas['total_kl'];
            if ($hasil_kl==0) {
                $hasilCount=0+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyAgama+=($hasilCount+1)/($hasil_tot+$hasilstem); 
            }
            else if($hasil_st==0){
                $hasilCount=$hasil_kl+0;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyAgama+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
            else{
                $hasilCount=$hasil_kl+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyAgama+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
        }

        $bodySastra=$pSastra;
        foreach ($separate as $value) {
            $sql = "SELECT count as total FROM stem where stem='$value' and kategori='sastra' and keaktifan=1"; 
            $sql_kl = "SELECT count as total_kl from klasifikasi where stem='$value' and kategori='sastra' and keaktifan=1";
            ///
            $sql_stem = "SELECT count(*) as total FROM stem where kategori='sastra' and keaktifan=1"; 
            $sql_klas = "SELECT count(*) as total_kl from klasifikasi where kategori='sastra' and keaktifan=1";
            ///

            $wordCount=$this->db->query($sql);
            $Countword=$wordCount->row_array();
            ///
            $word_kl=$this->db->query($sql_kl);
            $count_kl=$word_kl->row_array();
            ///
            $total_stem=$this->db->query($sql_stem);
            $count_st=$total_stem->row_array();
            ///
            $total_klas=$this->db->query($sql_klas);
            $count_klas=$total_klas->row_array();
            ///
            $hasil_kl=$count_kl['total_kl'];
            $hasil_st=$Countword['total'];
            ///
            $hasil_stt=$count_st['total'];
            $hasil_klas=$count_klas['total_kl'];
            if ($hasil_kl==0) {
                $hasilCount=0+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodySastra+=($hasilCount+1)/($hasil_tot+$hasilstem); 
            }
            else if($hasil_st==0){
                $hasilCount=$hasil_kl+0;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodySastra+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
            else{
                $hasilCount=$hasil_kl+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodySastra+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
        }

        $bodyUmum=$pUmum;
        foreach ($separate as $value) {
            $sql = "SELECT count as total FROM stem where stem='$value' and kategori='Umum' and keaktifan=1"; 
            $sql_kl = "SELECT count as total_kl from klasifikasi where stem='$value' and kategori='Umum' and keaktifan=1";
            ///
            $sql_stem = "SELECT count(*) as total FROM stem where kategori='Umum' and keaktifan=1"; 
            $sql_klas = "SELECT count(*) as total_kl from klasifikasi where kategori='Umum' and keaktifan=1";
            ///

            $wordCount=$this->db->query($sql);
            $Countword=$wordCount->row_array();
            ///
            $word_kl=$this->db->query($sql_kl);
            $count_kl=$word_kl->row_array();
            ///
            $total_stem=$this->db->query($sql_stem);
            $count_st=$total_stem->row_array();
            ///
            $total_klas=$this->db->query($sql_klas);
            $count_klas=$total_klas->row_array();
            ///
            $hasil_kl=$count_kl['total_kl'];
            $hasil_st=$Countword['total'];
            ///
            $hasil_stt=$count_st['total'];
            $hasil_klas=$count_klas['total_kl'];
            if ($hasil_kl==0) {
                $hasilCount=0+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyUmum+=($hasilCount+1)/($hasil_tot+$hasilstem); 
            }
            else if($hasil_st==0){
                $hasilCount=$hasil_kl+0;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyUmum+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
            else{
                $hasilCount=$hasil_kl+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyUmum+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
        }
        
        $bodyTeknologi=$pTek;
        foreach ($separate as $value) {
            $sql = "SELECT count as total FROM stem where stem='$value' and kategori='Teknologi' and keaktifan=1"; 
            $sql_kl = "SELECT count as total_kl from klasifikasi where stem='$value' and kategori='Teknologi' and keaktifan=1";
            ///
            $sql_stem = "SELECT count(*) as total FROM stem where kategori='Teknologi' and keaktifan=1"; 
            $sql_klas = "SELECT count(*) as total_kl from klasifikasi where kategori='Teknologi' and keaktifan=1";
            ///

            $wordCount=$this->db->query($sql);
            $Countword=$wordCount->row_array();
            ///
            $word_kl=$this->db->query($sql_kl);
            $count_kl=$word_kl->row_array();
            ///
            $total_stem=$this->db->query($sql_stem);
            $count_st=$total_stem->row_array();
            ///
            $total_klas=$this->db->query($sql_klas);
            $count_klas=$total_klas->row_array();
            ///
            $hasil_kl=$count_kl['total_kl'];
            $hasil_st=$Countword['total'];
            ///
            $hasil_stt=$count_st['total'];
            $hasil_klas=$count_klas['total_kl'];
            if ($hasil_kl==0) {
                $hasilCount=0+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyTeknologi+=($hasilCount+1)/($hasil_tot+$hasilstem); 
            }
            else if($hasil_st==0){
                $hasilCount=$hasil_kl+0;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyTeknologi+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
            else{
                $hasilCount=$hasil_kl+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyTeknologi+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
        }

        $bodyMsain=$pMsain;
        foreach ($separate as $value) {
            $sql = "SELECT count as total FROM stem where stem='$value' and kategori='Matematika dan sains' and keaktifan=1"; 
            $sql_kl = "SELECT count as total_kl from klasifikasi where stem='$value' and kategori='Matematika dan sains' and keaktifan=1";
            ///
            $sql_stem = "SELECT count(*) as total FROM stem where kategori='Matematika dan sains' and keaktifan=1"; 
            $sql_klas = "SELECT count(*) as total_kl from klasifikasi where kategori='Matematika dan sains' and keaktifan=1";
            ///

            $wordCount=$this->db->query($sql);
            $Countword=$wordCount->row_array();
            ///
            $word_kl=$this->db->query($sql_kl);
            $count_kl=$word_kl->row_array();
            ///
            $total_stem=$this->db->query($sql_stem);
            $count_st=$total_stem->row_array();
            ///
            $total_klas=$this->db->query($sql_klas);
            $count_klas=$total_klas->row_array();
            ///
            $hasil_kl=$count_kl['total_kl'];
            $hasil_st=$Countword['total'];
            ///
            $hasil_stt=$count_st['total'];
            $hasil_klas=$count_klas['total_kl'];
            if ($hasil_kl==0) {
                $hasilCount=0+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyMsain+=($hasilCount+1)/($hasil_tot+$hasilstem); 
            }
            else if($hasil_st==0){
                $hasilCount=$hasil_kl+0;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyMsain+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
            else{
                $hasilCount=$hasil_kl+$hasil_st;
                $hasil_tot=$hasil_stt+$hasil_klas;
                $bodyMsain+=($hasilCount+1)/($hasil_tot+$hasilstem);
            }
        }

        if($bodyAgama>=$bodySastra && $bodyAgama>=$bodyUmum && $bodyAgama>=$bodyTeknologi && $bodyAgama>=$bodyMsain){
        $data['kategori_buku']='Agama';
        }
        elseif ($bodySastra>=$bodyAgama && $bodySastra>=$bodyUmum && $bodySastra>=$bodyTeknologi && $bodySastra>=$bodyMsain) {
           $data['kategori_buku']='Sastra';
        }
        elseif ($bodyUmum>=$bodyAgama && $bodyUmum>=$bodySastra && $bodyUmum>=$bodyTeknologi && $bodyUmum>=$bodyMsain) {
           $data['kategori_buku']='Umum';
        }
        elseif ($bodyTeknologi>=$bodyAgama && $bodyTeknologi>=$bodySastra && $bodyTeknologi>=$bodyUmum && $bodyTeknologi>=$bodyMsain) {
           $data['kategori_buku']='Teknologi';
        }
        elseif ($bodyMsain>=$bodyAgama && $bodyMsain>=$bodySastra && $bodyMsain>=$bodyUmum && $bodyMsain>=$bodyTeknologi) {
           $data['kategori_buku']='Matematika dan Sains';
        }


        
        $pars=$data['kategori_buku'];
        
        if ($fakta=="- Pilih Kategori -") {
            $fakta=$pars;
        }
        else{
            $fakta=$this->input->post('kategori-harap');

        }

        if($pars=="Agama" && $fakta=="Agama"){ 

            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 1,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
        }
        else if($pars=="Agama" && $fakta!="Agama"){
            
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>1,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
        }
        else if($pars=="Sastra" && $fakta=="Sastra"){
            
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>1,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
        }
        else if($pars=="Sastra" && $fakta!="Sastra"){
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>1,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
         }
         else if($pars=="Umum" && $fakta=="Umum"){
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>1,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
         }
         else if($pars=="Umum" && $fakta!="Umum"){
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>1,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
         }
         else if($pars=="Teknologi" && $fakta=="Teknologi"){
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>1,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
         }
         else if($pars=="Teknologi" && $fakta!="Teknologi"){
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>1,
                                'tmsain'=>0,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
         }
         else if($pars=="Matematika dan sains" && $fakta=="Matematika dan sains"){
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>1,
                                'fmsain'=>0);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
         }
         else if($pars=="Matematika dan sains" && $fakta!="Matematika dan sains"){
            $save_hasil= array('judul' => $judul,
                                'keaktifan'=>1,
                               'kategori' =>$fakta,
                                'tagama' => 0,
                                'fagama'=>0,
                                'tsastra'=>0,
                                'fsastra'=>0,
                                'tumum'=>0,
                                'fumum'=>0,
                                'ttek'=>0,
                                'ftek'=>0,
                                'tmsain'=>0,
                                'fmsain'=>1);
            $this->Mod_klasifikasi->insert_prediksi('prediksi',$save_hasil);

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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";
            ///insert into list_prediksi tabel
            $list_predik = array('judul' =>$judul ,
                                 'kategori'=>$fakta,
                                 'keaktifan'=> 1);
            $this->Mod_klasifikasi->insert_list_prediksi('list_prediksi',$list_predik);
            ///insert to tabel klasifikasi
            foreach ($separate as $value) {
                $sql = "SELECT count(*) as total FROM klasifikasi where stem='$value' and kategori='$fakta'";
                $query=$this->db->query($sql);
                $count = $query->result_array();
                   
                foreach ($count as $key) {
                        
                   if ($key['total'] > 0) {
                        $save_count = "UPDATE klasifikasi set count = count + 1 where stem = '$value'";
                        $save_s=$this->db->query($save_count);
                    } else {
                         $save_klasifikasi = array('stem' => $value,
                                        'count'=>1,
                                        'kategori'=>$fakta,
                                        'keaktifan'=>1,
                                        'prediksi'=>$pars,
                                        'fakta'=>$fakta );
                        $this->Mod_klasifikasi->insert_klasifikasi('klasifikasi',$save_klasifikasi);
                    }
                }
             }
            $this->template->load('layoutbackend', 'klasifikasi/klasifikasi_detail', $data);
         }

      
            
        
            
    }
         else{
             $data['message']="";
             $data['kategori']=$this->Mod_klasifikasi->getAll_kat()->result();
             $data['kategori_buku']="";
             $data['akurasi']=""; 
             $this->template->load('layoutbackend','klasifikasi/klasifikasi_index',$data);   
          }
       }

    }

    public function laporan(){
        $data['list']=$this->Mod_klasifikasi->get_All_prediksi();
        $this->template->load('layoutbackend','laporan/laporan_klasifikasi',$data);
    }

    function akurasi(){
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
            ///akurasi
            $akurasi=($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain)/($hasil_tagama+$hasil_tsastra+$hasil_tumum+$hasil_ttek+$hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $data['akurasi']=number_format($akurasi,2)."%";
            
            ///presisi
            $agama_presisi = $hasil_tagama/($hasil_tagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_presisi = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_presisi = $hasil_tumum/($hasil_tumum+$hasil_fsastra+$hasil_fagama+$hasil_ftek+$hasil_fmsain)*100;
            $tek_presisi = $hasil_ttek/($hasil_ttek+$hasil_fsastra+$hasil_fumum+$hasil_fagama+$hasil_fmsain)*100;
            $msain_presisi = $hasil_tmsain/($hasil_tmsain+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fagama)*100;

            $presisi=$agama_presisi+$sastra_presisi+$umum_presisi+$tek_presisi+$msain_presisi;
            $data['presisi']=number_format($presisi,2)."%";
            //recall
            $agama_recall = $hasil_tagama/($hasil_tagama+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $sastra_recall = $hasil_tsastra/($hasil_tsastra+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $umum_recall = $hasil_tumum/($hasil_tumum+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $tek_recall = $hasil_ttek/($hasil_ttek+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;
            $msain_recall = $hasil_tmsain/($hasil_tmsain+$hasil_fagama+$hasil_fsastra+$hasil_fumum+$hasil_ftek+$hasil_fmsain)*100;

            $recall=$agama_recall+$sastra_recall+$umum_recall+$tek_recall+$msain_recall;
            $data['recall']=number_format($recall,2)."%";

            //agama
            $data['P_agama']=$agama_presisi;
            $data['R_agama']=$agama_recall;
            //sastra
            $data['P_sastra']=$sastra_presisi;
            $data['R_sastra']=$sastra_recall;
            //umum
            $data['P_umum']=$umum_presisi;
            $data['R_umum']=$umum_recall;
            //tek
            $data['P_tek']=$tek_presisi;
            $data['R_tek']=$tek_recall;
            //msain
            $data['P_msain']=$msain_presisi;
            $data['R_msain']=$msain_recall;
        $this->template->load('layoutbackend','laporan/akurasi',$data);
        
    }

    public function _set_rules(){
        //$this->form_validation->set_rules('kategori-harap','Hasil yang Diharapkan','required|trim');
        $this->form_validation->set_rules('judul','Judul','required|trim');
        $this->form_validation->set_rules('sinopsis','Sinopsis','required|trim');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

?>