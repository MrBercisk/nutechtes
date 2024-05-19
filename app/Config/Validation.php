<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $daftar_akun = [
        'nama' => [
            'label'  => 'Nama Lengkap',
            'rules'  => 'required|is_unique[users.nama]',
            'errors' => [
                'required' => 'Nama Lengkap Tidak Boleh Kosong!',
                'is_unique' => 'Nama Sudah Terdaftar!'
            ]
        ],
        'position' => [
            'label'  => 'Posisi Kandidat',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Posisi Kandidat Tidak Boleh Kosong!',
            ]
        ],
        'email' => [
            'label'  => 'Email',
            'rules'  => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => 'Email Tidak Boleh Kosong!',
                'valid_email' => 'Email Tidak Valid!',
                'is_unique' => 'Email Sudah Terdaftar!'
            ]
        ],
        'image' => [
            'label'  => 'Foto Profil',
            'rules'  => 'uploaded[image]|max_size[image,100]|mime_in[image,image/png,image/jpg],ext_in[image,png,jpg]', 
            'errors' => [
                'uploaded' => 'Foto Kandidat tidak boleh kosong!',
                'max_size' => 'Ukuran File Foto Kandidat maksimal 100Kb!',
                'ext_in' => 'Format Foto Kandidat tidak sesuai!',
                'mime_in' => 'Format Foto Kandidat tidak sesuai!',
            ]
        ],
        
        'password' => [
            'label'  => 'Password',
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password Tidak Boleh Kosong!',
                'min_length' => 'Password Minimal 8 Karakter!'
            ]
        ],
        'confirm_password' => [
            'label'  => 'Confirm Password',
            'rules'  => 'required|min_length[8]|matches[password]',
            'errors' => [
                'required' => 'Confirm Password Tidak Boleh Kosong!',
                'min_length' => 'Confirm Password Minimal 8 Karakter!',
                'matches' => 'Confirm Password Tidak Sama Dengan Password!',
            ]
        ],
      
    ];
    public $login = [
        'email' => [
            'label'  => 'Email',
            'rules'  => 'required|valid_email',
            'errors' => [
                'required' => 'Email Tidak Boleh Kosong!',
                'valid_email' => 'Email Tidak Valid!'
            ]
        ],
        'password' => [
            'label'  => 'Password',
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password Tidak Boleh Kosong!',
                'min_length' => 'Password Minimal 8 Karakter!'
            ]
        ],

    ];
    public $produk = [
        'nama_produk' => [
            'label'  => 'Nama Produk',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama Produk Tidak Boleh Kosong!',
            ]
        ],
        'harga_beli' => [
            'label' => 'Harga Beli',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Harga Beli Tidak Boleh Kosong!',
                'numeric' => 'Harga Beli hanya boleh diisi dengan angka!',
            ],
        ],
        
        'stok' => [
            'label' => 'Stok',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'StokTidak Boleh Kosong!',
                'numeric' => 'Kolom {field} harus berupa angka',
            ],
        ],
    ];
    public $tambah_produk = [
        'nama_produk' => [
            'label'  => 'Nama Produk',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama Produk Tidak Boleh Kosong!',
            ]
        ],
        
    
        'image' => [
            'label'  => 'Foto Barang',
            'rules'  => 'uploaded[image]|max_size[image,100]|mime_in[image,image/png,image/jpg],ext_in[image,png,jpg]', 
            'errors' => [
                'uploaded' => 'Foto Barang tidak boleh kosong!',
                'max_size' => 'Ukuran File Foto Barang maksimal 100Kb!',
                'ext_in' => 'Format Foto Barang tidak sesuai!',
                'mime_in' => 'Format Foto Barang tidak sesuai!',
            ]
        ],
        
        'harga_beli' => [
            'label' => 'Harga Beli',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Harga Beli Tidak Boleh Kosong!',
                'numeric' => 'Harga Beli hanya boleh diisi dengan angka!',
            ],
        ],
        
        'stok' => [
            'label' => 'Stok',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'StokTidak Boleh Kosong!',
                'numeric' => 'Kolom {field} harus berupa angka',
            ],
        ],

    ];
}
