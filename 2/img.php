<?php
class CreateImage{
	public $height = 0;//висота
	//верхня ліва точка
        public $top = 0;
        public $left = 0;
    function __construct(){//конструктор
        header("Cache-Control: no-store, no-cache, must-revalidate");//заборона кешування
    }
    function __destruct(){//деструктор - знищуємо зображення, звільняємо пам'ять
        imagedestroy($dest);
        imagedestroy($src);
    }
    function trimSize($numb){//фільтруємо дані
        return (int)abs((strip_tags(trim($numb))));
    }
    function getSizes($h,$t,$l){//встановлення розмірів
        $this->height = $this->trimSize($h);
        $this->top = $this->trimSize($t);
        $this->left = $this->trimSize($l);
    }
    function setImage(){//створення зображення
//шлях до зображення
        $src = imagecreatefromjpeg('img/fe_820121_600.jpg');
//задаємо колірність
        $dest = imagecreatetruecolor($this->height, $this->height);
//копіюємо з існуючого зображення в нове
        imagecopy($dest, $src, 0, 0, $this->left, $this->top, $this->height, $this->height);
// Виводимо зображення
        header('Content-Type: image/png');
        imagepng($dest);
    }
};
if($_SERVER["REQUEST_METHOD"] == "POST"){//перевіряємо чи були надіслані дані
//створюємо екземпляр класу CreateImage()
    $image = new CreateImage();
//викликаємо метод getSizes(), котрий задасть розміри зображенню
    $image->getSizes($_POST["height"],$_POST["top"],$_POST["left"]);
//Виклакаємо метод setImage(),котрий виведе зображення
    $image->setImage();
//Викликаємо деструктор
    unset($image);
}else{//Якщо дані не були надіслані
    header("Content-type:text/html; charset=utf-8");
//Виводимо повідомлення і посилання на головну сторінку сайту
    echo "Немає вхідних даних для створення зображення<br><a href='index.php'>На головну</a>";
}
?>
