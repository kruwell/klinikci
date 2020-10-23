<?php
class M_obat extends CI_Model{

    function tampil_data(){
        return $this->db->get('obat');
    }

    function insert_data($data){
        return $this->db->insert('obat', $data);
    }

    function edit_data($where){
        return $this->db->get_where('obat', $where);
    }

    function update_data($data, $where){
        $this->db->where($where);
        $this->db->update('obat', $data);
    }

    function hapus_data($where){
        $this->db->where($where);
        $this->db->delete('obat');
    }

}