<?php
header("Content-Type: text/html;charset=utf-8");
//Cream parserul
$sax = xml_parser_create("utf-8");
// Functia de prelucrare a tagurilor de inceput
function onStart($parser, $tag, $attributes ){
	if($tag != "CATALOG" and $tag !="BOOK" ){
		echo "<td>";
	}
	if($tag == "BOOK"){
		echo "<tr>";
	}
}
// Functia de prelucrare a tagurilor de sfarsit
function onEnd($parser, $tag){
	if($tag != "CATALOG" and $tag !="BOOK" ){
		echo "</td>";
	}
	if($tag == "BOOK"){
		echo "</tr>";
	}
}
// Functia de prelucrare a continutului textual
function onText($parser, $text){
	echo $text;
}
xml_set_element_handler($sax, "onStart","onEnd" );
xml_set_character_data_handler($sax, "onText");