package com.example.ProyectoFinGrado.services;

import java.lang.reflect.Array;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.regex.Pattern;
import java.util.regex.Matcher;

import org.springframework.stereotype.Service;

import com.example.ProyectoFinGrado.constants.Constants;
import com.example.ProyectoFinGrado.entities.Categoria;
import com.example.ProyectoFinGrado.entities.Producto;
import com.example.ProyectoFinGrado.entities.Usuario;
import com.example.ProyectoFinGrado.repository.CategoriaRepository;
import com.example.ProyectoFinGrado.repository.ProductoRepository;
import com.example.ProyectoFinGrado.repository.UsuarioRepository;

import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;

@Slf4j
@AllArgsConstructor
@Service
public class ProyectService {

    private final UsuarioRepository usuarioRepository;
    private final CategoriaRepository categoriaRepository;
    private final ProductoRepository productoRepository;

    private static final String EMAIL_REGEX = "^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+$";

    public String[] comprobarRegistro(String name, String email, String password, String verifiedPassword) {

        Optional<Usuario> userName = usuarioRepository.findByNombreUsuario(name);

        Optional<Usuario> userEmail = usuarioRepository.findByEmail(email);

        System.out.println("ProyectService.comprobarRegistro()");

        List<String> response = new ArrayList<>();

        if (userName.isPresent()) {
            response.add(Constants.EXIST.toString());
        }

        if (!isValidEmail(email)) {
            response.add(Constants.INVALID_EMAIL.toString());
        } else if (userEmail.isPresent()) {
            response.add(Constants.EMAIL_REPEATED.toString());
        }

        if(!password.equals(verifiedPassword)){
            response.add(Constants.WRONG_PASSWORD.toString());
        }
;
        if(response.isEmpty()){
            response.add(Constants.OK.toString());
        }

        String[] array = response.toArray(new String[response.size()]);
        return array;
    }

    public String insertar(String name, String clave, String email) {

        Usuario usuario = Usuario.builder().nombreUsuario(name).clave(clave).email(email).build();

        try {
            usuarioRepository.save(usuario);
        } catch (Exception e) {
            return Constants.ERROR.toString();
        }

        return Constants.OK.toString();
    }

    public String comprobarUsuarioLogueado(String name, String clave) {
        Optional<Usuario> ul = usuarioRepository.findByNombreUsuarioAndClave(name, clave);

        if (ul.isPresent()) {
            return Constants.EXIST.toString();
        }
        return Constants.NOEXIST.toString();
    }

    public List<Categoria> obtenerCategorias() {
        return categoriaRepository.findAll();
    }

    public List<Producto> obtenerProdCategorias(Long idCategoria) {

        return productoRepository.findByCategoria(idCategoria);
    }

    public boolean isValidEmail(String email) {
        Pattern pattern = Pattern.compile(EMAIL_REGEX);
        Matcher matcher = pattern.matcher(email);
        return matcher.matches();
    }

}
