<?php

// THIS FILE IS GOING TO BE REFACTORED AFTER BACKEND READY RELEASE

namespace src\models;

class Form
{

    private $title;
    private $ingredients;
    private $email;
    private $btn;
    private $titlePOST;
    private $ingredientsPOST;
    private $emailPOST;
    public $errors = ['pizzaName' => '', 'pizzaIngredients' => '', 'pizzaEmail' => ''];

    public function __construct($title, $ingredients, $email, $btn)
    {
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->email = $email;
        $this->btn = $btn;

        $this->validate();
    }

    public function getItems()
    {
        if ($this->titlePOST && $this->ingredientsPOST && $this->emailPOST) {
            return [
                'titlePOST' => $this->titlePOST,
                'ingredientsPOST' => $this->ingredientsPOST,
                'emailPOST' => $this->emailPOST
            ];
        }
    }

    public function checkTitle()
    {
        if (empty($_POST[$this->title])) {

            $this->errors['pizzaName'] = "A title is required <br>";

        } else {
            $this->titlePOST = $_POST[$this->title];
            if (!preg_match('/^[a-zA-Z\s]+$/', $this->titlePOST)) {
                $this->errors['pizzaName'] = 'Title must be letters and spaces only';
                $this->titlePOST = null;
            }
        }
    }

    public function checkIngredients()
    {
        if (empty($_POST[$this->ingredients])) {
            $this->errors['pizzaIngredients'] = "At least one ingredient is required <br>";
        } else {
            $this->ingredientsPOST = $_POST[$this->ingredients];
            if (!preg_match('/^([a-zA-Z\s]+)(, \s*[a-zA-Z\s]*)*$/', $this->ingredientsPOST)) {
                $this->errors['pizzaIngredients'] = 'Ingredients must be a comma separated list';
                $this->ingredientsPOST = null;

            }
        }
    }

    public function checkEmail()
    {
        if (empty($_POST[$this->email])) {
            $this->errors['pizzaEmail'] = "Email is required<br>";
        } else {
            $this->emailPOST = $_POST[$this->email];
            if (!filter_var($this->emailPOST, FILTER_VALIDATE_EMAIL)) {
                $this->errors['pizzaEmail'] = 'Email must be a valid email address';
                $this->emailPOST = null;
            }
        }
    }

    public function validate()
    {
        if (isset($_POST[$this->btn])) {
            $this->checkTitle();
            $this->checkIngredients();
            $this->checkEmail();
        }

        $this->titlePOST = htmlspecialchars(strip_tags($this->titlePOST));
        $this->ingredientsPOST = htmlspecialchars(strip_tags($this->ingredientsPOST));
        $this->emailPOST = htmlspecialchars(strip_tags($this->emailPOST));

    }
}


