-- a) Update patient PCR test to positive with null cycle threshold value 
-- for all patients whose admission date is from 01/09/2020.
UPDATE pcr_test
SET result = '+', ct_value = NULL
WHERE test_id IN (
	SELECT t.test_id
	FROM testing t
	JOIN admit a ON t.patient_number = a.patient_number
	WHERE a.admission_date >= '2020-09-01'
);

--select to view
SELECT p.patient_number, p.identity_number, p.fullname, ad.admission_date, pt.test_id, pt.ct_value, pt.result
FROM patient p
LEFT JOIN 
	admit ad on ad.patient_number=p.patient_number
JOIN
    testing t ON p.patient_number = t.patient_number
JOIN 
	pcr_test pt on t.test_id = pt.test_id
order by p.patient_number asc;
	
-- b) Select all the patient information whose name is ‘Nguyen Van A’
SELECT
    p.patient_number,
    p.identity_number,
    p.fullname,
    p.phone,
    p.gender,
    p.address,
    p.discharge_date,
	lc.room_number, 
	lc.floor_number, 
	lc.building_id,
    STRING_AGG(DISTINCT CONCAT(s.date_time, ': ', s.description), E'\n') AS symptoms,
	STRING_AGG(DISTINCT CONCAT(pc.comorbidity), E', ') AS comorbidity
FROM
    patient p
LEFT JOIN 
	public.location_history lc ON p.patient_number = lc.patient_number
LEFT JOIN
    public.symptom s ON p.patient_number = s.patient_number
LEFT JOIN 
	public.patient_comorbidity pc ON p.patient_number = pc.patient_number
WHERE
    p.fullname = 'Nguyen Van A'
GROUP BY
    p.patient_number, p.identity_number, p.fullname, p.phone, p.gender, p.address, p.discharge_date,
	lc.room_number, lc.floor_number, lc.building_id;


-- c) Write a function to calculate the testing for each patient.
-- Input: Patient ID
-- Output: A list of testing
DROP FUNCTION IF EXISTS get_testing_for_patient(identity_number character varying(10));

CREATE OR REPLACE FUNCTION get_testing_for_patient(identity_number character varying(10))
RETURNS TABLE (
    test_id integer,
    test_date date,
    test_time time without time zone,
    pcr_test_result integer,
    quick_test_result integer,
    spo2_test_result integer,
    respiratory_test_result integer
)
AS $$
BEGIN
    RETURN QUERY
    SELECT
        t.test_id,
        t.date,
        t.time,
		pcr.ct_value,
		q.ct_value,
		spo.blood_oxygen_level,
		res.breaths_per_minute
    FROM
        testing t
	LEFT JOIN pcr_test pcr ON pcr.test_id = t.test_id
	LEFT JOIN quick_test q ON q.test_id = t.test_id
	LEFT JOIN spo_test spo ON spo.test_id = t.test_id
	LEFT JOIN respiratory_test res ON res.test_id = t.test_id
    WHERE
        t.patient_number = (SELECT patient_number FROM patient p WHERE p.identity_number = get_testing_for_patient.identity_number);
END;
$$ LANGUAGE plpgsql;


SELECT * FROM get_testing_for_patient('150803');

-- d) Write a procedure to sort the nurses in decreasing number of patients he/she takes care in a period of time.
-- Input: Start date, End date
-- Output: A list of sorting nurses.

DROP FUNCTION IF EXISTS sort_nurses_by_patient_count(start_date date, end_date date);

CREATE OR REPLACE FUNCTION sort_nurses_by_patient_count(start_date date, end_date date)
RETURNS TABLE (nurse_code integer, nurse_name varchar, patient_count bigint)
AS $$
BEGIN
    RETURN QUERY
    SELECT
        tc.nurse_code,
        person.fullname AS nurse_name,
        COUNT(DISTINCT tc.patient_number) AS patient_count
    FROM
        public.take_care_of tc
    LEFT JOIN
        public.nurse n ON tc.nurse_code = n.nurse_code
	LEFT JOIN
    	public.personnel person ON person.unique_code = n.nurse_code
    LEFT JOIN
        public.patient p ON tc.patient_number = p.patient_number
    WHERE
        tc.start_date >= sort_nurses_by_patient_count.start_date
        AND (tc.end_date IS NULL OR tc.end_date <= sort_nurses_by_patient_count.end_date)
    GROUP BY
        tc.nurse_code, person.fullname
    ORDER BY
        patient_count DESC;
END;
$$ LANGUAGE plpgsql;


SELECT * FROM sort_nurses_by_patient_count('2010-01-01', '2023-01-01');















