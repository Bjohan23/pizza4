<?php
class Pedido extends Model
{
    public function getAllPedidos()
    {
        $this->db->query('SELECT pedidoscomanda.id, Personas.nombre as usuario, Personas.nombre as cliente, Mesas.numero as mesa, pedidoscomanda.fecha, pedidoscomanda.estado, pedidoscomanda.total
                  FROM pedidoscomanda
                  JOIN Usuarios ON pedidoscomanda.usuario_id = Usuarios.id
                  JOIN Personas ON Usuarios.persona_id = Personas.id
                  JOIN Clientes ON pedidoscomanda.cliente_id = Clientes.id
                  JOIN Personas AS ClientePersona ON Clientes.persona_id = ClientePersona.id
                  JOIN Mesas ON pedidoscomanda.mesa_id = Mesas.id');
        return $this->db->resultSet();
    }

    public function createPedido($data)
    {
        $this->db->query('INSERT INTO pedidoscomanda (usuario_id, cliente_id, mesa_id, fecha, estado, total) VALUES (:usuario_id, :cliente_id, :mesa_id, :fecha, :estado, :total)');
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':cliente_id', $data['cliente_id']);
        $this->db->bind(':mesa_id', $data['mesa_id']);
        $this->db->bind(':fecha', $data['fecha']);
        $this->db->bind(':estado', $data['estado']);
        $this->db->bind(':total', $data['total']);
        if ($this->db->execute()) {
            $pedidoId = $this->db->lastInsertId();
            foreach ($data['productos'] as $producto) {
                $this->db->query('INSERT INTO detallespedido (pedido_id, producto_id, cantidad, precio) VALUES (:pedido_id, :producto_id, :cantidad, :precio)');
                $this->db->bind(':pedido_id', $pedidoId);
                $this->db->bind(':producto_id', $producto['id']);
                $this->db->bind(':cantidad', $producto['cantidad']);
                $this->db->bind(':precio', $producto['precio']);
                $this->db->execute();
            }
            return true;
        }
        return false;
    }

    public function getPedidoById($id)
    {
        $this->db->query('SELECT * FROM pedidoscomanda WHERE id = :id');
        $this->db->bind(':id', $id);
        $pedido = $this->db->single();

        $this->db->query('SELECT * FROM detallespedido WHERE pedido_id = :pedido_id');
        $this->db->bind(':pedido_id', $id);
        $pedido['productos'] = $this->db->resultSet();

        return $pedido;
    }
    public function countPedidos()
    {
        $this->db->query('SELECT COUNT(*) as count FROM pedidoscomanda');
        return $this->db->single()['count'];
    }
    public function updatePedido($data)
    {
        $this->db->query('UPDATE pedidoscomanda SET usuario_id = :usuario_id, cliente_id = :cliente_id, mesa_id = :mesa_id, fecha = :fecha, estado = :estado, total = :total WHERE id = :id');
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':cliente_id', $data['cliente_id']);
        $this->db->bind(':mesa_id', $data['mesa_id']);
        $this->db->bind(':fecha', $data['fecha']);
        $this->db->bind(':estado', $data['estado']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':id', $data['id']);
        if ($this->db->execute()) {
            $this->db->query('DELETE FROM detallespedido WHERE pedido_id = :pedido_id');
            $this->db->bind(':pedido_id', $data['id']);
            $this->db->execute();

            foreach ($data['productos'] as $producto) {
                $this->db->query('INSERT INTO detallespedido (pedido_id, producto_id, cantidad, precio) VALUES (:pedido_id, :producto_id, :cantidad, :precio)');
                $this->db->bind(':pedido_id', $data['id']);
                $this->db->bind(':producto_id', $producto['id']);
                $this->db->bind(':cantidad', $producto['cantidad']);
                $this->db->bind(':precio', $producto['precio']);
                $this->db->execute();
            }
            return true;
        }
        return false;
    }

    public function deletePedido($id)
    {
        $this->db->query('DELETE FROM detallespedido WHERE pedido_id = :pedido_id');
        $this->db->bind(':pedido_id', $id);
        $this->db->execute();

        $this->db->query('DELETE FROM pedidoscomanda WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
