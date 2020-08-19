/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.resfull.session;

import com.restfull.entidades.Peliculas;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

/**
 *
 * @author hp
 */
@Stateless
public class PeliculasFacade extends AbstractFacade<Peliculas> {

    @PersistenceContext(unitName = "epn_RestFulPeliculas_war_1.0-SNAPSHOTPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public PeliculasFacade() {
        super(Peliculas.class);
    }
    
}
