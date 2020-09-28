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

    /**
     * Function to return add article
     */
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

    /**
     * Function to return all articles
     */
    public function getArticles()
    {
        $sql = 'SELECT article.id, article.title, article.content, article.author, article.chapo, article.createdAt FROM article ORDER BY article.id DESC';
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
        $sql = 'SELECT article.id, article.title, article.content, article.author, article.chapo, article.createdAt FROM article WHERE article.id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    /**
     * Function to edit article
     */
    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE article SET title=:title, content=:content, author=:author, chapo=:chapo WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'author' => $post->get('author'),
            'chapo' => $post->get('chapo'),
            'articleId' => $articleId
        ]);
    }
}
