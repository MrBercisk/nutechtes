<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{

	protected $table = "produk";
	protected $allowedFields = ['id', 'kategori_id', 'nama_kategori', 'nama_produk', 'image', 'harga_beli', 'harga_jual', 'stok', 'created_at'];
	protected $column_search = ['nama_produk', 'harga_beli', 'harga_jual', 'stok'];
	protected $column_order = [null, 'image', 'nama_produk', 'nama_kategori', 'harga_beli', 'harga_jual', 'stok', null];
	protected $order = ['produk.id' => 'desc'];
	protected $useTimestamps = true;
	protected $request;
	protected $session;
	protected $db;
	protected $dt;


	function __construct()
	{
		parent::__construct();
		$this->db = db_connect();
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();
		$this->dt = $this->db->table($this->table)
			->select('produk.*, nama_produk, image, harga_beli, harga_jual, stok, kategori.nama_kategori')
			->join('kategori', 'produk.kategori_id = kategori.id', 'left');
	}

	private function _get_datatables_query()
	{
		$i = 0;
		foreach ($this->column_search as $item) {
			if ($this->request->getVar('search')['value']) {
				if ($i === 0) {
					$this->dt->groupStart();
					$this->dt->like($item, $this->request->getVar('search')['value']);
				} else {
					$this->dt->orLike($item, $this->request->getVar('search')['value']);
				}
				if (count($this->column_search) - 1 == $i)
					$this->dt->groupEnd();
			}
			$i++;
		}

		if ($this->request->getVar('order')) {
			$this->dt->orderBy($this->column_order[$this->request->getVar('order')['0']['column']], $this->request->getVar('order')['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->dt->orderBy(key($order), $order[key($order)]);
		}

		$this->dt->limit($this->request->getVar('length'), $this->request->getVar('start'));
	}



	public function get_datatables()
	{
		$this->_get_datatables_query();

		if ($this->request->getVar('length') != -1)
			$this->dt->limit($this->request->getVar('length'), $this->request->getVar('start'));

		$query = $this->dt->get();
		return $query->getResult();
	}
	public function count_all()
	{
		$tbl_storage = $this->db->table($this->table);
		return $tbl_storage->countAllResults();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		return $this->dt->countAllResults(false);
	}
	public function getProdukWithKategori()
	{
		return $this->db->table($this->table)
			->select('produk.id, nama_produk, image, harga_beli, harga_jual, stok, kategori.nama_kategori')
			->join('kategori', 'kategori.id = produk.kategori_id', 'left')
			->get()
			->getResultArray();
	}
}
