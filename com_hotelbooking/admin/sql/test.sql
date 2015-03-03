/* test sql create view, sum & groupby feature*/
/* sample: http://www.mysqltutorial.org/mysql-sum/ */

CREATE VIEW HotelAvaiable AS 
Select hotel_id, Name, sum(Price) TotalPrice, max(Price) maxPrice
from `#__rooms`
GROUP by hotel_id
ORDER BY maxPrice DESC;