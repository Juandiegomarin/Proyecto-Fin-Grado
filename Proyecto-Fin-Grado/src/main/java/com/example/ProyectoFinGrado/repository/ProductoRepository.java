package com.example.ProyectoFinGrado.repository;
import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.Producto;

public interface ProductoRepository extends CrudRepository<Producto,Long> {
    @Query(value = "SELECT * FROM productos p WHERE p.categoria = (SELECT c.id from categorias c where c.slug = :slug) ORDER BY p.nombre ASC ", nativeQuery = true)
    List<Producto> findByCategoria(String slug);

    Optional <Producto> findById(Long id);
}
