CREATE TABLE `mod_event` (
  `event_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_title` varchar(50) NOT NULL DEFAULT '',
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `regi_start_date` datetime NOT NULL,
  `regi_end_date` datetime NOT NULL,
  `event_place` varchar(200) NOT NULL DEFAULT '',
  `event_charge` int(10) NOT NULL,
  `event_detail` text,
  `event_photo` varchar(255) DEFAULT NULL,
  `regi_limit_num` int(10) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

CREATE TABLE `mod_register` (
  `regi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) NOT NULL,
  `account` varchar(20) NOT NULL DEFAULT '',
  `drop_date` datetime NOT NULL,
  `regi_type` int(3) NOT NULL,
  PRIMARY KEY (`regi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

ALTER TABLE  `mod_event` ADD  `event_list_photo` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER  `event_id`

ALTER TABLE  `mod_train` ADD  `train_time_s` VARCHAR( 10 ) NOT NULL ,
ADD  `train_time_e` VARCHAR( 10 ) NOT NULL

ALTER TABLE `mod_train` DROP `train_time`
ALTER TABLE  `mod_train` ADD  `train_days` INT( 10 ) NOT NULL
ALTER TABLE  `mod_train` ADD  `notify_date` datetime
ALTER TABLE  `mod_train` ADD  `file_path` VARCHAR( 500 ) 

ALTER TABLE  `mod_train` ADD  `qualify` INT NOT NULL ,
ADD  `waiting_list` INT NOT NULL


ALTER TABLE  `mod_register` ADD  `customer_name2` varchar(50);
ALTER TABLE  `mod_register` ADD  `sex2` int(1);
ALTER TABLE  `mod_register` ADD  `email2` varchar(255);
ALTER TABLE  `mod_register` ADD  `contact_tel2` varchar(20);


ALTER TABLE  `mod_train` ADD  `train_order` INT NOT NULL;