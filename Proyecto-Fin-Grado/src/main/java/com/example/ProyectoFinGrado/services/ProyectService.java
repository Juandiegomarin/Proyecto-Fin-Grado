package com.example.ProyectoFinGrado.services;

import java.util.ArrayList;

import org.hibernate.mapping.List;
import org.springframework.stereotype.Service;

@Service
public class ProyectService {
    
    public ArrayList <String> obtenerProductos(){

        ArrayList <String> lista = new ArrayList<String>();
        lista.add("Hola");
        lista.add("Adios");
        return lista;
    }

}
