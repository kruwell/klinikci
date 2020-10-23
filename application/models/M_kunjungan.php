<?php
class M_kunjungan extends CI_Model{

    function tampil_data(){
        //return $this->db->get('berobat');

        $query = $this->db->query("SELECT berobat.*, 
                            pasien.nama_pasien, 
                            pasien.umur, 
                            pasien.jenis_kelamin,
                            dokter.nama_dokter
                        FROM berobat
                        INNER JOIN pasien ON berobat.id_pasien=pasien.id_pasien
                        INNER JOIN dokter ON berobat.id_dokter=dokter.id_dokter");

        return $query;
    }

    function insert_data($data){
        return $this->db->insert('berobat', $data);
    }

    function edit_data($where){
        return $this->db->get_where('berobat', $where);
    }

    function update_data($data, $where){
        $this->db->where($where);
        $this->db->update('berobat', $data);
    }

    function hapus_data($where){
        $this->db->where($where);
        $this->db->delete('berobat');
    }

    /* Fungsi untuk rekam medis */
    function tampil_rm($id){
        $query = $this->db->query("SELECT berobat.*, 
                            pasien.nama_pasien, 
                            pasien.umur, 
                            pasien.jenis_kelamin,
                            dokter.nama_dokter
                        FROM berobat
                        INNER JOIN pasien ON berobat.id_pasien=pasien.id_pasien
                        INNER JOIN dokter ON berobat.id_dokter=dokter.id_dokter
                        WHERE berobat.id_berobat='$id'");

        return $query;
    }

    function tampil_riwayat($pasien){
        
        $query = $this->db->query("SELECT berobat.*, 
                            pasien.nama_pasien, 
                            pasien.umur, 
                            pasien.jenis_kelamin,
                            dokter.nama_dokter
                        FROM berobat
                        INNER JOIN pasien ON berobat.id_pasien=pasien.id_pasien
                        INNER JOIN dokter ON berobat.id_dokter=dokter.id_dokter
                        WHERE berobat.id_pasien='$pasien'");
        
        return $query;

    }

    function tampil_resep($id){

        $query = $this->db->query("SELECT resep_obat.*,
                                obat.nama_obat
                            FROM resep_obat
                            INNER JOIN obat ON resep_obat.id_obat=obat.id_obat
                            WHERE resep_obat.id_berobat='$id'");

        return $query;

    }

    function insert_resep($data){
        return $this->db->insert('resep_obat', $data);
    }

    function hapus_resep($where){
        $this->db->where($where);
        $this->db->delete('resep_obat');
    }

}