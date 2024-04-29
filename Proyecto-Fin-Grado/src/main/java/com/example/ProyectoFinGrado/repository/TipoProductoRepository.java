package com.example.ProyectoFinGrado.repository;

import java.util.List;

import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.TipoProducto;


public interface TipoProductoRepository extends CrudRepository<TipoProducto,Long>{
    
    List<TipoProducto> findAll();
}
