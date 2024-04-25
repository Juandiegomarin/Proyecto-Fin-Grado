package com.example.ProyectoFinGrado.repository;

import java.util.ArrayList;
import java.util.Optional;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.example.ProyectoFinGrado.entities.Usuario;

@Repository
public interface UsuarioRepository extends CrudRepository<Usuario,Long> {

    Optional<Usuario> findByNombreUsuario(String nombreUsuario);
    Optional<Usuario> findByEmail(String email);
   
} 
