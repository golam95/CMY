DROP TABLE brand;nnCREATE TABLE `brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;nnINSERT INTO brand VALUES("14","AC","AC");nnnnDROP TABLE cart;nnCREATE TABLE `cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(60) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM AUTO_INCREMENT=236 DEFAULT CHARSET=utf8;nnnnnDROP TABLE category;nnCREATE TABLE `category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;nnINSERT INTO category VALUES("39","Whirlpool Interval Air Conditioner (AC)");nINSERT INTO category VALUES("38","Whirlpool Air Conditioner (AC)");nINSERT INTO category VALUES("36","Sharp Air Conditioner (AC)");nINSERT INTO category VALUES("37","Sharp Inverter Air Conditioner (AC)");nINSERT INTO category VALUES("35","Panasonic Air Conditioner (AC)");nINSERT INTO category VALUES("34","Midea Air Conditioner (AC)");nINSERT INTO category VALUES("33","LG Air Conditioner (AC)");nINSERT INTO category VALUES("32","Hitachi Air Conditioner (AC)");nINSERT INTO category VALUES("31","General Air Conditioner (AC)");nINSERT INTO category VALUES("30","Conion Air Conditioner (AC)");nINSERT INTO category VALUES("29","Carrier Air Conditioner (AC)");nnnnDROP TABLE contact;nnCREATE TABLE `contact` (
  `contactid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contactid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;nnnnnDROP TABLE cus_order;nnCREATE TABLE `cus_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;nnnnnDROP TABLE cus_orderent;nnCREATE TABLE `cus_orderent` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(110) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `month` varchar(111) NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;nnnnnDROP TABLE customerinfo;nnCREATE TABLE `customerinfo` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_contactno` varchar(100) NOT NULL,
  `cus_deliverylocation` varchar(100) NOT NULL,
  `cus_address` varchar(100) NOT NULL,
  `cus_sex` varchar(100) NOT NULL,
  `cus_date` date NOT NULL,
  `cus_city` varchar(100) NOT NULL,
  `cus_country` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;nnINSERT INTO customerinfo VALUES("28","Nusrat","nusrat@gmail.com","09876543212","827ccb0eea8a706c4c34a16891f84e7b","Mohammadpur","Female","2018-11-19","dhaka","Bangladesh","3");nINSERT INTO customerinfo VALUES("29","Juthi","juthi@gmail.com","12345785675","81dc9bdb52d04dc20036dbd8313ed055","Mohammadpur","Female","2018-11-19","dhaka","Bangladesh","0");nnnnDROP TABLE db_backup;nnCREATE TABLE `db_backup` (
  `db_id` int(11) NOT NULL AUTO_INCREMENT,
  `db_name` varchar(100) NOT NULL,
  `db_description` varchar(250) NOT NULL,
  `db_date` date NOT NULL,
  PRIMARY KEY (`db_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;nnnnnDROP TABLE deliveryserevice;nnCREATE TABLE `deliveryserevice` (
  `deid_id` int(11) NOT NULL AUTO_INCREMENT,
  `deliser_id` int(11) NOT NULL,
  `deliser_name` varchar(150) NOT NULL,
  `deliser_proname` varchar(150) NOT NULL,
  `deliser_date` date NOT NULL,
  `role` int(8) NOT NULL,
  `userId` varchar(111) NOT NULL,
  PRIMARY KEY (`deid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;nnnnnDROP TABLE employeeinfo;nnCREATE TABLE `employeeinfo` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_sex` text NOT NULL,
  `emp_nid` varchar(100) NOT NULL,
  `emp_contactno` varchar(100) NOT NULL,
  `emp_worktype` varchar(100) NOT NULL,
  `emp_date` date NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;nnINSERT INTO employeeinfo VALUES("14","Rahim","External Employee","Mohammadpur,Dhaka","Male","34564565456","09876543212","Full-Time","2018-11-19");nINSERT INTO employeeinfo VALUES("15","Habib","External Employee","Dhanmondi,Dhaka","Male","345645654566","09876543212","Full-Time","2018-11-19");nINSERT INTO employeeinfo VALUES("16","Seam","External Employee","Mohammadpur,Dhaka","Male","345645654564","09876543212","Half-Time","2018-11-19");nINSERT INTO employeeinfo VALUES("17","Ali khan","External Employee","Dhanmondi,Dhaka","Male","345645654561","09876543212","Full-Time","2018-11-19");nINSERT INTO employeeinfo VALUES("18","Habib","Internal Employee","Dhanmondi,Dhaka","Male","33434343434344","09876543212","Full-Time","2018-11-19");nINSERT INTO employeeinfo VALUES("19","Seam","Internal Employee","Belkuchi,Sirajgong","Male","334343434343445","09876543212","Half-Time","2018-11-19");nnnnDROP TABLE month_setting;nnCREATE TABLE `month_setting` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_user` varchar(100) NOT NULL,
  `m_order` varchar(100) NOT NULL,
  `m_product` varchar(100) NOT NULL,
  `m_employee` varchar(100) NOT NULL,
  `m_sellprice` varchar(100) NOT NULL,
  `m_regine` varchar(100) NOT NULL,
  `m_month` varchar(100) NOT NULL,
  `m_year` varchar(100) NOT NULL,
  `m_date` date NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;nnnnnDROP TABLE payment;nnCREATE TABLE `payment` (
  `pmId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `total_amount` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `buy_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pmId`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;nnnnnDROP TABLE product;nnCREATE TABLE `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `netprice` float NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;nnINSERT INTO product VALUES("38","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","14","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/6cb8dd488a.jpg","1");nINSERT INTO product VALUES("37","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","14","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/3060c252b1.jpg","0");nINSERT INTO product VALUES("36","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","14","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/c520fa2360.jpg","0");nINSERT INTO product VALUES("35","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","14","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/f2a31c2a8e.jpg","0");nINSERT INTO product VALUES("34","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","14","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/46ebe29e90.jpg","0");nINSERT INTO product VALUES("33","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","14","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/385bf7046b.jpg","0");nINSERT INTO product VALUES("32","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","14","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/189d0421b9.jpg","0");nINSERT INTO product VALUES("39","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","39","0","Carrier Air Conditioner 38KHA012N is designed to create a cool and comfortable living environment. It can be used in residential as well as commercial properties. It has been integrated with an ionizer to ensure refreshing, natural and healthy air. The ionizer generates a high voltage ionization zone through ","10","13000","66","upload/7c1f12f0c3.jpg","0");nINSERT INTO product VALUES("40","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","38","14","Whirlpool Inverter Air Conditioner SPIW 412L can be a perfect choice for you and your family with its cutting-edge features. This 1.0 ton AC with its cooling capacity of 12000 BTU and 1.5HP can be a suitable addition to your home or your office during those hot summer months. The Inverter powered AC is energy efficient and saves money on your electricity bills. ","8000","9000","40","upload/e45485b0ba.jpg","1");nINSERT INTO product VALUES("41","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","38","14","Whirlpool Inverter Air Conditioner SPIW 412L can be a perfect choice for you and your family with its cutting-edge features. This 1.0 ton AC with its cooling capacity of 12000 BTU and 1.5HP can be a suitable addition to your home or your office during those hot summer months. The Inverter powered AC is energy efficient and saves money on your electricity bills. ","8000","9000","40","upload/5b436fbfa0.jpg","1");nINSERT INTO product VALUES("42","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","38","14","Whirlpool Inverter Air Conditioner SPIW 412L can be a perfect choice for you and your family with its cutting-edge features. This 1.0 ton AC with its cooling capacity of 12000 BTU and 1.5HP can be a suitable addition to your home or your office during those hot summer months. The Inverter powered AC is energy efficient and saves money on your electricity bills. ","8000","9000","40","upload/1118f7c640.jpg","0");nINSERT INTO product VALUES("43","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","38","14","Whirlpool Inverter Air Conditioner SPIW 412L can be a perfect choice for you and your family with its cutting-edge features. This 1.0 ton AC with its cooling capacity of 12000 BTU and 1.5HP can be a suitable addition to your home or your office during those hot summer months. The Inverter powered AC is energy efficient and saves money on your electricity bills. ","8000","9000","40","upload/19c5f9d203.jpg","0");nINSERT INTO product VALUES("44","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","38","14","Whirlpool Inverter Air Conditioner SPIW 412L can be a perfect choice for you and your family with its cutting-edge features. This 1.0 ton AC with its cooling capacity of 12000 BTU and 1.5HP can be a suitable addition to your home or your office during those hot summer months. The Inverter powered AC is energy efficient and saves money on your electricity bills. ","44","9000","40","upload/82cc8c1a3a.jpg","0");nINSERT INTO product VALUES("45","  1 Ton AC, 1 Ton- New Air Conditioner in Bangladesh,in Bangladesh","38","14","Whirlpool Inverter Air Conditioner SPIW 412L can be a perfect choice for you and your family with its cutting-edge features. This 1.0 ton AC with its cooling capacity of 12000 BTU and 1.5HP can be a suitable addition to your home or your office during those hot summer months. The Inverter powered AC is energy efficient and saves money on your electricity bills. ","10","13000","20","upload/1b6f53185d.jpg","1");nnnnDROP TABLE rejineemp;nnCREATE TABLE `rejineemp` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `re_name` varchar(100) NOT NULL,
  `re_degination` varchar(100) NOT NULL,
  `re_address` varchar(100) NOT NULL,
  `re_nid` varchar(100) NOT NULL,
  `re_contactno` varchar(100) NOT NULL,
  `re_dateofjoining` date NOT NULL,
  `re_rejinedate` date NOT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;nnINSERT INTO rejineemp VALUES("7","Hasan","Internal Employee","Belkuchi","345645654563","09876543212","2018-11-19","2018-11-19");nnnnDROP TABLE rent_cart;nnCREATE TABLE `rent_cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;nnnnnDROP TABLE rent_deliveryservice;nnCREATE TABLE `rent_deliveryservice` (
  `deid_id` int(11) NOT NULL AUTO_INCREMENT,
  `deliser_id` int(11) NOT NULL,
  `deliser_name` varchar(100) NOT NULL,
  `deliser_proname` varchar(100) NOT NULL,
  `deliser_date` varchar(100) NOT NULL,
  `deliser_role` varchar(11) NOT NULL DEFAULT '0',
  `userId` varchar(111) NOT NULL,
  PRIMARY KEY (`deid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;nnnnnDROP TABLE rent_payment;nnCREATE TABLE `rent_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(100) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `rent_status` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;nnnnnDROP TABLE rent_product;nnCREATE TABLE `rent_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rent_pname` varchar(150) NOT NULL,
  `rent_category` varchar(150) NOT NULL,
  `rent_description` varchar(150) NOT NULL,
  `rent_netprice` varchar(150) NOT NULL,
  `rent_sellprice` varchar(150) NOT NULL,
  `rent_quantity` varchar(150) NOT NULL,
  `rent_type` varchar(150) NOT NULL,
  `rent_image` varchar(150) NOT NULL,
  `rent_date` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;nnnnnDROP TABLE service;nnCREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_category` varchar(140) NOT NULL,
  `service_code` varchar(140) NOT NULL,
  `service_contact` varchar(140) NOT NULL,
  `service_problem` varchar(200) NOT NULL,
  `service_date` varchar(120) NOT NULL,
  `service_cusid` int(11) NOT NULL,
  `service_deliverydate` varchar(100) NOT NULL,
  `service_role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;nnnnnDROP TABLE track_visitor;nnCREATE TABLE `track_visitor` (
  `trackid` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`trackid`)
) ENGINE=MyISAM AUTO_INCREMENT=955 DEFAULT CHARSET=latin1;nnnnnDROP TABLE users;nnCREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `employeeid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `typeofuser` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;nnnnnDROP TABLE year;nnCREATE TABLE `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;nnnnnDROP TABLE year_setting;nnCREATE TABLE `year_setting` (
  `y_id` int(11) NOT NULL AUTO_INCREMENT,
  `y_order` varchar(100) NOT NULL,
  `y_sellprice` varchar(100) NOT NULL,
  `y_year` varchar(100) NOT NULL,
  `y_date` date NOT NULL,
  PRIMARY KEY (`y_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;nnnnn