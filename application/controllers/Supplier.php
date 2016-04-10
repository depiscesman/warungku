<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Supplier extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('supplier_model','supplier');
	}
	public function index()
    {
    	$data = array('title' => 'supplier');
    	$this->load->view('data_master/supplier/home',$data);
    }

    public function list_supplier()
    {
    	$list = $this->supplier->dataTables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sup) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $sup->supplier_nama;
            $row[] = $sup->supplier_alamat;
            $row[] = $sup->supplier_telp;
           
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_supplier('."'".$sup->supplier_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_supplier('."'".$sup->supplier_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->supplier->count_all(),
                        "recordsFiltered" => $this->supplier->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function edit($id)
    {

        $data = $this->supplier->get_by_id($id);
        echo json_encode($data);
    }
 
    public function add()
    {
        $this->_validate();
        $data = array(
                'supplier_nama' => $this->input->post('supplier_nama'),
                'supplier_alamat' => $this->input->post('supplier_alamat'),
                'supplier_telp' => $this->input->post('supplier_telp')
            );
        $insert = $this->supplier->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function update()
    {
        $this->_validate();
        $data = array(
                'supplier_id' => $this->input->post('supplier_id'),
                'supplier_nama' => $this->input->post('supplier_nama'),
                'supplier_alamat' => $this->input->post('supplier_alamat'),
                'supplier_telp' => $this->input->post('supplier_telp')
            );
        $this->supplier->update(array('supplier_id' => $this->input->post('supplier_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function delete($id)
	{
		$this->supplier->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
       if($this->input->post('supplier_nama') == '')
        {
            $data['inputerror'][] = 'supplier_nama';
            $data['error_string'][] = 'supplier Nama is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}