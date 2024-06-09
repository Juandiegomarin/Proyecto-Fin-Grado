package com.example.ProyectoFinGrado.repository;
import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.Producto;

public interface ProductoRepository extends CrudRepository<Producto,Long> {
    @Query(value = "SELECT * FROM productos WHERE categoria = :categoria", nativeQuery = true)
    List<Producto> findByCategoria(Long categoria);
}
