<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Produk extends BaseController
{
	protected $encrypter;
	protected $form_validation;
	protected $user;
	protected $produk;
	protected $kategori;
	protected $session;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->encrypter = \Config\Services::encrypter();
		$this->form_validation =  \Config\Services::validation();
		$this->user = new UserModel();
		$this->produk = new ProdukModel();
		$this->kategori = new KategoriModel();
	}
	private function _action($idProduk)
	{
		$link = "
		<a href='" . base_url('produk/edit/' . $idProduk) . "' class='btn-ubahProduk' data-toggle='tooltip' data-placement='top' title='Ubah Produk'>
        <button type='button' class='btn btn-outline-warning btn-xs'><i class='fas fa-edit'></i></button>
      </a>
	      
	      	<a href='" . base_url('produk/delete/' . $idProduk) . "' class='btn-deleteProduk' data-toggle='tooltip' data-placement='top' title='Delete'>
	      		<button type='button' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash'></i></button>
	      	</a>
	    ";
		return $link;
	}

	public function index()
	{
		$token = $this->session->get('token');
		/*  dd($token); */
		$key = getenv('JWT_SECRET_KEY');
		if (!$token) {
			return redirect()->to('/accessdenied?error=Token Required');
		} else {
			try {
				$decoded = JWT::decode($token, new Key($key, 'HS256'));
				$data = [
					'title' => "SIMS Web App || Tambah Produk",
					'page' => "home",
					'id' => $decoded->uid,
					'email' => $decoded->email,
					'nama' => $decoded->nama,
					'role_id' => $decoded->role_id,
					'produk' => $this->produk->findAll(),
					'kategori' => $this->kategori->findAll()
				];

				return view('v_home/add', $data);
			} catch (\throwable $th) {
				return redirect()->to('/');
			}
		}
	}

	public function create()
	{
		$kategori         = $this->request->getVar('kategori');
		$nama_produk         = $this->request->getVar('nama_produk');
		$image         = $this->request->getFile('image');
		$harga_beli         = $this->request->getVar('harga_beli');
		$harga_jual    = $this->request->getVar('harga_jual');
		$stok    = $this->request->getVar('stok');

		$cek_validasi = [
			'kategori' => $kategori,
			'nama_produk' => $nama_produk,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'stok' => $stok,
		];
		if ($this->form_validation->run($cek_validasi, 'tambah_produk') == FALSE) {
			$validasi = [
				'error' => true,
				'tambah_produk_error' => $this->form_validation->getErrors()
			];
			echo json_encode($validasi);
		} else {
			$nama_foto = $image->getRandomName();
			$image->move('produk_picture', $nama_foto);

			$data = [
				'kategori_id' => $kategori,
				'nama_produk' => $nama_produk,
				'image' => $nama_foto,
				'harga_beli' => $harga_beli,
				'harga_jual' => $harga_jual,
				'stok' => $stok,
			];
			$this->produk->save($data);
			$validasi = [
				'success'   => true,
				'link'      => base_url('home')
			];
			echo json_encode($validasi);
		}
	}

	public function edit($id)
	{

		$token = $this->session->get('token');
		$key = getenv('JWT_SECRET_KEY');
		if (!$token) {
			return redirect()->to('/accessdenied?error=Token Required');
		} else {
			try {
				$decoded = JWT::decode($token, new Key($key, 'HS256'));
				$data = [
					'title' => "SIMS Web App || Tambah Produk",
					'page' => "produk",
					'id' => $decoded->uid,
					'email' => $decoded->email,
					'nama' => $decoded->nama,
					'role_id' => $decoded->role_id,
					'produk' => $this->produk->find($id),
					'kategori' => $this->kategori->findAll()
				];

				return view('v_home/edit', $data);
			} catch (\throwable $th) {
				return redirect()->to('/');
			}
		}
	}

	public function update($id)
	{
		$kategori         = $this->request->getVar('kategori');
		$nama_produk         = $this->request->getVar('nama_produk');
		$image         = $this->request->getFile('image');
		$harga_beli         = $this->request->getVar('harga_beli');
		$harga_jual    = $this->request->getVar('harga_jual');
		$stok    = $this->request->getVar('stok');

		$cek_validasi = [
			'kategori' => $kategori,
			'nama_produk' => $nama_produk,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'stok' => $stok,
		];
		if ($this->form_validation->run($cek_validasi, 'produk') == FALSE) {
			$validasi = [
				'error' => true,
				'produk_error' => $this->form_validation->getErrors()
			];
			echo json_encode($validasi);
		} else {
			$nama_foto = $image->getRandomName();
			$image->move('produk_picture', $nama_foto);

			$data = [
				'kategori_id' => $kategori,
				'nama_produk' => $nama_produk,
				'image' => $nama_foto,
				'harga_beli' => $harga_beli,
				'harga_jual' => $harga_jual,
				'stok' => $stok,
			];
			$this->produk->update($id, $data);
			$validasi = [
				'success'   => true,
				'link'      => base_url('home')
			];
			echo json_encode($validasi);
		}
	}

	public function ajaxDataProduk()
	{

		if ($this->request->getMethod(true) == 'POST') {
			$lists = $this->produk->get_datatables();
			$data = [];
			$no = $this->request->getPost("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = '<img class="circle-img" width="100px" src="/produk_picture/' . $list->image . '">';;
				$row[] = $list->nama_produk;
				$row[] = $list->nama_kategori;
				$row[] = $list->harga_beli;
				$row[] = $list->harga_jual;
				$row[] = $list->stok;
				$row[] = $this->_action($list->id);
				$data[] = $row;
			}
			$output = [
				"draw" 				=> $this->request->getPost('draw'),
				"recordsTotal" 		=> $this->produk->count_all(),
				"recordsFiltered" 	=> $this->produk->count_filtered(),
				"data" 				=> $data
			];
			echo json_encode($output);
		}
	}


	public function exportExcel()
	{

		$produk = $this->produk->getProdukWithKategori();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Data Produk');

		/* Gabungkan sel */
		$sheet->mergeCells('A1:F1');

		$titleStyle = [
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'font' => [
				'bold' => true,
				'size' => 16,
			],
		];
		$sheet->getStyle('A1')->applyFromArray($titleStyle);


		$sheet->setCellValue('A2', 'No');
		$sheet->setCellValue('B2', 'Nama Produk');
		$sheet->setCellValue('C2', 'Nama Kategori');
		$sheet->setCellValue('D2', 'Harga Beli');
		$sheet->setCellValue('E2', 'Harga Jual');
		$sheet->setCellValue('F2', 'Stok');

		$no = 1;
		$row = 3;
		foreach ($produk as $p) {
			$sheet->setCellValue('A' . $row, $no++);
			$sheet->setCellValue('B' . $row, $p['nama_produk']);
			$sheet->setCellValue('C' . $row, $p['nama_kategori']);
			$sheet->setCellValue('D' . $row, $p['harga_beli']);
			$sheet->setCellValue('E' . $row, $p['harga_jual']);
			$sheet->setCellValue('F' . $row, $p['stok']);
			$row++;
		}


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="data_produk.xlsx"');
		header('Cache-Control: max-age=0');
		$headerStyle = [
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
				'color' => ['rgb' => '8B4513'],
			],
			'font' => [
				'bold' => true,
				'color' => ['rgb' => 'FFFFFF'],
			],
		];


		$sheet->getStyle('A2:F2')->applyFromArray($headerStyle);
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		exit;
	}
	
	public function delete($id)
	{
		$this->produk->delete($id);
	}
}
