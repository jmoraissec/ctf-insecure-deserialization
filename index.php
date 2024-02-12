<?php

class Book
{
        public $title;
        public $author;
        private $filepath;

        public function __construct($title, $author)
        {
                $this->title = $title;
                $this->author = $author;
                $this->filepath = "";  # TBD file with more information on the book
        }

        public function __toString()
        {
                $res = "\nTitle: " . $this->title;
                $res = $res . "\nAuthor: " . $this->author;
                $temp_path = "./" . $this->filepath . ".php";

                if (file_exists($temp_path))
                        $res = $res . "\n" . file_get_contents($temp_path);

                return $res;
        }
}


include 'classes.php';
?>

<html>
<head>
<title>Learning PHP serialization</title>
<link rel="stylesheet" href="style.css"></head>
<body>

<h1>Serialize</h1>

<!-- form that will send title + author -->
<div class="container">
  <form action="index.php" method="POST">

    <label for="ltitle">Book title:</label>
    <input type="text" id="title" name="title" placeholder="Title">

    <label for="lauthor">Author</label>
    <input type="text" id="author" name="author" placeholder="Author">

    <input type="hidden" id="action" name="action" value="serialize">

    <input type="submit" value="Submit">

  </form>
</div>


<textarea rows="10" cols="100"><?php if($_POST["action"]=="serialize") echo serialize(new Book($_POST["title"],$_POST["author"]));?></textarea>

<hr><hr>

<h1>Unserialize</h1>

<!-- form that will send serialized PHP -->

<div class="container">
  <form action="index.php" method="POST">

    <label for="ltitle">Payload:</label>
    <input type="text" id="payload" name="payload" placeholder="Payload">

    <input type="hidden" id="action" name="action" value="unserialize">

    <input type="submit" value="Submit">

  </form>
</div>

<textarea rows="10" cols="100"><?php if($_POST["action"]=="unserialize") echo unserialize(urldecode($_POST["payload"]));?></textarea>


<hr><hr>

<h3>This page code</h3>
<pre>
<?php
 echo str_replace("<","!",file_get_contents("index.php"));

 //File: flag.txt
?>
</pre>
</body>
</html>
