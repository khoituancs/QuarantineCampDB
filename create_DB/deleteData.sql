SET FOREIGN_KEY_CHECKS = 0;

-- Delete all records from each table
TRUNCATE TABLE admit;
TRUNCATE TABLE building;
TRUNCATE TABLE doctor;
TRUNCATE TABLE floor;
TRUNCATE TABLE location_history;
TRUNCATE TABLE manager;
TRUNCATE TABLE medication;
TRUNCATE TABLE medication_use;
TRUNCATE TABLE nurse;
TRUNCATE TABLE patient;
TRUNCATE TABLE patient_comorbidity;
TRUNCATE TABLE pcr_test;
TRUNCATE TABLE personnel;
TRUNCATE TABLE quick_test;
TRUNCATE TABLE respiratory_test;
TRUNCATE TABLE room;
TRUNCATE TABLE spo_test;
TRUNCATE TABLE staff;
TRUNCATE TABLE symptom;
TRUNCATE TABLE take_care_of;
TRUNCATE TABLE testing;
TRUNCATE TABLE treat;
TRUNCATE TABLE treatment;
TRUNCATE TABLE volunteer;
-- Repeat for each table in your database

-- Enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;