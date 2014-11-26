DROP DATABASE IF EXISTS finaldatadb;
CREATE DATABASE IF NOT EXISTS finaldatadb;
USE finaldatadb;

/* Table structure */

CREATE TABLE product_table (
  id INT PRIMARY KEY auto_increment,
  name CHAR(75),
  price DEC(7,2),
  fill ENUM("Sand", "Beads", "Plastic"),
  description TEXT,
  thumb CHAR(75),
  imgFull CHAR(75)
) AUTO_INCREMENT=0 ENGINE=InnoDB;

/* data for table */

INSERT INTO product_table
	VALUES 
	(null, 'Knight Wing', 25, 'Sand', 'The Knight Wing has been in the making for the past two years. It is specially designed for power kicks and trick moves.  It is by far one of our most popular bags and it\'s fan base only continues to grow.  He is slightly smaller than most other bags and there\'s a reason for it.  Being smaller helps with more advance freestyle trick moves.  Knight wing is also more sensitive to being bang around alot.  There is possibility of breaking, since he is smaller is lighter in weight.  This bag is recommended for more advanced users.','kwing_th.png', 'kwing.jpg' ),
	(null, 'Hummingbird', 23, 'Sand', 'The Hummingbird is there and then gone before you even realize it.  Better stay focused and don\'t dare blink, for you could easily miss it.  The skin is made of facile fabric to achieve a lighter weight which helps the hummbird to fly.  The skin maybe be more fragile than others, but the Hummingbird should not be under estimated. ','hummingbird_th.png', 'hummingbird.jpg' ),
	(null, 'Nova New', 23, 'Sand', 'Nova New has been known to blow players\' socks off with its ability to defy gravity and break the laws of physics! Like his brother\'s Knight Wing and Hummingbird, Nova New is also made out of facile fabric. His light weight skin allows him to do the impossible.   Be prepared to break record heights with Nova New.','nnew_th.png', 'nnew.jpg' ),
	(null, 'Slacker', 16, 'Beads', 'Slacker provides stability to all players with its slightly denser weight.  This is great for beginners who are still trying to perfect balance and control. Slacker\'s knit cloth makes him slightly larger and more durable than other footbags. This guy can certain take a beating and still perform. Also enjoyable for veterans too.','slacker_th.png', 'slacker.jpg' ),
	(null, 'Hathor', 12.99, 'Beads', 'Hathor is a medium weight footbag, which helps players, beginner and intermediate, with leverage and handling.  Hathor\'s knit cloth skin makes her incredibly durable for all.  She will not break open easily if dropped too many times.  Great for those who are just starting out.  She will not give up and will not be defeated.  Hathor is popular for freestyle game play.','hathor_th.png', 'hathor.jpg' ),
	(null, 'Marely', 9.99, 'Plastic', 'Marely is a light weight footbag with an armor like dragon steel.  Nothing can break her.  Her plastic seeds maker her lighter than those filled with beThisght.  Marely is the kind of friend who\'s cool with being KICKED around!','marely_th.png', 'marely.jpg' ),
	(null, 'Joey-D', 6.99, 'Plastic', 'Joey-D is a great tag along.  His knit cloth skin and plastic fill makes him incredibly light weight and easy on travel, Joey-D can literally go anywhere.  He is built for durability.  He is certainly a fan favorite for new comers and those who like to play on the go','joeyd_th.png', 'joeyd.jpg' ),
	(null, 'Suzie Q', 6.66, 'Plastic', 'Suzie Q is a great side kick.  Light and good on travel like her brother Joey-D, she is perfect for freestyle play as well.  As you may of noticed, she is made of knit cloth which creates a tough outter skin.  She is not easy to get rid of, just like most sisters.','suzieq_th.png', 'suzieq.jpg' ),
	(null, 'Saphira', 6.99, 'Plastic', 'Saphira is built to withstand players of all kinds.  She is a traditional style footbag with class.  With her bargin price and tough skin made of knit cloth Saphira is ideal for all.','saphira_th.png', 'saphira.jpg' ),	
(null, 'The Twins', 30, 'Sand', 'The Twins are a combo package.  This dynamic duo is designed for players who know that just one footbag is not enough.  The sand fill adds extra weight that allows increased stability and balance for trick moves.  The extra weight does take time to adjust to; this is usually not a problem for experienced users.  Double or nothing with these brothers.','twins_th.png', 'twins.jpg' );




/* SHOW DATA: */

SELECT * FROM product_table;

CREATE TABLE users_table (
	id INT PRIMARY KEY AUTO_INCREMENT,
	username CHAR(12),
	password CHAR(12),
	privilege ENUM('normal','admin','superuser')	
);

INSERT INTO users_table
(username, password, privilege)
	VALUES
	('boss','boss','admin' );

SELECT * FROM users_table;