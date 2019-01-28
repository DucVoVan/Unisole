<?php 
	include 'connect.php';
	$sql = "CREATE TABLE IF NOT EXISTS `thanhnhac`.`account` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `username` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL UNIQUE, `email` VARCHAR(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL UNIQUE , `fullname` VARCHAR(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `phone` INT(9) UNSIGNED UNIQUE, `password` VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `time` TIMESTAMP NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql = "CREATE TABLE IF NOT EXISTS `thanhnhac`.`teacher` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `username` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL UNIQUE, `email` VARCHAR(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL UNIQUE , `fullname` VARCHAR(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `phone` INT(9) UNSIGNED UNIQUE, `password` VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `time` TIMESTAMP NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql = "CREATE TABLE IF NOT EXISTS `thanhnhac`.`admin` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `username` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL UNIQUE, `email` VARCHAR(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL UNIQUE , `fullname` VARCHAR(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `phone` INT(9) UNSIGNED UNIQUE, `password` VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `time` TIMESTAMP NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`topic` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL , `time` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`topic-children` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`), `topicid` INT(11) UNSIGNED NOT NULL,`name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `time` TIMESTAMP NOT NULL , FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`course` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`), `topicidchildren` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicidchildren) REFERENCES `topic-children`(id) ON UPDATE cascade ON DELETE cascade,  `accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES `account`(id) ON UPDATE cascade ON DELETE cascade, `name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `content-introduce` MEDIUMTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`content` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`course-registered` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, `courseid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade, FOREIGN KEY(courseid) REFERENCES course(id) ON UPDATE cascade ON DELETE cascade) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`teach-music` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade, `topicid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade, `question1` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question2` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question3` TEXT(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question4` INT(11) UNSIGNED NOT NULL, `question5` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question6` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question7` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `status` BOOLEAN NOT NULL) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`teach-guitar` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade, `topicid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade, `question1` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question2` TEXT(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question3` TEXT(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question4` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question5` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question6` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question7` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question8` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question9` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question10` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `status` BOOLEAN NOT NULL) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`teach-keyboard` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade, `topicid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade, `question1` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question2` TEXT(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question3` TEXT(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question4` TEXT(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question5` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question6` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question7` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question8` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question9` TEXT(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question10` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `status` BOOLEAN NOT NULL) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`band` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade,`topicid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade,`question0` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question1` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question2` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question4` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question5` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question6` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `question7` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question8` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question9` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question10` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question11` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question12` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question13` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question14` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question15` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question16` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question17` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question18` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question19` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question20` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`question21` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`point-music` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade, `topicid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade, `teacherid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(teacherid) REFERENCES teacher(id) ON UPDATE cascade ON DELETE cascade, `1-1` INT(11) UNSIGNED NOT NULL, `1-2` INT(11) UNSIGNED NOT NULL, `1-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `2-1` INT(11) UNSIGNED NOT NULL, `2-2` INT(11) UNSIGNED NOT NULL, `2-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `3-1` INT(11) UNSIGNED NOT NULL, `3-2` INT(11) UNSIGNED NOT NULL, `3-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `4-1` INT(11) UNSIGNED NOT NULL, `4-2` INT(11) UNSIGNED NOT NULL, `4-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `5-1` INT(11) UNSIGNED NOT NULL, `5-2` INT(11) UNSIGNED NOT NULL, `5-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `6-1` INT(11) UNSIGNED NOT NULL, `6-2` INT(11) UNSIGNED NOT NULL, `6-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `7-1` INT(11) UNSIGNED NOT NULL, `7-2` INT(11) UNSIGNED NOT NULL, `7-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `8-1` INT(11) UNSIGNED NOT NULL, `8-2` INT(11) UNSIGNED NOT NULL, `8-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `9-1` INT(11) UNSIGNED NOT NULL, `9-2` INT(11) UNSIGNED NOT NULL, `9-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `10-1` INT(11) UNSIGNED NOT NULL, `10-2` INT(11) UNSIGNED NOT NULL, `10-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `11-1` INT(11) UNSIGNED NOT NULL, `11-2` INT(11) UNSIGNED NOT NULL, `11-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `12-1` INT(11) UNSIGNED NOT NULL, `12-2` INT(11) UNSIGNED NOT NULL, `12-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `13-1` INT(11) UNSIGNED NOT NULL, `13-2` INT(11) UNSIGNED NOT NULL, `13-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `14-1` INT(11) UNSIGNED NOT NULL, `14-2` INT(11) UNSIGNED NOT NULL, `14-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `15-1` INT(11) UNSIGNED NOT NULL, `15-2` INT(11) UNSIGNED NOT NULL, `15-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `16-1` INT(11) UNSIGNED NOT NULL, `16-2` INT(11) UNSIGNED NOT NULL, `16-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `17-1` INT(11) UNSIGNED NOT NULL, `17-2` INT(11) UNSIGNED NOT NULL, `17-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `18-1` INT(11) UNSIGNED NOT NULL, `18-2` INT(11) UNSIGNED NOT NULL, `18-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `19-1` INT(11) UNSIGNED NOT NULL, `19-2` INT(11) UNSIGNED NOT NULL, `19-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `20-1` INT(11) UNSIGNED NOT NULL, `20-2` INT(11) UNSIGNED NOT NULL, `20-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `21-1` INT(11) UNSIGNED NOT NULL, `21-2` INT(11) UNSIGNED NOT NULL, `21-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `22-1` INT(11) UNSIGNED NOT NULL, `22-2` INT(11) UNSIGNED NOT NULL, `22-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `23-1` INT(11) UNSIGNED NOT NULL, `23-2` INT(11) UNSIGNED NOT NULL, `23-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `24-1` INT(11) UNSIGNED NOT NULL, `24-2` INT(11) UNSIGNED NOT NULL, `24-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `25-1` INT(11) UNSIGNED NOT NULL, `25-2` INT(11) UNSIGNED NOT NULL, `25-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `26-1` INT(11) UNSIGNED NOT NULL, `26-2` INT(11) UNSIGNED NOT NULL, `26-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `27-1` INT(11) UNSIGNED NOT NULL, `27-2` INT(11) UNSIGNED NOT NULL, `27-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `28-1` INT(11) UNSIGNED NOT NULL, `28-2` INT(11) UNSIGNED NOT NULL, `28-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `29-1` INT(11) UNSIGNED NOT NULL, `29-2` INT(11) UNSIGNED NOT NULL, `29-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `30-1` INT(11) UNSIGNED NOT NULL, `30-2` INT(11) UNSIGNED NOT NULL, `30-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `31-1` INT(11) UNSIGNED NOT NULL, `31-2` INT(11) UNSIGNED NOT NULL, `31-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,`time` TIMESTAMP NOT NULL ) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`point-guitar` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade, `topicid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade, `teacherid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(teacherid) REFERENCES teacher(id) ON UPDATE cascade ON DELETE cascade, `1-1` INT(11) UNSIGNED NOT NULL, `1-2` INT(11) UNSIGNED NOT NULL, `1-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `2-1` INT(11) UNSIGNED NOT NULL, `2-2` INT(11) UNSIGNED NOT NULL, `2-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `3-1` INT(11) UNSIGNED NOT NULL, `3-2` INT(11) UNSIGNED NOT NULL, `3-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `4-1` INT(11) UNSIGNED NOT NULL, `4-2` INT(11) UNSIGNED NOT NULL, `4-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `5-1` INT(11) UNSIGNED NOT NULL, `5-2` INT(11) UNSIGNED NOT NULL, `5-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `6-1` INT(11) UNSIGNED NOT NULL, `6-2` INT(11) UNSIGNED NOT NULL, `6-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `7-1` INT(11) UNSIGNED NOT NULL, `7-2` INT(11) UNSIGNED NOT NULL, `7-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `8-1` INT(11) UNSIGNED NOT NULL, `8-2` INT(11) UNSIGNED NOT NULL, `8-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `9-1` INT(11) UNSIGNED NOT NULL, `9-2` INT(11) UNSIGNED NOT NULL, `9-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `10-1` INT(11) UNSIGNED NOT NULL, `10-2` INT(11) UNSIGNED NOT NULL, `10-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `11-1` INT(11) UNSIGNED NOT NULL, `11-2` INT(11) UNSIGNED NOT NULL, `11-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `12-1` INT(11) UNSIGNED NOT NULL, `12-2` INT(11) UNSIGNED NOT NULL, `12-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `13-1` INT(11) UNSIGNED NOT NULL, `13-2` INT(11) UNSIGNED NOT NULL, `13-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `14-1` INT(11) UNSIGNED NOT NULL, `14-2` INT(11) UNSIGNED NOT NULL, `14-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `15-1` INT(11) UNSIGNED NOT NULL, `15-2` INT(11) UNSIGNED NOT NULL, `15-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `16-1` INT(11) UNSIGNED NOT NULL, `16-2` INT(11) UNSIGNED NOT NULL, `16-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `17-1` INT(11) UNSIGNED NOT NULL, `17-2` INT(11) UNSIGNED NOT NULL, `17-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `18-1` INT(11) UNSIGNED NOT NULL, `18-2` INT(11) UNSIGNED NOT NULL, `18-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `19-1` INT(11) UNSIGNED NOT NULL, `19-2` INT(11) UNSIGNED NOT NULL, `19-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `20-1` INT(11) UNSIGNED NOT NULL, `20-2` INT(11) UNSIGNED NOT NULL, `20-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `21-1` INT(11) UNSIGNED NOT NULL, `21-2` INT(11) UNSIGNED NOT NULL, `21-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `22-1` INT(11) UNSIGNED NOT NULL, `22-2` INT(11) UNSIGNED NOT NULL, `22-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `23-1` INT(11) UNSIGNED NOT NULL, `23-2` INT(11) UNSIGNED NOT NULL, `23-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `time` TIMESTAMP NOT NULL) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	$sql .= "CREATE TABLE IF NOT EXISTS `thanhnhac`.`point-keyboard` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`),`accountid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(accountid) REFERENCES account(id) ON UPDATE cascade ON DELETE cascade, `topicid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(topicid) REFERENCES topic(id) ON UPDATE cascade ON DELETE cascade, `teacherid` INT(11) UNSIGNED NOT NULL, FOREIGN KEY(teacherid) REFERENCES teacher(id) ON UPDATE cascade ON DELETE cascade, `1-1` INT(11) UNSIGNED NOT NULL, `1-2` INT(11) UNSIGNED NOT NULL, `1-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `2-1` INT(11) UNSIGNED NOT NULL, `2-2` INT(11) UNSIGNED NOT NULL, `2-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `3-1` INT(11) UNSIGNED NOT NULL, `3-2` INT(11) UNSIGNED NOT NULL, `3-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `4-1` INT(11) UNSIGNED NOT NULL, `4-2` INT(11) UNSIGNED NOT NULL, `4-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `5-1` INT(11) UNSIGNED NOT NULL, `5-2` INT(11) UNSIGNED NOT NULL, `5-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `6-1` INT(11) UNSIGNED NOT NULL, `6-2` INT(11) UNSIGNED NOT NULL, `6-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `7-1` INT(11) UNSIGNED NOT NULL, `7-2` INT(11) UNSIGNED NOT NULL, `7-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `8-1` INT(11) UNSIGNED NOT NULL, `8-2` INT(11) UNSIGNED NOT NULL, `8-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `9-1` INT(11) UNSIGNED NOT NULL, `9-2` INT(11) UNSIGNED NOT NULL, `9-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `10-1` INT(11) UNSIGNED NOT NULL, `10-2` INT(11) UNSIGNED NOT NULL, `10-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `11-1` INT(11) UNSIGNED NOT NULL, `11-2` INT(11) UNSIGNED NOT NULL, `11-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `12-1` INT(11) UNSIGNED NOT NULL, `12-2` INT(11) UNSIGNED NOT NULL, `12-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `13-1` INT(11) UNSIGNED NOT NULL, `13-2` INT(11) UNSIGNED NOT NULL, `13-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `14-1` INT(11) UNSIGNED NOT NULL, `14-2` INT(11) UNSIGNED NOT NULL, `14-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `15-1` INT(11) UNSIGNED NOT NULL, `15-2` INT(11) UNSIGNED NOT NULL, `15-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `16-1` INT(11) UNSIGNED NOT NULL, `16-2` INT(11) UNSIGNED NOT NULL, `16-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `17-1` INT(11) UNSIGNED NOT NULL, `17-2` INT(11) UNSIGNED NOT NULL, `17-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `18-1` INT(11) UNSIGNED NOT NULL, `18-2` INT(11) UNSIGNED NOT NULL, `18-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `19-1` INT(11) UNSIGNED NOT NULL, `19-2` INT(11) UNSIGNED NOT NULL, `19-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `20-1` INT(11) UNSIGNED NOT NULL, `20-2` INT(11) UNSIGNED NOT NULL, `20-3` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL, `time` TIMESTAMP NOT NULL) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";

	if(mysqli_multi_query($conn,$sql)){
		echo "ok";
	}else{
		echo mysqli_error($conn);
	}

	
?>