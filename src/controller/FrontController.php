<?php

namespace App\src\controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class FrontController extends Controller
{
    /**
     * Function to return all articles on page home
     */
    public function home()
    {
        $articles = $this->articleDAO->getLastArticles();
        return $this->view->render('home', [
            'articles' => $articles
        ]);
    }

    /**
     * Function to register member with validation
     */
    public function register($post)
    {
        if ($post->get('submit')) {

            $errors = $this->validation->validate($post, 'User');
            $pseudoAlreadyUsed = $this->userDAO->checkDuplicatePseudo($post);


            if ($pseudoAlreadyUsed) {
                $this->session->set('duplicatePseudo', 'Le pseudo est déjà pris');
                return $this->view->render('register');
            }

            if (!$errors) {
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                return $this->view->render('login');
            }

            return $this->view->render('register', [
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    /**
     * Function to login
     */
    public function login($post)
    {
        if ($post->get('submit')) {
            $result = $this->userDAO->login($post);

            if ($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('pseudo', $post->get('pseudo'));
                $this->session->set('role', $result['result']['name']);
                header('Location: /index.php');
            }

            $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
            return $this->view->render('login', [
                'post' => $post
            ]);
        }
        return $this->view->render('login');
    }

    /**
     * Function to display article by id
     */
    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    /**
     * Function to return and display all articles on page blog
     */
    public function blog()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('blog', [
            'articles' => $articles
        ]);
    }

    /**
     * Function to add comment by article ID
     */
    public function addComment($post, $articleId)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if (!$errors) {
                $this->commentDAO->addComment($post, $articleId);
                $this->session->set('add_comment', 'Le commentaire est soumis à validation');
                header('Location: /index.php?route=article&articleId=' . $articleId);
            }

            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    /**
     * Function to contact administration from web page and form
     */
    public function contact($post)
    {
        if ($post->get('submit')) {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = 'matheo.zeller@gmail.com';                     //SMTP username
                $mail->Password = 'nezzeixzihkuqqnl';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('matheo.zeller@gmail.com', "blog");
                $mail->addAddress('matheo.zeller@gmail.com', 'Mathéo Zeller');
                $mail->addReplyTo($post->get('email'), $post->get('name'));

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $post->get('name') . ' vous contacte';
                $mail->Body = 'Email de réponse : ' . $post->get('email') . "<br/>" . $post->get('message');

                $mail->send();

                header('Location: /index.php');

            } catch (Exception $e) {
                return ($mail->ErrorInfo);
            }
        }
    }
}
