<?php

class Author
{
    public string $name;
    public $books = [];

    public function __construct($name)
    {
        $this->name = $name;
        $this->books = [];
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($newName){
        $this->name = $newName;
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function setBooks($books){
        $this->books[] = $books;
    }
    

    /**
     * @param string $title
     * @param float  $price
     * @return \Book
     */
    public function addBook(string $title, float $price): Book
    {
        $newBook = new Book($title, $price, $this);
        $this->books[] = $newBook;
        return $newBook;
    }
}