<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pelangan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('pelangan_model','pelangan');
	}
	public function index()
    {
    	$data = array('title' => 'Pelangan');
    	$this->load->view('data_master/pelangan/home',$data);
    }

    public function list_pelangan()
    {
    	$list = $this->pelangan->dataTables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pel) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pel->pelanggan_nama;
            $row[] = $pel->pelanggan_alamat;
            $row[] = $pel->pelanggan_telp;
           
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_pelangan('."'".$pel->pelanggan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_pelangan('."'".$pel->pelanggan_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->pelangan->count_all(),
                        "recordsFiltered" => $this->pelangan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function edit($id)
    {

        $data = $this->pelangan->get_by_id($id);
        echo json_encode($data);
    }
 
    public function add()
    {
        $this->_validate();
        $data = array(
                'pelanggan_nama' => $this->input->post('pelanggan_nama'),
                'pelanggan_alamat' => $this->input->post('pelanggan_alamat'),
                'pelanggan_telp' => $this->input->post('pelanggan_telp')
            );
        $insert = $this->pelangan->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function update()
    {
        $this->_validate();
        $data = array(
                'pelanggan_id' => $this->input->post('pelanggan_id'),
                'pelanggan_nama' => $this->input->post('pelanggan_nama'),
                'pelanggan_alamat' => $this->input->post('pelanggan_alamat'),
                'pelanggan_telp' => $this->input->post('pelanggan_telp')
            );
        $this->pelangan->update(array('pelanggan_id' => $this->input->post('pelanggan_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function delete($id)
	{
		$this->pelangan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
       if($this->input->post('pelanggan_nama') == '')
        {
            $data['inputerror'][] = 'pelanggan_nama';
            $data['error_string'][] = 'pelanggan Nama is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}