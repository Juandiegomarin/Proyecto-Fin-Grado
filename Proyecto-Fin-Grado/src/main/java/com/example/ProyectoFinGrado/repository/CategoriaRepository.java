package com.example.ProyectoFinGrado.repository;

import java.util.List;

import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.Categoria;


public interface CategoriaRepository extends CrudRepository<Categoria,Long>{
    
    List<Categoria> findAll();
}
