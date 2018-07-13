<?php

class Select_model extends CI_Model {

    /**
     * Return : Liste des societes dans le "SELECT"
     * Date : 29 Nov 2016 at 20h37
     * Author : Naruto
     */
    public function getAllSociete() {
        $this->db->select("*");
        $this->db->where("visibilite", 1);
        $query = $this->db->get('societe');

        $query_result = $query->result();
        return $query_result;
    }

    /**
     * Return : Liste des produits dans le "SELECT"
     * Date : 29 Nov 2016 at 20h50
     * Author : Naruto
     */
    public function getAllProduit() {
        $this->db->select("*");
        $this->db->where("visibilite", 1);
        $query = $this->db->get('produit');

        $query_result = $query->result();
        return $query_result;
    }

    /**
     * Return : Liste des formats de produit dans le "SELECT"
     * Date : 29 Nov 2016 at 20h55
     * Author : Naruto
     */
    public function getAllFormatProduit() {
        $this->db->select("*");
        $this->db->where("visibilite", 1);
        $query = $this->db->get('formatproduit');

        $query_result = $query->result();
        return $query_result;
    }

    /**
     * Return : Liste des visiteurs dans le "SELECT"
     * Date : 06 Dec 2016 at 20h17
     * Author : Naruto
     */
    public function getAllVisiteur() {
        $this->db->select("*");
        $query = $this->db->get('visiteur');

        $query_result = $query->result();
        return $query_result;
    }

    /**
     * Return : Liste des pages dans le "SELECT"
     * Date : 06 Dec 2016 at 20h18
     * Author : Naruto
     */
    public function getAllPage() {
        $this->db->select("*");
        $this->db->where("visibilite", 1);
        $query = $this->db->get('page');

        $query_result = $query->result();
        return $query_result;
    }

    /**
     * Return : Liste des utilisateurs dans le "SELECT"
     * Date : 06 Dec 2016 at 20h21
     * Author : Naruto
     */
    public function getAllUtilisateur() {
        $this->db->select("*");
        $this->db->where("visibilite", 1);
        $query = $this->db->get('utilisateur');

        $query_result = $query->result();
        return $query_result;
    }

}

?>