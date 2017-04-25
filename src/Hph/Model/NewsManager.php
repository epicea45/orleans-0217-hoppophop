<?php

namespace Hph\Model;
use Hph\ImgValidator;
use Hph\TextValidator;
use PDO;

class NewsManager extends \Hph\Db
{

    public function getNews($limit)
    {
        $req = "SELECT * FROM news LIMIT 0, $limit";
        return $this->dBQuery($req, 'News');
    }
    public function getNewsOne($id)
    {
        $req = "SELECT * FROM news WHERE id=$id";
        return $this->dBQuery($req, 'News');
    }
    public function getBreakingNews()
    {
        $req = "SELECT * FROM news WHERE breaking_news='1'";
        return $this->dBQuery($req, 'News');
    }
    public function addNews($post, $file)
    {
        if(!isset($post['breaking_news'])){
            $post['breaking_news'] = 0;
        }
        $vImg = new ImgValidator($file);
        $rImg = $vImg->validate();
        if($rImg!==true){
            return $rImg;
        }
        $file['img']['name'] = $this->nameImg($file['img']['name']);
        $vTitle = new TextValidator($post['title'], 200);
        $rTitle = $vTitle->validate();
        if($rTitle!==true){
            return $rTitle;
        }
        $vText = new TextValidator($post['text']);
        $rText = $vText->validate();
        if($rText!==true){
            return $rText;
        }
        $query = "INSERT INTO news VALUES (NULL, :title, :img, :about, :breaking_news)";
        $prep = $this->getDb()->prepare($query);
        $prep->bindValue(':title', $post['title'], PDO::PARAM_STR);
        $prep->bindValue(':img', $file['img']['name'], PDO::PARAM_STR);
        $prep->bindValue(':about', $post['text'], PDO::PARAM_STR);
        $prep->bindValue(':breaking_news', $post['breaking_news'], PDO::PARAM_INT);
        $result = $prep->execute();
        if($result){
            return $this->addImg($file, 'news');
        }
        return $result;
    }
    public function updateNews($post, $file)
    {
        if(!isset($post['breaking_news'])){
            $post['breaking_news'] = 0;
        }
        $vImg = new ImgValidator($file);
        $rImg = $vImg->validate();
        if($rImg!==true){
            return $rImg;
        }
        $vTitle = new TextValidator($post['title'], 200);
        $rTitle = $vTitle->validate();
        if($rTitle!==true){
            return $rTitle;
        }
        $vText = new TextValidator($post['text']);
        $rText = $vText->validate();
        if($rText!==true){
            return $rText;
        }
        if($file['img']['name']!=''){
            $file['img']['name'] = $this->nameImg($file['img']['name']);
            $query = "UPDATE news SET title = :title, img_news = :img, text = :about, breaking_news = :breaking_news WHERE id = :id";
        }else{
            $query = "UPDATE news SET title = :title, text = :about, breaking_news = :breaking_news WHERE id = :id";
        }
        $prep = $this->getDb()->prepare($query);
        $prep->bindValue(':id', $post['id'], PDO::PARAM_INT);
        $prep->bindValue(':title', $post['title'], PDO::PARAM_STR);
        $prep->bindValue(':img', $file['img']['name'], PDO::PARAM_STR);
        $prep->bindValue(':about', $post['text'], PDO::PARAM_STR);
        $prep->bindValue(':breaking_news', $post['breaking_news'], PDO::PARAM_INT);
        $result = $prep->execute();
        if($result){
            if($file['img']['name']!=''){
                return $this->addImg($file, 'news', $post['id']);
            }
            return true;
        }
        return $result;
    }
    public function deleteNews($id)
    {
        $sql = "DELETE FROM news WHERE id=".$id;
        if($this->getDb()->exec($sql)){
            return $this->supprImg($id, 'news');
        }
        return false;
    }
}