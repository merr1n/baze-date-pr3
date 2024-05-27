<?php
$id = $_GET['id'];

$xml = new DOMDocument();
$xml->load('./xml/accounts.xml');

$xpath = new DOMXPATH($xml);
foreach ($xpath->query("/accounts/account[id='$id']") as $node) {
    echo $node->nodeValue;
    $node->parentNode->removeChild($node);
}

$xml->formatOutput = true;
$xml->save('./xml/accounts.xml');
echo "??";
header("Location: tables.php");
echo "!!";
exit();

