<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pembelian extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('pembelian_model','pembelian');
        $this->load->model('supplier_model','supplier');
        $this->load->model('barang_model','barang');
        $this->load->model('satuan_model','satuan');
	}
	function index()
	{
		$data = array('title' => 'Pembelian');
		$data['rec']= $this->pembelian->view();
		$this->load->view('transaksi/pembelian/home',$data);
	}
	function add_pembelian()
	{
		$data = array('title' => 'Add Pembelian');
		$data['kode']		= $this->pembelian->kode_otomatis();
		$data['rec']		= $this->pembelian->view_detail();
		$data['supplier']	= $this->supplier->view_supplier();
		$data['barang']		= $this->barang->view_barang();
		$data['satuan']		= $this->satuan->view_satuan()->result();
		$this->load->view('transaksi/pembelian/new',$data);		
	}
	function list_add_pembelian()
	{
		$list = $this->pembelian->dataTables();
        $data = array();
        $no = $_POST['start'];
        $total= 0;
       foreach ($list as $pd) {
            $no++;
            
            $row = array();
            $row[] = $no;
            $row[] = $pd->barang_kode;
            $row[] = $pd->barang_nama;
            $row[] = $pd->keterangan;
            $row[] = $pd->qty_pembelian;
            $row[] = "Rp ".number_format($pd->harga_beli,2,',','.');
            $row[] = $pd->sub_total;
          
           
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_barang('."'".$pd->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_barang('."'".$pd->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
             
            $data[] = $row;
           
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->pembelian->count_all(),
                        "recordsFiltered" => $this->pembelian->count_filtered(),
                        "data" => $data
                );
        //output to json format
        echo json_encode($output);
	}
	function add_item()
	{
		$data = array(
					'id' => $this->input->post('id'),
					'pembelian_kode'	=> $this->input->post('pembelian_kode'),
					'barang_id' 		=> $this->input->post('barang_id'),
					'satuan_id' 		=> $this->input->post('satuan_id'),
					'qty_pembelian' 	=> $this->input->post('qty_pembelian'),
					'harga_beli' 		=> $this->input->post('harga_beli'),
					'sub_total' 		=> $this->input->post('sub_total')
					);

				$this->pembelian->simpan_barang($data);
				
        echo json_encode(array("status" => TRUE));
			
	}
}