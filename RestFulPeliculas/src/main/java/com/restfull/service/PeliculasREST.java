package com.restfull.service;

import com.resfull.session.PeliculasFacade;
import com.restfull.entidades.Peliculas;
import java.util.List;
import javax.ejb.EJB;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

@Path("Peliculas")

public class PeliculasREST {
    
    @EJB
    private PeliculasFacade personalFacade;
    
    //Consultar toda la lista:
    @GET
    @Produces({MediaType.APPLICATION_JSON})
    public List<Peliculas> findall(){
        return personalFacade.findAll();
    }
    
    //Consultar uno en específico
    @GET
    @Produces({MediaType.APPLICATION_JSON})
    @Path("{id}")
    public Peliculas findByID(@PathParam("id") Integer id){
        return personalFacade.find(id);
    }
    
    //Agregar
    @POST
    @Produces({MediaType.APPLICATION_JSON})
    public Response create (Peliculas p){
        personalFacade.create(p);
        
         return Response.ok("Se ha agregado correctamente!").build();
    }
    
    //Eliminar
    @DELETE
    @Produces({MediaType.APPLICATION_JSON})
    @Path("{id}")
    public Response remove (@PathParam("id") Integer id){
        personalFacade.remove(personalFacade.find(id));
        return Response.ok("Se ha eliminado correctamente!").build();

    }
    
    //Editar
    @PUT
    @Produces({MediaType.APPLICATION_JSON})
    @Path("{id}")
    public Response edit (@PathParam("id") Integer id, Peliculas p){
        p.setId(id);
        personalFacade.edit(p);
        return Response.ok("Se ha modificado correctamente!").build();
    }
    
    //TAREA DESAFÍO :) 
    
}
