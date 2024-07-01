<?php
class Pedido extends Model
{
    public function getAllPedidos()
    {
        $this->db->query('SELECT pedidoscomanda.id, personas.nombre as usuario, cliente_persona.nombre as cliente, mesas.numero as mesa, pedidoscomanda.fecha, pedidoscomanda.estado, pedidoscomanda.total
        FROM pedidoscomanda
        JOIN usuarios ON pedidoscomanda.usuario_id = usuarios.id
        JOIN personas ON usuarios.persona_id = personas.id
        JOIN clientes ON pedidoscomanda.cliente_id = clientes.id
        JOIN personas AS cliente_persona ON clientes.persona_id = cliente_persona.id
        JOIN mesas ON pedidoscomanda.mesa_id = mesas.id');
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
        $this->db->query('INSERT INTO detallespedido (pedido_id, producto_id, cantidad, precio ,descripcion) VALUES (:pedido_id, :producto_id, :cantidad, :precio, :descripcion)');
        $this->db->bind(':pedido_id', $data['pedido_id']);
        $this->db->bind(':producto_id', $data['producto_id']);
        $this->db->bind(':cantidad', $data['cantidad']);
        $this->db->bind(':precio', $data['precio']);
        $this->db->bind(':descripcion', $data['descripcion']);
        return $this->db->execute();
    }

    public function deleteDetalle($pedido_id, $producto_id)
    {
        $this->db->query('DELETE FROM detallespedido WHERE pedido_id = :pedido_id AND producto_id = :producto_id');
        $this->db->bind(':pedido_id', $pedido_id);
        $this->db->bind(':producto_id', $producto_id);
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


    public function updateDetallePedido($data)
    {
        $this->db->query('UPDATE detallespedido SET cantidad = :cantidad WHERE pedido_id = :pedido_id');
        $this->db->bind(":cantidad", $data["cantidad"]);
        $this->db->bind(":pedido_id", $data["pedido_id"]);
        return $this->db->execute();
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
        return $this->db->execute();
    }

    public function deletePedido($data)
    {
        $this->db->query('DELETE FROM detallespedido WHERE id = :id');
        $this->db->bind(':id', $data['detalle_id']);
        $this->db->execute();

        $this->db->query('DELETE FROM pedidoscomanda WHERE id = :id');
        $this->db->bind(':id', $data['comanda_id']);
        return $this->db->execute();
    }

    public function getAllPedidosWithDetails()
    {
        $this->db->query("SELECT 
            mesas.numero AS mesa, 
            GROUP_CONCAT(DISTINCT personas.nombre ORDER BY personas.nombre SEPARATOR ', ') AS usuario, 
            GROUP_CONCAT(DISTINCT DATE(pedidoscomanda.fecha) ORDER BY pedidoscomanda.fecha SEPARATOR ', ') AS fecha,
            GROUP_CONCAT(DISTINCT pedidoscomanda.estado ORDER BY pedidoscomanda.estado SEPARATOR ', ') AS estado,
            GROUP_CONCAT(CONCAT(productos.nombre, ' (', detallespedido.cantidad, ')') ORDER BY productos.nombre SEPARATOR ', ') AS descripcion
        FROM pedidoscomanda
        JOIN usuarios ON pedidoscomanda.usuario_id = usuarios.id
        JOIN personas ON usuarios.persona_id = personas.id
        JOIN mesas ON pedidoscomanda.mesa_id = mesas.id
        JOIN detallespedido ON pedidoscomanda.id = detallespedido.pedido_id
        JOIN productos ON detallespedido.producto_id = productos.id
        GROUP BY 
            mesas.numero");

        return $this->db->resultSet();
    }

    public function deleteDetallesByPedido($pedido_id)
    {
        $this->db->query('DELETE FROM detallespedido WHERE pedido_id = :pedido_id');
        $this->db->bind(':pedido_id', $pedido_id);
        return $this->db->execute();
    }

    public function countPedidos()
    {
        $this->db->query('SELECT COUNT(*) as count FROM pedidoscomanda');
        return $this->db->single()['count'];
    }

    public function getTotalPedidosPorEstado()
    {
        $this->db->query('SELECT estado, COUNT(*) as total FROM pedidoscomanda GROUP BY estado');
        return $this->db->resultSet();
    }
}
