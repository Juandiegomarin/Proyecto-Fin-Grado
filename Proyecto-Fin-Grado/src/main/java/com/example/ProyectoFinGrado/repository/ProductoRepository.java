package com.example.ProyectoFinGrado.repository;
import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.Producto;

public interface ProductoRepository extends CrudRepository<Producto,Long> {
    
    Optional <Producto> findBySlug(String slug);
}
