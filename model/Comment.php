<?php

class Comment
{
    private $_id;
    private $_postId;
    private $_author;
    private $_contentCom;
    private $_datePostCom;
    private $_report;
    
    
    
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
    
    
    
}