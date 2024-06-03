<?php

class Categoria extends Model
{

    public function categoriasCount()
    {
        $this->db->query('SELECT COUNT(*) as count FROM categoría');
        return $this->db->single()['count'];
    }
}
