<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Satuan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('satuan_model','satuan');
	}
	public function index()
    {
    	$data = array('title' => 'Satuan');
    	$this->load->view('data_master/satuan/home',$data);
    }

    public function list_satuan()
    {
    	$list = $this->satuan->dataTables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sat) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $sat->satuan_kode;
            $row[] = $sat->keterangan;
           
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_satuan('."'".$sat->satuan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_satuan('."'".$sat->satuan_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->satuan->count_all(),
                        "recordsFiltered" => $this->satuan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function edit($id)
    {

        $data = $this->satuan->get_by_id($id);
        echo json_encode($data);
    }
 
    public function add()
    {
        $this->_validate();
        $data = array(
                'satuan_kode' => $this->input->post('satuan_kode'),
                'keterangan' => $this->input->post('keterangan'),
            );
        $insert = $this->satuan->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function update()
    {
        $this->_validate();
        $data = array(
                'satuan_kode' => $this->input->post('satuan_kode'),
                'keterangan' => $this->input->post('keterangan'),
            );
        $this->satuan->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function delete($id)
	{
		$this->satuan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('satuan_kode') == '')
        {
            $data['inputerror'][] = 'satuan_kode';
            $data['error_string'][] = 'Satuan Kode is required';
            $data['status'] = FALSE;
        }
         if($this->input->post('satuan_kode') > 5)
        {
            $data['inputerror'][] = 'satuan_kode';
            $data['error_string'][] = 'Satuan Kode tidak Boleh lebih dari 5 karakter';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('keterangan') == '')
        {
            $data['inputerror'][] = 'keterangan';
            $data['error_string'][] = 'Keterangan is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}