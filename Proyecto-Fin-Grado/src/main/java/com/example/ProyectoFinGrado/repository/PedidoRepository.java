package com.example.ProyectoFinGrado.repository;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;


import com.example.ProyectoFinGrado.entities.Pedido;
import com.example.ProyectoFinGrado.entities.Usuario;

public interface PedidoRepository extends CrudRepository<Pedido, Long> {
    
    @Query(value = "SELECT * FROM pedidos p where p.id_usuario = :id", nativeQuery = true)
    List<Pedido> findByUsuario(Integer id);;
}
