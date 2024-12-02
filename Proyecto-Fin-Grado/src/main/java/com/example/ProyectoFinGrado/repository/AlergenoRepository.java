package com.example.ProyectoFinGrado.repository;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import com.example.ProyectoFinGrado.entities.Alergeno;

public interface AlergenoRepository extends CrudRepository<Alergeno, Long> {

    @Query(value = "SELECT * FROM alergenos", nativeQuery = true)
    List<Alergeno> findAll();
}
