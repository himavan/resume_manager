CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `auth_type` varchar(10) NOT NULL,
  `auth` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `resumes` (
  `resumeid` varchar(50) NOT NULL PRIMARY KEY,
  `username` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `purpose` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `r_intro` (
  `resumeid` varchar(50) NOT NULL PRIMARY KEY,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(100),
  `career` varchar(300),
  `about` varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `r_edu` (
  `resumeid` varchar(50) NOT NULL PRIMARY KEY,
  `username` varchar(30) NOT NULL,
  `mdcn` varchar(100),
  `mds` varchar(100),
  `mdun` varchar(100),
  `mdyc` varchar(40),
  `mdp` int(4),
  `bdcn` varchar(100),
  `bds` varchar(100),
  `bdun` varchar(100),
  `bdyc` varchar(40),
  `bdp` int(4),
  `icn` varchar(100),
  `isn` varchar(100),
  `ibn` varchar(100),
  `iyc` varchar(40),
  `ip` int(4),
  `sn` varchar(100),
  `sb` varchar(100),
  `syc` varchar(40),
  `sp` int(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `r_edu` (
  `eduid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `resumeid` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `educ` varchar(100),
  `spec` varchar(100),
  `itn` varchar(100),
  `bun` varchar(100),
  `yoc` varchar(7),
  `per` float(5,2)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `r_skills` (
  `resumeid` varchar(50) NOT NULL PRIMARY KEY,
  `username` varchar(30) NOT NULL,
  `pro_lang` varchar(300),
  `web_tech` varchar(300),
  `tools` varchar(300),
  `os` varchar(300)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `r_cert` (
  `certid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `resumeid` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `c_name` varchar(100),
  `c_auth` varchar(100),
  `c_url` varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `r_exp` (
  `expid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `resumeid` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pro_title` varchar(100),
  `pro_role` varchar(100),
  `pro_desc` varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `r_personal` (
  `resumeid` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fathername` varchar(100),
  `gender` varchar(6),
  `dob` varchar(20),
  `nationality` varchar(20),
  `ms` varchar(100),
  `lang_known` varchar(100),
  `eca` varchar(300),
  `interests` varchar(300),
  `hobbies` varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `r_contact` (
  `resumeid` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `mobile` varchar(15),
  `email` varchar(100),
  `c_address` varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `jobs` (
  `jobid` varchar(50) NOT NULL PRIMARY KEY,
  `username` varchar(30) NOT NULL,
  `job_title` varchar(100),
  `role` varchar(30),
  `company` varchar(100),
  `skills` varchar(300),
  `desc` varchar(300),
  `salary` varchar(11)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `applicants` (
  `appid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `jobid` varchar(50) NOT NULL ,
  `resumeid` varchar(50) NOT NULL ,
  `username` varchar(30) NOT NULL,
  `man_un` varchar(30),
  `fullname` varchar(100),
  `job_title` varchar(100),
  `res_title` varchar(100),
  `appoint` varchar(10),
  `remarks` varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;