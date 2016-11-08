<?php
/**
 * http://php.net/manual/ru/book.zip.php
 */

//Создание
$zip = new ZipArchive();
$zipName = './ZipExample.zip';

$zip->open($zipName, ZipArchive::CREATE) or die('Невозможно создать архив');
$dir = scandir(__DIR__.DIRECTORY_SEPARATOR.'reflection');
unset($dir[0], $dir[1]);
foreach($dir as $fname){
    $zip->addFile(__DIR__.DIRECTORY_SEPARATOR.'reflection'.DIRECTORY_SEPARATOR.$fname, $fname);
    $zip->addFromString("testfilephp.txt", "#1 Это тестовая строка, добавленная как testfilephp.txt.\n");
    $zip->addFromString("testfilephp2.txt", "#2 Это тестовая строка, добавленная как testfilephp2.txt.\n");
}

echo 'Count files: ', $zip->numFiles, '<br/>Status: ', $zip->status, '<br/>';
$zip->close();

//Информация об архиве
$zip = new ZipArchive();

$zip->open($zipName);
print_r($zip);
var_dump($zip);
echo "numFiles: " . $zip->numFiles . "<br/>";
echo "status: " . $zip->status  . "<br/>";
echo "statusSys: " . $zip->statusSys . "<br/>";
echo "filename: " . $zip->filename . "<br/>";
echo "comment: " . $zip->comment . "<br/>";

for ($i=0; $i<$zip->numFiles;$i++) {
    echo "index: $i<br/>";
    print_r($zip->statIndex($i));
    echo '<br/>';
}
echo "numFile:" . $zip->numFiles . "<br/>";
$zip->close();


//Пример 2
echo '<br/>========================<br/>';
$zip = zip_open($zipName);

if ($zip) {
    while ($zip_entry = zip_read($zip)) {
        echo "Название:         " . zip_entry_name($zip_entry) . "<br/>";
        echo "Исходный размер:  " . zip_entry_filesize($zip_entry) . "<br/>";
        echo "Сжатый размер:    " . zip_entry_compressedsize($zip_entry) . "<br/>";
        echo "Метод сжатия:     " . zip_entry_compressionmethod($zip_entry) . "<br/>";

        if (zip_entry_open($zip, $zip_entry, "r")) {
            echo "Содержимое файла:<br/>";
            $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            echo htmlentities($buf)."<br/>";

            zip_entry_close($zip_entry);
        }
        echo "\n";

    }

    zip_close($zip);
}

//Распаковка
$zip = new ZipArchive();
$zip->open($zipName);
$zip->extractTo(__DIR__.'/tmp');
$zip->extractTo(__DIR__.'/tmp1', ['class.php', 'method.php']);
$zip->close();