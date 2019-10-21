<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    function auth_login($usermae, $password)
    {
        $this->db->where('username', $usermae);
        $this->db->where('password', $password);
        $result = $this->db->get('admin');
        if(empty($result)){
            return false;
        } else {
            return true;
        }
    }

    function save_pelanggan($id, $nama, $alamat, $phone)
    {
        $this->db->set('pelanggan_nama', $nama);
        $this->db->set('pelanggan_alamat', $alamat);
        $this->db->set('pelanggan_no', $phone);
        $this->db->where('pelanngan_id', $id);
        $this->db->update('pelanggan');
    }

    function save_kurir($id, $nama, $alamat, $phone)
    {
        $this->db->set('kurir_nama', $nama);
        $this->db->set('kurir_alamat', $alamat);
        $this->db->set('kurir_no', $phone);
        $this->db->where('kurir_id', $id);
        $this->db->update('kurir');
    }

    function save_transaksi($id, $pelanggan, $barang, $kurir, $berat, $status)
    {
        $this->db->set('transaksi_pelanggan', $pelanggan);
        $this->db->set('transaksi_barang', $barang);
        $this->db->set('transaksi_kurir', $kurir);
        $this->db->set('transaksi_berat', $berat);
        $this->db->set('transaksi_status', $status);
        $this->db->where('transaksi_id', $id);
        $this->db->update('transaksi');
    }

    function add_user($nama, $alamat, $phone)
    {
        $pelanggan = array(
            'pelanggan_nama' => $nama,
            'pelanggan_alamat' => $alamat,
            'pelanggan_no' => $phone
        );
        $this->db->insert('pelanggan', $pelanggan);
    }

    function add_barang($jenis_barang, $harga)
    {
        $barang = array(
            'barang_jenis' => $jenis_barang,
            'barang_harga' => $harga
        );
        $this->db->insert('barang', $barang);
    }

    function add_kurir($nama, $alamat, $phone)
    {
        $kurir = array(
            'kurir_nama' => $nama,
            'kurir_alamat' => $alamat,
            'kurir_no' => $phone
        );
        $this->db->insert('kurir', $kurir);
    }

    function add_transaksi($pelanggan_id, $barang_id, $kurir_id, $barang_berat, $harga)
    {
        $transaksi = array(
            'transaksi_pelanggan' => $pelanggan_id,
            'transaksi_barang' => $barang_id,
            'transaksi_kurir' => $kurir_id,
            'transaksi_berat' => $barang_berat,
            'transaksi_status' => 'Antri',
            'transaksi_harga' => $harga
        );
        $this->db->insert('transaksi', $transaksi);
    }

    function pelanggan($pelanggan_id)
    {
        return $this->db->get_where('pelanggan', array('pelanngan_id' => $pelanggan_id))->result_array();
    }

    function kurir($kurir_id)
    {
        return $this->db->get_where('kurir', array('kurir_id' => $kurir_id))->result_array();
    }

    function transaksi($transaksi_id)
    {
        return $this->db->get_where('transaksi', array('transaksi_id' => $transaksi))->result_array();
    }

    function delete_pelanggan($id)
    {
        $this->db->where('pelanngan_id', $id);
        $this->db->delete('pelanggan');
    }

    function delete_kurir($id)
    {
        $this->db->where('kurir_id', $id);
        $this->db->delete('kurir');
    }

    function delete_transaksi($id)
    {
        $this->db->where('transaksi_id', $id);
        $this->db->delete('transaksi');
    }

    function transaksi_antri($id)
    {
        $this->db->set('transaksi_status', '0');
        $this->db->where('transaksi_id', $id);
        $this->db->update('transaksi');
    }

    function transaksi_pencucian($id)
    {
        $this->db->set('transaksi_status', '1');
        $this->db->where('transaksi_id', $id);
        $this->db->update('transaksi');   
    }

    function transaksi_siap($id)
    {
        $this->db->set('transaksi_status', '2');
        $this->db->where('transaksi_id', $id);
        $this->db->update('transaksi');
    }

    function transaksi_antar($id)
    {
        $this->db->set('transaksi_status', '3');
        $this->db->where('transaksi_id', $id);
        $this->db->update('transaksi');
    }

}
?>