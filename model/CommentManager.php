<?php
class CommentManager
{
    private $_db;
    
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
    public function add(Comment $com)
    {
        $q = $this->_db->prepare('INSERT INTO comment (postId, author, contentCom, datePostCom, report ) VALUES(:postId, :author, :contentCom, :datePostCom, :report)');
        
        $q->bindValue(':postId', $com->postId());
        $q->bindValue(':author', $com->author());
        $q->bindValue(':contentCom', $com->contentCom());
        $q->bindValue(':datePostCom', $com->datePostCom());
        $q->bindValue(':report', $com->report());
        
        
        $q->execute() ;
    }
    
    public function delete($com)
    {
        $q = $this->_db->prepare('DELETE FROM comment WHERE id = :id');
        
        $q->bindValue(':id', $com);
        
        $q->execute();
        
    }
    
    public function get($id)
    {
        $q = $this->_db->query('select id, postId,author,contentCom, datePostCom, report, DAY(datePostCom) AS jour, MONTH(datePostCom) AS mois, YEAR(datePostCom) AS annee, HOUR(datePostCom) AS heure, MINUTE(datePostCom) AS minute from comment WHERE id ='.$id);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $selectCom = new Comment();
        
        $selectCom->hydrate($data);
        
        return $selectCom;
        
        
    }
    /**
     * Cette méthode retourne une liste d'article
     * @return array[Blog] : la liste des articles
     */
    public function getList()
    {
        $coms = [];
        $q = $this->_db->query('SELECT id, postId,author,contentCom, datePostCom, report, DAY(datePostCom) AS jour, MONTH(datePostCom) AS mois, YEAR(datePostCom) AS annee, HOUR(datePostCom) AS heure, MINUTE(datePostCom) AS minute FROM comment');
        while ($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            
            $com =  new Comment();
            $com->hydrate($data);
            $coms[] = $com;
            
        }
        
        
        return $coms;
    }
    public function getListByPostId($id)
    {
        $coms = [];
        $q = $this->_db->query('SELECT id, postId,author,contentCom, datePostCom, report, DAY(datePostCom) AS jour, MONTH(datePostCom) AS mois, YEAR(datePostCom) AS annee, HOUR(datePostCom) AS heure, MINUTE(datePostCom) AS minute FROM comment  WHERE postId = '.$id.' ORDER BY datePostCom DESC');
        while ($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            
            $com =  new Comment();
            $com->hydrate($data);
            $coms[] = $com;
            
        }
        
        
        return $coms;
    }
    
    public function update(Comment $com)
    {
        $q = $this->_db->prepare('UPDATE comment SET contentCom = :contentCom, author = :author, report = :report WHERE id = :id');
        
        $q->bindValue(':contentCom', $com->contentCom());
        $q->bindValue(':author', $com->author());
        $q->bindValue(':report', $com->report());
 
        $q->bindValue(':id', $com->id());
        
        
        $q->execute();
    }
    public function save(blog $article)
    {
        if (is_null($article->id()))
        {
            $this->add($article);
        }else{
            $this->update($article);
        }
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
}
