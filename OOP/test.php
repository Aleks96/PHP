<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 12/01/2017
 * Time: 11:19
 */

require_once ("text.php");
require_once ("ctext.php");

$sentence1 = new text("");
echo'<pre>';
    print_r($sentence1);
    $sentence1->setText("123");
    print_r($sentence1);
echo'</pre>';
$sentence2 = new text("asd");
echo'<pre>';
    print_r($sentence2);
echo'</pre>';
$sentence3 = new ctext("Must text");

$sentence3->show();
$sentence3->setColor("red");
$sentence3->show();
$sentence2->show();
echo '<hr/>';
