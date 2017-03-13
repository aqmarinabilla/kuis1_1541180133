<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataPegawai()
		{
			$query = $this->db->get('pegawai');
			return $query->result_array();
		}

		public function getJabatanByPegawai($idPegawai)
		{
			$this->db->select('*');
			$this->db->from('pegawai');
			$this->db->join('jabatan_pegawai', 'jabatan_pegawai.fk_pegawai = pegawai.id');
			$this->db->where('pegawai.id', $idPegawai);
			$query = $this->db->get();
			return $query->result_array();

		}
		public function getAnakByPegawai($idPegawai)
		{

			$this->db->select('pegawai.nama as Nama_Pegawai, anak.nama as Nama_Anak, anak.tanggalLahir as Tanggal_Lahir_Anak');
			$this->db->from('anak');
			$this->db->join('pegawai', 'anak.fk_pegawai = pegawai.id');
			$this->db->where('pegawai.id', $idPegawai);
			$query = $this->db->get();
			return $query->result_array();
		}

}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>