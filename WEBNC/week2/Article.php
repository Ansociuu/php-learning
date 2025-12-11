<?php
    class Article 
    {
        public $title;
        public $content;
        public $createdAt;
        public $author;
        public $category;

        public function __construct($title, $content, $createdAt, $author, $category) 
        {
            $this->title = $title;
            $this->content = $content;
            $this->createdAt = $createdAt;
            $this->author = $author;
            $this->category = $category;
        }

        public function getSummary($limit = 50)
        {
            if (strlen($this->content) <= $limit) 
            {
                return $this->content;
            } 
            return substr($this->content, 0, $limit) . "...";
        }

        public function getFullTitle()
        {
            return "[" . $this->category . "] " . $this->title . " - " . $this->author;
        }
    }
?>