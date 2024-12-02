package com.example.ProyectoFinGrado.entities;

import jakarta.persistence.EmbeddedId;
import jakarta.persistence.Entity;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.MapsId;
import jakarta.persistence.Table;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Table(name = "producto_pedido")
@Entity
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class PedidoProducto {

    @EmbeddedId
    private PedidoProductoKey id;

    @ManyToOne
    @MapsId("idPedido")
    @JoinColumn(name = "idPedido")
    private Pedido pedido;

    @ManyToOne
    @MapsId("idProducto")
    @JoinColumn(name = "idProducto")
    private Producto producto;

    private int unidades;
    private double precio;

}
