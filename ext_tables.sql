CREATE TABLE tx_dveducationregistration_domain_model_participant (
    salutation varchar(20) DEFAULT '' NOT NULL,
    first_name varchar(255) DEFAULT '' NOT NULL,
    last_name varchar(255) DEFAULT '' NOT NULL,
    email varchar(255) DEFAULT '' NOT NULL,
    phone varchar(50) DEFAULT '' NOT NULL,
    company varchar(255) DEFAULT '' NOT NULL,
    address varchar(255) DEFAULT '' NOT NULL,
    city varchar(255) DEFAULT '' NOT NULL,
    zipcode varchar(20) DEFAULT '' NOT NULL,
    notes text,
    event_uid int(11) unsigned DEFAULT '0' NOT NULL,
    confirmation_hash varchar(64) DEFAULT '' NOT NULL,
    confirmed tinyint(1) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,

    KEY event_uid (event_uid),
    KEY confirmation_hash (confirmation_hash)
);

CREATE TABLE tx_dveducationregistration_domain_model_inquiryrequest (
    salutation varchar(20) DEFAULT '' NOT NULL,
    first_name varchar(255) DEFAULT '' NOT NULL,
    last_name varchar(255) DEFAULT '' NOT NULL,
    email varchar(255) DEFAULT '' NOT NULL,
    phone varchar(50) DEFAULT '' NOT NULL,
    company varchar(255) DEFAULT '' NOT NULL,
    notes text,
    request_type varchar(20) DEFAULT 'info' NOT NULL,
    course_uid int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,

    KEY course_uid (course_uid)
);
