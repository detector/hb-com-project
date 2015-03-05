/* test sql create view, sum & groupby feature*/
/* sample: http://www.mysqltutorial.org/mysql-sum/ */
DROP View IF EXISTS `#__AvailableHotelList`;

/* create view for list all available rooms */
CREATE VIEW `#__AvailableHotelList` AS 
Select ser.id as sid, ser.exhibition_id, ser.hotel_id, ser.room_id, ser.AvailableNumber, ser.BookedNumber, h.Name, h.Description, h.HotelAddress, h.HotelPhotoNumber, h.HotelEmail, max(r.Price) maxPrice, min(r.Price) minPrice
from `#__sale_exhibitions_rooms` as ser, `#__hotels` as h, `#__rooms` as r
where ser.hotel_id = h.id and ser.room_id = r.id and ser.AvailableNumber > ser.BookedNumber
GROUP by ser.hotel_id
ORDER BY minPrice ASC;