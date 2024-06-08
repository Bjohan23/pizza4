<?php
class ComprobanteVenta extends Model
{
    public function createComprobante($data)
    {
        $this->db->query('INSERT INTO comprobanteventa (pedido_id, tipo, monto, fecha) VALUES (:pedido_id, :tipo, :monto, :fecha)');
        $this->db->bind(':pedido_id', $data['pedido_id']);
        $this->db->bind(':tipo', $data['tipo']);
        $this->db->bind(':monto', $data['monto']);
        $this->db->bind(':fecha', $data['fecha']);
        return $this->db->execute();
    }
}
