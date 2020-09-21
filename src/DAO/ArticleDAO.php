<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Article;

class ArticleDAO extends DAO
{
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setChapo($row['chapo']);
        $article->setCreatedAt($row['createdAt']);
        return $article;
    }

    public function addArticle(Parameter $articleData)
    {
        $sql = 'INSERT INTO article (title, content, author, chapo, createdAt) VALUES (?, ?, ?, ?, NOW())';
        $this->createQuery($sql, [
            $articleData->get('title'),
            $articleData->get('content'),
            $articleData->get('author'),
            $articleData->get('chapo')
        ]);
    }
}
