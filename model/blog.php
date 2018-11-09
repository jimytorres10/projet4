<?php

class Blog
{
    private $_id;
    private $_title;
    private $_author;
    private $_content;
    private $_datePost;
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
    public function title()
    {
        return $this->_title;
    }
    public function author()
    {
        return $this->_author;
    }
    public function content()
    {
        return $this->_content;
    }
    public function datePost()
    {
        return $this->_datePost;
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
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setAuthor($author)
    {
        $this->_author = $author;
    }
    public function setContent($content)
    {
        $this->_content = $content;
    }
    public function setDatePost($datePost)
    {
        $this->_datePost = $datePost;
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
