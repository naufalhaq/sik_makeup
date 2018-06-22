<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	public function insertPembayaran()
	{
		$object = array(
			'id_pemesanan' => $this->input->post('id_pemesanan'),
			'total_pembayaran' => $this->input->post('total_pembayaran'),
			'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
		);
		$this->db->insert('pembayaran',$object);
	}
	public function getDataPembayaran()
	{
		$query = $this->db->query("SELECT id_pembayaran, id_pemesanan, total_pembayaran, tgl_pembayaran from pembayaran");
		return $query->result();
	}

	

	public function getPembayaran($id)
	{
		$this->db->where('id_pembayaran',$id);
		$query = $this->db->get('pembayaran');
		return $query->result();
	}	

	public function UpdateById($id){
		$object=array
		(
			'id_pemesanan' => $this->input->post('id_pemesanan'),
			'total_pembayaran' => $this->input->post('total_pembayaran'),
			'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
			);
		$this->db->where('id_pembayaran',$id);
		$this->db->update('pembayaran',$object);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$this->db->where('id_pembayaran',$id);
		$this->db->delete('pembayaran');
		
	}

}

/* End of file kasir_model.php */
/* Location: ./application/models/kasir_model.php */