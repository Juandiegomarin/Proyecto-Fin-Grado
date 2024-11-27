package com.example.ProyectoFinGrado.repository;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.Categoria;


public interface CategoriaRepository extends CrudRepository<Categoria,Long>{
    
     @Query(value = "SELECT * FROM categorias c ORDER BY c.nombre ASC ", nativeQuery = true)
    List<Categoria> findAll();
}
