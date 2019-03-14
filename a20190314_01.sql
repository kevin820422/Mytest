-- 合併查詢表格， on代表兩表格相關聯的鍵
SELECT `categories`.`name` , `products`.* FROM `products` 
  JOIN `categories` 
		ON `products`.`category_sid`=`categories`.`sid`


-- 代稱 p為product的代稱 c為categories的代稱
SELECT p.*, c.`name` AS cate_name FROM `products` p
  JOIN `categories` c
    ON p.`category_sid`=c.`sid`;

SELECT p.*, c.`name` AS cate_name FROM `products` p
  LEFT JOIN `categories` c
    ON p.`category_sid`=c.`sid`;

