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
        $article->setChapo($row['chapo']);
        $article->setCreatedAt($row['createdAt']);
        $article->setAuthor($row['pseudo']);
        $article->setUpdatedAt($row['updatedAt']);
        return $article;
    }

    /**
     * Function to return add article
     */
    public function addArticle(Parameter $articleData, $userId)
    {

        $sql = 'INSERT INTO article (title, content, chapo, createdAt, user_id) VALUES (?, ?, ?, NOW(), ?)';
        // var_dump($sql);
        // var_dump($userId);
        // exit;
        $this->createQuery($sql, [
            $articleData->get('title'),
            $articleData->get('content'),
            $articleData->get('chapo'),
            $userId
        ]);
    }

    /**
     * Function to return all articles
     */
    public function getArticles()
    {
        $sql = 'SELECT article.id, article.title, article.content, article.chapo, article.createdAt, user.pseudo, article.updatedAt FROM article INNER JOIN user ON article.user_id = user.id ORDER BY article.id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    /**
     * Function to return article by id
     */
    public function getArticle($articleId)
    {
        $sql = 'SELECT article.id, article.title, article.content, article.chapo, article.createdAt, user.pseudo, article.updatedAt FROM article INNER JOIN user ON article.user_id = user.id WHERE article.id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    /**
     * Function to edit article
     */
    public function editArticle(Parameter $post, $articleId, $userId)
    {
        $sql = 'UPDATE article SET title=:title, content=:content, chapo=:chapo, user_id=:user_id, updatedAt=NOW() WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'chapo' => $post->get('chapo'),
            'user_id' => $userId,
            'articleId' => $articleId
        ]);
    }
}
