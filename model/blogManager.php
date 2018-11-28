<?php
class BlogManager
{
    private $_db;
    
    public function __construct($db)
    {
        $this->setDb($db);
        
    }
    
    public function add(Blog $article)
    {
        $q = $this->_db->prepare('INSERT INTO article(title, content, author, datePost) VALUES(:title, :content, :author, :date_post)');
        
        $q->bindValue(':title', $article->title());
        $q->bindValue(':content', $article->content());
        $q->bindValue(':author', $article->author());
        $q->bindValue(':date_post', $article->datePost());
        
        
        
        $q->execute();
        
    }
    
    public function delete($idArticle)
    {
        $q = $this->_db->prepare('DELETE FROM article WHERE id = :id');
        
        $q->bindValue(':id', $idArticle);
        
        $q->execute();
        
    }
    
    public function get($id)
    {
        $q = $this->_db->query('SELECT id, title, content, author, datePost, DAY(datePost) AS jour, MONTH(datePost) AS mois, YEAR(datePost) AS annee, HOUR(datePost) AS heure, MINUTE(datePost) AS minute, SECOND(datePost) FROM article WHERE id ='.$id);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $selectArticle = new blog();
        
        $selectArticle->hydrate($data);
        
        return $selectArticle;
        
            
    }
    /**
     * Cette méthode retourne une liste d'article
     * @return array[Blog] : la liste des articles
     */
    public function getList()
    {
        $articles = [];
        $q = $this->_db->query('SELECT id, title, content, author, datePost, DAY(datePost) AS jour, MONTH(datePost) AS mois, YEAR(datePost) AS annee, HOUR(datePost) AS heure, MINUTE(datePost) AS minute, SECOND(datePost) FROM article');
        
        while ($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            
            $article =  new Blog();
            $article->hydrate($data);
            $articles[] = $article;
            
            
        }
        
        return $articles;
    }
        
     
    public function update(Blog $article)
    {
        $q = $this->_db->prepare('UPDATE article SET title = :title, content = :content, author = :author WHERE id = :id');

        $q->bindValue(':title', $article->title());
        $q->bindValue(':content', $article->content());
        $q->bindValue(':author', $article->author());
        $q->bindValue(':id', $article->id());


        $q->execute();
    }
    
    
    public function setDb(PDO $db)
    {
        $this->_db = $db;
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
    
}
