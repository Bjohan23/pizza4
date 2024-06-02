<?php
class Producto extends Model
{
    public function getAllProductos()
    {
        $this->db->query('SELECT Productos.id, Productos.nombre, Productos.descripcion, Productos.precio, Productos.disponible, Categoría.nombre as categoria FROM Productos 
                          JOIN Categoría ON Productos.categoria_id = Categoría.id');
        return $this->db->resultSet();
    }

    public function createProducto($data)
    {
        $this->db->query('INSERT INTO Productos (nombre, descripcion, precio, disponible, categoria_id) VALUES (:nombre, :descripcion, :precio, :disponible, :categoria_id)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':precio', $data['precio']);
        $this->db->bind(':disponible', $data['disponible']);
        $this->db->bind(':categoria_id', $data['categoria_id']);
        return $this->db->execute();
    }

    public function getProductoById($id)
    {
        $this->db->query('SELECT * FROM Productos WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateProducto($data)
    {
        $this->db->query('UPDATE Productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, disponible = :disponible, categoria_id = :categoria_id WHERE id = :id');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':precio', $data['precio']);
        $this->db->bind(':disponible', $data['disponible']);
        $this->db->bind(':categoria_id', $data['categoria_id']);
        $this->db->bind(':id', $data['id']);
        return $this->db->execute();
    }

    public function deleteProducto($id)
    {
        $this->db->query('DELETE FROM Productos WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
