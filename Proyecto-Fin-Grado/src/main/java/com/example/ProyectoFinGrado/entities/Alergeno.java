package com.example.ProyectoFinGrado.entities;


import java.util.List;

import com.fasterxml.jackson.annotation.JsonBackReference;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToMany;
import jakarta.persistence.Table;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Table(name = "alergenos")
@Entity
@NoArgsConstructor
@AllArgsConstructor
@Builder

public class Alergeno {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)

    @Column(name = "id")
    private Integer idAlergeno;
    private String nombre;
    private String imagen;

    @ManyToMany(mappedBy = "alergenos")
    @JsonBackReference
    private List<Producto> productos;
}
