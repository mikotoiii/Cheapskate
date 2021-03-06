INSERT INTO venue SET name='Peppers Pub', address1='1 Market Sq.', venueTypeId=1, locationNum=1, latitude=45.2734856, longitude=-66.0668686;
INSERT INTO venue SET name='Callahans', address1='1 Princess St.', venueTypeId=1, locationNum=1, latitude=45.271241, longitude=-66.0643116;
INSERT INTO venue SET name='Grannans Seafood', address1='1 Market Sq.', venueTypeId=1, locationNum=1, latitude=45.2734856, longitude=-66.0668686;
INSERT INTO venue SET name='Cougars Lounge', address1='3 Market Sq.', venueTypeId=1, locationNum=1, latitude=45.2734856, longitude=-66.0668686;
INSERT INTO venue SET name='Taco Pica', address1='256 Germain St.', venueTypeId=1, locationNum=1, latitude=45.2723691, longitude=-66.062418;
INSERT INTO venue SET name='Saint John Ale House', address1='1 Market Sq.', venueTypeId=1, locationNum=1, latitude=45.2734856, longitude=-66.0668686;
INSERT INTO venue SET name='Pub Down Under', address1='400 Main St.', venueTypeId=1, locationNum=1, latitude=45.2747807, longitude=-66.0788047;
INSERT INTO venue SET name='The Capital Complex', address1='362 Queen St.', city='Fredericton',  venueTypeId=1, locationNum=1, latitude=45.963421, longitude=-66.6462601;
INSERT INTO venue SET name='The Cellar Pub', address1='21 Pacey Dr.', city='Fredericton', venueTypeId=1, locationNum=1, latitude=45.9453608, longitude=66.6435921;
INSERT INTO venue SET name='Rockeys Sports Bar', address1='7 Market Sq.', venueTypeId=1, locationNum=1, latitude=45.2732597, longitude=-66.0654489;
INSERT INTO venue SET name='Churchills Pub', address1='10 Grannan St.', venueTypeId=1, locationNum=1, latitude=45.2717136, longitude=-66.0631271;
INSERT INTO venue SET name='Sommerset Pub', address1='367 Sommerset St.', venueTypeId=1, locationNum=1, latitude=null, longitude=null;
-- INSERT INTO venue SET name='', address1='', venueTypeId=, locationNum=, latitude=, longitude=;


INSERT INTO event SET name='BOGO!', venueId=1, eventTypeId=1, submittedById=1, coverTypeId=1, timeDay=4, timeStart='19:00:00', timeEnd='22:00:00';
INSERT INTO deal  SET name='Buy-One-Get-One', dealTypeId=2, eventId=1, venueId=1, timeDay=5, timeStart='21:00:00', timeEnd='22:00:00';
INSERT INTO deal  SET name='Half-price Apps', dealTypeId=6, eventId=1, venueId=1, timeDay=5, timeStart='19:00:00', timeEnd='21:00:00';

INSERT INTO event SET name='Power Hour', venueId=3, eventTypeId=1, submittedById=1, coverTypeId=1, timeDay=4, timeStart='23:00:00', timeEnd='00:00:00';
INSERT INTO deal  SET name='Power Hour!', dealTypeId=4, eventId=2, venueId=3, timeDay=4, timeStart='23:00:00', timeEnd='00:00:00';

INSERT INTO event SET name='Cheapnight', venueId=3, eventTypeId=1, submittedById=1, coverTypeId=1, timeDay=5, timeStart='23:00:00', timeEnd='00:00:00';
INSERT INTO deal  SET name='Poor Time!', dealTypeId=4, eventId=3, venueId=3, timeDay=5, timeStart='21:00:00', timeEnd='22:00:00';

INSERT INTO event SET name='Crappo', venueId=3, eventTypeId=1, submittedById=1, coverTypeId=1, timeDay=6, timeStart='23:00:00', timeEnd='00:00:00';
INSERT INTO deal  SET name='Lame', dealTypeId=3, eventId=4, venueId=3, timeDay=6, timeStart='21:00:00', timeEnd='22:00:00';

INSERT INTO coverType SET `name`='None';
INSERT INTO coverType SET `name`='Free';
INSERT INTO coverType SET `name`='Free Until...';
INSERT INTO coverType SET `name`='Discount';
INSERT INTO coverType SET `name`='Discount Until...';
INSERT INTO coverType SET `name`='Pay What You Can';
INSERT INTO coverType SET `name`='Door';
INSERT INTO coverType SET `name`='Ticket';
INSERT INTO coverType SET `name`='Ticket & Door';
INSERT INTO coverType SET `name`='Donation';
INSERT INTO coverType SET `name`='Donation w/ minimum';
INSERT INTO coverType SET `name`='Free w/ Item';
INSERT INTO coverType SET `name`='Discount w/ Item';
INSERT INTO coverType SET `name`='Costume Only';
INSERT INTO coverType SET `name`='Discount w/ Costume';
INSERT INTO coverType SET `name`='Invite Only';
INSERT INTO coverType SET `name`='Industry Night';
INSERT INTO coverType SET `name`='Staff Night';

INSERT INTO frequencyType SET name='Daily';
INSERT INTO frequencyType SET name='Weekly';
INSERT INTO frequencyType SET name='Bi-Weekly';
INSERT INTO frequencyType SET name='Monthly';
INSERT INTO frequencyType SET name='Annually';
INSERT INTO frequencyType SET name='Holiday';
INSERT INTO frequencyType SET name='One-off';
INSERT INTO frequencyType SET name='Range';

INSERT INTO eventType SET name='Special';
INSERT INTO eventType SET name='Annaversary';
INSERT INTO eventType SET name='Concert';
INSERT INTO eventType SET name='Open Mic';
INSERT INTO eventType SET name='Karaoke';
INSERT INTO eventType SET name='Promotion';

INSERT INTO role SET role='Admin';
INSERT INTO role SET role='User';
INSERT INTO role SET role='Moderator Lead';
INSERT INTO role SET role='Moderator';
INSERT INTO role SET role='Moderator Jr';
INSERT INTO role SET role='Venue Owner';
INSERT INTO role SET role='Venue Employee';
INSERT INTO role SET role='Venue Contributor';
INSERT INTO role SET role='Promoter';
INSERT INTO role SET role='Liquor Rep';
INSERT INTO role SET role='Advertiser';
INSERT INTO role SET role='Guest';

INSERT INTO dealType SET name='Happy Hour', info='';
INSERT INTO dealType SET name='BOGO', info='';
INSERT INTO dealType SET name='Beat The Clock', info='';
INSERT INTO dealType SET name='Reverse Beat The Clock', info='';
INSERT INTO dealType SET name='Power Hour', info='';
INSERT INTO dealType SET name='With Purchase Special', info='';
INSERT INTO dealType SET name='Appetizer Special', info='';
INSERT INTO dealType SET name='Birthday Discount', info='';
INSERT INTO dealType SET name='Birthday Freebee', info='';
INSERT INTO dealType SET name='Upgrade/Top Up', info='';
INSERT INTO dealType SET name='Ladies Night', info='';



INSERT INTO venueType SET name='Pub';
INSERT INTO venueType SET name='Bar';
INSERT INTO venueType SET name='Restaurant';
INSERT INTO venueType SET name='Sports Bar';
INSERT INTO venueType SET name='Live Music Venue';
INSERT INTO venueType SET name='Nightclub';
INSERT INTO venueType SET name='Arena';
INSERT INTO venueType SET name='Outdoors';

INSERT INTO user SET userName='boyer', password='$2y$10$r9uLRgY4MAgfoEEGzRRjGu2YFLF71d5Ob4mYNdfKqHIj5GC4GgKVC', authToken='blood', lastLocationLat=45.271111, lastLocationLong=-66.059719, nameFirst='Sean', nameLast='Boyer', email='seanboyer.sj@gmail.com', userRoleId=1, dob='1985-01-10';
INSERT INTO userRole SET userId=1, roleId=1;

INSERT INTO user SET userName='sboyer', password='$2y$10$P8u8Nu00jNHzccag7qB7cuVoG/V9D.BcU/j1uB6DtREw0TUvI5nBK', authToken='blood', lastLocationLat=45.271111, lastLocationLong=-66.059719, nameFirst='Stephen', nameLast='Boyer', email='boyer.steve@gmail.com', userRoleId=1, dob='1986-11-26';
INSERT INTO userRole SET userId=2, roleId=1;
