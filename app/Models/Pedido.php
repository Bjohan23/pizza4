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
        $this->db->query('INSERT INTO pedidoscomanda (mesa_id, cliente_id, usuario_id, estado, total, fecha) VALUES (:mesa_id, :cliente_id, :usuario_id, :estado, :total, :fecha)');
        $this->db->bind(':mesa_id', $data['mesa_id']);
        $this->db->bind(':cliente_id', $data['cliente_id']);
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':estado', $data['estado']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':fecha', $data['fecha']);
        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function addDetalle($data)
    {
        $this->db->query('INSERT INTO detallespedido (pedido_id, producto_id, cantidad, precio, descripcion) VALUES (:pedido_id, :producto_id, :cantidad, :precio, :descripcion)');
        $this->db->bind(':pedido_id', $data['pedido_id']);
        $this->db->bind(':producto_id', $data['producto_id']);
        $this->db->bind(':cantidad', $data['cantidad']);
        $this->db->bind(':precio', $data['precio']);
        $this->db->bind(':descripcion', $data['descripcion']);
        return $this->db->execute();
    }

    public function getPedidosByMesa($mesa_id)
    {
        $this->db->query('SELECT p.*, d.*, pr.nombre AS producto_nombre, pr.descripcion AS producto_descripcion FROM pedidoscomanda p JOIN detallespedido d ON p.id = d.pedido_id JOIN productos pr ON d.producto_id = pr.id WHERE p.mesa_id = :mesa_id');
        $this->db->bind(':mesa_id', $mesa_id);
        return $this->db->resultSet();
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
    public function getAllPedidosWithDetails()
    {
        $this->db->query('SELECT pedidoscomanda.id, pedidoscomanda.usuario_id, pedidoscomanda.cliente_id, pedidoscomanda.mesa_id, pedidoscomanda.fecha, pedidoscomanda.estado, pedidoscomanda.total, 
                          personas.nombre AS usuario, clientes.persona_id AS cliente, mesas.numero AS mesa 
                          FROM pedidoscomanda 
                          JOIN usuarios ON pedidoscomanda.usuario_id = usuarios.id 
                          JOIN personas ON usuarios.persona_id = personas.id 
                          JOIN clientes ON pedidoscomanda.cliente_id = clientes.id 
                          JOIN mesas ON pedidoscomanda.mesa_id = mesas.id');

        $pedidos = $this->db->resultSet();

        // Obtener detalles de cada pedido
        foreach ($pedidos as &$pedido) {
            $this->db->query('SELECT detallespedido.cantidad, productos.nombre 
                              FROM detallespedido 
                              JOIN productos ON detallespedido.producto_id = productos.id 
                              WHERE detallespedido.pedido_id = :pedido_id');
            $this->db->bind(':pedido_id', $pedido['id']);
            $pedido['detalles'] = $this->db->resultSet();
        }

        return $pedidos;
    }
}
