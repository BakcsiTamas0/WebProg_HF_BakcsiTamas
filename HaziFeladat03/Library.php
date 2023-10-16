<?php
require_once "AbstractLibrary.php";

class Library extends AbstractLibrary
    {
        private $authors = [];

        public function __construct()
        {
            $this->authors = [];
        }

        public function addAuthor(string $authorName): Author
        {
            foreach ($this->authors as $author) {
                if ($author->getName() === $authorName) {
                    return $author;
                }
            }
            
            $author = new Author($authorName);
            $this->authors[] = $author;
            return $author;
        }

        public function addBookForAuthor($authorName, Book $book)
        {
            $author = $this->addAuthor($authorName);
            $author->addBook($book->getTitle(), $book->getPrice());
        }

        public function getBooksForAuthor($authorName)
        {
            $author = $this->addAuthor($authorName);
            return $author->getBooks();
        }

        public function search($bookName):Book
        {
            foreach ($this->authors as $author) {
                foreach ($author->getBooks() as $book) {
                    if ($book->getTitle() === $bookName) {
                        return $book;
                    }
                }
            }
            return null;
        }

        public function print()
        {
        foreach ($this->authors as $author) {
            echo $author->getName(). "<br>";
            echo "----------------------". "<br>";
            
            foreach ($author->getBooks() as $book) {
                echo $book->getTitle() . " - " . $book->getPrice(). "<br>";
            }
            echo "<br>";
        }
    }

        // Implement all the methods declared in AbstractLibrary class
    }
?>