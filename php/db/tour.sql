/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12.02.2023 21:44:35                          */
/*==============================================================*/


alter table ADM_USERS_ADM 
   drop foreign key FK_ADM_USER_REFERENCE_SP_COUNT;

alter table ADM_USERS_ADM 
   drop foreign key FK_ADM_USER_REFERENCE_SP_CITIE;

alter table SP_CITIES 
   drop foreign key FK_SP_CITIE_REFERENCE_SP_COUNT;

alter table WK_FAMILY 
   drop foreign key FK_WK_FAMIL_REFERENCE_SP_COUNT;

alter table WK_FAMILY 
   drop foreign key FK_WK_FAMIL_REFERENCE_SP_CITIE;

alter table WK_USERS 
   drop foreign key FK_WK_USERS_REFERENCE_WK_FAMIL;

drop index LOGIN_ADM_IDX on ADM_USERS_ADM;

drop index CARD_NUM_ADM_IDX on ADM_USERS_ADM;

drop index EMAI_ADM_IDX on ADM_USERS_ADM;

drop index PHONE_NUM_ADM_IDX on ADM_USERS_ADM;

drop index LAST_NAME_IDX_ADM on ADM_USERS_ADM;

drop index FIRST_NAME_IDX_ADM on ADM_USERS_ADM;


alter table ADM_USERS_ADM 
   drop foreign key FK_ADM_USER_REFERENCE_SP_COUNT;

alter table ADM_USERS_ADM 
   drop foreign key FK_ADM_USER_REFERENCE_SP_CITIE;

drop table if exists ADM_USERS_ADM;

drop index NAME_SITY_IDX on SP_CITIES;


alter table SP_CITIES 
   drop foreign key FK_SP_CITIE_REFERENCE_SP_COUNT;

drop table if exists SP_CITIES;

drop index NAME_COUNTRY_IDX on SP_COUNTRIES;

drop table if exists SP_COUNTRIES;

drop index LOGIN_IDX on WK_FAMILY;

drop index FAMILY_IDX on WK_FAMILY;


alter table WK_FAMILY 
   drop foreign key FK_WK_FAMIL_REFERENCE_SP_COUNT;

alter table WK_FAMILY 
   drop foreign key FK_WK_FAMIL_REFERENCE_SP_CITIE;

drop table if exists WK_FAMILY;

drop index EMAIL_USER_WK_IDX on WK_USERS;

drop index PHONE_NUM_WK_IDX on WK_USERS;

drop index LAST_NAME_WK_IDX on WK_USERS;

drop index FIRST_NAME_WK_IDX on WK_USERS;


alter table WK_USERS 
   drop foreign key FK_WK_USERS_REFERENCE_WK_FAMIL;

drop table if exists WK_USERS;

/*==============================================================*/
/* Table: ADM_USERS_ADM                                         */
/*==============================================================*/
create table ADM_USERS_ADM
(
   ID_USER_ADM          int not null  AUTO_INCREMENT,
   ID_COUNTRY           int  comment '',
   ID_SP_SITY           int  comment '',
   FIRST_NAME_ADM       varchar(20)  comment '',
   LAST_NAME_ADM        varchar(20)  comment '',
   PHONE_NUM_ADM        varchar(14) not null  comment '',
   EMAIL_ADM            varchar(30) not null  comment '',
   PARENT_USER_ADM      int  comment '',
   CARD_NUM_USER_ADM    varchar(16) not null  comment '',
   LOGIN_ADM            varchar(20)  comment '',
   PASSWD_ADM           varchar(200)  comment '',
   primary key (ID_USER_ADM)
);

/*==============================================================*/
/* Index: FIRST_NAME_IDX_ADM                                    */
/*==============================================================*/
create index FIRST_NAME_IDX_ADM on ADM_USERS_ADM
(
   FIRST_NAME_ADM
);

/*==============================================================*/
/* Index: LAST_NAME_IDX_ADM                                     */
/*==============================================================*/
create index LAST_NAME_IDX_ADM on ADM_USERS_ADM
(
   LAST_NAME_ADM
);

/*==============================================================*/
/* Index: PHONE_NUM_ADM_IDX                                     */
/*==============================================================*/
create index PHONE_NUM_ADM_IDX on ADM_USERS_ADM
(
   PHONE_NUM_ADM
);

/*==============================================================*/
/* Index: EMAI_ADM_IDX                                          */
/*==============================================================*/
create unique index EMAI_ADM_IDX on ADM_USERS_ADM
(
   EMAIL_ADM
);

/*==============================================================*/
/* Index: CARD_NUM_ADM_IDX                                      */
/*==============================================================*/
create index CARD_NUM_ADM_IDX on ADM_USERS_ADM
(
   CARD_NUM_USER_ADM
);

/*==============================================================*/
/* Index: LOGIN_ADM_IDX                                         */
/*==============================================================*/
create unique index LOGIN_ADM_IDX on ADM_USERS_ADM
(
   LOGIN_ADM
);

/*==============================================================*/
/* Table: SP_CITIES                                             */
/*==============================================================*/
create table SP_CITIES
(
   ID_SP_SITY           int not null  AUTO_INCREMENT,
   ID_COUNTRY           int  comment '',
   NAME_SITY            varchar(100) not null  comment '',
   primary key (ID_SP_SITY)
);

/*==============================================================*/
/* Index: NAME_SITY_IDX                                         */
/*==============================================================*/
create index NAME_SITY_IDX on SP_CITIES
(
   NAME_SITY
);

/*==============================================================*/
/* Table: SP_COUNTRIES                                          */
/*==============================================================*/
create table SP_COUNTRIES
(
   ID_COUNTRY           int not null  AUTO_INCREMENT,
   NAME_COUNTRY         varchar(50) not null  comment '',
   primary key (ID_COUNTRY)
);

/*==============================================================*/
/* Index: NAME_COUNTRY_IDX                                      */
/*==============================================================*/
create unique index NAME_COUNTRY_IDX on SP_COUNTRIES
(
   NAME_COUNTRY
);

/*==============================================================*/
/* Table: WK_FAMILY                                             */
/*==============================================================*/
create table WK_FAMILY
(
   ID_FAMILY            int not null  AUTO_INCREMENT,
   ID_COUNTRY           int  comment '',
   ID_SP_SITY           int  comment '',
   FAMILY               varchar(20)  comment '',
   LOGIN                varchar(20)  comment '',
   PASSWD               varchar(200)  comment '',
   primary key (ID_FAMILY)
);

/*==============================================================*/
/* Index: FAMILY_IDX                                            */
/*==============================================================*/
create index FAMILY_IDX on WK_FAMILY
(
   FAMILY
);

/*==============================================================*/
/* Index: LOGIN_IDX                                             */
/*==============================================================*/
create unique index LOGIN_IDX on WK_FAMILY
(
   LOGIN
);

/*==============================================================*/
/* Table: WK_USERS                                              */
/*==============================================================*/
create table WK_USERS
(
   ID_USER_WK           int not null  AUTO_INCREMENT,
   ID_FAMILY            int  comment '',
   FIRST_NAME_WK        varchar(20)  comment '',
   LAST_NAME_WK         varchar(20)  comment '',
   PHONE_NUM_WK         varchar(14)  comment '',
   EMAIL_USER_WK        varchar(30)  comment '',
   NUM_PASS             varchar(30)  comment '',
   SCAN_PASS            varchar(100)  comment '',
   primary key (ID_USER_WK)
);

/*==============================================================*/
/* Index: FIRST_NAME_WK_IDX                                     */
/*==============================================================*/
create index FIRST_NAME_WK_IDX on WK_USERS
(
   FIRST_NAME_WK
);

/*==============================================================*/
/* Index: LAST_NAME_WK_IDX                                      */
/*==============================================================*/
create index LAST_NAME_WK_IDX on WK_USERS
(
   LAST_NAME_WK
);

/*==============================================================*/
/* Index: PHONE_NUM_WK_IDX                                      */
/*==============================================================*/
create index PHONE_NUM_WK_IDX on WK_USERS
(
   PHONE_NUM_WK
);

/*==============================================================*/
/* Index: EMAIL_USER_WK_IDX                                     */
/*==============================================================*/
create index EMAIL_USER_WK_IDX on WK_USERS
(
   EMAIL_USER_WK
);

alter table ADM_USERS_ADM add constraint FK_ADM_USER_REFERENCE_SP_COUNT foreign key (ID_COUNTRY)
      references SP_COUNTRIES (ID_COUNTRY) on delete restrict on update restrict;

alter table ADM_USERS_ADM add constraint FK_ADM_USER_REFERENCE_SP_CITIE foreign key (ID_SP_SITY)
      references SP_CITIES (ID_SP_SITY) on delete restrict on update restrict;

alter table SP_CITIES add constraint FK_SP_CITIE_REFERENCE_SP_COUNT foreign key (ID_COUNTRY)
      references SP_COUNTRIES (ID_COUNTRY) on delete restrict on update restrict;

alter table WK_FAMILY add constraint FK_WK_FAMIL_REFERENCE_SP_COUNT foreign key (ID_COUNTRY)
      references SP_COUNTRIES (ID_COUNTRY) on delete restrict on update restrict;

alter table WK_FAMILY add constraint FK_WK_FAMIL_REFERENCE_SP_CITIE foreign key (ID_SP_SITY)
      references SP_CITIES (ID_SP_SITY) on delete restrict on update restrict;

alter table WK_USERS add constraint FK_WK_USERS_REFERENCE_WK_FAMIL foreign key (ID_FAMILY)
      references WK_FAMILY (ID_FAMILY) on delete restrict on update restrict;

