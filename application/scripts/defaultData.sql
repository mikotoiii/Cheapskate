INSERT INTO venue SET name='Peppers', address1='1 Market Sq.', venueTypeId=1, locationNum=1, latitude='45.2734856', longitude='-66.0668686';
INSERT INTO venue SET name='Callahans', address1='1 Princess St.', venueTypeId=1, locationNum=1, latitude='45.271241', longitude='-66.0643116';
INSERT INTO venue SET name='Grannans Seafood', address1='1 Market Sq.', venueTypeId=1, locationNum=1, latitude='45.2734856', longitude='-66.0668686';
INSERT INTO venue SET name='Cougars Lounge', address1='3 Market Sq.', venueTypeId=1, locationNum=1, latitude='45.2734856', longitude='-66.0668686';
INSERT INTO venue SET name='Taco Pica', address1='256 Germain St.', venueTypeId=1, locationNum=1, latitude='45.2723691', longitude='-66.062418';
INSERT INTO venue SET name='Saint John Ale House', address1='1 Market Sq.', venueTypeId=1, locationNum=1, latitude='45.2734856', longitude='-66.0668686';
INSERT INTO venue SET name='Pub Down Under', address1='400 Main St.', venueTypeId=1, locationNum=1, latitude='45.2747807', longitude='-66.0788047';
INSERT INTO venue SET name='The Capital Complex', address1='362 Queen St.', city='Fredericton',  venueTypeId=1, locationNum=1, latitude='45.963421', longitude='-66.6462601';
INSERT INTO venue SET name='The Cellar Pub', address1='21 Pacey Dr.', city='Fredericton', venueTypeId=1, locationNum=1, latitude='45.9453608', longitude='66.6435921';

INSERT INTO event SET name='BOGO!', venueId=5, eventTypeId=1, submittedById=1, coverTypeId=1;
INSERT INTO deal SET name='Buy-One-Get-One all beer, shots, wine', dealTypeId=2, eventId=1, timeStart='Sunday-2100', timeEnd='Sunday-2200';


INSERT INTO coverType SET `name`='None';
INSERT INTO coverType SET `name`='Free';
INSERT INTO coverType SET `name`='Free Until...';
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

INSERT INTO frequencyType SET name='Daily';
INSERT INTO frequencyType SET name='Weekly';
INSERT INTO frequencyType SET name='Bi-Weekly';
INSERT INTO frequencyType SET name='Monthly';
INSERT INTO frequencyType SET name='Annually';
INSERT INTO frequencyType SET name='Holiday';
INSERT INTO frequencyType SET name='One-off';

INSERT INTO eventType SET name='Special';
INSERT INTO eventType SET name='Annaversary';
INSERT INTO eventType SET name='Concert';
INSERT INTO eventType SET name='Open Mic';
INSERT INTO eventType SET name='Promotion';

INSERT INTO role SET role='Admin';
INSERT INTO role SET role='Moderator Lead';
INSERT INTO role SET role='Moderator';
INSERT INTO role SET role='Moderator Jr';
INSERT INTO role SET role='Venue Owner';
INSERT INTO role SET role='Venue Employee';
INSERT INTO role SET role='Venue Contributor';
INSERT INTO role SET role='Promoter';
INSERT INTO role SET role='Liquor Rep';
INSERT INTO role SET role='Advertiser';
INSERT INTO role SET role='User';
INSERT INTO role SET role='Guest';

INSERT INTO dealType SET name='Happy Hour', info='';
INSERT INTO dealType SET name='BOGO', info='';
INSERT INTO dealType SET name='Power Hour', info='';
INSERT INTO dealType SET name='With Purchase Special', info='';
INSERT INTO dealType SET name='Appetizer Special', info='';

INSERT INTO venueType SET name='Pub';
INSERT INTO venueType SET name='Bar';
INSERT INTO venueType SET name='Restaurant';
INSERT INTO venueType SET name='Sports Bar';
INSERT INTO venueType SET name='Live Music Venue';
INSERT INTO venueType SET name='Arena';
INSERT INTO venueType SET name='';

INSERT INTO user SET userName='boyer', lastLocationLat='45.271111', lastLocationLong='-66.059719', nameFirst='Sean', nameLast='Boyer', email='seanboyer.sj@gmail.com', userRoleId=1;
INSERT INTO userRole SET userId=1, roleId=1;