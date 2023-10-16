<?php
    class Book
    {
    public string $title;
    public float $price;
    public Author $author;

    public function __construct($title, $price, $author){
        $this->title = $title;
        $this->price = $price;
        if ($author != null){
            $this->author = $author;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($newTitle)
    {
        $this->title = $newTitle;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($newPrice)
    {
        $this->price = $newPrice;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($newAuthor)
    {
        $this->author = $newAuthor;
    }
}