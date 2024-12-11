package com.example.ProyectoFinGrado.services;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.regex.Pattern;
import java.util.regex.Matcher;

import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.example.ProyectoFinGrado.constants.Constants;
import com.example.ProyectoFinGrado.entities.Alergeno;
import com.example.ProyectoFinGrado.entities.Categoria;
import com.example.ProyectoFinGrado.entities.Pedido;
import com.example.ProyectoFinGrado.entities.PedidoProducto;
import com.example.ProyectoFinGrado.entities.PedidoProductoKey;
import com.example.ProyectoFinGrado.entities.Producto;
import com.example.ProyectoFinGrado.entities.Usuario;
import com.example.ProyectoFinGrado.repository.AlergenoRepository;
import com.example.ProyectoFinGrado.repository.CategoriaRepository;
import com.example.ProyectoFinGrado.repository.PedidoProductoRepository;
import com.example.ProyectoFinGrado.repository.PedidoRepository;
import com.example.ProyectoFinGrado.repository.ProductoRepository;
import com.example.ProyectoFinGrado.repository.UsuarioRepository;
import com.fasterxml.jackson.databind.ObjectMapper;

import dto.PedidoProductoDTO;
import dto.ProductoDTO;
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
    private final PedidoRepository pedidoRepository;
    private final PedidoProductoRepository pedidoProductoRepository;

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

    public Usuario obtenerDatosUsuario(String nombre){
        
        return usuarioRepository.findByNombreUsuario(nombre).get();
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

        return categoriaRepository.findBySlug(slug).get().getProductos();
    }

    public Producto obtenerProducto(String slug) {

        return productoRepository.findBySlug(slug).get();
    }

    public List<Alergeno> obtenerAlergenos() {
        return alergenoRepository.findAll();
    }

    @Transactional
    public String insertarPedido(PedidoProductoDTO pedidoProducto) {

        Usuario user = usuarioRepository.findByNombreUsuario(pedidoProducto.getUser()).get();

        List<ProductoDTO> productoDTOs = pedidoProducto.getProductos();

        double total = productoDTOs.stream()
                .mapToDouble(ProductoDTO::getPrecio)
                .sum();

        try {
            Pedido pedido = Pedido.builder().usuario(user).total(total).fechaPedido(LocalDateTime.now()).build();
            pedidoRepository.save(pedido);

            int idPedido = pedido.getIdPedido();

            for (ProductoDTO productoDTO : productoDTOs) {

                PedidoProductoKey pedidoProductoKey = PedidoProductoKey.builder().idPedido(idPedido)
                        .idProducto(productoDTO.getId()).build();

                PedidoProducto p = new PedidoProducto();
                p.setId(pedidoProductoKey);
                p.setPedido(pedido);

                Producto paux = productoRepository.findById(Long.valueOf(productoDTO.getId())).get();
                p.setProducto(paux);
                p.setNombre(paux.getNombre());
                p.setPrecio(productoDTO.getPrecio());
                p.setUnidades(productoDTO.getUnidades());

                pedidoProductoRepository.save(p);

                paux.setUnidades(paux.getUnidades()-productoDTO.getUnidades());
                productoRepository.save(paux);
            }

            return Constants.OK.toString();

        } catch (Exception e) {
            log.error("Error al insertar los productos", e.getMessage());
            return Constants.ERROR.toString();
        }
    }

    public List<Pedido> obtenerPedidosUsuario(String nombre) {

        int idUsuario = usuarioRepository.findByNombreUsuario(nombre).get().getIdUsuario();

        return pedidoRepository.findByUsuario(idUsuario);

    }

    public boolean isValidEmail(String email) {
        Pattern pattern = Pattern.compile(EMAIL_REGEX);
        Matcher matcher = pattern.matcher(email);
        return matcher.matches();
    }

}
