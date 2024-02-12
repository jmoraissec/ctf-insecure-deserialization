<?php


class _Image
{
  private $filename;

  public function __construct($filename)
  {
	  $this->filename = "";
  }

	public function __toString()
	{
    $path = "./" . trim($this->filename) . ".png";
    if (file_exists($path))
      echo file_get_contents($path);
	}
}


Class _Text
{
	private $filename;

	public function __construct($filename)
  {
    $this->filename = "";
  }

	public function __toString()
	{
		$path = "./" . trim($this->filename) . ".txt";
      if (file_exists($path))
        echo file_get_contents($path);
  }
}


class _Video
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = "";
    }

    public function __toString()
    {
        $path = "./" . trim($this->filename) . ".mp4";
        if (file_exists($path))
            echo file_get_contents($path);
    }
}

?>
