/*==============================================================*/
/* DBMS name:      SAP SQL Anywhere 17                          */
/* Created on:     11.02.2023 19:32:44                          */
/*==============================================================*/


drop index if exists ADM_USERS_ADM.CARD_NUM_ADM_IDX;

drop index if exists ADM_USERS_ADM.EMAI_ADM_IDX;

drop index if exists ADM_USERS_ADM.PHONE_NUM_ADM_IDX;

drop index if exists ADM_USERS_ADM.LAST_NAME_IDX_ADM;

drop index if exists ADM_USERS_ADM.FIRST_NAME_IDX_ADM;

drop table if exists ADM_USERS_ADM;

drop index if exists SP_CITIES.NAME_SITY_IDX;

drop table if exists SP_CITIES;

drop index if exists SP_COUNTRIES.NAME_COUNTRY_IDX;

drop table if exists SP_COUNTRIES;

if exists(select 1 from sys.syssequence s
   where sequence_name='SP_CITY') then
      drop sequence SP_CITY
end if;

if exists(select 1 from sys.syssequence s
   where sequence_name='SP_COUNTRY_SEQ') then
      drop sequence SP_COUNTRY_SEQ
end if;

if exists(select 1 from sys.syssequence s
   where sequence_name='USERS_ADM_SEQ') then
      drop sequence USERS_ADM_SEQ
end if;

create sequence SP_CITY
   increment by 1
   start with 1;

create sequence SP_COUNTRY_SEQ
   increment by 1
   start with 1;

create sequence USERS_ADM_SEQ
   increment by 1
   start with 1;

/*==============================================================*/
/* Table: ADM_USERS_ADM                                         */
/*==============================================================*/
create or replace table ADM_USERS_ADM 
(
   ID_USER_ADM          int                            not null default (USERS_ADM_SEQ.nextval),
   FIRST_NAME_ADM       varchar(20)                    null,
   LAST_NAME_ADM        varchar(20)                    null,
   PHONE_NUM_ADM        varchar(14)                    not null,
   EMAIL_ADM            varchar(30)                    not null,
   PARENT_USER_ADM      int                            null,
   CARD_NUM_USER_ADM    varchar(12)                    not null,
   constraint PK_ADM_USERS_ADM primary key clustered (ID_USER_ADM)
);

/*==============================================================*/
/* Index: FIRST_NAME_IDX_ADM                                    */
/*==============================================================*/
create index FIRST_NAME_IDX_ADM on ADM_USERS_ADM (
FIRST_NAME_ADM ASC
);

/*==============================================================*/
/* Index: LAST_NAME_IDX_ADM                                     */
/*==============================================================*/
create index LAST_NAME_IDX_ADM on ADM_USERS_ADM (
LAST_NAME_ADM ASC
);

/*==============================================================*/
/* Index: PHONE_NUM_ADM_IDX                                     */
/*==============================================================*/
create index PHONE_NUM_ADM_IDX on ADM_USERS_ADM (
PHONE_NUM_ADM ASC
);

/*==============================================================*/
/* Index: EMAI_ADM_IDX                                          */
/*==============================================================*/
create unique index EMAI_ADM_IDX on ADM_USERS_ADM (
EMAIL_ADM ASC
);

/*==============================================================*/
/* Index: CARD_NUM_ADM_IDX                                      */
/*==============================================================*/
create index CARD_NUM_ADM_IDX on ADM_USERS_ADM (
CARD_NUM_USER_ADM ASC
);

/*==============================================================*/
/* Table: SP_CITIES                                             */
/*==============================================================*/
create or replace table SP_CITIES 
(
   ID_SP_SITY           int                            not null default (SP_CITY.nextval),
   NAME_SITY            varchar(100)                   not null,
   constraint PK_SP_CITIES primary key clustered (ID_SP_SITY)
);

/*==============================================================*/
/* Index: NAME_SITY_IDX                                         */
/*==============================================================*/
create index NAME_SITY_IDX on SP_CITIES (
NAME_SITY ASC
);

/*==============================================================*/
/* Table: SP_COUNTRIES                                          */
/*==============================================================*/
create or replace table SP_COUNTRIES 
(
   ID_COUNTRY           int                            not null default (SP_COUNTRY_SEQ.nextval),
   NAME_COUNTRY         char(10)                       not null,
   constraint PK_SP_COUNTRIES primary key clustered (ID_COUNTRY)
);

/*==============================================================*/
/* Index: NAME_COUNTRY_IDX                                      */
/*==============================================================*/
create unique index NAME_COUNTRY_IDX on SP_COUNTRIES (
NAME_COUNTRY ASC
);

