<?php
class M_kolektif extends CI_Model{

	function __construct() {
        $this->tblName = 'tbl_kolektif';
    }

     function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->tblName);
        
        //fetch data by conditions
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("order_by",$params)){
            $this->db->order_by($params['order_by']);
        }
        
        if(array_key_exists("kolektif_id",$params)){
            $this->db->where('kolektif_id',$params['kolektif_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    
    /*
     * Delete data from the database
     * @param id array/int
     */
    public function delete($kolektif_id){
        if(is_array($kolektif_id)){
            $this->db->where_in('kolektif_id', $kolektif_id);
        }else{
            $this->db->where('kolektif_id', $kolektif_id);
        }
        $delete = $this->db->delete($this->tblName);
        return $delete?true:false;
    }
 

	function hapus_kolektif($kode){
		$hsl=$this->db->query("DELETE FROM tbl_kolektif where kolektif_id='$kode'");
		return $hsl;
	}

	function update_kolektif($kode,$nama_kantor,$kode_kolektor,$instansi,$no_rek,$nama,$angsuran,$sisa_kredit,$tgk_angsuran,$bln_thn){
		$hsl=$this->db->query("UPDATE tbl_kolektif set nama_kantor='$nama_kantor',kode_kolektor='$kode_kolektor',instansi='$instansi',no_rek='$no_rek',nama='$nama',angsuran='$angsuran',sisa_kredit='$sisa_kredit',tgk_angsuran='$tgk_angsuran',bln_thn='$bln_thn' where kolektif_id='$kode'");
		return $hsl;
	}

	function tampil_kolektif(){
		$hsl=$this->db->query("select * from tbl_kolektif order by kolektif_id desc");
		return $hsl;
	}

	function simpan_kolektif($nama_kantor,$kode_kolektor,$instansi,$no_rek,$nama,$angsuran,$sisa_kredit,$tgk_angsuran,$bln_thn){
		$hsl=$this->db->query("INSERT INTO tbl_kolektif(nama_kantor,kode_kolektor,instansi,no_rek,nama,angsuran,sisa_kredit,tgk_angsuran,bln_thn) VALUES ('$nama_kantor','$kode_kolektor','$instansi','$no_rek','$nama','$angsuran','$sisa_kredit','$tgk_angsuran','$bln_thn')");
		return $hsl;
	}
}