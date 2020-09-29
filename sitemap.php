<?php

// Add es and pt urls

$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->load('sitemap.xml');

foreach ($doc->getElementsByTagName('loc') as $loc) {
    $node = $doc->createElement('xhtml:link');
    $node->setAttribute('rel', 'alternate');
    $node->setAttribute('hreflang', 'es');
    $node->setAttribute('href', str_replace('www.youurl', 'es.youurl', $loc->textContent));

    if ($loc->nextSibling) {
        $loc->parentNode->insertBefore($node, $loc->nextSibling);
    } else {
        $loc->parentNode->appendChild($node);
    }
}

foreach ($doc->getElementsByTagName('loc') as $loc) {
    $node = $doc->createElement('xhtml:link');
    $node->setAttribute('rel', 'alternate');
    $node->setAttribute('hreflang', 'pt');
    $node->setAttribute('href', str_replace('www.youurl', 'pt.youurl', $loc->textContent));

    if ($loc->nextSibling) {
        $loc->parentNode->insertBefore($node, $loc->nextSibling);
    } else {
        $loc->parentNode->appendChild($node);
    }
}

$doc->formatOutput = true;
$doc->save('output.xml');

?>