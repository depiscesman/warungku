<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Barang_model extends CI_Model
{
	var $table = 'barang';
	var $column	= array('barang_id','barang_kode','barang_nama','kategori','satuan_kode','stock_awal','barang_keluar','stock_akhir','harga_dasar','harga_jual');
	var $order	= array('barang_id' => 'asc');
	
	private function get_dataTable()
	{
		// $this->db->from($this->table);
		$this->db->SELECT("b.barang_id, b.barang_kode, b.barang_nama, k.kategori, s.satuan_kode, s.keterangan,");
		$this->db->SELECT("b.stock_awal, b.barang_keluar, b.stock_akhir, b.harga_dasar, b.harga_jual");
		$this->db->from('barang AS b');
		$this->db->from('kategori AS k');
		$this->db->from('satuan AS s');
		$this->db->WHERE('b.satuan_id = s.satuan_id');
		$this->db->WHERE('b.kategori_id = k.kategori_id');
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
		$this->db->SELECT("b.barang_id, b.barang_kode, b.barang_nama, k.kategori, s.satuan_kode, s.keterangan,");
		$this->db->SELECT("b.stock_awal, b.barang_keluar, b.stock_akhir, b.harga_dasar, b.harga_jual");
		$this->db->from('barang AS b');
		$this->db->from('kategori AS k');
		$this->db->from('satuan AS s');
		$this->db->WHERE('b.satuan_id = s.satuan_id');
		$this->db->WHERE('b.kategori_id = k.kategori_id');
		$query=$this->db->get();
        return $query->result();
	}
	function count_filtered()
	{
		$this->get_dataTable();
		$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->SELECT("b.barang_id, b.barang_kode, b.barang_nama, k.kategori, s.satuan_kode, s.keterangan,");
		$this->db->SELECT("b.stock_awal, b.barang_keluar, b.stock_akhir, b.harga_dasar, b.harga_jual");
		$this->db->from('barang AS b');
		$this->db->from('kategori AS k');
		$this->db->from('satuan AS s');
		$this->db->WHERE('b.satuan_id = s.satuan_id');
		$this->db->WHERE('b.kategori_id = k.kategori_id');
		$query=$this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		
		$this->db->SELECT("b.barang_id, b.barang_kode, b.barang_nama, k.kategori, s.satuan_kode, s.keterangan,");
		$this->db->SELECT("b.stock_awal, b.barang_keluar, b.stock_akhir, b.harga_dasar, b.harga_jual");
		$this->db->from('barang AS b');
		$this->db->from('kategori AS k');
		$this->db->from('satuan AS s');
		$this->db->WHERE('b.satuan_id = s.satuan_id');
		$this->db->WHERE('b.kategori_id = k.kategori_id');
		return $this->db->count_all_results();
	}

	public function get_by_id($barang_id)
	{
		$this->db->SELECT("b.barang_id, b.barang_kode, b.barang_nama, k.kategori_id,k.kategori,");
		$this->db->SELECT("s.satuan_id, s.satuan_kode, s.keterangan,");
		$this->db->SELECT("b.stock_awal, b.barang_keluar, b.stock_akhir, b.harga_dasar, b.harga_jual");
		$this->db->from('barang AS b');
		$this->db->from('kategori AS k');
		$this->db->from('satuan AS s');
		$this->db->WHERE('b.satuan_id = s.satuan_id');
		$this->db->WHERE('b.kategori_id = k.kategori_id');
		$this->db->where('barang_id',$barang_id);
		$query = $this->db->get();
		return $query->row();

	}

	public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('barang_id', $id);
        $this->db->delete($this->table);
    }
    function view_barang()
	{
		$this->db->from($this->table);
		$this->db->order_by("barang_nama","asc");
		return $this->db->get()->result();
	}
}