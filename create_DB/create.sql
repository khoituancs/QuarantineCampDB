BEGIN;


CREATE TABLE IF NOT EXISTS public.manager
(
    manager_code integer NOT NULL,
    CONSTRAINT manager_pkey PRIMARY KEY (manager_code)
);

CREATE TABLE IF NOT EXISTS public.patient
(
    patient_number SERIAL PRIMARY KEY,
    identity_number character varying(10) COLLATE pg_catalog."default",
    fullname character varying(20) COLLATE pg_catalog."default" NOT NULL,
    phone character varying(10) COLLATE pg_catalog."default",
    gender character(1) COLLATE pg_catalog."default" NOT NULL,
    address character varying(20) COLLATE pg_catalog."default",
    discharge_date date,
    CONSTRAINT identity_number_constraint UNIQUE (identity_number)
);

CREATE TABLE IF NOT EXISTS public.patient_comorbidity
(
    patient_number integer NOT NULL,
    comorbidity character varying COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT patient_comorbidity_primarykey_constraint PRIMARY KEY (patient_number, comorbidity)
);

CREATE TABLE IF NOT EXISTS public.personnel
(
    unique_code SERIAL PRIMARY KEY,
    dob date NOT NULL,
    fullname character varying COLLATE pg_catalog."default" NOT NULL,
    phone character(10) COLLATE pg_catalog."default" NOT NULL,
    gender character(1) COLLATE pg_catalog."default" NOT NULL,
    address character varying(20) COLLATE pg_catalog."default" NOT NULL
);

CREATE TABLE IF NOT EXISTS public.volunteer
(
    volunteer_code integer NOT NULL,
    PRIMARY KEY (volunteer_code)
);

CREATE TABLE IF NOT EXISTS public.nurse
(
    nurse_code integer NOT NULL,
    CONSTRAINT nurse_pk_constraint PRIMARY KEY (nurse_code)
);

CREATE TABLE IF NOT EXISTS public.staff
(
    staff_code integer NOT NULL,
    PRIMARY KEY (staff_code)
);

CREATE TABLE IF NOT EXISTS public.doctor
(
    doctor_code integer NOT NULL,
    PRIMARY KEY (doctor_code)
);

CREATE TABLE IF NOT EXISTS public.testing
(
    test_id SERIAL PRIMARY KEY,
    date date NOT NULL,
    "time" time without time zone NOT NULL,
    patient_number integer NOT NULL
);

CREATE TABLE IF NOT EXISTS public.pcr_test
(
    test_id integer NOT NULL,
    ct_value integer NOT NULL,
    result character(1) NOT NULL,
    PRIMARY KEY (test_id)
);

CREATE TABLE IF NOT EXISTS public.quick_test
(
    test_id integer NOT NULL,
    ct_value integer NOT NULL,
    result character NOT NULL,
    PRIMARY KEY (test_id)
);

CREATE TABLE IF NOT EXISTS public.spo_test
(
    test_id integer NOT NULL,
    blood_oxygen_level integer NOT NULL,
    PRIMARY KEY (test_id)
);

CREATE TABLE IF NOT EXISTS public.respiratory_test
(
    test_id integer NOT NULL,
    breaths_per_minute integer NOT NULL,
    PRIMARY KEY (test_id)
);

CREATE TABLE IF NOT EXISTS public.building
(
    building_id SERIAL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS public.floor
(
    building_id integer NOT NULL,
    floor_number integer NOT NULL,
    CONSTRAINT floor_pk_constraint PRIMARY KEY (building_id, floor_number)
);

CREATE TABLE IF NOT EXISTS public.room
(
    building_id integer NOT NULL,
    floor_number integer NOT NULL,
    room_number integer NOT NULL,
    capacity integer NOT NULL,
    CONSTRAINT room_pk_constraint PRIMARY KEY (building_id, floor_number, room_number)
);

CREATE TABLE IF NOT EXISTS public.location_history
(
    patient_number integer NOT NULL,
    date_time timestamp without time zone NOT NULL,
    building_id integer NOT NULL,
    floor_number integer NOT NULL,
    room_number integer NOT NULL,
    CONSTRAINT location_history_pk_constraint PRIMARY KEY (patient_number, date_time)
);

CREATE TABLE IF NOT EXISTS public.symptom
(
    patient_number integer NOT NULL,
    date_time timestamp without time zone NOT NULL,
    description character varying,
    CONSTRAINT symptom_pk_constraint PRIMARY KEY (patient_number, date_time)
);

CREATE TABLE IF NOT EXISTS public.admit
(
    patient_number integer NOT NULL,
    staff_code integer NOT NULL,
    admission_date date NOT NULL,
    "from" character varying,
    PRIMARY KEY (patient_number)
);

CREATE TABLE IF NOT EXISTS public.take_care_of
(
    patient_number integer NOT NULL,
    nurse_code integer NOT NULL,
    start_date date NOT NULL,
    end_date date,
    PRIMARY KEY (patient_number)
);

CREATE TABLE IF NOT EXISTS public.medication
(
    med_code SERIAL PRIMARY KEY ,
    expiration_date date,
    name character varying NOT NULL,
    price integer NOT NULL,
    effects character varying
);

CREATE TABLE IF NOT EXISTS public.use
(
    med_code integer NOT NULL,
    patient_number integer NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    CONSTRAINT use_pk_constraint PRIMARY KEY (med_code, patient_number, start_date, end_date)
);

CREATE TABLE IF NOT EXISTS public.treatment
(
    patient_number integer NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    result character varying,
    CONSTRAINT treatment_pk_constraint PRIMARY KEY (patient_number, start_date, end_date)
);

CREATE TABLE IF NOT EXISTS public."treat"
(
    doctor_code integer NOT NULL,
    patient_number integer NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    CONSTRAINT treat_pk_constraint PRIMARY KEY (doctor_code, patient_number, start_date, end_date)
);

ALTER TABLE IF EXISTS public.manager
    ADD CONSTRAINT manager_code_foreignkey_constraint FOREIGN KEY (manager_code)
    REFERENCES public.personnel (unique_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;
CREATE INDEX IF NOT EXISTS manager_pkey
    ON public.manager(manager_code);


ALTER TABLE IF EXISTS public.patient_comorbidity
    ADD CONSTRAINT patient_comorbidity_foreignkey_constraint FOREIGN KEY (patient_number)
    REFERENCES public.patient (patient_number) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.volunteer
    ADD CONSTRAINT volunteer_fk_constraint FOREIGN KEY (volunteer_code)
    REFERENCES public.personnel (unique_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.nurse
    ADD CONSTRAINT nurse_fk_constraint FOREIGN KEY (nurse_code)
    REFERENCES public.personnel (unique_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.staff
    ADD CONSTRAINT staff_fk_constraint FOREIGN KEY (staff_code)
    REFERENCES public.personnel (unique_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.doctor
    ADD CONSTRAINT doctor_fk_constraint FOREIGN KEY (doctor_code)
    REFERENCES public.personnel (unique_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.testing
    ADD CONSTRAINT testign_fk_constraint FOREIGN KEY (patient_number)
    REFERENCES public.patient (patient_number) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.pcr_test
    ADD CONSTRAINT pcr_fk_constraint FOREIGN KEY (test_id)
    REFERENCES public.testing (test_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.quick_test
    ADD CONSTRAINT quick_fk_constraint FOREIGN KEY (test_id)
    REFERENCES public.testing (test_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.spo_test
    ADD CONSTRAINT spo_fk_constraint FOREIGN KEY (test_id)
    REFERENCES public.testing (test_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.respiratory_test
    ADD CONSTRAINT respiratory_fk_constraitn FOREIGN KEY (test_id)
    REFERENCES public.testing (test_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.floor
    ADD CONSTRAINT floor_fk_constraint FOREIGN KEY (building_id)
    REFERENCES public.building (building_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.room
    ADD CONSTRAINT room_fk_constraint FOREIGN KEY (building_id, floor_number)
    REFERENCES public.floor (building_id, floor_number) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.location_history
    ADD CONSTRAINT location_patient_fk_constraint FOREIGN KEY (patient_number)
    REFERENCES public.patient (patient_number) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.location_history
    ADD CONSTRAINT location_room_fk_constraint FOREIGN KEY (building_id, floor_number, room_number)
    REFERENCES public.room (building_id, floor_number, room_number) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.symptom
    ADD CONSTRAINT symptom_fk_constraint FOREIGN KEY (patient_number)
    REFERENCES public.patient (patient_number) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.admit
    ADD CONSTRAINT admit_fk_constraint FOREIGN KEY (staff_code)
    REFERENCES public.staff (staff_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.take_care_of
    ADD CONSTRAINT takecareof_fk_constraint FOREIGN KEY (nurse_code)
    REFERENCES public.nurse (nurse_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.treatment
    ADD CONSTRAINT treatment_fk_constraint FOREIGN KEY (patient_number)
    REFERENCES public.patient (patient_number) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public."treat"
    ADD CONSTRAINT treat_fk_constraint FOREIGN KEY (doctor_code)
    REFERENCES public.doctor (doctor_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public."treat"
    ADD CONSTRAINT treat_treatment_fk_constraint FOREIGN KEY (patient_number, start_date, end_date)
    REFERENCES public.treatment (patient_number, start_date, end_date) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;

END;

CREATE TABLE IF NOT EXISTS public.mgr_authentication
(
    manager_code integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(50) NOT NULL,
    PRIMARY KEY (manager_code),
    CONSTRAINT mgr_username_unique UNIQUE (username)
        INCLUDE(username)
);

ALTER TABLE IF EXISTS public.mgr_authentication
    ADD CONSTRAINT mgr_authentication_fk FOREIGN KEY (manager_code)
    REFERENCES public.manager (manager_code) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;
