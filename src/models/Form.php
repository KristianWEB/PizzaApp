<?php

// THIS FILE IS GOING TO BE REFACTORED BECAUSE I DON'T WANT TO DEPEND ON THOSE IFS AND ELSES
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
    }

    public  function getItems()
    {
        return [
          'titlePOST' => $this->titlePOST,
          'ingredientsPOST' => $this->ingredientsPOST,
          'emailPOST' => $this->emailPOST
        ];
    }

    private function checkItem($item) {
        if ($item === $this->title) {
            //check title
            if (empty($_POST[$this->title])) {

               $this->errors['pizzaName'] = "A title is required <br>";

            } else {
                $this->titlePOST = $_POST[$this->title];
                if (!preg_match('/^[a-zA-Z\s]+$/', $this->titlePOST)) {
                    $this->errors['pizzaName'] = 'Title must be letters and spaces only';
                    $this->titlePOST = null;
                }
            }
        } elseif ($item === $this->ingredients) {
            if (empty($_POST[$this->ingredients])) {
                $this->errors['pizzaIngredients'] = "At least one ingredient is required <br>";
            } else {
                $this->ingredientsPOST = $_POST[$this->ingredients];
                if (!preg_match('/^([a-zA-Z\s]+)(, \s*[a-zA-Z\s]*)*$/', $this->ingredientsPOST)) {
                 $this->errors['pizzaIngredients'] = 'Ingredients must be a comma separated list';
                    $this->ingredientsPOST = null;

                }
            }
        } elseif ($item === $this->email) {

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
    }

    public function validate()
    {
        if (isset($this->btn)) {
            $this->checkItem($this->title);
            $this->checkItem($this->ingredients);
            $this->checkItem($this->email);
        }

        $this->titlePOST= htmlspecialchars(strip_tags($this->titlePOST));
        $this->ingredientsPOST = htmlspecialchars(strip_tags($this->ingredientsPOST));
        $this->emailPOST = htmlspecialchars(strip_tags($this->emailPOST));
    }

    public function displayData()
    {
        var_dump($this->titlePOST);
        var_dump($this->ingredientsPOST);
        var_dump($this->emailPOST);
    }
}


