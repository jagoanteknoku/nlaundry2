<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_model extends CI_Model {
    
    function get_data($resi){
        $this->db->select('*');
        $this->db->join('pelanggan', 'pelanngan_id = transaksi.transaksi_pelanggan');
        $this->db->join('kurir', 'kurir_id = transaksi.transaksi_kurir');
        $this->db->join('barang', 'barang_id = transaksi.transaksi_barang');
        $this->db->from('transaksi');
        $this->db->where('transaksi_id =', $resi);
        return $this->db->get()->result_array(); 
    }

    function get_transaksi(){
        $this->db->select('*');
        $this->db->join('pelanggan', 'pelanngan_id = transaksi.transaksi_pelanggan');
        $this->db->join('kurir', 'kurir_id = transaksi.transaksi_kurir');
        $this->db->join('barang', 'barang_id = transaksi.transaksi_barang');
        $this->db->from('transaksi');
        return $this->db->get()->result_array(); 
    }

}
?>