create database website;
use website;

CREATE TABLE clientt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);
ALTER TABLE clientt
ADD image VARCHAR(255) default ("def.png");
CREATE TABLE company (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL unique,
    number int NOT NULL,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(255) not null,
    website VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    about text NOT NULL
);
ALTER TABLE company
ADD banner VARCHAR(255) default ("banner.jpg");
alter table company drop banner;
CREATE TABLE offers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
	fromc VARCHAR(55) NOT NULL,
    toc VARCHAR(55) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) not null,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (company_id) REFERENCES company(id)
);
ALTER TABLE offers
ADD views int  DEFAULT (0);

select sum(views) as "total views" from offers  where company_id=1;

select count(*) as "all post" from offers  where company_id=1;
select * from offers where company_id=1  order by id DESC LIMIT 3;

insert into offers (company_id,title,fromc,toc,description,image)value(1,"saadsaad","meknes","fes","saadsaadsaadsaadsaadsaad","download.png");
insert into offers (company_id,title,fromc,toc,description,image)value(5,"saaddaas","meknes","tanger","hedvfshqfvhdjvhvbhbv","ecom.jpg");
insert into offers (company_id,title,fromc,toc,description,image)value(4,"manger","meknes","casa","hedvfshqfvhdjvhvbhbv","cashplus.png");
insert into offers (company_id,title,fromc,toc,description,image)value(3,"saaddaas","Rabat","tanger","hedvfshqfvhdjvhvbhbv","logosite.png");
insert into offers (company_id,title,fromc,toc,description,image)value(2,"saaddaas","fes","Rabat","hedvfshqfvhdjvhvbhbv","tawsil.png");

INSERT INTO company (nom, email, number, password, image, website, city, about) VALUES
('FedEx', 'contact@fedex.com', 1234567890, 'password123', 'fedex.jpg', 'www.fedex.com', 'Memphis', 'FedEx provides fast and reliable delivery services worldwide.'),
('DHL', 'contact@dhl.com', 1234567891, 'password123', 'dhl.jpg', 'www.dhl.com', 'Bonn', 'DHL offers international express mail services and logistics.'),
('UPS', 'contact@ups.com', 1234567892, 'password123', 'ups.jpg', 'www.ups.com', 'Atlanta', 'UPS is a global leader in logistics, offering a wide range of solutions.'),
('TNT', 'contact@tnt.com', 1234567893, 'password123', 'tnt.jpg', 'download (3).png', 'Hoofddorp', 'TNT specializes in express delivery services around the globe.'),
('USPS', 'contact@usps.com', 1234567894, 'password123', 'usps.jpg', 'download (5).png', 'Washington D.C.', 'The United States Postal Service provides mail and package delivery services within the United States and internationally.');
update company set about ="
FedEx Express is one of the world's largest express transportation companies, providing fast and reliable delivery to every U.S. 
address and to more than 220 countries and territories. FedEx Express uses a global air-and-ground network to speed delivery of time-sensitive shipments, usually in one to two business days with the delivery time guaranteed."
where id=1;
update company set image="fedex.png" where id=1;

INSERT INTO offers (company_id, title, fromc, toc, description, image) VALUES
(1, 'Express Delivery', 'New York', 'Los Angeles', 'Fast and reliable express delivery from New York to Los Angeles.', 'download (4).png'),
(2, 'International Shipping', 'Berlin', 'Tokyo', 'Reliable international shipping from Berlin to Tokyo.', 'download (1).png'),
(3, 'Next Day Air', 'Chicago', 'Miami', 'Guaranteed next-day air delivery from Chicago to Miami.', 'download (2).png'),
(4, 'Economy Express', 'Paris', 'London', 'Affordable economy express service from Paris to London.', 'download (6).png'),
(5, 'Priority Mail', 'San Francisco', 'Houston', 'Priority mail service from San Francisco to Houston.', 'download (7).png');

insert into clientt (username,email,password)value("saad","saad05@gmail.com","123456") ;
update offers set description="Experience the convenience and reliability of our Guaranteed Next-Day Air Delivery service from Chicago to Miami. This premium service ensures that your important packages and documents arrive at their destination swiftly and securely within 24 hours.

Key Features:

Speed and Reliability: With our next-day air delivery, your shipments are prioritized to ensure they reach Miami by the next business day.
Comprehensive Coverage: We handle packages of various sizes and weights, accommodating both personal and business needs.
Real-Time Tracking: Stay updated with real-time tracking, allowing you to monitor the progress of your delivery from pickup to drop-off.
Secure Handling: Our dedicated team ensures that all packages are handled with the utmost care, utilizing secure packaging and handling procedures.
Convenient Drop-Off and Pickup: Drop off your package at any of our convenient locations in Chicago, or schedule a pickup from your home or office. Our extensive network ensures timely collection and delivery.
Benefits:

Peace of Mind: Rest assured knowing that your urgent deliveries will arrive on time, every time.
Customer Support: Our customer support team is available 24/7 to assist with any queries or issues that may arise.
Flexibility: Whether you are sending important documents, gifts, or business materials, our service is designed to meet your specific requirements." 
where company_id=3