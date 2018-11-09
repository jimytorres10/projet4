<?php

class Comment
{
    private $_id;
    private $_postId;
    private $_author;
    private $_contentCom;
    private $_datePostCom;
    private $_report;
    private $_jour;
    private $_mois;
    private $_annee;
    private $_heure;
    private $_minute;
    
    
    
    public function __construct()
    {
        
    }
    public function hydrate(array $data)
    
    {
        
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    public function id()
    {
        return $this->_id;
    }
    
    public function postId()
    {
        return $this->_postId;
    }
    
    public function author()
    {
        return $this->_author;
    }
    
    public function contentCom()
    {
        return $this->_contentCom;
    }
    
    public function datePostCom()
    {
        return $this->_datePostCom;
    }
    
    public function report()
    {
        return $this->_report;
    }
    public function jour()
    {
        return $this->_jour;
    }
    public function mois()
    {
        return $this->_mois;
    }
    public function annee()
    {
        return $this->_annee;
    }
    public function heure()
    {
        return $this->_heure;
    }
    public function minute()
    {
        return $this->_minute;
    }
    
    
    
    
    
    public function setId($id)
    {
        $this->_id = $id;
    }
    
    public function setPostId($postId)
    {
        $this->_postId = $postId;
    }
    
    public function setAuthor($author)
    {
        $this->_author = $author;
    }
    
    public function setContentCom($ContentCom)
    {
        $this->_contentCom = $ContentCom;
    }
    
    public function setDatePostCom($datePostCom)
    {
        $this->_datePostCom = $datePostCom;
    }
    
    public function setReport($report)
    {
        $this->_report= $report;
    }
    public function setJour($jour)
    {
        $this->_jour = $jour;
    }
    public function setMois($mois)
    {
        $this->_mois = $mois;
    }
    public function setAnnee($annee)
    {
        $this->_annee = $annee;
    }
    public function setMinute($minute)
    {
        $this->_minute = $minute;
    }
    public function setHeure($heure)
    {
        $this->_heure = $heure;
    }
    
    
    
}
