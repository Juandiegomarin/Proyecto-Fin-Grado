package com.example.ProyectoFinGrado.entities;

import java.util.List;

import com.fasterxml.jackson.annotation.JsonManagedReference;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.JoinTable;
import jakarta.persistence.ManyToMany;
import jakarta.persistence.Table;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Table(name = "productos")
@Entity
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class Producto {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)

    @Column(name = "id")
    private Integer idProducto;
    private Integer categoria;
    private String nombre;
    private String slug;
    private String descripcion;
    private Integer unidades;
    private Double precio;
    private String imagen;

    @ManyToMany
    @JoinTable(name = "producto_alergeno", joinColumns = @JoinColumn(name = "idProducto"), inverseJoinColumns = @JoinColumn(name = "idAlergeno"))
    @JsonManagedReference
    private List<Alergeno> alergenos;
}
