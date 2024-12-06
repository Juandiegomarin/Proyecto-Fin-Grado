package com.example.ProyectoFinGrado.repository;

import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.Alergeno;
import com.example.ProyectoFinGrado.entities.Pedido;

public interface PedidoRepository extends CrudRepository<Pedido, Long> {
    
}
