package com.example.ProyectoFinGrado.services;

import java.util.List;
import java.util.Optional;

import org.springframework.stereotype.Service;

import com.example.ProyectoFinGrado.constants.Constants;
import com.example.ProyectoFinGrado.entities.TipoProducto;
import com.example.ProyectoFinGrado.entities.Usuario;
import com.example.ProyectoFinGrado.repository.TipoProductoRepository;
import com.example.ProyectoFinGrado.repository.UsuarioRepository;

import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
@Slf4j
@AllArgsConstructor
@Service
public class ProyectService {
    
    private final UsuarioRepository usuarioRepository;
    private final TipoProductoRepository tipoProductoRepository;

    public String existeNombreUsuario(String name){

        Optional<Usuario> n = usuarioRepository.findByNombreUsuario(name);
        
        if(n.isPresent()){
            return Constants.EXIST.toString();
        }
        
        return Constants.NOEXIST.toString();
    }

    public String existeEmail(String email){

        Optional<Usuario> e = usuarioRepository.findByEmail(email);
       
        if(e.isPresent()){
            return Constants.EXIST.toString();
        }
        
        return Constants.NOEXIST.toString();
        
       
    }

    public String insertar(String name,String clave,String email){

        Usuario usuario = Usuario.builder().nombreUsuario(name).clave(clave).email(email).build();

        try {
            usuarioRepository.save(usuario);
        } catch (Exception e) {
            return Constants.ERROR.toString();
        }
        
        return Constants.OK.toString();
    }

        public String comprobarUsuarioLogueado(String name,String clave){
        Optional <Usuario> ul= usuarioRepository.findByNombreUsuarioAndClave(name, clave);

        if (ul.isPresent()) {
            return Constants.EXIST.toString();
        }
        return Constants.NOEXIST.toString();
    }

    public List<TipoProducto> obtenerTiposProductos(){

        return tipoProductoRepository.findAll();
    }
}
