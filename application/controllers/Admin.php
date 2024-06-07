<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //cek login
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan=belumlogin');
        }
        $this->load->library('cart');
    }
    function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }
    function dashboard()
    {
        $data['sayur'] = $this->db->query("SELECT * FROM sayur ORDER BY sayur_id ASC LIMIT 10")->result();
        $data['penjualan'] = $this->db->query("SELECT * FROM penjualan ORDER BY penjualan_id DESC LIMIT 10")->result();
        $data['hutang'] = $this->db->query("select * from hutang , pelanggan where hutang_pelanggan=pelanggan_id")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome?pesan=logout');
    }
    function stok()
    {
        $data['sayur'] = $this->db->query("SELECT * FROM  kategori JOIN sayur ON sayur.kategori_id=kategori.kategori_id JOIN satuan ON sayur.sayur_satuan=satuan.satuan_id ")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/stok', $data);
        $this->load->view('admin/footer');
    }
    function sayur_add()
    {
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['satuan'] = $this->db->get('satuan')->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sayur_add', $data);
    }

    function sayur_add_act()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('sayur_nama', 'Nama Sayur', 'required');
        $this->form_validation->set_rules('sayur_satuan', 'Satuan Sayur', 'required');
        $this->form_validation->set_rules('sayur_harga', 'Harga Sayur', 'required|numeric');
        $this->form_validation->set_rules('sayur_stok', 'Stok Sayur', 'required|numeric');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['kategori'] = $this->db->get('kategori')->result();
            $data['satuan'] = $this->db->get('satuan')->result();

            $this->load->view('admin/header');
            $this->load->view('admin/sayur_add', $data);
            $this->load->view('admin/footer');
        } else {
            $nama_sayur = $this->input->post('sayur_nama');
            $satuan_sayur = $this->input->post('sayur_satuan');
            $harga_sayur = $this->input->post('sayur_harga');
            $stok_sayur = $this->input->post('sayur_stok');
            $kategori_id = $this->input->post('kategori_id');

            if ($stok_sayur < 0) {
                $this->session->set_flashdata('success', 'Stok sayur tidak boleh kurang dari 0');
                redirect('admin/sayur_add');
            }

            if ($harga_sayur < 0) {
                $this->session->set_flashdata('success', 'Harga sayur tidak boleh kurang dari 0');
                redirect('admin/sayur_add');
            }

            $config['upload_path'] = './assets/sayur-img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|jfif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('sayur_img')) {
                $this->session->set_flashdata('success', 'Sayur Gagal Di Tambahkan');
                redirect('admin/sayur_add');
            } else {
                $file_data = $this->upload->data();
                $file_name = $file_data['file_name'];

                $data = array(
                    'sayur_nama' => $nama_sayur,
                    'sayur_satuan' => $satuan_sayur,
                    'sayur_harga' => $harga_sayur,
                    'sayur_stok' => $stok_sayur,
                    'kategori_id' => $kategori_id,
                    'sayur_img' => $file_name
                );

                $this->db->insert('sayur', $data);
                $this->session->set_flashdata('success', 'Sayur Berhasil Di Tambahkan');
                redirect('admin/stok');
            }
        }
    }


    function sayur_delete($id)
    {
        $where = array(
            'sayur_id' => $id
        );
        $this->MSayur->delete_data($where, 'sayur');
        $this->session->set_flashdata('success', 'Sayur Berhasil Di Hapus');
        redirect(base_url() . 'admin/stok');
    }
    function update_harga_stok()
    {
        $sayur_id = $this->input->post('sayur_id');
        $new_harga = $this->input->post('sayur_harga');
        $stok_update = $this->input->post('stok_update');

        $this->db->set('sayur_harga', $new_harga);
        $this->db->where('sayur_id', $sayur_id);
        $this->db->update('sayur');

        // Mengambil stok sayur yang sudah ada
        $sayur = $this->db->get_where('sayur', array('sayur_id' => $sayur_id))->row();
        $current_stok = $sayur->sayur_stok;

        // Menghitung stok baru
        $new_stok = $current_stok + $stok_update;

        if ($new_stok < 0) {
            // Jika stok baru < 0, set stok menjadi 0
            $new_stok = 0;
        }

        // Update stok sayur
        $this->db->set('sayur_stok', $new_stok);
        $this->db->where('sayur_id', $sayur_id);
        $this->db->update('sayur');

        $this->session->set_flashdata('success', 'Stok dan Harga Berhasil Di-Update');
        redirect('admin/stok');
    }
    function hapus_stok($id)
    {
        $sayur = $this->db->get_where('sayur', array('sayur_id' => $id))->row();
        if ($sayur) {
            // Mengupdate jumlah stok menjadi 0
            $data = array(
                'sayur_stok' => 0
            );
            $this->db->where('sayur_id', $id);
            $this->db->update('sayur', $data);

            // Redirect ke halaman daftar sayur dengan pesan sukses
            $this->session->set_flashdata('success', 'Stok sayur berhasil di hapus');
            redirect(base_url() . 'admin/stok?pesan=hapus');
        } else {
            // Redirect ke halaman daftar sayur dengan pesan error jika data sayur tidak ditemukan
            redirect(base_url() . 'admin/stok?pesan=error');
        }
    }


    function penjualan()
    {
        $selectedCategory = $this->input->get('kategori');

        $query = "SELECT * FROM kategori JOIN sayur ON sayur.kategori_id=kategori.kategori_id JOIN satuan ON sayur.sayur_satuan=satuan.satuan_id";

        if ($selectedCategory) {
            $query .= " WHERE kategori.kategori_nama = '" . $selectedCategory . "'";
        }

        $data['sayur'] = $this->db->query($query)->result();

        $this->load->view('admin/header');
        $this->load->view('admin/penjualan', $data);
        $this->load->view('admin/footer');
    }

    public function keranjang()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/keranjang');
    }
    function tambahKeranjang()
    {
        $sayur_id = $this->input->post('sayur_id');

        $this->load->model('MSayur');
        $item = $this->MSayur->get_data_by_id('sayur', array('sayur_id' => $sayur_id))->row();

        $data = array(
            'id' => $item->sayur_id,
            'name' => $item->sayur_nama,
            'price' => $item->sayur_harga,
            'qty' => 1
        );
        $this->cart->insert($data);

        $this->session->set_flashdata('success', 'Sayur berhasil ditambahkan');

        redirect('admin/penjualan');
    }
    public function hapus_item()
    {
        $rowid = $this->input->post('rowid');

        $this->cart->remove($rowid);

        redirect('admin/keranjang');
    }
    public function update_keranjang()
    {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');

        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );

        $this->cart->update($data);

        redirect('admin/keranjang');
    }
    public function pembayaran_tunai()
    {
        $totalHarga = $this->cart->total();
        $tanggal = date('Y-m-d');

        $dataPenjualan = array(
            'penjualan_tanggal' => $tanggal,
            'penjualan_total_harga' => $totalHarga
        );
        $this->db->insert('penjualan', $dataPenjualan);

        foreach ($this->cart->contents() as $item) {
            $sayurId = $item['id'];
            $qty = $item['qty'];

            // Simpan data sayur terjual
            $dataSayurTerjual = array(
                'sayur_terjual_nama' => $item['name'],
                'sayur_terjual_jumlah' => $qty,
                'sayur_terjual_total_harga' => $item['subtotal'],
                'sayur_terjual_tanggal' => $tanggal
            );
            $this->db->insert('sayur_terjual', $dataSayurTerjual);

            // Update stok sayur
            $this->db->set('sayur_stok', 'sayur_stok - ' . $qty, false);
            $this->db->where('sayur_id', $sayurId);
            $this->db->update('sayur');
        }

        $this->cart->destroy();

        $this->session->set_flashdata('success', 'Pembayaran berhasil dilakukan');
        redirect('admin/penjualan');
    }
    function pelanggan_add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/pelanggan_add');
    }
    function pelanggan_add_act()
    {
        $nama = $this->input->post('pelanggan_nama');
        $alamat = $this->input->post('pelanggan_alamat');
        $hp = $this->input->post('pelanggan_hp');
        $this->form_validation->set_rules('pelanggan_nama', 'Nama Pelanggan', 'required');

        if ($this->form_validation->run() != false) {
            $data = array(
                'pelanggan_nama' => $nama,
                'pelanggan_alamat' => $alamat,
                'pelanggan_hp' => $hp,
            );
            $this->MSayur->insert_data($data, 'pelanggan');
            $this->session->set_flashdata('success', 'Pelanggan Berhasil Ditambahkan');
            redirect(base_url() . 'admin/hutang');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/pelanggan_add');
        }
    }
    function hutang()
    {
        $data['pelanggan'] = $this->db->get('pelanggan')->result();

        $this->load->view('admin/header');
        $this->load->view('admin/hutang', $data);
    }
    function hutang_add_act()
    {
        $nama = $this->input->post('hutang_pelanggan');
        $tanggal = $this->input->post('hutang_tanggal');
        $jumlah = $this->input->post('hutang_jumlah');
        $this->form_validation->set_rules('hutang_pelanggan', 'Pelanggan', 'required');

        if ($this->form_validation->run() != false) {
            $data = array(
                'hutang_pelanggan' => $nama,
                'hutang_tanggal' => $tanggal,
                'hutang_jumlah' => $jumlah
            );
            $this->MSayur->insert_data($data, 'hutang');

            foreach ($this->cart->contents() as $item) {
                $sayurId = $item['id'];
                $qty = $item['qty'];

                $dataSayurTerjual = array(
                    'sayur_terjual_nama' => $item['name'],
                    'sayur_terjual_jumlah' => $qty,
                    'sayur_terjual_total_harga' => $item['subtotal'],
                    'sayur_terjual_tanggal' => $tanggal
                );
                $this->db->insert('sayur_terjual', $dataSayurTerjual);

                $this->db->set('sayur_stok', 'sayur_stok - ' . $qty, false);
                $this->db->where('sayur_id', $sayurId);
                $this->db->update('sayur');
            }

            $this->cart->destroy();

            $this->session->set_flashdata('success', 'Data Hutang Berhasil Ditambahkan');
            redirect(base_url() . 'admin/penjualan');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/pelanggan_add');
        }
    }

    function laporan()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/laporan');
        $this->load->view('admin/footer');
    }
    function laporan_penjualan()
    {
        $data['penjualan'] = $this->db->query("select * from penjualan")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/laporan_penjualan', $data);
    }
    function laporan_penjualan_hapus($id)
    {
        $where = array(
            'penjualan_id' => $id
        );
        $this->MSayur->delete_data($where, 'penjualan');
        redirect(base_url() . 'admin/laporan_penjualan');
    }
    public function laporan_print()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() != false) {
            $this->db->where("DATE(penjualan_tanggal) >= ", $dari);
            $data['penjualan'] = $this->db->get('penjualan')->result();

            $this->load->view('admin/header');
            $this->load->view('admin/laporan_filter', $data);
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/laporan_print');
        }
    }
    public function laporan_cetak()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        if ($dari != "" && $sampai != "") {
            $this->db->where("DATE(penjualan_tanggal) >= ", $dari);
            $data['penjualan'] = $this->db->get('penjualan')->result();

            $this->load->view('admin/laporan_cetak', $data);
        } else {
            redirect("admin/laporan_print");
        }
    }
    function daftar_hutang()
    {
        $data['hutang'] = $this->db->query("select * from hutang, pelanggan where hutang_pelanggan=pelanggan_id")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/daftar_hutang', $data);
    }
    public function hutang_bayar($hutang_id)
    {
        $hutang = $this->db->get_where('hutang', array('hutang_id' => $hutang_id))->row();

        $tanggal_pembayaran = date('Y-m-d');

        $data_penjualan = array(
            'penjualan_tanggal' => $tanggal_pembayaran,
            'penjualan_total_harga' => $hutang->hutang_jumlah
        );
        $this->db->insert('penjualan', $data_penjualan);

        $this->db->delete('hutang', array('hutang_id' => $hutang_id));

        $this->session->set_flashdata('success', 'Pembayaran hutang berhasil dilakukan');
        redirect('admin/daftar_hutang');
    }
    function statistik()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/statistik');
        $this->load->view('admin/footer');
    }
    function sayur_terjual()
    {
        $data['sayur_terjual'] = $this->db->query("select * from sayur_terjual")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sayur_terjual', $data);
    }
    function sayur_terjual_hapus($id)
    {
        $where = array(
            'sayur_terjual_id' => $id
        );
        $this->MSayur->delete_data($where, 'sayur_terjual');
        redirect(base_url() . 'admin/sayur_terjual');
    }
}