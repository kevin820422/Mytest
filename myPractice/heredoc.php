<?php
$hater = 'Michelle';

//nowdoc 變數不會被編譯
$rudeWords2 = <<<'word'
She is a bitch who I would never talk to. <br> Right? $hater <br><br>
word;

echo $rudeWords2;
//heredoc
$rudeWords = <<<word
She is a bitch who I would never talk to. <br> Right? $hater. <br><br>
word;
echo $rudeWords;

unset($hater);
$rudeWords = <<<word
She is a bitch who I would never talk to. <br> Right? $hater. 
word;

 
echo $rudeWords;

?>
