DROP View IF EXISTS `#__AvailableHotelList`;
DROP View IF EXISTS `#__AvailableRoomList`;
DROP TABLE IF EXISTS `#__exhibitions`;
DROP TABLE IF EXISTS `#__hotels`;
DROP TABLE IF EXISTS `#__rooms`;
DROP TABLE IF EXISTS `#__sale_exhibitions_rooms_archives`;
DROP TABLE IF EXISTS `#__sale_exhibitions_rooms`;

/* Create Exhibitions table*/
CREATE TABLE `#__exhibitions` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`Name`					VARCHAR(255) NOT NULL,
	`Description`			VARCHAR(1024) NOT NULL DEFAULT '',
	`StartDate`				DATE NOT NULL DEFAULT 0,
	`EndDate`				DATE NOT NULL DEFAULT 0,
	`DetailInfoFilePath`	VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

/* Create hotels table*/
CREATE TABLE `#__hotels` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`Name`					VARCHAR(255) NOT NULL,
	`HotelType`				tinyint(4) NOT NULL DEFAULT 0,
	`HotelLevel`				tinyint(4) NOT NULL DEFAULT 0,
	`HotelFeature`				tinyint(4) NOT NULL DEFAULT 0,
	`HotelAddress`			VARCHAR(1024) NOT NULL DEFAULT '',
	`HotelPhotoNumber`		VARCHAR(255) NOT NULL DEFAULT '',
	`HotelFaxNumber`		VARCHAR(255) NOT NULL DEFAULT '',
	`HotelEmail`			VARCHAR(255) NOT NULL DEFAULT '',
	`Country`				VARCHAR(255) NOT NULL DEFAULT '',
	`City`					VARCHAR(255) NOT NULL DEFAULT '',
	`Description`			VARCHAR(1024) NOT NULL DEFAULT '',
	`HotelImageLink1`			VARCHAR(255) NOT NULL DEFAULT '',
	`HotelImageLink2`			VARCHAR(255) NOT NULL DEFAULT '',
	`HotelImageLink3`			VARCHAR(255) NOT NULL DEFAULT '',
	`DetailInfoFilePath`	VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
	
/* Create rooms table*/
CREATE TABLE `#__rooms` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`hotel_id`				INT(11)     NOT NULL DEFAULT 0,
	`Name`					VARCHAR(255) NOT NULL,
	`RoomPrefix`			VARCHAR(255) NOT NULL,
	`RoomType`				tinyint(4) NOT NULL DEFAULT 0,
	`BedType`				tinyint(4) NOT NULL DEFAULT 0,
	`SellType`				tinyint(4) NOT NULL DEFAULT 0,
	`AvailableNumber`		INT			NOT NULL DEFAULT 0,
	`Breakfast`				tinyint(4) NOT NULL DEFAULT 0,
	`Broadband`				tinyint(4) NOT NULL DEFAULT 0,
	`Policy`				tinyint(4) NOT NULL DEFAULT 0,
	`Price`					DECIMAL(10, 2) NOT NULL DEFAULT 0,
	`Description`			VARCHAR(1024) NOT NULL DEFAULT '',
	`DetailInfoFilePath`	VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
	
/* Create sales rooms obj for exhibitions table*/
CREATE TABLE `#__sale_exhibitions_rooms` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`exhibition_id`			INT(11)     NOT NULL DEFAULT 0,
	`hotel_id`				INT(11)     NOT NULL DEFAULT 0,
	`room_id`				INT(11)     NOT NULL DEFAULT 0,
	`BookingDate`			DATE NOT NULL DEFAULT 0,
	`AvailableNumber`		INT			NOT NULL DEFAULT 0,
	`BookedNumber`			INT			NOT NULL DEFAULT 0,
	`Status`				tinyint(4) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;	
	
/* Create sales rooms obj, for exhibition end to move the data out to this table archives */
CREATE TABLE `#__sale_exhibitions_rooms_archives` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`exhibition_id`			INT(11)     NOT NULL DEFAULT 0,
	`hotel_id`				INT(11)     NOT NULL DEFAULT 0,
	`room_id`				INT(11)     NOT NULL DEFAULT 0,
	`BookingDate`			DATE NOT NULL DEFAULT 0,
	`AvailableNumber`		INT			NOT NULL DEFAULT 0,
	`BookedNumber`			INT			NOT NULL DEFAULT 0,
	`Status`				tinyint(4) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;	

/* create view for list all available hotels */
CREATE VIEW `#__AvailableHotelList` AS 
Select ser.id as sid, ser.exhibition_id, ser.hotel_id, ser.room_id, SUM(ser.AvailableNumber) as TotalAvailable, SUM(ser.BookedNumber) as TotalBooked, h.Name, h.Description, h.HotelAddress, h.HotelPhotoNumber, h.HotelEmail, max(r.Price) maxPrice, min(r.Price) minPrice
from `#__sale_exhibitions_rooms` as ser, `#__hotels` as h, `#__rooms` as r
where ser.hotel_id = h.id and ser.room_id = r.id and ser.AvailableNumber > ser.BookedNumber
GROUP by ser.hotel_id
ORDER BY minPrice ASC;

/* create view for list all available rooms */
CREATE VIEW `#__AvailableRoomList` AS 
Select ser.exhibition_id, ser.hotel_id, ser.room_id, group_concat(ser.BookingDate order by ser.BookingDate asc) as AvailableBookingDate, ser.AvailableNumber, ser.BookedNumber, r.Name, r.RoomPrefix, r.RoomType, r.BedType, r.SellType, r.Breakfast, r.Broadband, r.Policy, r.Price, r.Description
from `#__sale_exhibitions_rooms` as ser,`#__rooms` as r
where ser.room_id = r.id and ser.AvailableNumber > ser.BookedNumber
GROUP by ser.room_id
ORDER BY r.Price ASC;


/* ###Test Data need remove them later### */
/* Insert Init Data in Exhibitions table */
INSERT INTO `#__exhibitions` (`Name` , `Description`, `StartDate`, `EndDate`) VALUES
('乌镇神经元大会', '由上海科学院神经所主办的，世界神经大会在乌镇召开', '2015-09-20', '2015-09-24');

/* Insert Init Data in Hotels table */
INSERT INTO `#__hotels` (`Name` , `HotelType`, `HotelLevel`, `HotelFeature`, `Description`, `DetailInfoFilePath`) VALUES
('乌镇No.0', 1, 0, 0, '乌镇No.0 hotel, 0 star!', '乌镇No.0'),
('乌镇No.1', 0, 1, 1, '乌镇No.1 hotel, 1 star!', '乌镇No.1'),
('乌镇No.2', 0, 2, 2, '乌镇No.2 hotel, 2 star!', '乌镇No.2'),
('乌镇No.3', 0, 3, 3, '乌镇No.3 hotel, 3 star!', '乌镇No.3'),
('乌镇No.4', 0, 4, 4, '乌镇No.4 hotel, 4 star!', '乌镇No.4'),
('乌镇No.5', 0, 5, 5, '乌镇No.5 hotel, 5 star!', '乌镇No.5'),
('乌镇No.6', 0, 6, 6, '乌镇No.6 hotel, 6 star!', '乌镇No.6'),
('乌镇No.7', 0, 7, 7, '乌镇No.7 hotel, 7 star!', '乌镇No.7');

/* Insert Init Data in Rooms table */
INSERT INTO `#__rooms` (`hotel_id`, `Name` , `RoomPrefix`, `RoomType`, `BedType`, `Breakfast`, `Broadband`, `Policy`, `Price`, `AvailableNumber`, `Description`, `DetailInfoFilePath`) VALUES
(1, '乌镇No.0-0', '紫藤', 0, 1, 0, 0, 0, 0.01, 10,	'乌镇No.0 hotel, 0 star!, 0-0 room', '乌镇No.0_room0'),
(1, '乌镇No.0-1', '紫藤', 0, 1, 0, 0, 0, 0.01, 20,	'乌镇No.0 hotel, 0 star!, 0-1 room', '乌镇No.0_room1'),
(1, '乌镇No.0-2', '紫藤', 0, 1, 0, 0, 0, 0.01, 30,	'乌镇No.0 hotel, 0 star!, 0-2 room', '乌镇No.0_room2'),
(2, '乌镇No.1-0', '水巷驿', 0, 1, 0, 0, 0, 0.02, 2,	'乌镇No.1 hotel, 1 star!, 0-0 room', '乌镇No.1_room0'),
(2, '乌镇No.1-1', '水巷驿', 0, 1, 0, 0, 0, 0.02, 3,	'乌镇No.1 hotel, 1 star!, 0-1 room', '乌镇No.1_room1'),
(2, '乌镇No.1-2', '水巷驿', 0, 1, 0, 0, 0, 0.02, 4,	'乌镇No.1 hotel, 1 star!, 0-2 room', '乌镇No.1_room2'),
(3, '乌镇No.2-0', '乌镇民宿', 0, 1, 0, 0, 0, 0.03, 3,	'乌镇No.2 hotel, 2 star!, 0-0 room', '乌镇No.2_room0'),
(3, '乌镇No.2-1', '乌镇民宿', 0, 1, 0, 0, 0, 0.03, 4,	'乌镇No.2 hotel, 2 star!, 0-1 room', '乌镇No.2_room1'),
(3, '乌镇No.2-2', '乌镇民宿', 0, 1, 0, 0, 0, 0.03, 5,	'乌镇No.2 hotel, 2 star!, 0-2 room', '乌镇No.2_room2'),
(4, '乌镇No.3-0', '望津里精品酒店', 0, 1, 0, 0, 0, 0.04, 4,	'乌镇No.3 hotel, 3 star!, 0-0 room', '乌镇No.3_room0'),
(4, '乌镇No.3-1', '望津里精品酒店', 0, 1, 0, 0, 0, 0.04, 5,	'乌镇No.3 hotel, 3 star!, 0-1 room', '乌镇No.3_room1'),
(4, '乌镇No.3-2', '望津里精品酒店', 0, 1, 0, 0, 0, 0.04, 6,	'乌镇No.3 hotel, 3 star!, 0-3 room', '乌镇No.3_room2'),
(5, '乌镇No.4-0', '通安客栈贵宾楼', 0, 1, 0, 0, 0, 0.13, 5,	'乌镇No.4 hotel, 4 star!, 0-0 room', '乌镇No.4_room0'),
(5, '乌镇No.4-1', '通安客栈贵宾楼', 0, 1, 0, 0, 0, 0.05, 6,	'乌镇No.4 hotel, 4 star!, 0-1 room', '乌镇No.4_room1'),
(5, '乌镇No.4-2', '通安客栈贵宾楼', 0, 1, 0, 0, 0, 0.05, 7,	'乌镇No.4 hotel, 4 star!, 0-4 room', '乌镇No.4_room2'),
(6, '乌镇No.5-0', '枕水度假酒店', 0, 1, 0, 0, 0, 0.11, 60,	'乌镇No.5 hotel, 5 star!, 0-0 room', '乌镇No.5_room0'),
(6, '乌镇No.5-1', '枕水度假酒店', 0, 1, 0, 0, 0, 0.06, 50,	'乌镇No.5 hotel, 5 star!, 0-1 room', '乌镇No.5_room1'),
(6, '乌镇No.5-2', '枕水度假酒店', 0, 1, 0, 0, 0, 0.06, 40,	'乌镇No.5 hotel, 5 star!, 0-5 room', '乌镇No.5_room2'),
(7, '乌镇No.6-0', '昭明书舍', 0, 1, 0, 0, 0, 0.07, 7,	'乌镇No.6 hotel, 6 star!, 0-0 room', '乌镇No.6_room0'),
(7, '乌镇No.6-1', '昭明书舍', 0, 1, 0, 0, 0, 0.07, 8,	'乌镇No.6 hotel, 6 star!, 0-1 room', '乌镇No.6_room1'),
(7, '乌镇No.6-2', '昭明书舍', 0, 1, 0, 0, 0, 0.10, 9,	'乌镇No.6 hotel, 6 star!, 0-6 room', '乌镇No.6_room2'),
(8, '乌镇No.7-0', '宜园会所', 0, 1, 0, 0, 0, 0.08, 8,	'乌镇No.7 hotel, 7 star!, 0-0 room', '乌镇No.7_room0'),
(8, '乌镇No.7-1', '宜园会所', 0, 1, 0, 0, 0, 0.08, 9,	'乌镇No.7 hotel, 7 star!, 0-1 room', '乌镇No.7_room1'),
(8, '乌镇No.7-2', '宜园会所', 0, 1, 0, 0, 0, 0.08, 10,	'乌镇No.7 hotel, 7 star!, 0-7 room', '乌镇No.7_room2');

/* Insert Init Data for sales table */
INSERT INTO `#__sale_exhibitions_rooms` (`exhibition_id`, `hotel_id`, `room_id` , `BookingDate`, `AvailableNumber`, `BookedNumber`, `Status`) VALUES
(1, 1, 1, '2015-9-21', 10, 0, 0),
(1, 1, 1, '2015-9-22', 10, 0, 0),
(1, 1, 1, '2015-9-23', 10, 10, 0),
(1, 1, 1, '2015-9-24', 10, 0, 0),
(1, 1, 2, '2015-9-21', 20, 20, 0),
(1, 1, 2, '2015-9-22', 20, 20, 0),
(1, 1, 2, '2015-9-23', 20, 20, 0),
(1, 1, 2, '2015-9-24', 20, 20, 0),
(1, 2, 3, '2015-9-21', 30, 0, 0),
(1, 2, 3, '2015-9-22', 30, 0, 0),
(1, 2, 3, '2015-9-23', 30, 0, 0),
(1, 2, 3, '2015-9-24', 30, 0, 0),
(1, 2, 4, '2015-9-21', 2, 0, 0),
(1, 2, 4, '2015-9-22', 2, 0, 0),
(1, 2, 4, '2015-9-23', 2, 0, 0),
(1, 2, 4, '2015-9-24', 2, 0, 0),
(1, 6, 16, '2015-9-21', 60, 60, 0),
(1, 6, 16, '2015-9-22', 60, 60, 0),
(1, 6, 16, '2015-9-23', 60, 60, 0),
(1, 6, 16, '2015-9-24', 60, 60, 0),
(1, 7, 19, '2015-9-21', 7, 0, 0),
(1, 7, 19, '2015-9-22', 7, 0, 0),
(1, 7, 19, '2015-9-23', 7, 0, 0),
(1, 7, 19, '2015-9-24', 7, 0, 0),
(1, 7, 20, '2015-9-21', 8, 0, 0),
(1, 7, 20, '2015-9-22', 8, 0, 0),
(1, 7, 20, '2015-9-23', 8, 0, 0),
(1, 7, 20, '2015-9-24', 8, 0, 0),
(1, 7, 21, '2015-9-21', 9, 0, 0),
(1, 7, 21, '2015-9-22', 9, 0, 0),
(1, 7, 21, '2015-9-23', 9, 0, 0),
(1, 7, 21, '2015-9-24', 9, 0, 0),
(1, 8, 22, '2015-9-21', 9, 0, 0),
(1, 8, 22, '2015-9-22', 8, 0, 0),
(1, 8, 22, '2015-9-23', 8, 0, 0),
(1, 8, 22, '2015-9-24', 8, 0, 0);
