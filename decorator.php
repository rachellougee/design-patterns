<?php
/* To dynamically add new functionality to class instances. */
class JSONDecorator
{
    protected $book = null;

    public function __construct($book_object)
    {
        $this->book = $book_object;
    }

    public function render()
    {
        echo json_encode($this->book);
    }
}

class HTMLDecorator 
{
    protected $book = null;

    public function __construct($book_object)
    {
        $this->book = $book_object;
    }

    public function render()
    {
        $properties = get_object_vars($this->book);

        echo '<ul>';
        foreach($properties as $key => $value) {
            echo '<li>' . $key . ' -- ' . $value . '</li>';
        }
        echo '</ul>';
    }
}

$book = new stdClass();
$book->title = "Patterns of Enterprise Application Architecture";
$book->author_first_name = "Martin";
$book->author_last_name = "Fowler";

echo '<h1>HTML Decorator</h1>';

$htmlDecorator = new HTMLDecorator($book);
$htmlDecorator->render();

echo '<h1>JSON Decorator</h1>';

$jsonDecorator = new JSONDecorator($book);
$jsonDecorator->render();