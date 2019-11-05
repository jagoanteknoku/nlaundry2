<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    function jumlah_status($id_status)
    {
        $this->db->where('transaksi_status', $id_status);
        $this->db->from('transaksi');
        if(!$result = $this->db->count_all_results()){
            return 0;
        } else {
            return $result;
        }
    }

    function hari_lalu($hari)
    {
        $startdate=strtotime("-7 days");
        $enddate=strtotime("today");

        while ($startdate < $enddate) {
            $startdate = strtotime("+1 day", $startdate);
            $data[] = date("D", $startdate);
        }

        return $data;
    }

    function penghasilan_hari_lalu($hari)
    {

        while ($hari >= 0) {
            $this->db->select_sum('transaksi_total');
            $this->db->where('transaksi_masuk = CURRENT_DATE()-'.$hari.'');
            $this->db->from('transaksi');
            if($result = $this->db->get()->row('transaksi_total')){
                $data[] = $result;
            } else {
                $data[] = '0';
            }
            --$hari;
        }
        return $data;
    }

    function laundry_masuk($hari)
    {
        while ($hari >= 0) {
            $this->db->where('transaksi_masuk = CURRENT_DATE()-'.$hari.'');
            $this->db->from('transaksi');
            if(!$result = $this->db->count_all_results()){
                $data[] = 0;
            } else {
                $data[] = $result;
            }
            --$hari;
        }
        return $data;
    }

    function laundry_keluar($hari)
    {
        while ($hari >= 0) {
            $this->db->where('transaksi_keluar = CURRENT_DATE()-'.$hari.'');
            $this->db->from('transaksi');
            if(!$result = $this->db->count_all_results()){
                $data[] = 0;
            } else {
                $data[] = $result;
            }
            --$hari; 
        }
        return $data;
 
    }

}
?>