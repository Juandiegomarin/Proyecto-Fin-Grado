package com.example.ProyectoFinGrado.repository;


import java.util.Optional;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.example.ProyectoFinGrado.entities.Usuario;



@Repository
public interface UsuarioRepository extends CrudRepository<Usuario,Long> {

    Optional<Usuario> findByUserName(String userName);
    Optional<Usuario> findByEmail(String email);
    Optional<Usuario> findByUserNameAndPassword(String userName, String password);
} 
