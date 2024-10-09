package com.example.ProyectoFinGrado.controller;

import com.example.ProyectoFinGrado.entities.Categoria;
import com.example.ProyectoFinGrado.entities.Producto;
import com.example.ProyectoFinGrado.services.ProyectService;

import lombok.RequiredArgsConstructor;
import lombok.extern.slf4j.Slf4j;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.ArrayList;
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

    @PostMapping("/comprobarRegistro")
    public String comprobarRegistro(

            @RequestParam(name = "name") String name,
            @RequestParam(name = "email") String email,
            @RequestParam(name = "password") String password,
            @RequestParam(name = "verified_password") String verifiedPassword) {

        return service.comprobarRegistro(name, email, password, verifiedPassword);
    }

    @PostMapping("/insertar")
    public String insertar(
            @RequestParam(name = "name") String name,
            @RequestParam(name = "password") String password,
            @RequestParam(name = "email") String email) {
        log.info("Insertar parametros:{}" + name + " " + password + " " + email);
        return service.insertar(name, password, email);
    }

    @PostMapping("/comprobarUsuarioLogueado")
    public String comprobarUsuarioLogueado(
            @RequestParam(name = "name") String name,
            @RequestParam(name = "password") String password) {
        return service.comprobarUsuarioLogueado(name, password);
    }

    @GetMapping("/obtenerCategorias")
    public List<Categoria> obtenerCategorias() {
        return service.obtenerCategorias();
    }

    @GetMapping("/obtenerProductos/{idCategoria}")
    public List<Producto> obtenerProdCategorias(
            @PathVariable(value = "idCategoria") Long idCategoria) {
        return service.obtenerProdCategorias(idCategoria);
    }

}
