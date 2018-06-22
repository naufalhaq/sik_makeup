<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('neraca_model');
		$this->load->model('user_model');
        $this->load->model('cashflow_model');
		$this->load->helper('html');
		$this->load->library('image_lib');
	}

	public function index()
	{
		$object['neraca']=$this->neraca_model->getDataNeraca();
        $object['user']=$this->user_model->getDataUser();
        $object['cashflow']=$this->cashflow_model->getDataCashflow();

		$cek['status'] = array(
        		'home'=>'',
        		'hrd'=>'',
        		'keuangan'=>'active',
        		'produk'=>'',
        		'pembelian'=>'',
        		'pemasukan'=>'',
        		'pengeluaran'=>'',
        		'utang'=>'active',
        		'cash_flow'=>'',
        		'neraca'=>'',
        		'admin'=>'',
        		'gaji'=>'',
        		'golongan'=>'',
        		'absensi'=>'',
        		'user'=>'',
        		'barang'=>'',
        		'supplier'=>'',
        		'kategori'=>'',
        		);
		$this->load->view('component/header',$cek);
		$this->load->view('neraca',$object);
		$this->load->view('component/footer');	
	}

	public function form_neraca()
	{
		$object['neraca']=$this->neraca_model->getDataNeraca();
        $object['user']=$this->user_model->getDataUser();
        $object['cashflow']=$this->cashflow_model->getDataCashflow();

		$cek['status'] = array(
        		'home'=>'',
        		'hrd'=>'',
        		'keuangan'=>'active',
        		'produk'=>'',
        		'pembelian'=>'',
        		'pemasukan'=>'',
        		'pengeluaran'=>'',
        		'utang'=>'active',
        		'cash_flow'=>'',
        		'neraca'=>'',
        		'admin'=>'',
        		'gaji'=>'',
        		'golongan'=>'',
        		'absensi'=>'',
        		'user'=>'',
        		'barang'=>'',
        		'supplier'=>'',
        		'kategori'=>'',
        		);
		$this->load->view('component/header',$cek);
		$this->load->view('form_neraca',$object);
		$this->load->view('component/footer');	
	}

	public function create(){
        $this->form_validation->set_rules('id_user','id user','trim|required');
        $this->form_validation->set_rules('id_transaksi','id_transaksi','trim|required');
        $this->form_validation->set_rules('activa','activa','trim|required');
        $this->form_validation->set_rules('pasiva','pasiva','trim|required');
        $this->form_validation->set_rules('tgl_neraca','tgl_neraca','trim|required');
         $this->form_validation->set_rules('keterangan','keterangan','trim|required');

                $cek['status'] = array(
                        'home'=>'',
                        'hrd'=>'',
                        'keuangan'=>'active',
                        'produk'=>'',
                        'pembelian'=>'',
                        'pemasukan'=>'',
                        'pengeluaran'=>'',
                        'utang'=>'active',
                        'cash_flow'=>'',
                        'neraca'=>'',
                        'admin'=>'',
                        'gaji'=>'',
                        'golongan'=>'',
                        'absensi'=>'',
                        'user'=>'',
                        'barang'=>'',
                        'supplier'=>'',
                        'kategori'=>'',
                        );

		if($this->form_validation->run()==FALSE){
            $object['neraca']=$this->neraca_model->getDataNeraca();
            $object['user']=$this->user_model->getDataUser();
            $object['cashflow']=$this->cashflow_model->getDataCashflow();

            $this->load->view('component/header',$cek);
		    $this->load->view('form_neraca',$object);
		    $this->load->view('component/footer');
		}else{
            $this->neraca_model->insertNeraca();
            $this->load->view('component/header',$cek);
            redirect('neraca','refresh');
            $this->load->view('component/footer');
		     
		}
	}

	public function update($id){
        $this->form_validation->set_rules('id_user','id user','trim|required');
        $this->form_validation->set_rules('id_transaksi','id_transaksi','trim|required');
        $this->form_validation->set_rules('activa','activa','trim|required');
        $this->form_validation->set_rules('pasiva','pasiva','trim|required');
        $this->form_validation->set_rules('tgl_neraca','tgl_neraca','trim|required');
        $this->form_validation->set_rules('keterangan','keterangan','trim|required');

		if($this->form_validation->run()==FALSE){
            $object['neraca']=$this->neraca_model->getNeraca($id);
            $object['user']=$this->user_model->getDataUser();
            $object['cashflow']=$this->cashflow_model->getDataCashflow();

			$cek['status'] = array(
        		      'home'=>'',
        		      'hrd'=>'',
        		      'keuangan'=>'active',
        		      'produk'=>'',
        		      'pembelian'=>'',
        		      'pemasukan'=>'',
        		      'pengeluaran'=>'',
        		      'utang'=>'active',
        		      'cash_flow'=>'',
        		      'neraca'=>'',
        		      'admin'=>'',
        		      'gaji'=>'',
        		      'golongan'=>'',
        		      'absensi'=>'',
        		      'user'=>'',
        		      'barang'=>'',
        		      'supplier'=>'',
        		      'kategori'=>'',
        		      );
			$this->load->view('component/header',$cek);
			$this->load->view('edit_neraca',$object);
			$this->load->view('component/footer');
		}else{
			
			$this->neraca_model->updateById($id);
			redirect('neraca','refresh');
		}
	}

	public function delete($id)
	{
		$this->neraca_model->delete($id);
		redirect('neraca','refresh');
	}

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */