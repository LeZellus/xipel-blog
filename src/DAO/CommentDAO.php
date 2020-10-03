<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Comment;

class CommentDAO extends DAO
{
    /**
     * Function to build comment
     */
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->setFlag($row['flag']);
        return $comment;
    }

    /**
     * Function to return comment from article ID
     */
    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    /**
     * Function to add comment by article ID
     */
    public function addComment(Parameter $post, $articleId)
    {
        $sql = 'INSERT INTO comment (pseudo, content, createdAt, flag, article_id) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), 0, $articleId]);
    }


    /**
     * Function to get flag comment from comment ID
     */
    public function getFlagComments()
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment WHERE flag = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [0]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    /**
     * Function to flag comment from comment ID
     */
    public function flagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    /**
     * Function to remove comment from comment ID
     */
    public function removeComment($commentId)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }
}
