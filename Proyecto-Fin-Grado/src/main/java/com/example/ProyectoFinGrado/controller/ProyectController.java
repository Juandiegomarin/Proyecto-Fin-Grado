package com.example.ProyectoFinGrado.controller;


import com.example.ProyectoFinGrado.services.ProyectService;

import lombok.RequiredArgsConstructor;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.ArrayList;

import org.hibernate.mapping.List;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@CrossOrigin("*")
@RequiredArgsConstructor
@RestController
public class ProyectController {
    
    private final ProyectService service;

    @GetMapping("/productos")
    public ArrayList<String> productos() {
        
        return service.obtenerProductos();
    }
}
