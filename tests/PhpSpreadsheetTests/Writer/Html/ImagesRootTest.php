<?php

namespace PhpOffice\PhpSpreadsheetTests\Writer\Html;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheetTests\Functional;

class ImagesRootTest extends Functional\AbstractFunctional
{
    public function testImagesRoot()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Test');
        $drawing->setDescription('Test');
        $stub = 'data/Reader/HTML/image.jpg';
        $root = 'http://www.example.com';
        // for phpUnit, . is the tests directory
        $imagePath = "./$stub";
        self::assertFileExists($imagePath);
        $drawing->setPath($imagePath);
        $desc = 'Test <img> tag';
        $drawing->setDescription($desc);
        $drawing->setHeight(36);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        $drawing->setCoordinates('A1');
        $sheet->setCellValue('A2', 'Image Above?');

        $writer = new Html($spreadsheet);
        $writer->setImagesRoot($root);
        $html = $writer->generateHTMLAll();
        $dom = new \DOMDocument();
        $dom->loadHTML($html);
        $body = $dom->getElementsByTagName('body')[0];
        $divs = $body->getElementsByTagName('div');

        $tabl = $divs[0]->getElementsByTagName('table');
        $tbod = $tabl[0]->getElementsByTagName('tbody');
        $rows = $tbod[0]->getElementsByTagName('tr');
        self::assertCount(2, $rows);

        $tds = $rows[0]->getElementsByTagName('td');
        self::assertCount(1, $tds);
        $img = $tds[0]->getElementsByTagName('img');
        self::assertCount(1, $img);
        self::assertEquals("$root/$stub", $img[0]->getAttribute('src'));
        self::assertEquals($desc, $img[0]->getAttribute('alt'));
    }
}