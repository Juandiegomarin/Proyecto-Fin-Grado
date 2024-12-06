package com.example.ProyectoFinGrado.repository;

import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.PedidoProducto;
import com.example.ProyectoFinGrado.entities.PedidoProductoKey;

public interface PedidoProductoRepository extends CrudRepository<PedidoProducto,PedidoProductoKey>{
    
}
