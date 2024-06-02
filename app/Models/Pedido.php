<?php
class Pedido extends Model
{
    public function getAllPedidos()
    {
        $this->db->query('SELECT PedidosComanda.id, Usuarios.nombre as usuario, Clientes.nombre as cliente, Mesas.numero as mesa, PedidosComanda.fecha, PedidosComanda.estado, PedidosComanda.total 
                          FROM PedidosComanda 
                          JOIN Usuarios ON PedidosComanda.usuario_id = Usuarios.id
                          JOIN Clientes ON PedidosComanda.cliente_id = Clientes.id
                          JOIN Mesas ON PedidosComanda.mesa_id = Mesas.id');
        return $this->db->resultSet();
    }

    public function createPedido($data)
    {
        $this->db->query('INSERT INTO PedidosComanda (usuario_id, cliente_id, mesa_id, fecha, estado, total) VALUES (:usuario_id, :cliente_id, :mesa_id, :fecha, :estado, :total)');
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':cliente_id', $data['cliente_id']);
        $this->db->bind(':mesa_id', $data['mesa_id']);
        $this->db->bind(':fecha', $data['fecha']);
        $this->db->bind(':estado', $data['estado']);
        $this->db->bind(':total', $data['total']);
        if ($this->db->execute()) {
            $pedidoId = $this->db->lastInsertId();
            foreach ($data['productos'] as $producto) {
                $this->db->query('INSERT INTO DetallesPedido (pedido_id, producto_id, cantidad, precio) VALUES (:pedido_id, :producto_id, :cantidad, :precio)');
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
        $this->db->query('SELECT * FROM PedidosComanda WHERE id = :id');
        $this->db->bind(':id', $id);
        $pedido = $this->db->single();

        $this->db->query('SELECT * FROM DetallesPedido WHERE pedido_id = :pedido_id');
        $this->db->bind(':pedido_id', $id);
        $pedido['productos'] = $this->db->resultSet();

        return $pedido;
    }

    public function updatePedido($data)
    {
        $this->db->query('UPDATE PedidosComanda SET usuario_id = :usuario_id, cliente_id = :cliente_id, mesa_id = :mesa_id, fecha = :fecha, estado = :estado, total = :total WHERE id = :id');
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':cliente_id', $data['cliente_id']);
        $this->db->bind(':mesa_id', $data['mesa_id']);
        $this->db->bind(':fecha', $data['fecha']);
        $this->db->bind(':estado', $data['estado']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':id', $data['id']);
        if ($this->db->execute()) {
            $this->db->query('DELETE FROM DetallesPedido WHERE pedido_id = :pedido_id');
            $this->db->bind(':pedido_id', $data['id']);
            $this->db->execute();

            foreach ($data['productos'] as $producto) {
                $this->db->query('INSERT INTO DetallesPedido (pedido_id, producto_id, cantidad, precio) VALUES (:pedido_id, :producto_id, :cantidad, :precio)');
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
        $this->db->query('DELETE FROM DetallesPedido WHERE pedido_id = :pedido_id');
        $this->db->bind(':pedido_id', $id);
        $this->db->execute();

        $this->db->query('DELETE FROM PedidosComanda WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
