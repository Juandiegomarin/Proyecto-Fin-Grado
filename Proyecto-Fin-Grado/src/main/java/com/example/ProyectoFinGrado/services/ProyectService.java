package com.example.ProyectoFinGrado.services;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.regex.Pattern;
import java.util.regex.Matcher;

import org.springframework.stereotype.Service;

import com.example.ProyectoFinGrado.constants.Constants;
import com.example.ProyectoFinGrado.entities.Alergeno;
import com.example.ProyectoFinGrado.entities.Categoria;
import com.example.ProyectoFinGrado.entities.Producto;
import com.example.ProyectoFinGrado.entities.Usuario;
import com.example.ProyectoFinGrado.repository.AlergenoRepository;
import com.example.ProyectoFinGrado.repository.CategoriaRepository;
import com.example.ProyectoFinGrado.repository.ProductoRepository;
import com.example.ProyectoFinGrado.repository.UsuarioRepository;
import com.fasterxml.jackson.databind.ObjectMapper;

import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;

@Slf4j
@AllArgsConstructor
@Service
public class ProyectService {

    private final UsuarioRepository usuarioRepository;
    private final CategoriaRepository categoriaRepository;
    private final ProductoRepository productoRepository;
    private final AlergenoRepository alergenoRepository;

    private static final String EMAIL_REGEX = "^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+$";

    public String comprobarRegistro(String nombreUsuario, String email, String password,
            String claveVerificada) {

        Optional<Usuario> nombre = usuarioRepository.findByNombreUsuario(nombreUsuario);

        Optional<Usuario> userEmail = usuarioRepository.findByEmail(email);

        ArrayList<String> listErrors = new ArrayList();

        if (nombre.isPresent()) {
            listErrors.add(Constants.EXIST.toString());
        }

        if (!isValidEmail(email)) {
            listErrors.add(Constants.INVALID_EMAIL.toString());
        } else if (userEmail.isPresent()) {
            listErrors.add(Constants.EMAIL_REPEATED.toString());
        }

        if (!password.equals(claveVerificada)) {
            listErrors.add(Constants.WRONG_PASSWORD.toString());
        }

        if (listErrors.isEmpty()) {
            listErrors.add(Constants.OK.toString());
        }

        ObjectMapper mapper = new ObjectMapper();
        String jsonResponse = "";

        try {
            jsonResponse = mapper.writeValueAsString(listErrors);
        } catch (Exception e) {
            return Constants.ERROR.toString();
        }

        return jsonResponse;

    }

    public String insertar(String nombreUsuario, String clave, String email) {

        Usuario usuario = Usuario.builder().nombreUsuario(nombreUsuario).clave(clave).email(email).build();

        try {
            usuarioRepository.save(usuario);
        } catch (Exception e) {
            return Constants.ERROR.toString();
        }

        return Constants.OK.toString();
    }

    public String comprobarUsuarioLogueado(String nombreUsuario, String clave) {
        Optional<Usuario> ul = usuarioRepository.findByNombreUsuarioAndClave(nombreUsuario, clave);

        if (ul.isPresent()) {
            return Constants.EXIST.toString();
        }
        return Constants.NO_EXIST.toString();
    }

    public List<Categoria> obtenerCategorias() {
        return categoriaRepository.findAll();
    }

    public List<Producto> obtenerProdCategorias(String slug) {

        return productoRepository.findByCategoria(slug);
    }

    public Producto obtenerProducto(String slug) {

        return productoRepository.findBySlug(slug).get();
    }
    public List<Alergeno> obtenerAlergenos() {
        return alergenoRepository.findAll();
    }

    public boolean isValidEmail(String email) {
        Pattern pattern = Pattern.compile(EMAIL_REGEX);
        Matcher matcher = pattern.matcher(email);
        return matcher.matches();
    }

}
