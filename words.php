<?php /*
Description: Help memorize words
Version: 1.0
Date：2018-6
Author: Arvoicna
Link: https://github.com/Ariavna/website
Copyright (c) 2018 Arvos.cc All right reserved.
*/ ?>

<?php

if (! is_file("word.data")) { //检查数据文件是否存在
	$words = "错误，读取词汇库失败";
} else {

/*读取数据文件并写入数组*/	
$file = fopen("word.data", "r");
$text = array();
$i = 0;

while(! feof($file)){ //feof()函数检测是否已到达文件末尾
 $text[$i] = fgets($file);
 $i++;
}

fclose($file);
shuffle($text); //随机排序数组
$word = array();
$word = array_splice($text, 0 , 10);
$words = implode("</br>",$word);
}

?>


<!DOCTYPE html><!--输出前端代码-->
<html lang="zh-cn">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <link rel="stylesheet" href="style.css">
    <title>Help memorize words</title>
  </head>

  <body>
	  <header>
      <div class="container">
        <h2 class="docs-header">Help Memorize Words 1.0</h2>
      </div>
    </header>
	  <section>
      <div class="container">
        <ul class="docs-nav" id="menu-left">
          <li style="text-align: center;"><strong>系统将随机抽取数据库中的词汇以协助用户记忆<a href="http://wpa.qq.com/msgrd?v=3&uin=2356371215&site=qq&menu=yes" target="_blank">使用协助</a><a href="">刷新词汇</a></strong></li>
          <li style="text-align: center;margin-top: 60px;"><div><?php echo($words); ?></div></li>
        </ul>
      </div>
    </section>
  </body>
</html>
