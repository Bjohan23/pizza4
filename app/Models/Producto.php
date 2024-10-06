<?php
class Producto extends Model
{
<<<<<<< HEAD

    public function getAllProductos()
    {
        $this->db->query('SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.disponible, Categoría.nombre as categoria FROM productos 
                          JOIN Categoría ON productos.categoria_id = Categoría.id');
        return $this->db->resultSet();
    }
=======
    public function getAllProductos()
    {
        $this->db->query('SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.disponible, productos.stock, Categoría.nombre as categoria 
                          FROM productos 
                          JOIN Categoría ON productos.categoria_id = Categoría.id');
        return $this->db->resultSet();
    }

>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
    public function countProductos()
    {
        $this->db->query('SELECT COUNT(*) as count FROM productos');
        return $this->db->single()['count'];
    }
<<<<<<< HEAD
    public function createProducto($data)
    {
        $this->db->query('INSERT INTO productos (nombre, descripcion, precio, disponible, categoria_id) VALUES (:nombre, :descripcion, :precio, :disponible, :categoria_id)');
=======

    public function createProducto($data)
    {
        $this->db->query('INSERT INTO productos (nombre, descripcion, precio, disponible, categoria_id, stock) 
                          VALUES (:nombre, :descripcion, :precio, :disponible, :categoria_id, :stock)');
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':precio', $data['precio']);
        $this->db->bind(':disponible', $data['disponible']);
        $this->db->bind(':categoria_id', $data['categoria_id']);
<<<<<<< HEAD
=======
        $this->db->bind(':stock', $data['stock']);
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
        return $this->db->execute();
    }

    public function getProductoById($id)
    {
        $this->db->query('SELECT * FROM productos WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateProducto($data)
    {
<<<<<<< HEAD
        $this->db->query('UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, disponible = :disponible, categoria_id = :categoria_id WHERE id = :id');
=======
        $this->db->query('UPDATE productos 
        SET nombre = :nombre, descripcion = :descripcion, precio = :precio, disponible = :disponible, categoria_id = :categoria_id, stock = :stock 
        WHERE id = :id');
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':precio', $data['precio']);
        $this->db->bind(':disponible', $data['disponible']);
        $this->db->bind(':categoria_id', $data['categoria_id']);
<<<<<<< HEAD
=======
        $this->db->bind(':stock', $data['stock']);
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
        $this->db->bind(':id', $data['id']);
        return $this->db->execute();
    }

    public function deleteProducto($id)
    {
        $this->db->query('DELETE FROM productos WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
<<<<<<< HEAD
=======

    public function decreaseStock($id, $cantidad)
    {
        // Obtener el stock actual
        $this->db->query('SELECT stock FROM productos WHERE id = :id');
        $this->db->bind(':id', $id);
        $currentStock = $this->db->single()['stock'];

        // Registro de depuración para el stock actual
        error_log("Current stock for product ID $id: $currentStock, requested decrease: $cantidad");

        if ($currentStock >= $cantidad) {
            $newStock = $currentStock - $cantidad;
            $this->db->query('UPDATE productos SET stock = :newStock WHERE id = :id');
            $this->db->bind(':newStock', $newStock);
            $this->db->bind(':id', $id);
            return $this->db->execute();
        } else {
            // Manejar el caso donde el stock es insuficiente
            error_log("Stock insuficiente para el producto ID: " . $id);
            return false;
        }
    }
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
}
