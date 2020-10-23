<?php
class M_users extends CI_Model{

    function tampil_data(){
        return $this->db->get('users');
    }

    function insert_data($data){
        return $this->db->insert('users', $data);
    }

    function edit_data($where){
        return $this->db->get_where('users', $where);
    }

    function update_data($data, $where){
        $this->db->where($where);
        $this->db->update('users', $data);
    }

    function hapus_data($where){
        $this->db->where($where);
        $this->db->delete('users');
    }

}