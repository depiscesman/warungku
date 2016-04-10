<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('kategori_model','kategori');
	}
	public function index()
    {
    	$data = array('title' => 'Kategori');
    	$this->load->view('data_master/kategori/home',$data);
    }

    public function list_kategori()
    {
    	$list = $this->kategori->dataTables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kat) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $kat->kategori;
           
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_kategori('."'".$kat->kategori_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kategori('."'".$kat->kategori_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->kategori->count_all(),
                        "recordsFiltered" => $this->kategori->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function edit($id)
    {

        $data = $this->kategori->get_by_id($id);
        echo json_encode($data);
    }
 
    public function add()
    {
        $this->_validate();
        $data = array(
                'kategori_id' => $this->input->post('kategori_id'),
                'kategori' => $this->input->post('kategori'),
            );
        $insert = $this->kategori->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function update()
    {
        $this->_validate();
        $data = array(
                'kategori_id' => $this->input->post('kategori_id'),
                'kategori' => $this->input->post('kategori'),
            );
        $this->kategori->update(array('kategori_id' => $this->input->post('kategori_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function delete($id)
	{
		$this->kategori->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
       if($this->input->post('kategori') == '')
        {
            $data['inputerror'][] = 'kategori';
            $data['error_string'][] = 'Kategori is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}