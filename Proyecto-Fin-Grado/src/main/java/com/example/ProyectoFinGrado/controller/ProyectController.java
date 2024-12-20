package com.example.ProyectoFinGrado.controller;

import com.example.ProyectoFinGrado.dto.PedidoProductoDTO;
import com.example.ProyectoFinGrado.entities.Alergeno;
import com.example.ProyectoFinGrado.entities.Categoria;
import com.example.ProyectoFinGrado.entities.Pedido;
import com.example.ProyectoFinGrado.entities.Producto;
import com.example.ProyectoFinGrado.entities.Usuario;
import com.example.ProyectoFinGrado.services.ProyectService;

import lombok.RequiredArgsConstructor;
import lombok.extern.slf4j.Slf4j;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

import java.net.URLDecoder;
import java.nio.charset.StandardCharsets;
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

            @RequestParam(name = "nombre") String nombre,
            @RequestParam(name = "email") String email,
            @RequestParam(name = "clave") String clave,
            @RequestParam(name = "clave_verificada") String claveVerificada) {

        return service.comprobarRegistro(nombre, email, clave, claveVerificada);
    }

    @PostMapping("/insertar")
    public String insertar(
            @RequestParam(name = "nombre") String nombre,
            @RequestParam(name = "clave") String clave,
            @RequestParam(name = "email") String email) {
        log.info("Insertar parametros:{}" + nombre + " " + clave + " " + email);
        return service.insertar(nombre, clave, email);
    }

    @GetMapping("/obtenerDatosUsuario/{nombre}")
    public Usuario obtenerDatosUsuario(
        @PathVariable(value = "nombre") String nombre
    ) {
    
        nombre = URLDecoder.decode(nombre, StandardCharsets.UTF_8);
        return service.obtenerDatosUsuario(nombre);
    }
    @PostMapping("/comprobarUsuarioLogueado")
    public String comprobarUsuarioLogueado(
            @RequestParam(name = "nombre") String nombre,
            @RequestParam(name = "clave") String clave) {
        return service.comprobarUsuarioLogueado(nombre, clave);
    }

    @GetMapping("/obtenerCategorias")
    public List<Categoria> obtenerCategorias() {
        return service.obtenerCategorias();
    }

    @GetMapping("/obtenerProductos/{slug}")
    public List<Producto> obtenerProdCategorias(
            @PathVariable(value = "slug") String slug) {
        return service.obtenerProdCategorias(slug);
    }

    @GetMapping("/obtenerProducto/{slug}")
    public Producto obtenerProducto(
            @PathVariable(value = "slug") String slug) {
        return service.obtenerProducto(slug);
    }

    @GetMapping("/obtenerAlergenos")
    public List<Alergeno> obtenerAlergenos() {
        return service.obtenerAlergenos();
    }

    @PostMapping("/insertarPedido")
    public String insertarPedido(
            @RequestBody PedidoProductoDTO pedido) {

        return service.insertarPedido(pedido);
    }

    @GetMapping("/obtenerPedidosUsuario/{nombre}")
    public List<Pedido> obtenerPedidosUsuario(
        @PathVariable(value = "nombre") String nombre
    ) {
    
        nombre = URLDecoder.decode(nombre, StandardCharsets.UTF_8);
        return service.obtenerPedidosUsuario(nombre);
    }

}
