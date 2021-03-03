-- Homteq sql for creating tables

drop table if exists Users;
create table Users (
  userId          int(4)          auto_increment,
  userType        varchar(1)      not null,
  userFName       varchar(50)     not null,
  userSName       varchar(50)     not null,
  userAddress       varchar(50)     not null,
  userPostCode     varchar(50)     not null,
  userTelNo       varchar(50)     not null,
  userEmail       varchar(50)     not null unique,
  userPassword       varchar(50)     not null,
  constraint      u_uid_pk        primary key (userId)
);

drop table if exists Product;

create table Product (
  prodId            int(3)          auto_increment,
  prodName          varchar(30)     not null,
  prodPicNameSmall  varchar(100)    not null,
  prodPicNameLarge  varchar(100)    not null,
  prodDescribShort  varchar(1000),
  prodDescribLong   varchar(3000),
  prodPrice         decimal(6,2)    not null,
  prodQuantity      int(4)          not null,
  constraint        p_pid_pk        primary key (prodId)
);


insert into 
Product 
(prodName, prodPicNameSmall, prodPicNameLarge, prodDescribShort, prodDescribLong, prodPrice, prodQuantity)
values
('AMAZON Echo Studio', 'echo_studio.jpg', 'echo_studio_lg.jpg',
'High-fidelity smart speaker with 3D audio and Alexa',
'Designed with music in mind, the Amazon Echo Studio brings out the best in every song. 5 speakers generate room-filling sound with powerful bass. Dolby Atmos adds space, clarity, and depth for a virtual surround sound experience.

Play your favourite music using just your voice through Amazon Music, Spotify, TuneIn and other popular streaming services. With Amazon Music HD you can listen to tracks that have been mastered in 3D along with High Resolution Audio files.',
159.99, 14
),
('GOOGLE Nest Hub Max', 'google_hub.jpg', 'google_hub_lg.jpg',
'Connect with those who matter most with the Google Nest Hub Max and its built-in camera. Google Duo and Google Meet make it easy to catch-up with family or host a meeting.',
'Connect with those who matter most with the Google Nest Hub Max and its built-in camera. Google Duo and Google Meet make it easy to catch-up with family or host a meeting. You dont even need to pause what youre doing – the camera is smart enough to keep you in the frame as youre moving about.
Google Assistant
Theres so much the Google Assistant can do. Discover a new recipe (along with step-by-step instructions), add appointments to your calendar, leave reminders for your family, control smart devices such as thermostats and bulbs, send videos to Chromecast TVs, and more. It all starts with “Hey Google…”.
Google Photos
Relive your favourite moments from your summer holiday. Your most recent (and best) pics from Google Photos will automatically show on screen. You can also request any album or series of photos.',
219.00, 11
),
('SWANN Enforcer Security System', 'cctv.jpg', 'cctv_lg.jpg',
'The Swann SWDVK-846804SL-EU 8-Channel Full HD DVR Security System offers high-resolution cameras and colour night vision, so youll get a crystal-clear look at important little details like license plates and faces, even at night.',
'The Swann SWDVK-846804SL-EU 8-Channel Full HD DVR Security System offers high-resolution cameras and colour night vision, so youll get a crystal-clear look at important little details like license plates and faces, even at night.
Prevent unwanted activity
Red and blue police-style lights flash as a warning to deter potential thieves. And its also weatherproof, so no matter the conditions your security system will always be working to keep your home safe.

Security alerts & voice control

Download the Swann app and get notifications and alerts straight to your smartphone. For added convenience, you can control your security kit with Google Home or Amazon Alexa devices.

Precise detection',
229.99, 8
),
('HIVE Active Heating Thermostat', 'heating.jpg', 'heating_lg.jpg',
'The Hive Active Heating & Hot Water Thermostat connects you and your heating system via an app, so that you can control everything from your phone or tablet.',
'The Hive Active Heating & Hot Water Thermostat connects you and your heating system via an app, so that you can control everything from your phone or tablet. Based on your phones location, Hive will send you reminders to turn your heating on before you get home.

Youll also get an alert if youve left it on when you go out, so you can quickly turn it off with the app. And when youre away for a while or on holiday, Holiday Mode puts your heating into a sleep state until you get home.
Wake up in comfort and return to a warm house after a long day without having to heat your house all day using the app, which lets you schedule up to six heating events throughout the day. No matter where you are, at home or away, you can easily change the temperature of your home. And because youll only heat your home when you need to, you can save on your energy bills.',
145.00, 19
);