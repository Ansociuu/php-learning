<?php
    class Article 
    {
        public $title;
        public $content;
        public $createdAt;

        public function __construct($title, $content, $createdAt) 
        {
            $this->title = $title;
            $this->content = $content;
            $this->createdAt = $createdAt;
        }

        public function getSummary($limit = 50)
        {
            if (strlen($this->content) <= $limit) 
            {
                return $this->content;
            } 
            return substr($this->content, 0, $limit) . "...";
        }
    }
?>