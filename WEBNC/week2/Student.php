<?php
    class Student 
    {
        public $name;
        public $email;
        public $score;

        //Constructor
        public function __construct($name, $email, $score) 
        {
            $this->name = $name;
            $this->email = $email;
            $this->score = $score;
        }

        public function getGrade() 
        {
            if ($this->score >= 8.5)
            {
                return "A";
            }
            elseif ($this->score >= 7.0)
            {
                return "B";
            }
            elseif ($this->score >= 5.5)
            {
                return "C";
            }
            else 
            {
                return "D";
            }
        }

        public function getInfo()
        {
            return $this->name . " (" . $this->email . "), Score: " . $this->score 
            . ", Grade: " . $this->getGrade();
        }
    }
?>
