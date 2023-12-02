SELECT * FROM patient;
INSERT INTO patient VALUES(1,'121268','Nguyen Van A','387376','M','424 Thanh Thai','2020/12/3');
INSERT INTO patient VALUES(2,'140403','Tran Tuan Anh','683267','M','15 Su Van Hanh','2020/12/26');
INSERT INTO patient VALUES(3,'030276','Nguyen Hua Phung','319749','M','248 Ly Thuong Kiet','2020/11/30');
INSERT INTO patient VALUES(4,'180901','Vu Nguyen','345685','M','23/3 Cao Thang','2021/2/14');
INSERT INTO patient VALUES(5,'150803','Le Thanh Van','214429','F','134 Huynh Van Banh','2021/1/1');

SELECT * FROM symptom;
INSERT INTO symptom VALUES(1,'2020/12/1','Muscle or body aches');
INSERT INTO symptom VALUES(2,'2020/12/14','New loss of taste or smell');
INSERT INTO symptom VALUES(3,'2020/11/12','Shortness of breath or difficulty breathing');
INSERT INTO symptom VALUES(4,'2021/2/2','Congestion or runny nose');
INSERT INTO symptom VALUES(5,'2020/12/21','Diarrhea');

SELECT * FROM patient_comorbidity;
INSERT INTO patient_comorbidity VALUES(1,'Cancer');
INSERT INTO patient_comorbidity VALUES(2,'Chronic lung diseases');
INSERT INTO patient_comorbidity VALUES(3,'Diabetes');
INSERT INTO patient_comorbidity VALUES(4,'None');
INSERT INTO patient_comorbidity VALUES(5,'Immunocompromised state');

SELECT * FROM building;
INSERT INTO building VALUES(1);
INSERT INTO building VALUES(2);
INSERT INTO building VALUES(3);
INSERT INTO building VALUES(4);
INSERT INTO building VALUES(5);

SELECT * FROM floor;
INSERT INTO floor VALUES(1,1);
INSERT INTO floor VALUES(2,1);
INSERT INTO floor VALUES(3,1);
INSERT INTO floor VALUES(4,1);
INSERT INTO floor VALUES(5,1);

SELECT * FROM room;
INSERT INTO room VALUES(1,1,101,100);
INSERT INTO room VALUES(2,1,202,200);
INSERT INTO room VALUES(3,1,303,300);
INSERT INTO room VALUES(4,1,404,400);
INSERT INTO room VALUES(5,1,505,500);

SELECT * FROM personnel;
INSERT INTO personnel VALUES(1,'1967/04/03','Truong Tuan Anh','685824','M','14 Pasteur');
INSERT INTO personnel VALUES(2,'1968/02/02','Nguyen Tien Thinh','424802','M','235 Hoa Hao');
INSERT INTO personnel VALUES(3,'1969/01/08','Nguyen Thi Kieu Diem','917693','F','34 Truong Dinh');
INSERT INTO personnel VALUES(4,'1969/02/10','Dao Thi Bich Hong','663033','F','45 Quang Trung');
INSERT INTO personnel VALUES(5,'1971/02/08','Nguyen Thi Minh Huong','235893','F','434 Nguyen Hue');
INSERT INTO personnel VALUES(6,'1971/07/22','Nguyen Chanh Tin','837017','M','32 Nguyen Tri Phuong');
INSERT INTO personnel VALUES(7,'1974/05/30','Pham Hoang Minh','522321','M','358/23/24 Cong Hoa');
INSERT INTO personnel VALUES(8,'1975/03/13','Truong Anh Quan','261454','M','6969 3/2');
INSERT INTO personnel VALUES(9,'1975/04/22','Le Trong Kien','784831','M','352/3/2/4 CMT8');
INSERT INTO personnel VALUES(10,'1976/08/06','Hoang Dai Nam','141724','M','43/7 To Hien Thanh');
INSERT INTO personnel VALUES(11,'1977/09/28','Tran Nguyen Gia Phat','178932','M','437 Tran Hung Dao');
INSERT INTO personnel VALUES(12,'1978/05/12','Phan Thanh Thong','314822','M','561 Hoa Binh');
INSERT INTO personnel VALUES(13,'1978/10/08','Nguyen Tuong Vy','674012','F','13/4 Tran Quoc Thao');
INSERT INTO personnel VALUES(14,'1978/11/29','Tran Diem My','324096','F','74 Tran Nhat Duat');
INSERT INTO personnel VALUES(15,'1979/03/16','Le Quoc Khai','844076','M','90 Ho Bieu Chanh');
INSERT INTO personnel VALUES(16,'1979/03/17','Duong Qua','315159','M','49 Luy Ban Bich');
INSERT INTO personnel VALUES(17,'1980/06/09','Co Long','288260','F','49 Luy Ban Bich');
INSERT INTO personnel VALUES(18,'1981/06/04','Phan Dat','482645','M','66 Ong Ich Khiem');
INSERT INTO personnel VALUES(19,'1982/06/30','Tran Anh Tuan','774197','M','7749 Ta Quang Buu');
INSERT INTO personnel VALUES(20,'1983/04/20','Phan Tan Trung','213902','F','132 Ly Thai To');
INSERT INTO personnel VALUES(21,'1983/06/13','Phan Le Tien Thuan','140403','M','1 Nguyen Hue');


SELECT * FROM doctor;
INSERT INTO doctor VALUES(1);
INSERT INTO doctor VALUES(2);
INSERT INTO doctor VALUES(3);
INSERT INTO doctor VALUES(4);
INSERT INTO doctor VALUES(5);
INSERT INTO doctor VALUES(21);

SELECT * FROM volunteer;
INSERT INTO volunteer VALUES(6);
INSERT INTO volunteer VALUES(7);
INSERT INTO volunteer VALUES(8);
INSERT INTO volunteer VALUES(9);
INSERT INTO volunteer VALUES(10);

SELECT * FROM nurse;
INSERT INTO nurse VALUES(11);
INSERT INTO nurse VALUES(12);
INSERT INTO nurse VALUES(13);
INSERT INTO nurse VALUES(14);
INSERT INTO nurse VALUES(15);

SELECT * FROM staff;
INSERT INTO staff VALUES(16);
INSERT INTO staff VALUES(17);
INSERT INTO staff VALUES(18);
INSERT INTO staff VALUES(19);
INSERT INTO staff VALUES(20);

SELECT * FROM manager;
INSERT INTO manager VALUES(1);
INSERT INTO manager VALUES(2);
INSERT INTO manager VALUES(3);
INSERT INTO manager VALUES(4);
INSERT INTO manager VALUES(5);
INSERT INTO manager VALUES(21);

SELECT * FROM medication;
INSERT INTO medication VALUES(1,'2025/1/1','Remdesivir',2000000,'An antiviral medication');
INSERT INTO medication VALUES(2,'2026/1/1','Dexamethasone',1490000,'A corticosteroid with anti-inflammatory properties');
INSERT INTO medication VALUES(3,'2026/1/1','Tocilizumab',1200000,'Inhibits the activity of interleukin-6 (IL-6)');
INSERT INTO medication VALUES(4,'2025/1/1','Convalescent Plasm',2500000,'Provide passive immunity to the recipient, helping their immune system fight the infection');
INSERT INTO medication VALUES(5,'2027/1/1','Monoclonal Antibodies',3600000,'Neutralize the virus and reduce the severity of symptoms');
INSERT INTO medication VALUES(6,'2026/1/1','Molnupiravir',2400000,'Reduce the viral load and limit the progression of COVID-19');

SELECT * FROM admit;
INSERT INTO admit VALUES(1,16,'2020/10/24','Hung Vuong Hospital');
INSERT INTO admit VALUES(2,17,'2020/11/15','15 Su Van Hanh');
INSERT INTO admit VALUES(3,18,'2020/10/19','Cho Ray Hospital');
INSERT INTO admit VALUES(4,19,'2021/1/3','23/3 Cao Thang');
INSERT INTO admit VALUES(5,20,'2020/11/23','134 Huynh Van Banh');

SELECT * FROM take_care_of;
INSERT INTO take_care_of VALUES(1,15,'2020/10/25','2020/12/1');
INSERT INTO take_care_of VALUES(2,14,'2020/11/17','2020/12/20');
INSERT INTO take_care_of VALUES(3,13,'2020/10/23','2020/11/25');
INSERT INTO take_care_of VALUES(4,12,'2021/1/4','2021/2/12');
INSERT INTO take_care_of VALUES(5,11,'2020/11/27','2020/12/28');

SELECT * FROM treatment;
INSERT INTO treatment VALUES(1,'2020/10/26','2020/11/13','Fine');
INSERT INTO treatment VALUES(2,'2020/11/19','2020/12/12','Fine');
INSERT INTO treatment VALUES(3,'2020/10/27','2020/11/10','Fine');
INSERT INTO treatment VALUES(4,'2021/1/4','2021/1/23','Not Fine');
INSERT INTO treatment VALUES(5,'2020/11/27','2020/12/28','Fine');
INSERT INTO treatment VALUES(4,'2021/1/27','2021/2/8','Fine');

SELECT * FROM treat;
INSERT INTO treat VALUES(1,1,'2020/10/26','2020/11/13');
INSERT INTO treat VALUES(2,2,'2020/11/19','2020/12/12');
INSERT INTO treat VALUES(3,3,'2020/10/27','2020/11/10');
INSERT INTO treat VALUES(4,4,'2021/1/4','2021/1/23');
INSERT INTO treat VALUES(5,5,'2020/11/27','2020/12/28');
INSERT INTO treat VALUES(21,4,'2021/1/27','2021/2/8');
INSERT INTO treat VALUES(21,4,'2021/1/4','2021/1/23');
INSERT INTO treat VALUES(4,4,'2021/1/27','2021/2/8');

SELECT * FROM use;
INSERT INTO use VALUES(3,1,'2020/10/26','2020/11/13');
INSERT INTO use VALUES(2,2,'2020/11/19','2020/12/12');
INSERT INTO use VALUES(5,3,'2020/10/27','2020/11/10');
INSERT INTO use VALUES(1,4,'2021/1/4','2021/1/23');
INSERT INTO use VALUES(1,5,'2020/11/27','2020/12/28');
INSERT INTO use VALUES(4,4,'2021/1/27','2021/2/8');


SELECT * FROM location_history;
INSERT INTO location_history VALUES(1,'2020/10/26',2,1,202);
INSERT INTO location_history VALUES(2,'2020/11/19',1,1,101);
INSERT INTO location_history VALUES(3,'2020/10/27',3,1,303);
INSERT INTO location_history VALUES(4,'2021/1/4',1,1,101);
INSERT INTO location_history VALUES(5,'2020/11/27',5,1,505);
INSERT INTO location_history VALUES(4,'2021/1/27',4,1,404);


SELECT * FROM testing;
INSERT INTO testing VALUES(1,'2020/10/25','9:00',1);
INSERT INTO testing VALUES(2,'2020/11/16','9:00',2);
INSERT INTO testing VALUES(3,'2020/10/20','9:00',3);
INSERT INTO testing VALUES(4,'2021/1/4','9:00',4);
INSERT INTO testing VALUES(5,'2020/10/24','9:00',5);
INSERT INTO testing VALUES(6,'2020/10/31','10:00',1);
INSERT INTO testing VALUES(7,'2020/11/23','10:00',2);
INSERT INTO testing VALUES(8,'2020/10/27','10:00',3);
INSERT INTO testing VALUES(9,'2021/1/11','10:00',4);
INSERT INTO testing VALUES(10,'2020/11/1','10:00',5);
INSERT INTO testing VALUES(11,'2020/11/7','7:00',1);
INSERT INTO testing VALUES(12,'2020/11/30','7:00',2);
INSERT INTO testing VALUES(13,'2020/11/3','7:00',3);
INSERT INTO testing VALUES(14,'2021/1/18','7:00',4);
INSERT INTO testing VALUES(15,'2020/11/8','7:00',5);
INSERT INTO testing VALUES(16,'2020/11/14','8:00',1);
INSERT INTO testing VALUES(17,'2020/12/7','8:00',2);
INSERT INTO testing VALUES(18,'2020/11/10','8:00',3);
INSERT INTO testing VALUES(19,'2021/1/25','8:00',4);
INSERT INTO testing VALUES(20,'2020/11/15','8:00',5);


SELECT * FROM quick_test;
INSERT INTO quick_test VALUES(1,27,'+');
INSERT INTO quick_test VALUES(2,25,'+');
INSERT INTO quick_test VALUES(3,24,'+');
INSERT INTO quick_test VALUES(4,22,'+');
INSERT INTO quick_test VALUES(5,29,'+');


SELECT * FROM pcr_test;
INSERT INTO pcr_test VALUES(6,25,'+');
INSERT INTO pcr_test VALUES(7,26,'+');
INSERT INTO pcr_test VALUES(8,26,'+');
INSERT INTO pcr_test VALUES(9,21,'+');
INSERT INTO pcr_test VALUES(10,30,'+');

SELECT * FROM respiratory_test;
INSERT INTO respiratory_test VALUES(11,15);
INSERT INTO respiratory_test VALUES(12,17);
INSERT INTO respiratory_test VALUES(13,16);
INSERT INTO respiratory_test VALUES(14,13);
INSERT INTO respiratory_test VALUES(15,18);

SELECT * FROM spo_test;
INSERT INTO spo_test VALUES(16,93);
INSERT INTO spo_test VALUES(17,94);
INSERT INTO spo_test VALUES(18,92);
INSERT INTO spo_test VALUES(19,90);
INSERT INTO spo_test VALUES(20,92);
