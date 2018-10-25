<?php

class Blog
{
    private $_id;
    private $_title;
    private $_author;
    private $_content;
    private $_datePost;
    
    
    
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
    
    
    
    
    
    
    
}