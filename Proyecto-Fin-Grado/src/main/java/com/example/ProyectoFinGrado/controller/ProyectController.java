package com.example.ProyectoFinGrado.controller;


import com.example.ProyectoFinGrado.entities.Categoria;
import com.example.ProyectoFinGrado.entities.Producto;
import com.example.ProyectoFinGrado.entities.Usuario;
import com.example.ProyectoFinGrado.services.ProyectService;

import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import lombok.RequiredArgsConstructor;
import lombok.extern.slf4j.Slf4j;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;

@Slf4j
@CrossOrigin("*")
@RequiredArgsConstructor
@RestController
public class ProyectController {
    
    private final ProyectService service;

    @PostMapping("/existeNombreUsuario")
    public String existeNombreUsuario(
        @RequestParam(name = "name") String name
    ) {
        
        return service.existeNombreUsuario(name);
    }

    @PostMapping("/existeEmail")
    public String existeEmail(
        @RequestParam(name = "email") String email
    ) {
        
        return service.existeEmail(email);
    }
    
    @PostMapping("/insertar")
    public String insertar(
        @RequestParam(name = "name") String name,
        @RequestParam(name = "clave") String clave,
        @RequestParam(name = "email") String email
    ) {
        log.info("Insertar parametros:{}"+name+" "+clave+" "+email);
        return service.insertar(name, clave, email);
    } 
    
    @PostMapping("/comprobarUsuarioLogueado")
    public String comprobarUsuarioLogueado(
        @RequestParam(name = "name") String name,
        @RequestParam(name = "clave") String clave
    ) {
        return service.comprobarUsuarioLogueado(name,clave);
    }

    @GetMapping("/obtenerCategorias")
    public List<Categoria> obtenerCategorias() {
        return service.obtenerCategorias();
    }

    @GetMapping("/obtenerProductos/{idCategoria}")
    public List<Producto> obtenerProdCategorias(
        @PathVariable (value = "idCategoria") Long idCategoria
    ) {
        return service.obtenerProdCategorias(idCategoria);
    }
    
}
