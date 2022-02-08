<?php

class SuperModel extends CI_model
{
    //CRUD TABEL ADMIN
    public function updateWhere($data, $par, $table)
    {
        $this->db->set($data);
        $this->db->where('id_admin', $par);
        $this->db->update($table);
    }
}
