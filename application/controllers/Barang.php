<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('barang_model','barang');
        $this->load->model('kategori_model','kategori');
        $this->load->model('satuan_model','satuan');
	}
	public function index()
    {
    	$data = array('title' => 'Barang');
        $data['barang'] = $this->barang->view_barang();
        $data['kategori'] = $this->kategori->view_kategori()->result();
        $data['satuan'] = $this->satuan->view_satuan()->result();
    	$this->load->view('data_master/barang/home',$data);
    }

    public function list_barang()
    {
    	$list = $this->barang->dataTables();
        $data = array();
        $no = $_POST['start'];
        $total=0;
        foreach ($list as $bar) {
            $no++;
            
            $row = array();
            $row[] = $no;
            $row[] = $bar->barang_kode;
            $row[] = $bar->barang_nama;
            $row[] = $bar->kategori;
            $row[] = $bar->keterangan;
            $row[] = number_format($bar->stock_awal,2,',','.');
            $row[] = number_format($bar->barang_keluar,2,',','.');
            $row[] = "Rp ".number_format($bar->stock_akhir,2,',','.');
            $row[] = "Rp ".number_format($bar->harga_dasar,2,',','.');
            $row[] = "Rp ".number_format($bar->harga_jual,2,',','.');
           
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_barang('."'".$bar->barang_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_barang('."'".$bar->barang_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
             
            $data[] = $row;
            $total=$total+($bar->harga_jual*$bar->stock_akhir);
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->barang->count_all(),
                        "recordsFiltered" => $this->barang->count_filtered(),
                        "data" => $data,
                        "total" => $total,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function add()
    {
        $this->_validate();
        $data = array(
                    'barang_kode'       =>  $this->input->post('barang_kode'),
                    'barang_nama'       =>  $this->input->post('barang_nama'),
                    'kategori_id'       =>  $this->input->post('kategori_id'),
                    'satuan_id'         =>  $this->input->post('satuan_id'),
                    'stock_awal'        =>  $this->input->post('stock_awal'),
                    'barang_keluar'     =>  $this->input->post('barang_keluar'),
                    'stock_akhir'       =>  $this->input->post('stock_akhir'),
                    'harga_dasar'       =>  $this->input->post('harga_dasar'),
                    'harga_jual'        =>  $this->input->post('harga_jual')
            );
        $insert = $this->barang->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function edit($barang_id)
    {
        $data = $this->barang->get_by_id($barang_id);
        echo json_encode($data);
    }
    public function update()
    {
        $this->_validate();
        $data = array(
                    'barang_kode'       =>  $this->input->post('barang_kode'),
                    'barang_nama'       =>  $this->input->post('barang_nama'),
                    'kategori_id'       =>  $this->input->post('kategori_id'),
                    'satuan_id'         =>  $this->input->post('satuan_id'),
                    'stock_awal'        =>  $this->input->post('stock_awal'),
                    'barang_keluar'     =>  $this->input->post('barang_keluar'),
                    'stock_akhir'       =>  $this->input->post('stock_akhir'),
                    'harga_dasar'       =>  $this->input->post('harga_dasar'),
                    'harga_jual'        =>  $this->input->post('harga_jual')
            );
        $this->barang->update(array('barang_id' => $this->input->post('barang_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function delete($id)
	{
		$this->barang->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
       if($this->input->post('barang_kode') == '')
        {
            $data['inputerror'][] = 'barang_kode';
            $data['error_string'][] = 'Kode Barang is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('barang_nama') == '')
        {
            $data['inputerror'][] = 'barang_nama';
            $data['error_string'][] = 'Nama Barang is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('kategori_id') == '')
        {
            $data['inputerror'][] = 'kategori_id';
            $data['error_string'][] = 'Please select Kategori';
            $data['status'] = FALSE;
        }
        if($this->input->post('satuan_id') == '')
        {
            $data['inputerror'][] = 'satuan_id';
            $data['error_string'][] = 'Please select Satuan';
            $data['status'] = FALSE;
        }
        if($this->input->post('harga_jual') == '')
        {
            $data['inputerror'][] = 'harga_jual';
            $data['error_string'][] = 'Please select Harga Jual';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}