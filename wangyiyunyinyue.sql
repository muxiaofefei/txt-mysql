# Host: localhost  (Version: 5.5.53)
# Date: 2017-11-03 10:45:20
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "qingcheng"
#

DROP TABLE IF EXISTS `qingcheng`;
CREATE TABLE `qingcheng` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `username` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  `userico` varchar(255) DEFAULT NULL COMMENT '用户头像地址',
  `pubtime` varchar(255) DEFAULT NULL COMMENT '评论时间',
  `zanshu` int(11) DEFAULT NULL COMMENT '获赞次数',
  `content` varbinary(3000) DEFAULT '' COMMENT '评论内容',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=22671 DEFAULT CHARSET=utf8mb4 COMMENT='倾城-陈奕迅';

#
# Data for table "qingcheng"
#

/*!40000 ALTER TABLE `qingcheng` DISABLE KEYS */;
/*!40000 ALTER TABLE `qingcheng` ENABLE KEYS */;
