<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
* 
*/
class Pembelian_model extends CI_Model
{
	var $table = 'pembelian_detail';
	var $column	= array('id','pembelian_kode','barang_id','satuan_id','qty_pembelian','harga_beli','sub_total');
	var $order	= array('id' => 'asc');
	
	function view()
	{
		$this->db->SELECT("p.pembelian_kode, p.nomor_nota, p.tanggal_nota, p.tanggal_terima,");
		$this->db->SELECT("s.supplier_id, s.supplier_nama, p.total_pembelian");
		$this->db->from('pembelian AS p');
		$this->db->from('supplier AS s');
		$this->db->WHERE('p.supplier_id = s.supplier_id');
		$query=$this->db->get();
        return $query->result();
	}
	private function get_dataTable()
	{
		$this->db->SELECT("pd.id, p.pembelian_kode, b.barang_id, s.satuan_id, s.satuan_kode, s.keterangan, ");
		$this->db->SELECT("b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status");
		$this->db->FROM('pembelian_detail pd');
		$this->db->JOIN('pembelian p','p.pembelian_kode = pd.pembelian_kode','LEFT');
		$this->db->JOIN('barang b','b.barang_id = pd.barang_id','LEFT');
		$this->db->JOIN('satuan s','s.satuan_id = pd.satuan_id','LEFT');
		$this->db->WHERE('pd.status','0');
		$query=$this->db->get();
		$i = 0;
	
		foreach ($this->column as $item) // loop columnumn 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$column[$i] = $item; // set columnumn array variable to order processing
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function dataTables()
	{
		$this->get_dataTable();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
      	$this->db->SELECT("pd.id, p.pembelian_kode, b.barang_id, s.satuan_id, s.satuan_kode, s.keterangan, ");
		$this->db->SELECT("b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status");
		$this->db->FROM('pembelian_detail pd');
		$this->db->JOIN('pembelian p','p.pembelian_kode = pd.pembelian_kode','LEFT');
		$this->db->JOIN('barang b','b.barang_id = pd.barang_id','LEFT');
		$this->db->JOIN('satuan s','s.satuan_id = pd.satuan_id','LEFT');
		$this->db->WHERE('pd.status','0');
		$query=$this->db->get();
        return $query->result();
	}
	function count_filtered()
	{
		$this->get_dataTable();
        $this->db->limit($_POST['length'], $_POST['start']);
		$this->db->SELECT("pd.id, p.pembelian_kode, b.barang_id, s.satuan_id, s.satuan_kode, s.keterangan, ");
		$this->db->SELECT("b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status");
		$this->db->FROM('pembelian_detail pd');
		$this->db->JOIN('pembelian p','p.pembelian_kode = pd.pembelian_kode','LEFT');
		$this->db->JOIN('barang b','b.barang_id = pd.barang_id','LEFT');
		$this->db->JOIN('satuan s','s.satuan_id = pd.satuan_id','LEFT');
		$this->db->WHERE('pd.status','0');
		$query=$this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		
		$this->db->SELECT("pd.id, p.pembelian_kode, b.barang_id, s.satuan_id, s.satuan_kode, s.keterangan, ");
		$this->db->SELECT("b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status");
		$this->db->FROM('pembelian_detail pd');
		$this->db->JOIN('pembelian p','p.pembelian_kode = pd.pembelian_kode','LEFT');
		$this->db->JOIN('barang b','b.barang_id = pd.barang_id','LEFT');
		$this->db->JOIN('satuan s','s.satuan_id = pd.satuan_id','LEFT');
		$this->db->WHERE('pd.status','0');
		$query=$this->db->get();
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->SELECT("pd.id, p.pembelian_kode, b.barang_id, s.satuan_id, s.satuan_kode, s.keterangan, ");
		$this->db->SELECT("b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status");
		$this->db->FROM('pembelian_detail pd');
		$this->db->JOIN('pembelian p','p.pembelian_kode = pd.pembelian_kode','LEFT');
		$this->db->JOIN('barang b','b.barang_id = pd.barang_id','LEFT');
		$this->db->JOIN('satuan s','s.satuan_id = pd.satuan_id','LEFT');
		$this->db->where('pd.id',$id);
		$query = $this->db->get();
		return $query->row();

	}

	function view_detail()
	{
		
		// $query	= "SELECT pd.id, p.pembelian_kode, b.barang_id, b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status
		// 	FROM pembelian_detail AS pd, pembelian AS p, barang AS b
		// 	WHERE p.pembelian_kode = pd.pembelian_kode
		// 	AND b.barang_id = pd.barang_id
		// 	AND pd.status = '0'";
		// return $this->db->query($query);

		$this->db->SELECT("pd.id, p.pembelian_kode, b.barang_id, s.satuan_id, s.satuan_kode, s.keterangan, ");
		$this->db->SELECT("b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status");
		$this->db->FROM('pembelian_detail pd');
		$this->db->JOIN('pembelian p','p.pembelian_kode = pd.pembelian_kode','LEFT');
		$this->db->JOIN('barang b','b.barang_id = pd.barang_id','LEFT');
		$this->db->JOIN('satuan s','s.satuan_id = pd.satuan_id','LEFT');
		$this->db->WHERE('pd.status','0');
		$query=$this->db->get();
		return $query->result();
	}

	function simpan_barang($data)
	{
		$this->db->insert('pembelian_detail',$data);
	}

	function hapus_item($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pembelian_detail');
	}

	function edit_item($id)
	{
		$this->db->SELECT("pd.id, p.pembelian_kode, b.barang_id, s.satuan_id, s.satuan_kode, s.keterangan,");
		$this->db->SELECT("b.barang_kode, b.barang_nama, pd.qty_pembelian, pd.harga_beli, pd.sub_total, pd.status");
		$this->db->FROM('pembelian_detail pd');
		$this->db->JOIN('pembelian p','p.pembelian_kode = pd.pembelian_kode','LEFT');
		$this->db->JOIN('barang b','b.barang_id = pd.barang_id','LEFT');
		$this->db->JOIN('satuan s','s.satuan_id = pd.satuan_id','LEFT');
		$this->db->WHERE('pd.id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	
	function update_item($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('pembelian_detail',$data);
	}

	public function kode_otomatis()
	{
		$this->db->select('RIGHT(pembelian.pembelian_kode,6) as kode', FALSE);
		$this->db->order_by('pembelian_kode','DESC');

		$query = $this->db->get('pembelian');
		if($query->num_rows()<>0)
		{
			//jika kode sudah ada
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}
		else
		{
			//jika kode belum ada
			$kode = 1;
		}

		$kodemax = str_pad($kode, 6,"0",STR_PAD_LEFT);
		$kodejadi = "SD/".date("M").'/'.date("Y").'/'.$kodemax;
		return $kodejadi;
	}
}