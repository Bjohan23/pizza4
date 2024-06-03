<?php

class ListRoles extends Model
{
    public function assignRole($usuarioId, $rolId)
    {
        $this->db->query('INSERT INTO listroles (usuario_id, rol_id, fecha_inicio) VALUES (:usuario_id, :rol_id, NOW())');
        $this->db->bind(':usuario_id', $usuarioId);
        $this->db->bind(':rol_id', $rolId);

        if ($this->db->execute()) {
            return true;
        } else {
            throw new \Exception("Error al asignar el rol");
        }
    }
}
