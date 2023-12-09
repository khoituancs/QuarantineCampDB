SELECT * FROM patient;
INSERT INTO patient (identity_number, fullname, phone, gender, address, discharge_date)
VALUES
('121268','Nguyen Van A','387376','M','424 Thanh Thai','2020/12/3'),
('140403','Tran Anh Tuan','683267','M','15 Su Van Hanh','2020/12/26'),
('030276','Nguyen Hua Minh','319749','M','248 Ly Thuong Kiet','2020/11/30'),
('180901','Vu Nguyen','345685','M','23/3 Cao Thang','2020/1/1'),
('150803','Nguyen Van A','214429','F','134 Huynh Van Banh','2020/1/1');

SELECT * FROM symptom;
INSERT INTO symptom 
VALUES
(1,'2020/12/1','Muscle or body aches'),
(2,'2020/12/14','New loss of taste or smell'),
(3,'2020/11/12','Shortness of breath or difficulty breathing'),
(4,'2021/2/2','Congestion or runny nose'),
(5,'2020/12/21','Diarrhea'),
(5,'2020/12/22','New loss of taste or smell');

SELECT * FROM patient_comorbidity;
INSERT INTO patient_comorbidity 
VALUES
(1,'Cancer'),
(2,'Chronic lung diseases'),
(3,'Diabetes'),
(4,'None'),
(5,'Immunocompromised state');

SELECT * FROM building;
INSERT INTO public.building DEFAULT VALUES;
INSERT INTO public.building DEFAULT VALUES;
INSERT INTO public.building DEFAULT VALUES;
INSERT INTO public.building DEFAULT VALUES;
INSERT INTO public.building DEFAULT VALUES;

SELECT * FROM floor;
INSERT INTO floor 
VALUES (1,1),(2,1),(3,1),(4,1),(5,1);

SELECT * FROM room;
INSERT INTO room 
VALUES (1,1,101,100),(2,1,202,200),(3,1,303,300),(4,1,404,400),(5,1,505,500);

SELECT * FROM personnel;
INSERT INTO personnel (dob, fullname, phone, gender, address)
VALUES
('1967/04/03','Truong Tuan Tu','685824','M','14 Pasteur'),
('1968/02/02','Nguyen Tien Thai','424802','M','235 Hoa Hao'),
('1969/01/08','Nguyen Thi Thuy Diem','917693','F','34 Truong Dinh'),
('1969/02/10','Dao Thi Minh Chau','663033','F','45 Quang Trung'),
('1971/02/08','Nguyen Thi Phuong','235893','F','434 Nguyen Hue'),
('1971/07/22','Nguyen Chanh Tin','837017','M','32 Nguyen Tri Phuong'),
('1974/05/30','Pham Hoang Minh','522321','M','358/23/24 Cong Hoa'),
('1975/03/13','Truong Anh Quan','261454','M','6969 3/2'),
('1975/04/22','Le Trong Kien','784831','M','352/3/2/4 CMT8'),
('1976/08/06','Hoang Dai Nam','141724','M','43/7 To Hien Thanh'),
('1977/09/28','Tran Nguyen Gia Phat','178932','M','437 Tran Hung Dao'),
('1978/05/12','Phan Thanh Thong','314822','M','561 Hoa Binh'),
('1978/10/08','Nguyen Tuong Vy','674012','F','13/4 Tran Quoc Thao'),
('1978/11/29','Tran Diem My','324096','F','74 Tran Nhat Duat'),
('1979/03/16','Le Quoc Khai','844076','M','90 Ho Bieu Chanh'),
('1979/03/17','Duong Qua','315159','M','49 Luy Ban Bich'),
('1980/06/09','Co Long','288260','F','49 Luy Ban Bich'),
('1981/06/04','Phan Dat','482645','M','66 Ong Ich Khiem'),
('1982/06/30','Tran Anh Tu','774197','M','7749 Ta Quang Buu'),
('1983/04/20','Phan Tan Trung','213902','F','132 Ly Thai To'),
('1983/06/13','Phan Le Tien Thuan','140403','M','1 Nguyen Hue');

SELECT * FROM doctor;
INSERT INTO doctor 
VALUES (1),(2),(3),(4),(5),(21);

SELECT * FROM volunteer;
INSERT INTO volunteer 
VALUES (6),(7),(8),(9),(10);

SELECT * FROM nurse;
INSERT INTO nurse 
VALUES (11),(12),(13),(14),(15);

SELECT * FROM staff;
INSERT INTO staff 
VALUES (16),(17),(18),(19),(20);

SELECT * FROM manager;
INSERT INTO manager 
VALUES (1),(2),(3),(4),(5),(21);

SELECT * FROM medication;
INSERT INTO medication (expiration_date, name, price, effects)
VALUES
('2025/1/1','Remdesivir',2000000,'An antiviral medication'),
('2026/1/1','Dexamethasone',1490000,'A corticosteroid with anti-inflammatory properties'),
('2026/1/1','Tocilizumab',1200000,'Inhibits the activity of interleukin-6 (IL-6)'),
('2025/1/1','Convalescent Plasm',2500000,'Provide passive immunity to the recipient, helping their immune system fight the infection'),
('2027/1/1','Monoclonal Antibodies',3600000,'Neutralize the virus and reduce the severity of symptoms'),
('2026/1/1','Molnupiravir',2400000,'Reduce the viral load and limit the progression of COVID-19');

SELECT * FROM admit;
INSERT INTO admit 
VALUES
(1,16,'2020/10/24','Hung Vuong Hospital'),
(2,17,'2020/11/15','15 Su Van Hanh'),
(3,18,'2020/10/19','Cho Ray Hospital'),
(4,19,'2020/01/01','23/3 Cao Thang'),
(5,20,'2020/01/01','134 Huynh Van Banh');

SELECT * FROM take_care_of;
INSERT INTO take_care_of 
VALUES
(1,15,'2020/10/25','2020/12/1'),
(2,15,'2020/11/17','2020/12/20'),
(3,13,'2020/10/23','2020/11/25'),
(4,12,'2021/1/4','2021/2/12'),
(5,11,'2020/11/27','2020/12/28');

SELECT * FROM treatment;
INSERT INTO treatment 
VALUES
(1,'2020/10/26','2020/11/13','Fine'),
(2,'2020/11/19','2020/12/12','Fine'),
(3,'2020/10/27','2020/11/10','Fine'),
(4,'2021/1/4','2021/1/23','Not Fine'),
(5,'2020/11/27','2020/12/28','Fine'),
(4,'2021/1/27','2021/2/8','Fine');

SELECT * FROM treat;
INSERT INTO treat 
VALUES
(1,1,'2020/10/26','2020/11/13'),
(2,2,'2020/11/19','2020/12/12'),
(3,3,'2020/10/27','2020/11/10'),
(4,4,'2021/1/4','2021/1/23'),
(5,5,'2020/11/27','2020/12/28'),
(21,4,'2021/1/27','2021/2/8'),
(21,4,'2021/1/4','2021/1/23'),
(4,4,'2021/1/27','2021/2/8');

SELECT * FROM use;
INSERT INTO use 
VALUES
(3,1,'2020/10/26','2020/11/13'),
(2,2,'2020/11/19','2020/12/12'),
(5,3,'2020/10/27','2020/11/10'),
(1,4,'2021/1/4','2021/1/23'),
(1,5,'2020/11/27','2020/12/28'),
(4,4,'2021/1/27','2021/2/8');


SELECT * FROM location_history;
INSERT INTO location_history 
VALUES
(1,'2020/10/26',2,1,202),
(2,'2020/11/19',1,1,101),
(3,'2020/10/27',3,1,303),
(4,'2021/1/4',1,1,101),
(5,'2020/11/27',5,1,505),
(4,'2021/1/27',4,1,404);


SELECT * FROM testing;
INSERT INTO testing ("date", "time", patient_number)
VALUES
('2020/10/25','9:00',1),('2020/11/16','9:00',2),
('2020/10/20','9:00',3),('2021/1/4','9:00',4),
('2020/10/24','9:00',5),('2020/10/31','10:00',1),
('2020/11/23','10:00',2),('2020/10/27','10:00',3),
('2021/1/11','10:00',4),('2020/11/1','10:00',5),
('2020/11/7','7:00',1),('2020/11/30','7:00',2),
('2020/11/3','7:00',3),('2021/1/18','7:00',4),
('2020/11/8','7:00',5),('2020/11/14','8:00',1),
('2020/12/7','8:00',2),('2020/11/10','8:00',3),
('2021/1/25','8:00',4),('2020/11/15','8:00',5);

SELECT * FROM quick_test;
INSERT INTO quick_test 
VALUES (1,27,'+'),(2,25,'-'),(3,24,'+'),(4,22,'+'),(5,29,'+');

SELECT * FROM pcr_test;
INSERT INTO pcr_test 
VALUES (6,25,'+'),(7,26,'-'),(8,26,'+'),(9,21,'-'),(10,30,'-');

SELECT * FROM respiratory_test;
INSERT INTO respiratory_test 
VALUES (11,15),(12,17),(13,16),(14,13),(15,18);

SELECT * FROM spo_test;
INSERT INTO spo_test 
VALUES (16,93),(17,94),(18,92),(19,90),(20,92);
