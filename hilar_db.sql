/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - hilar_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hilar_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `hilar_db`;

/*Table structure for table `about` */

DROP TABLE IF EXISTS `about`;

CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) DEFAULT NULL,
  `vision` varchar(255) DEFAULT NULL,
  `mision` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `about` */

insert  into `about`(`id`,`desc`,`vision`,`mision`,`created_at`,`updated_at`) values 
(1,'<p class=\"MsoNormal\"><span lang=\"IN\">Perusahaan ini\r\ndidirikan pada 20 Januari&nbsp; 2022 di\r\nnotaris CHIZBULLAH HUDA SH.,M.Kn di Kabupaten GRESIK. Perusahaan ini bergerak\r\ndi bidang Transporter Darat, Laut , Udara , Forwarding, Export-Import,\r\nEkspedisi ','<p class=\"MsoNormal\"><span lang=\"IN\">PT.Hilar\r\nTransport Logistic adalah menjadi Perusahaan yang berskala Nasional dan\r\nberkontribusi dalam Pembangunan Bangsa</span><o:p></o:p></p>','<p class=\"MsoNormal\"><span lang=\"IN\">Pengembangan\r\nusaha dibidang transport dan forwarding untuk korporat maupun perorangan</span><o:p></o:p></p>',NULL,NULL);

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values 
('GROUPMENU-administrator',2,1683560595),
('GROUPMENU-administrator',8,1683560710);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(100) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`created_at`,`updated_at`) values 
('blog-1[A]',1,1667787343,1667787343),
('blog-1[C]',1,1667787343,1667787343),
('blog-1[D]',1,1667787343,1667787343),
('blog-1[R]',1,1667787343,1667787343),
('blog-1[U]',1,1667787343,1667787343),
('blog[A]',1,1667402837,1667402837),
('blog[C]',1,1667402837,1667402837),
('blog[D]',1,1667402837,1667402837),
('blog[R]',1,1667402837,1667402837),
('blog[U]',1,1667402837,1667402837),
('branch-store[A]',1,1667403094,1667403094),
('branch-store[C]',1,1667403094,1667403094),
('branch-store[D]',1,1667403094,1667403094),
('branch-store[R]',1,1667403094,1667403094),
('branch-store[U]',1,1667403094,1667403094),
('brands[A]',1,1667403071,1667403071),
('brands[C]',1,1667403071,1667403071),
('brands[D]',1,1667403071,1667403071),
('brands[R]',1,1667403071,1667403071),
('brands[U]',1,1667403071,1667403071),
('clients[A]',1,1683419052,1683419052),
('clients[C]',1,1683419052,1683419052),
('clients[D]',1,1683419052,1683419052),
('clients[R]',1,1683419052,1683419052),
('clients[U]',1,1683419052,1683419052),
('company-profile[A]',1,1654825673,1654825673),
('company-profile[C]',1,1654825673,1654825673),
('company-profile[D]',1,1654825673,1654825673),
('company-profile[R]',1,1654825673,1654825673),
('company-profile[U]',1,1654825673,1654825673),
('contact-us[A]',1,1667433435,1667433435),
('contact-us[C]',1,1667433434,1667433434),
('contact-us[D]',1,1667433435,1667433435),
('contact-us[R]',1,1667433435,1667433435),
('contact-us[U]',1,1667433435,1667433435),
('galeri[A]',1,1683644398,1683644398),
('galeri[C]',1,1683644398,1683644398),
('galeri[D]',1,1683644398,1683644398),
('galeri[R]',1,1683644398,1683644398),
('galeri[U]',1,1683644398,1683644398),
('galery[A]',1,1683765242,1683765242),
('galery[C]',1,1683765242,1683765242),
('galery[D]',1,1683765242,1683765242),
('galery[R]',1,1683765242,1683765242),
('galery[U]',1,1683765242,1683765242),
('group-menu[A]',1,1652241728,1652241728),
('group-menu[C]',1,1652241728,1652241728),
('group-menu[D]',1,1652241728,1652241728),
('group-menu[R]',1,1652241728,1652241728),
('group-menu[U]',1,1652241728,1652241728),
('GROUPMENU-administrator',1,1683560552,1683560552),
('GROUPMENU-pengadministrasian-umum',1,1652408432,1652408432),
('GROUPMENU-rekam-medik',1,1652409682,1652409682),
('gudang[A]',1,1660609026,1660609026),
('gudang[C]',1,1660609026,1660609026),
('gudang[D]',1,1660609026,1660609026),
('gudang[R]',1,1660609026,1660609026),
('gudang[U]',1,1660609026,1660609026),
('home[A]',1,1683644218,1683644218),
('home[C]',1,1683644218,1683644218),
('home[D]',1,1683644218,1683644218),
('home[R]',1,1683644218,1683644218),
('home[U]',1,1683644218,1683644218),
('hubungi-kami[A]',1,1683877387,1683877387),
('hubungi-kami[C]',1,1683877387,1683877387),
('hubungi-kami[D]',1,1683877387,1683877387),
('hubungi-kami[R]',1,1683877387,1683877387),
('hubungi-kami[U]',1,1683877387,1683877387),
('inventory-gudang[A]',1,1655873312,1655873312),
('inventory-gudang[C]',1,1655873312,1655873312),
('inventory-gudang[D]',1,1655873312,1655873312),
('inventory-gudang[R]',1,1655873312,1655873312),
('inventory-gudang[U]',1,1655873312,1655873312),
('inventory-keluar[A]',1,1655873280,1655873280),
('inventory-keluar[C]',1,1655873280,1655873280),
('inventory-keluar[D]',1,1655873280,1655873280),
('inventory-keluar[R]',1,1655873280,1655873280),
('inventory-keluar[U]',1,1655873280,1655873280),
('inventory-terima[A]',1,1655873221,1655873221),
('inventory-terima[C]',1,1655873221,1655873221),
('inventory-terima[D]',1,1655873221,1655873221),
('inventory-terima[R]',1,1655873221,1655873221),
('inventory-terima[U]',1,1655873221,1655873221),
('inventory[A]',1,1655873198,1655873198),
('inventory[C]',1,1655873198,1655873198),
('inventory[D]',1,1655873198,1655873198),
('inventory[R]',1,1655873198,1655873198),
('inventory[U]',1,1655873198,1655873198),
('kategori[A]',1,1660609062,1660609062),
('kategori[C]',1,1660609062,1660609062),
('kategori[D]',1,1660609062,1660609062),
('kategori[R]',1,1660609062,1660609062),
('kategori[U]',1,1660609062,1660609062),
('klien-kami[A]',1,1683692505,1683692505),
('klien-kami[C]',1,1683692505,1683692505),
('klien-kami[D]',1,1683692505,1683692505),
('klien-kami[R]',1,1683692505,1683692505),
('klien-kami[U]',1,1683692505,1683692505),
('kontak-kami[A]',1,1683644379,1683644379),
('kontak-kami[C]',1,1683644379,1683644379),
('kontak-kami[D]',1,1683644379,1683644379),
('kontak-kami[R]',1,1683644379,1683644379),
('kontak-kami[U]',1,1683644379,1683644379),
('layayan-kami[A]',1,1683644344,1683644344),
('layayan-kami[C]',1,1683644344,1683644344),
('layayan-kami[D]',1,1683644344,1683644344),
('layayan-kami[R]',1,1683644344,1683644344),
('layayan-kami[U]',1,1683644344,1683644344),
('level-1[A]',1,1652240464,1652240464),
('level-1[C]',1,1652240464,1652240464),
('level-1[D]',1,1652240464,1652240464),
('level-1[R]',1,1652240464,1652240464),
('level-1[U]',1,1652240464,1652240464),
('level-2[A]',1,1652240479,1652240479),
('level-2[C]',1,1652240479,1652240479),
('level-2[D]',1,1652240479,1652240479),
('level-2[R]',1,1652240479,1652240479),
('level-2[U]',1,1652240479,1652240479),
('maintenance[A]',1,1656574538,1656574538),
('maintenance[C]',1,1656574538,1656574538),
('maintenance[D]',1,1656574538,1656574538),
('maintenance[R]',1,1656574538,1656574538),
('maintenance[U]',1,1656574538,1656574538),
('manajemen-stok[A]',1,1657066467,1657066467),
('manajemen-stok[C]',1,1657066467,1657066467),
('manajemen-stok[D]',1,1657066467,1657066467),
('manajemen-stok[R]',1,1657066467,1657066467),
('manajemen-stok[U]',1,1657066467,1657066467),
('master[A]',1,1660608626,1660608626),
('master[C]',1,1660608626,1660608626),
('master[D]',1,1660608626,1660608626),
('master[R]',1,1660608626,1660608626),
('master[U]',1,1660608626,1660608626),
('menu[A]',1,1652240301,1652240301),
('menu[C]',1,1652240301,1652240301),
('menu[D]',1,1652240301,1652240301),
('menu[R]',1,1652240301,1652240301),
('menu[U]',1,1652240301,1652240301),
('phonebook[A]',1,1684218235,1684218235),
('phonebook[C]',1,1684218234,1684218234),
('phonebook[D]',1,1684218235,1684218235),
('phonebook[R]',1,1684218235,1684218235),
('phonebook[U]',1,1684218235,1684218235),
('pompa-asi[A]',1,1667395758,1667395758),
('pompa-asi[C]',1,1667395758,1667395758),
('pompa-asi[D]',1,1667395758,1667395758),
('pompa-asi[R]',1,1667395758,1667395758),
('pompa-asi[U]',1,1667395758,1667395758),
('products[A]',1,1667443399,1667443399),
('products[C]',1,1667443399,1667443399),
('products[D]',1,1667443399,1667443399),
('products[R]',1,1667443399,1667443399),
('products[U]',1,1667443399,1667443399),
('product[A]',1,1667402824,1667402824),
('product[C]',1,1667402824,1667402824),
('product[D]',1,1667402824,1667402824),
('product[R]',1,1667402824,1667402824),
('product[U]',1,1667402824,1667402824),
('profile[A]',1,1652856415,1652856415),
('profile[C]',1,1652856415,1652856415),
('profile[D]',1,1652856415,1652856415),
('profile[R]',1,1652856415,1652856415),
('profile[U]',1,1652856415,1652856415),
('role[A]',1,1652240318,1652240318),
('role[C]',1,1652240318,1652240318),
('role[D]',1,1652240318,1652240318),
('role[R]',1,1652240318,1652240318),
('role[U]',1,1652240318,1652240318),
('satuan[A]',1,1660609077,1660609077),
('satuan[C]',1,1660609077,1660609077),
('satuan[D]',1,1660609077,1660609077),
('satuan[R]',1,1660609077,1660609077),
('satuan[U]',1,1660609077,1660609077),
('setting-1[A]',1,1667370759,1667370759),
('setting-1[C]',1,1667370759,1667370759),
('setting-1[D]',1,1667370759,1667370759),
('setting-1[R]',1,1667370759,1667370759),
('setting-1[U]',1,1667370759,1667370759),
('setting-image[A]',1,1667370778,1667370778),
('setting-image[C]',1,1667370778,1667370778),
('setting-image[D]',1,1667370778,1667370778),
('setting-image[R]',1,1667370778,1667370778),
('setting-image[U]',1,1667370778,1667370778),
('setting-section[A]',1,1683789901,1683789901),
('setting-section[C]',1,1683789901,1683789901),
('setting-section[D]',1,1683789901,1683789901),
('setting-section[R]',1,1683789901,1683789901),
('setting-section[U]',1,1683789901,1683789901),
('setting[A]',1,1652240250,1652240250),
('setting[C]',1,1652240250,1652240250),
('setting[D]',1,1652240250,1652240250),
('setting[R]',1,1652240250,1652240250),
('setting[U]',1,1652240250,1652240250),
('shop[A]',1,1667395735,1667395735),
('shop[C]',1,1667395735,1667395735),
('shop[D]',1,1667395735,1667395735),
('shop[R]',1,1667395735,1667395735),
('shop[U]',1,1667395735,1667395735),
('spectra[A]',1,1667436008,1667436008),
('spectra[C]',1,1667436008,1667436008),
('spectra[D]',1,1667436008,1667436008),
('spectra[R]',1,1667436008,1667436008),
('spectra[U]',1,1667436008,1667436008),
('sub-menu-1[A]',1,1652240402,1652240402),
('sub-menu-1[C]',1,1652240402,1652240402),
('sub-menu-1[D]',1,1652240402,1652240402),
('sub-menu-1[R]',1,1652240402,1652240402),
('sub-menu-1[U]',1,1652240402,1652240402),
('sub-menu-2[A]',1,1652240418,1652240418),
('sub-menu-2[C]',1,1652240418,1652240418),
('sub-menu-2[D]',1,1652240418,1652240418),
('sub-menu-2[R]',1,1652240418,1652240418),
('sub-menu-2[U]',1,1652240418,1652240418),
('tentang-kami[A]',1,1683644314,1683644314),
('tentang-kami[C]',1,1683644314,1683644314),
('tentang-kami[D]',1,1683644314,1683644314),
('tentang-kami[R]',1,1683644314,1683644314),
('tentang-kami[U]',1,1683644314,1683644314),
('test-menu-2[A]',1,1652240450,1652240450),
('test-menu-2[C]',1,1652240450,1652240450),
('test-menu-2[D]',1,1652240450,1652240450),
('test-menu-2[R]',1,1652240450,1652240450),
('test-menu-2[U]',1,1652240450,1652240450),
('test-menu[A]',1,1652240362,1652240362),
('test-menu[C]',1,1652240362,1652240362),
('test-menu[D]',1,1652240362,1652240362),
('test-menu[R]',1,1652240362,1652240362),
('test-menu[U]',1,1652240362,1652240362),
('typeuser[A]',1,1655086199,1655086199),
('typeuser[C]',1,1655086199,1655086199),
('typeuser[D]',1,1655086199,1655086199),
('typeuser[R]',1,1655086199,1655086199),
('typeuser[U]',1,1655086199,1655086199),
('user[A]',1,1652240279,1652240279),
('user[C]',1,1652240279,1652240279),
('user[D]',1,1652240279,1652240279),
('user[R]',1,1652240279,1652240279),
('user[U]',1,1652240279,1652240279);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(100) NOT NULL,
  `child` varchar(100) NOT NULL,
  PRIMARY KEY (`parent`,`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values 
('GROUPMENU-administrator','about-us[C]'),
('GROUPMENU-administrator','about-us[D]'),
('GROUPMENU-administrator','about-us[R]'),
('GROUPMENU-administrator','about-us[U]'),
('GROUPMENU-administrator','branch-store[C]'),
('GROUPMENU-administrator','branch-store[D]'),
('GROUPMENU-administrator','branch-store[R]'),
('GROUPMENU-administrator','branch-store[U]'),
('GROUPMENU-administrator','clients[C]'),
('GROUPMENU-administrator','clients[D]'),
('GROUPMENU-administrator','clients[R]'),
('GROUPMENU-administrator','clients[U]'),
('GROUPMENU-administrator','company-profile[C]'),
('GROUPMENU-administrator','company-profile[D]'),
('GROUPMENU-administrator','company-profile[R]'),
('GROUPMENU-administrator','company-profile[U]'),
('GROUPMENU-administrator','galery[C]'),
('GROUPMENU-administrator','galery[D]'),
('GROUPMENU-administrator','galery[R]'),
('GROUPMENU-administrator','galery[U]'),
('GROUPMENU-administrator','master[C]'),
('GROUPMENU-administrator','master[D]'),
('GROUPMENU-administrator','master[R]'),
('GROUPMENU-administrator','master[U]'),
('GROUPMENU-administrator','pages[R]'),
('GROUPMENU-administrator','services[C]'),
('GROUPMENU-administrator','services[D]'),
('GROUPMENU-administrator','services[R]'),
('GROUPMENU-administrator','services[U]'),
('GROUPMENU-administrator','setting[R]'),
('GROUPMENU-pengadministrasian-umum','level-1[R]'),
('GROUPMENU-pengadministrasian-umum','level-2[C]'),
('GROUPMENU-pengadministrasian-umum','level-2[R]'),
('GROUPMENU-pengadministrasian-umum','profile[C]'),
('GROUPMENU-pengadministrasian-umum','profile[R]'),
('GROUPMENU-pengadministrasian-umum','sub-menu-1[R]'),
('GROUPMENU-pengadministrasian-umum','sub-menu-2[R]'),
('GROUPMENU-pengadministrasian-umum','sub-menu-2[U]'),
('GROUPMENU-pengadministrasian-umum','test-menu-2[D]'),
('GROUPMENU-pengadministrasian-umum','test-menu-2[R]'),
('GROUPMENU-pengadministrasian-umum','test-menu[R]'),
('GROUPMENU-rekam-medik','level-1[C]'),
('GROUPMENU-rekam-medik','level-1[R]'),
('GROUPMENU-rekam-medik','level-2[D]'),
('GROUPMENU-rekam-medik','level-2[R]'),
('GROUPMENU-rekam-medik','role[R]'),
('GROUPMENU-rekam-medik','role[U]'),
('GROUPMENU-rekam-medik','setting[R]'),
('GROUPMENU-rekam-medik','sub-menu-1[R]'),
('GROUPMENU-rekam-medik','sub-menu-2[D]'),
('GROUPMENU-rekam-medik','sub-menu-2[R]'),
('GROUPMENU-rekam-medik','test-menu[R]'),
('GROUPMENU-rekam-medik','user[C]'),
('GROUPMENU-rekam-medik','user[R]');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `content` longtext DEFAULT NULL,
  `short_content` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `blogs` */

insert  into `blogs`(`id`,`title`,`content`,`short_content`,`slug`,`image`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(3,'It\'s all about how you wear','<div class=\"rte\" style=\"color: rgb(85, 85, 85); margin-bottom: 20px; font-family: Poppins, Helvetica, Tahoma, Arial, serif; font-size: 13px;\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\">On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h3 style=\"margin: 30px 0px 15px; font-family: \"Roboto Slab\", Helvetica, Tahoma, Arial, serif; color: rgb(0, 0, 0); font-size: 16px; overflow-wrap: break-word;\">Sample Text Listing</h3><ul class=\"list-items\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 15px; padding: 0px;\"><li style=\"margin-bottom: 4px; list-style: inherit;\">Donec et lacus mattis ipsum feugiat interdum non id sapien.</li><li style=\"margin-bottom: 4px; list-style: inherit;\">Quisque et mauris eget nisi vestibulum rhoncus molestie a ante.</li><li style=\"margin-bottom: 4px; list-style: inherit;\">Curabitur pulvinar ex at tempus sodales.</li><li style=\"margin-bottom: 4px; list-style: inherit;\">Mauris efficitur magna quis lectus lobortis venenatis.</li><li style=\"margin-bottom: 4px; list-style: inherit;\">Nunc id enim eget augue molestie lobortis in a purus.</li></ul><h3 style=\"margin: 30px 0px 15px; font-family: \"Roboto Slab\", Helvetica, Tahoma, Arial, serif; color: rgb(0, 0, 0); font-size: 16px; overflow-wrap: break-word;\">Donec maximus quam at lectus bibendum, non suscipit nunc tristique.</h3><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><div><br></div></div>','<p>\r\n <div class=\"rte\" style=\"color: rgb(85, 85, 85); margin-bottom: 20px; font-family: Poppins, Helvetica, Tahoma, Arial, serif; font-size: 13px;\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\">On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du...\r\n</p>','its-all-about-how-you-wear','blogs-blog-post-52.jpg',2,1,1,1667789180,1667802049),
(4,'27 DAYS OF SPRING FASHION RECAP','<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(85, 85, 85); font-family: Poppins, Helvetica, Tahoma, Arial, serif; font-size: 13px;\">On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(85, 85, 85); font-family: Poppins, Helvetica, Tahoma, Arial, serif; font-size: 13px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','<p>asdasdasdsadsadss</p>','27-days-of-spring-fashion-recap','blogs-blog-post-3.jpg',2,1,1,1667797963,1667802060),
(5,'test','','                                                                                                                                                                                                                                                                                                                                                                                                                 ...','test',NULL,1,1,1,1667976961,1667976961),
(6,'test','<p>asdasf</p>','<p>asdasf</p>','test',NULL,1,1,1,1667976974,1667976974),
(7,'PT Angkasa Pura',NULL,'                                                                                                                                                                                                                                                                                                                                                                                                                 ...','pt-angkasa-pura','blogs-PasPhoto.jpg',2,1,1,1683420204,1683420204),
(8,'PT Angkasa Pura',NULL,'                                                                                                                                                                                                                                                                                                                                                                                                                 ...','pt-angkasa-pura','blogs-PasPhoto1.jpg',2,1,1,1683420239,1683420239);

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('a87bb950ced315cffaf5b82d9a60a9a6ce76c7b9','118.97.237.141',1667972403,'__ci_last_regenerate|i:1667972403;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('49544c8497dd539ac914f35e48ae2d851e0c5ce1','139.99.170.109',1667979466,'__ci_last_regenerate|i:1667979466;'),
('6b242a16f0b8cc3cfda324cb96909d23308dc21d','20.69.85.143',1667979928,'__ci_last_regenerate|i:1667979928;'),
('d7e9cb40e897be298d10480a76731381d0537df6','103.105.55.47',1667995379,'__ci_last_regenerate|i:1667995379;'),
('f3a83aee160f865d62151611b0e005339299c3a4','103.105.55.47',1667995419,'__ci_last_regenerate|i:1667995419;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('0562e45b40c0513e598fedaf0a6d61c125a931a1','103.105.55.47',1667995685,'__ci_last_regenerate|i:1667995685;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('6da1bff4f1a7a635a228781dc5b50e1678a20cc6','103.105.55.47',1667995605,'__ci_last_regenerate|i:1667995419;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('d65ad829a3eae67f6744fba987d92b444ca1bcd0','118.97.237.141',1667975374,'__ci_last_regenerate|i:1667975374;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('794578de6a824380b9f9abf1b98b99f75e45f849','5.62.34.21',1667979463,'__ci_last_regenerate|i:1667979463;'),
('aa7a01bdad152771cdd3b65ac4094f266a190c80','109.201.130.6',1667979463,'__ci_last_regenerate|i:1667979463;'),
('50bd32f12b94fddda480f79f5442dc7fd5d5aaea','118.97.237.141',1667973447,'__ci_last_regenerate|i:1667973447;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('7854fd552a223c571d0481bbe507258b48fe8067','118.97.237.141',1667973447,'__ci_last_regenerate|i:1667973447;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('f62e071f03b18602f55a7d563019382b4fd62335','118.97.237.141',1667974148,'__ci_last_regenerate|i:1667974148;'),
('7f577c97c3621bbe4f7197721c1163fba3d3baf5','118.97.237.141',1667975072,'__ci_last_regenerate|i:1667975072;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('1c4712230defe91c19e7922baf9c9c438eaa85c6','118.97.237.141',1667976342,'__ci_last_regenerate|i:1667976342;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('50e8d3c89e6e5fb77c34cf2f4acc7b09d293e1bc','96.9.246.195',1667975696,'__ci_last_regenerate|i:1667975696;'),
('f952b75d8cdbe968f737490709e420437b300bb4','54.156.251.192',1667975844,'__ci_last_regenerate|i:1667975844;'),
('108be5517d3cdbfa089a885764ebdb9483e3ef73','118.97.237.141',1667976736,'__ci_last_regenerate|i:1667976736;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('caeb4df995f1a295229e105fa776d8507b146f2a','118.97.237.141',1667977044,'__ci_last_regenerate|i:1667977044;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('2db9aab59f4e12d92c08c806f1ecdbfb5c5b1e1d','118.97.237.141',1667977567,'__ci_last_regenerate|i:1667977567;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ae903e8fc04b6d837d0839642778a62ae9ee7d38','118.97.237.141',1667977913,'__ci_last_regenerate|i:1667977913;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('38d8512bdd697b5c61dea1702efaee27d59dafc6','118.97.237.141',1667978375,'__ci_last_regenerate|i:1667978375;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('33723ae77dd738676cbe1dfd1e6ee33e4f327b78','80.255.7.105',1667978202,'__ci_last_regenerate|i:1667978202;'),
('72774286533fe89eb7486af5b851b7f2d23dd185','212.129.2.210',1667978261,'__ci_last_regenerate|i:1667978261;'),
('ba396aa906579149fa37a06cab101d28eb796cfa','84.17.57.120',1667978261,'__ci_last_regenerate|i:1667978261;'),
('b2827b8ef5b655fb4b252a5bf630f11f024e7155','194.186.142.148',1667978278,'__ci_last_regenerate|i:1667978262;'),
('489ab8a07269f799922107b2dfc0db4e164df672','149.57.28.155',1667978262,'__ci_last_regenerate|i:1667978262;'),
('064249dbe5ec57285d1d23948cab105bbc91a05b','194.186.142.148',1667978313,'__ci_last_regenerate|i:1667978296;'),
('c4cbefa70bad2b5a6baf44ea655b8b24398e870c','38.108.182.5',1667978308,'__ci_last_regenerate|i:1667978308;'),
('5107f2b011806ca524fb578c4ec371991dc108ed','38.108.182.5',1667978308,'__ci_last_regenerate|i:1667978308;'),
('07c9b56c2d5d5f7c97486faaea345e5f1516f4b5','118.97.237.141',1667978688,'__ci_last_regenerate|i:1667978688;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('c519b5b1e97c5ae8921c120505e9e8195c6ac849','84.17.57.120',1667978463,'__ci_last_regenerate|i:1667978463;'),
('27a0b818112163ef29c25dc5d9ff507ae44ee770','212.129.2.210',1667978463,'__ci_last_regenerate|i:1667978463;'),
('af018a442bb9e3bbdb466ea606e11c07986213ce','138.199.18.132',1667978463,'__ci_last_regenerate|i:1667978463;'),
('cd6e444e2ae24b123b8a9553123112861c837a4f','149.57.28.155',1667978464,'__ci_last_regenerate|i:1667978464;'),
('99b0abb9247736f95dd937817af1d18e574b8b7c','212.129.2.210',1667978552,'__ci_last_regenerate|i:1667978552;'),
('cce0e0d74faf683cc731ef8c374a6d3558f070aa','47.243.103.140',1667978554,'__ci_last_regenerate|i:1667978554;'),
('9d766054b90bab2618ff0dc6f19810018227ba30','52.250.30.131',1667978592,'__ci_last_regenerate|i:1667978592;'),
('b1c86c9f30feae29035beaeee2208786c7e2366c','38.133.120.10',1667978668,'__ci_last_regenerate|i:1667978668;'),
('09bc32c712efb40491757eec3fea5f2ea0205bf3','118.97.237.141',1667978688,'__ci_last_regenerate|i:1667978688;'),
('f4ec1a7b7e64a643ed6f7045d20c5ace22e593c9','37.252.185.196',1667978755,'__ci_last_regenerate|i:1667978755;'),
('a5ee4eaa4ec011f02527aea3584f69bd90d3ed8b','52.65.88.94',1667978806,'__ci_last_regenerate|i:1667978806;'),
('37837e6434e15a3b059ebec3b0af5b2543629756','119.13.219.99',1667978858,'__ci_last_regenerate|i:1667978858;'),
('88cd24b9fb3d221fb0a73a7468bcc1f3d872e2e8','54.79.237.109',1667978942,'__ci_last_regenerate|i:1667978942;'),
('7d6982439717688cd67642e9b0ba8823589d6b4b','161.35.246.138',1667978984,'__ci_last_regenerate|i:1667978943;'),
('f90dda38a2643991a802b46857c774da905a6c08','13.211.45.54',1667978984,'__ci_last_regenerate|i:1667978984;'),
('8df0476da0ef21132344e65ed5eace0a17cbd833','109.201.130.6',1667979374,'__ci_last_regenerate|i:1667979374;'),
('4d25dccbb8143af6f0462a3765231f2b46b7111a','116.206.228.180',1667979374,'__ci_last_regenerate|i:1667979374;'),
('7f90d94b5ea4f6d18af9a6340a6463bf220957c1','103.28.53.162',1667979376,'__ci_last_regenerate|i:1667979376;'),
('949e5d43e8cf65ad0302da98753158b692ef7f5f','103.105.55.47',1667996315,'__ci_last_regenerate|i:1667996315;'),
('09b8b6e8db1d158c2dfa1f9f5cfb7f9cad9ade9d','103.105.55.47',1667996637,'__ci_last_regenerate|i:1667996637;'),
('cb93d1eed34998743aaf7db7c853bf2c3bb44702','114.79.20.126',1667996638,'__ci_last_regenerate|i:1667996637;'),
('2c5162d7d0df7915ccfdacea1818332a486241a9','116.202.37.30',1668001629,'__ci_last_regenerate|i:1668001628;'),
('dde5abf3af75cc7c1ff3235a20be5c61fc36cdfe','116.202.37.30',1668001629,'__ci_last_regenerate|i:1668001628;'),
('8002c2bd9e90e88d5aeb9947039f5a705d128865','94.102.63.27',1668001635,'__ci_last_regenerate|i:1668001635;'),
('ecd1e6f57fdd00bdfd563f2f773a870e942affdc','93.174.93.114',1668001635,'__ci_last_regenerate|i:1668001635;'),
('f331221bda7c113c057ea6fe629df21e4e3e7e3b','93.174.93.114',1668001644,'__ci_last_regenerate|i:1668001644;'),
('c56aa41eda11346aa1836d82690387df494a9bfb','94.102.49.123',1668001646,'__ci_last_regenerate|i:1668001646;'),
('2686ff8b2e4685e478e23aa82e564b6f0dfdd85e','116.202.37.30',1668001681,'__ci_last_regenerate|i:1668001681;'),
('59353d2f22548d04fe6632f57b64ba49290124d8','116.202.37.30',1668001681,'__ci_last_regenerate|i:1668001681;'),
('s78rdep34v79o1d98874lg02o7kaoann','::1',1668008193,'__ci_last_regenerate|i:1668008193;'),
('i8gpgc4s15uih0d9sniqsc4nolgsjesn','::1',1668007089,'__ci_last_regenerate|i:1668007089;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('i83i2kirn152vbiq3un5bnbc6vke8sff','::1',1668007402,'__ci_last_regenerate|i:1668007402;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('tmqa0hof7anpvnca2e0j99pl0pdbg99p','::1',1668007710,'__ci_last_regenerate|i:1668007710;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('atov4dek44bklgmu4m12ab4vgv10rp18','::1',1668008028,'__ci_last_regenerate|i:1668008028;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:23:\"Data Berhasil Diupdate!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('liddcqm1ru5ilj1nl44fujnl474rmijs','::1',1668008137,'__ci_last_regenerate|i:1668008028;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('kq0i81c7fqrc0jrfq8vn13jsbhmqktul','::1',1668008513,'__ci_last_regenerate|i:1668008513;'),
('pidu371erpa2jctb893hhjuejkm47uao','::1',1668008707,'__ci_last_regenerate|i:1668008513;'),
('9pqkrjktkddbds2mejvkh23tbt13l83h','::1',1683413385,'__ci_last_regenerate|i:1683413385;'),
('kcpkhj32lf0s5245h50cn8gp36g542er','::1',1683414040,'__ci_last_regenerate|i:1683414040;'),
('49tb08c3pn4941ntahh6e3d5i9ehhoh2','::1',1683414345,'__ci_last_regenerate|i:1683414345;'),
('itqppk7r0mn7953vtot9hvjpvfp8i153','::1',1683414716,'__ci_last_regenerate|i:1683414716;'),
('9qd766pucd7neoovrhbs5u3selr6dog8','::1',1683415028,'__ci_last_regenerate|i:1683415028;'),
('f7dguosbajuqff58tdcnr7v9qnn164ie','::1',1683415364,'__ci_last_regenerate|i:1683415364;'),
('b1odjuqpoh7mvtd6i5fqrb4fttvgar2m','::1',1683415688,'__ci_last_regenerate|i:1683415688;'),
('nud6l1re47s4honh520clb89qop1f9kq','::1',1683416934,'__ci_last_regenerate|i:1683416934;'),
('q3ov5d6l0uj2nieqg4ohud2j5bc22ur2','::1',1683416206,'__ci_last_regenerate|i:1683416206;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:15:\"Sysadmin Ciprut\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('h2mllovp90j8al8uiucqgnr97aa8oqj6','::1',1683416328,'__ci_last_regenerate|i:1683416206;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ias1k9noh6ps3iah0r5gtpprqrbrnq9h','::1',1683416805,'__ci_last_regenerate|i:1683416805;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('tvb9k1lkg6fmq06qtnnt2gr9qb9tqje6','::1',1683418802,'__ci_last_regenerate|i:1683418802;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('qpp8981in8qqqqf010gl6j1ldf166tfk','::1',1683417269,'__ci_last_regenerate|i:1683417269;'),
('0pmuptsf9mmj7fcuhp0jbktoprfcpm4h','::1',1683417620,'__ci_last_regenerate|i:1683417620;'),
('3kl2r98l7f8v55vvu2rus9e2a2ftvnmg','::1',1683418068,'__ci_last_regenerate|i:1683418068;'),
('vidadnbbad5sia672cp7tkm939nme8q7','::1',1683418441,'__ci_last_regenerate|i:1683418441;'),
('08ku321k8fq6tbtorfefa5svldb7s34a','::1',1683418752,'__ci_last_regenerate|i:1683418752;'),
('dpikmk7t2hl0bjl0vqhk850id2ho9imt','::1',1683418752,'__ci_last_regenerate|i:1683418752;'),
('a5vlqtslapuj0svbec5k59vefdr8nq37','::1',1683419660,'__ci_last_regenerate|i:1683419660;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('j3pfe80tn82980fdnrq5ooec24e93nl1','::1',1683420030,'__ci_last_regenerate|i:1683420030;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('mjfk60uv9gbk1b4si6k9mn5jphpk52q2','::1',1683420746,'__ci_last_regenerate|i:1683420746;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"new\";}'),
('2qerd92khomee8hbl0ota13hmublqbvh','::1',1683421054,'__ci_last_regenerate|i:1683421054;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ec6ldv82susk7pq73v4otd2cju1a9ajk','::1',1683421709,'__ci_last_regenerate|i:1683421709;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"new\";}'),
('pbe2v11o2g0j0u47vh1kf2vhe7has2kv','::1',1683422010,'__ci_last_regenerate|i:1683422010;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('53gobp6sapr7uns50o5eqjahofstq784','::1',1683422221,'__ci_last_regenerate|i:1683422010;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:23:\"Data Berhasil Diupdate!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('v807lcn4mkudcipvbdfbc7curd1o7krq','::1',1683496357,'__ci_last_regenerate|i:1683496357;'),
('nhaca36cgdh98lhk46i767mm7uqo796r','::1',1683553043,'__ci_last_regenerate|i:1683553043;'),
('tk3u6o756jt24t17v8khjfjl01i0npf5','::1',1683553708,'__ci_last_regenerate|i:1683553708;'),
('ko111c5cuv87v5tq9cihqb45qksraucl','::1',1683553545,'__ci_last_regenerate|i:1683553545;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('vmv41tbk2nrua65dc1glln3dd5ugc0gv','::1',1683553861,'__ci_last_regenerate|i:1683553861;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('7drmhvol4feuebcqtsu9998hqebs0jp5','::1',1683558921,'__ci_last_regenerate|i:1683558921;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('lu60ut3v6vtmoudbv8lf9rgbe3uof223','::1',1683554155,'__ci_last_regenerate|i:1683554155;'),
('i3t2er53314khnskcppvo5fha2cjtlou','::1',1683554727,'__ci_last_regenerate|i:1683554727;'),
('8tplhpi17vs4oc6leplnf0c1kfpcbm1t','::1',1683555054,'__ci_last_regenerate|i:1683555054;'),
('h37ojfv80j1ckmtkcq22u4d2citmhm3n','::1',1683558105,'__ci_last_regenerate|i:1683558105;'),
('rr2sr9k52nitptq8urfq42us6q0bbo2b','::1',1683558472,'__ci_last_regenerate|i:1683558472;'),
('fp0ahd2ah9o681ebqobmgaagibn5ur06','::1',1683558786,'__ci_last_regenerate|i:1683558786;'),
('n52rt1opik6oe10fgbe7gs1i2p58edf1','::1',1683559744,'__ci_last_regenerate|i:1683559744;'),
('2icumeik7q90f84t8cav0ku33c0glt69','::1',1683560318,'__ci_last_regenerate|i:1683560318;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('kr9oe3gelrjaibv2qov09c360ummj5qd','::1',1683560045,'__ci_last_regenerate|i:1683560045;'),
('1bm1rvl1m9dseo2sqmijbsdtm4eghkei','::1',1683560215,'__ci_last_regenerate|i:1683560045;'),
('tv9kh2te7e5onkers67f98h13ucc4ghp','::1',1683560696,'__ci_last_regenerate|i:1683560696;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('4gn665ub90ulnsb0tsb2o92sfr6brb0p','::1',1683560757,'__ci_last_regenerate|i:1683560696;'),
('o1kkl87sjgutdghgbfjhrtsoj9q3k3es','::1',1683642478,'__ci_last_regenerate|i:1683642478;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('muogorcv5a9ge8iim4on9cn9h2esng2l','::1',1683642809,'__ci_last_regenerate|i:1683642809;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('23opea24f8mg3pguiq4lvtrs9cnvridc','::1',1683643117,'__ci_last_regenerate|i:1683643117;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('r9mavpesl1bgg6adh455lkt7amb96av6','::1',1683643465,'__ci_last_regenerate|i:1683643465;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('lksv7hb69upu3674aaqs1codtmv2lvqh','::1',1683643780,'__ci_last_regenerate|i:1683643780;'),
('d8ekg1ttbn1n38pn6is27tcq89g69b1a','::1',1683643770,'__ci_last_regenerate|i:1683643770;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('pk3clpv616g47qkgd4eumn35gq7tctef','::1',1683643247,'__ci_last_regenerate|i:1683643247;'),
('566ma0h4ljsd55dpr0jh2q952d1mnka2','::1',1683641896,'__ci_last_regenerate|i:1683641896;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('mgo4tdnqb48j03ivt0614mv0q9b32ca3','::1',1683644109,'__ci_last_regenerate|i:1683644109;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('tic4b4m4heldpngh8alq08l3mqe1othj','::1',1683644263,'__ci_last_regenerate|i:1683644263;'),
('9hrahv5qte87ep2frqmecdparo3a7r64','::1',1683644575,'__ci_last_regenerate|i:1683644575;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('dd1ca57kl49humorgr5psc28ehvafthv','::1',1683644578,'__ci_last_regenerate|i:1683644578;'),
('fo7teeok6cp8emmfui3kgp7et6fvs3lk','::1',1683644575,'__ci_last_regenerate|i:1683644575;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('07eom937rvfluq5kqu8boh2vsh3e48sr','::1',1683644955,'__ci_last_regenerate|i:1683644955;'),
('3dv8ptimn7km5ia40u7mdpckjpofu53r','::1',1683644955,'__ci_last_regenerate|i:1683644955;'),
('rgt2s42saa9imtqiqf9nuo6hg7mcsn8j','::1',1683676945,'__ci_last_regenerate|i:1683676945;'),
('9jah41a4oq5oks1km538ke60ch24bc9s','::1',1683676942,'__ci_last_regenerate|i:1683676817;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:23:\"Data Berhasil Diupdate!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('ki4ta4k08utvd1hhj0jneo1778sfbr8j','::1',1683677726,'__ci_last_regenerate|i:1683677726;'),
('mp70aua3ho3o9mphudmnjkumbd5596gh','::1',1683678047,'__ci_last_regenerate|i:1683678047;'),
('7ob25jau45ke9qnt7f5jh7912gr737ps','::1',1683678380,'__ci_last_regenerate|i:1683678380;'),
('ekdt7jvsot7ehtnipi6j12bcou098im2','::1',1683678759,'__ci_last_regenerate|i:1683678759;'),
('vnhtt15l7q17ci0h476gna36o096enoe','::1',1683679090,'__ci_last_regenerate|i:1683679090;'),
('95k95srb2lkiq09v2oj87acg104m5e06','::1',1683679411,'__ci_last_regenerate|i:1683679411;'),
('480lkr5g22hkcg25pg65ntdkoclv6rnq','::1',1683686439,'__ci_last_regenerate|i:1683686439;'),
('hpo6c634rgf81drempkqca4l9r4jejlu','::1',1683692137,'__ci_last_regenerate|i:1683692137;'),
('skthrlb700usi1faa4homms4v51a546q','::1',1683692509,'__ci_last_regenerate|i:1683692509;'),
('2c9egb8fq70bqlk4o8m04u8bv4r43lkk','::1',1683692921,'__ci_last_regenerate|i:1683692921;success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('uvn3l1i89i75cgkt6nbtb981kn67oc3j','::1',1683692864,'__ci_last_regenerate|i:1683692864;'),
('khp7l3aq89cuf7o3eejnu3a1uoshqubc','::1',1683695785,'__ci_last_regenerate|i:1683695785;'),
('bv1cccl51h6lcd3ju1rjfgk4o15vcmqh','::1',1683696013,'__ci_last_regenerate|i:1683696013;is_login|b:1;is_developer|b:0;id|s:1:\"8\";typeuser_id|s:1:\"2\";name|s:24:\"Hilar Transport Logistik\";foto|s:32:\"profile-image_header-avatar5.png\";typeuser|s:5:\"Admin\";username|s:13:\"administrator\";switch|b:0;you_can|a:34:{s:9:\"blog-1[C]\";s:9:\"blog-1[C]\";s:9:\"blog-1[D]\";s:9:\"blog-1[D]\";s:9:\"blog-1[R]\";s:9:\"blog-1[R]\";s:9:\"blog-1[U]\";s:9:\"blog-1[U]\";s:15:\"branch-store[C]\";s:15:\"branch-store[C]\";s:15:\"branch-store[D]\";s:15:\"branch-store[D]\";s:15:\"branch-store[R]\";s:15:\"branch-store[R]\";s:15:\"branch-store[U]\";s:15:\"branch-store[U]\";s:10:\"clients[C]\";s:10:\"clients[C]\";s:10:\"clients[D]\";s:10:\"clients[D]\";s:10:\"clients[R]\";s:10:\"clients[R]\";s:10:\"clients[U]\";s:10:\"clients[U]\";s:18:\"company-profile[C]\";s:18:\"company-profile[C]\";s:18:\"company-profile[D]\";s:18:\"company-profile[D]\";s:18:\"company-profile[R]\";s:18:\"company-profile[R]\";s:18:\"company-profile[U]\";s:18:\"company-profile[U]\";s:9:\"master[C]\";s:9:\"master[C]\";s:9:\"master[D]\";s:9:\"master[D]\";s:9:\"master[R]\";s:9:\"master[R]\";s:9:\"master[U]\";s:9:\"master[U]\";s:8:\"pages[R]\";s:8:\"pages[R]\";s:10:\"profile[C]\";s:10:\"profile[C]\";s:10:\"profile[D]\";s:10:\"profile[D]\";s:10:\"profile[R]\";s:10:\"profile[R]\";s:10:\"profile[U]\";s:10:\"profile[U]\";s:11:\"services[C]\";s:11:\"services[C]\";s:11:\"services[D]\";s:11:\"services[D]\";s:11:\"services[R]\";s:11:\"services[R]\";s:11:\"services[U]\";s:11:\"services[U]\";s:16:\"setting-image[C]\";s:16:\"setting-image[C]\";s:16:\"setting-image[D]\";s:16:\"setting-image[D]\";s:16:\"setting-image[R]\";s:16:\"setting-image[R]\";s:16:\"setting-image[U]\";s:16:\"setting-image[U]\";s:10:\"setting[R]\";s:10:\"setting[R]\";}user_initial|s:0:\"\";'),
('1s54ru1k0c152tahp6uda96e4on54fp7','::1',1683696443,'__ci_last_regenerate|i:1683696443;'),
('tpr0666qgi3gs6ulnro0dph4me5md7vb','::1',1683701659,'__ci_last_regenerate|i:1683701659;is_login|b:1;is_developer|b:0;id|s:1:\"8\";typeuser_id|s:1:\"2\";name|s:24:\"Hilar Transport Logistik\";foto|s:32:\"profile-image_header-avatar5.png\";typeuser|s:5:\"Admin\";username|s:13:\"administrator\";switch|b:0;you_can|a:34:{s:9:\"blog-1[C]\";s:9:\"blog-1[C]\";s:9:\"blog-1[D]\";s:9:\"blog-1[D]\";s:9:\"blog-1[R]\";s:9:\"blog-1[R]\";s:9:\"blog-1[U]\";s:9:\"blog-1[U]\";s:15:\"branch-store[C]\";s:15:\"branch-store[C]\";s:15:\"branch-store[D]\";s:15:\"branch-store[D]\";s:15:\"branch-store[R]\";s:15:\"branch-store[R]\";s:15:\"branch-store[U]\";s:15:\"branch-store[U]\";s:10:\"clients[C]\";s:10:\"clients[C]\";s:10:\"clients[D]\";s:10:\"clients[D]\";s:10:\"clients[R]\";s:10:\"clients[R]\";s:10:\"clients[U]\";s:10:\"clients[U]\";s:18:\"company-profile[C]\";s:18:\"company-profile[C]\";s:18:\"company-profile[D]\";s:18:\"company-profile[D]\";s:18:\"company-profile[R]\";s:18:\"company-profile[R]\";s:18:\"company-profile[U]\";s:18:\"company-profile[U]\";s:9:\"master[C]\";s:9:\"master[C]\";s:9:\"master[D]\";s:9:\"master[D]\";s:9:\"master[R]\";s:9:\"master[R]\";s:9:\"master[U]\";s:9:\"master[U]\";s:8:\"pages[R]\";s:8:\"pages[R]\";s:10:\"profile[C]\";s:10:\"profile[C]\";s:10:\"profile[D]\";s:10:\"profile[D]\";s:10:\"profile[R]\";s:10:\"profile[R]\";s:10:\"profile[U]\";s:10:\"profile[U]\";s:11:\"services[C]\";s:11:\"services[C]\";s:11:\"services[D]\";s:11:\"services[D]\";s:11:\"services[R]\";s:11:\"services[R]\";s:11:\"services[U]\";s:11:\"services[U]\";s:16:\"setting-image[C]\";s:16:\"setting-image[C]\";s:16:\"setting-image[D]\";s:16:\"setting-image[D]\";s:16:\"setting-image[R]\";s:16:\"setting-image[R]\";s:16:\"setting-image[U]\";s:16:\"setting-image[U]\";s:10:\"setting[R]\";s:10:\"setting[R]\";}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('34dr5r10natat1k2gihcdno7qb965d3d','::1',1683700895,'__ci_last_regenerate|i:1683700895;'),
('kkr9ktdap2ergp71ieai1pn7uqibid5u','::1',1683701351,'__ci_last_regenerate|i:1683701351;'),
('rkkekb7s4scqblgtvq9fq1ggvl1du445','::1',1683704275,'__ci_last_regenerate|i:1683704275;'),
('do05fed4lrg2fgujd8ark1cnp9e3ocqd','::1',1683704249,'__ci_last_regenerate|i:1683704249;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('trb58pqe3lpqmlejsqg7etk7ggo6stvn','::1',1683704273,'__ci_last_regenerate|i:1683704249;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:23:\"Data Berhasil Diupdate!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('gp1blaimlues3eigfoh1n53irovmefp4','::1',1683704275,'__ci_last_regenerate|i:1683704275;'),
('u7eo34lsrut6la7ac3f8snr2e4nb0k4a','::1',1683767050,'__ci_last_regenerate|i:1683767050;'),
('7pm6patmd9n98fsgivvrisbhvnolq6ln','::1',1683765928,'__ci_last_regenerate|i:1683765928;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('sv9g19k0c5vama5ubrkokca5k95e58p5','::1',1683766533,'__ci_last_regenerate|i:1683766533;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('bcuotr238or9hq5cv1sbij4ujedetq33','::1',1683766873,'__ci_last_regenerate|i:1683766873;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('82111hd6rd1btdk0lqca4oa8a40flp0u','::1',1683767630,'__ci_last_regenerate|i:1683767630;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('1qduonb0lq88qld7vk85hl00akltd3sk','::1',1683767669,'__ci_last_regenerate|i:1683767669;'),
('lvor759maqrvoej1aa0ommdckctcdj7u','::1',1683767359,'__ci_last_regenerate|i:1683767359;'),
('jqjc8rkfih6laf41c82rqn2fji6qco5d','::1',1683767964,'__ci_last_regenerate|i:1683767964;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ko45amrhdfq7bm0lb4v4jg61qtsplp4n','::1',1683768104,'__ci_last_regenerate|i:1683767964;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:23:\"Data Berhasil Diupdate!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('hs87vk5u6ifl950k62245qp24kbosdub','::1',1683768111,'__ci_last_regenerate|i:1683768111;'),
('opd7uqfii5318joqs538k20d58r72pil','::1',1683768519,'__ci_last_regenerate|i:1683768519;'),
('rn2b1er88l4pa7vlilqo2ps1irsn8plo','::1',1683769457,'__ci_last_regenerate|i:1683769457;'),
('flhvh9vjk3vtrv62g3ja5dmtcu677nas','::1',1683769537,'__ci_last_regenerate|i:1683769457;'),
('upursrnq0sgajk9ekb31e2s4j3aje67r','::1',1683782695,'__ci_last_regenerate|i:1683782616;'),
('7rv9q8bs7sd95v6ed122f0n9o96md4ob','::1',1683789549,'__ci_last_regenerate|i:1683789549;alert|s:524:\"<div class=\"info-box bg-gradient-danger\">\r\n                                        <span class=\"info-box-icon\"><i class=\"fas fa-exclamation-circle\"></i></span>\r\n                                        <div class=\"info-box-content\">\r\n                                            <span class=\"info-box-text\">FAILED</span>\r\n                                            <span class=\"progress-description\">Username is not Registered</span>\r\n                                        </div>\r\n                                    </div>\";__ci_vars|a:1:{s:5:\"alert\";s:3:\"new\";}'),
('qcdjhvqp4m2a26ft55rpdo8jd1mlglfe','::1',1683789901,'__ci_last_regenerate|i:1683789901;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('cbo2n2ftul1vqdag8rmorltl79838jth','::1',1683790205,'__ci_last_regenerate|i:1683790205;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('kmkp5vg04ol9tk5vhl8sn4kk04hids4d','::1',1683790617,'__ci_last_regenerate|i:1683790617;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('kkt9qllu76puk1ce883unrpec3ru7s16','::1',1683791101,'__ci_last_regenerate|i:1683791101;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ffod386i0ap5q67fguvndrutpet4ijee','::1',1683791291,'__ci_last_regenerate|i:1683791101;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('f73nub8ve4nun9n9tbbk29d0d3pumhls','::1',1683791284,'__ci_last_regenerate|i:1683791284;'),
('25ol4sq2bjhua5tuu27aj336v4ajp2u0','::1',1683850807,'__ci_last_regenerate|i:1683850807;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('6ui2ad2oh5u94cjefals5v3dkqkd489q','::1',1683850415,'__ci_last_regenerate|i:1683850412;'),
('nn6c9o4429teghhrnok0apksk65egeuo','::1',1683851752,'__ci_last_regenerate|i:1683851752;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('0m3qk0a0gvs9erkrnfgvm059ie285n8u','::1',1683852064,'__ci_last_regenerate|i:1683852064;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('bqovd3ovnf91e801hamlju4nnmpvf0n3','::1',1683852516,'__ci_last_regenerate|i:1683852516;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ku79vfp6s7hkp6l6rvbn6i2s05fn94o9','::1',1683852833,'__ci_last_regenerate|i:1683852833;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ojqqoblj30p3rrpaallts803hi579tje','::1',1683853101,'__ci_last_regenerate|i:1683852833;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('6bsn08c31m14rp5jrnagf4vgu36lteip','::1',1683865488,'__ci_last_regenerate|i:1683865488;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ofg278lrfhg7i03o239b1kohu5gbbcdo','::1',1683872822,'__ci_last_regenerate|i:1683872822;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('hp5bmv9hubv9dbtuspmqff0qtoflb10h','::1',1683876278,'__ci_last_regenerate|i:1683876278;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('cs10cghjlv5o8d62v1idgb7s2tftjlp9','::1',1683876687,'__ci_last_regenerate|i:1683876687;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('l9cj464dmbp92b716smhrqi12qdcfvmk','::1',1683877046,'__ci_last_regenerate|i:1683877046;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('30v5pr5gkec88mhl9tlgvpj3fqh3c0op','::1',1683877347,'__ci_last_regenerate|i:1683877347;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('etsdjclqpg3k9519kt5rc6o3psgqnhe0','::1',1683879360,'__ci_last_regenerate|i:1683879360;'),
('j58aufsejkcs7ukavjlogkrbgp6b1b58','::1',1683877729,'__ci_last_regenerate|i:1683877729;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('c3g12ceb38u9olcosj3hko7mr1e0gg6d','::1',1683878101,'__ci_last_regenerate|i:1683878101;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('jvm6lu2oc94p44buvoa0iqubifohcjtg','::1',1683878787,'__ci_last_regenerate|i:1683878787;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('k3kmnn6hqt3vup08e91auf10vr2g7jvp','::1',1683879186,'__ci_last_regenerate|i:1683879186;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:23:\"Data Berhasil Diupdate!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('9j2ankc9beoi0tef8eteqa3aseq53gd1','::1',1683879614,'__ci_last_regenerate|i:1683879614;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('tjcgdfbast6ej0737iogkrrv7tiqf8u7','::1',1683879617,'__ci_last_regenerate|i:1683879360;'),
('1uo5rb2vq35vl10sh57iiiehnu8o0btg','::1',1683879614,'__ci_last_regenerate|i:1683879614;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('i54ect4osgsvasqkqphbf8d4308fugh1','::1',1684134257,'__ci_last_regenerate|i:1684134257;'),
('inp8rcsug33tr3qda4djcdobus0cedpl','::1',1684133343,'__ci_last_regenerate|i:1684133343;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('k8nueq4alj4i7l7evtul5vfcbclm5d7g','::1',1684133742,'__ci_last_regenerate|i:1684133742;is_login|b:1;is_developer|b:0;id|s:1:\"8\";typeuser_id|s:1:\"2\";name|s:24:\"Hilar Transport Logistik\";foto|s:32:\"profile-image_header-avatar5.png\";typeuser|s:5:\"Admin\";username|s:13:\"administrator\";switch|b:0;you_can|a:34:{s:9:\"blog-1[C]\";s:9:\"blog-1[C]\";s:9:\"blog-1[D]\";s:9:\"blog-1[D]\";s:9:\"blog-1[R]\";s:9:\"blog-1[R]\";s:9:\"blog-1[U]\";s:9:\"blog-1[U]\";s:15:\"branch-store[C]\";s:15:\"branch-store[C]\";s:15:\"branch-store[D]\";s:15:\"branch-store[D]\";s:15:\"branch-store[R]\";s:15:\"branch-store[R]\";s:15:\"branch-store[U]\";s:15:\"branch-store[U]\";s:10:\"clients[C]\";s:10:\"clients[C]\";s:10:\"clients[D]\";s:10:\"clients[D]\";s:10:\"clients[R]\";s:10:\"clients[R]\";s:10:\"clients[U]\";s:10:\"clients[U]\";s:18:\"company-profile[C]\";s:18:\"company-profile[C]\";s:18:\"company-profile[D]\";s:18:\"company-profile[D]\";s:18:\"company-profile[R]\";s:18:\"company-profile[R]\";s:18:\"company-profile[U]\";s:18:\"company-profile[U]\";s:9:\"master[C]\";s:9:\"master[C]\";s:9:\"master[D]\";s:9:\"master[D]\";s:9:\"master[R]\";s:9:\"master[R]\";s:9:\"master[U]\";s:9:\"master[U]\";s:8:\"pages[R]\";s:8:\"pages[R]\";s:10:\"profile[C]\";s:10:\"profile[C]\";s:10:\"profile[D]\";s:10:\"profile[D]\";s:10:\"profile[R]\";s:10:\"profile[R]\";s:10:\"profile[U]\";s:10:\"profile[U]\";s:11:\"services[C]\";s:11:\"services[C]\";s:11:\"services[D]\";s:11:\"services[D]\";s:11:\"services[R]\";s:11:\"services[R]\";s:11:\"services[U]\";s:11:\"services[U]\";s:16:\"setting-image[C]\";s:16:\"setting-image[C]\";s:16:\"setting-image[D]\";s:16:\"setting-image[D]\";s:16:\"setting-image[R]\";s:16:\"setting-image[R]\";s:16:\"setting-image[U]\";s:16:\"setting-image[U]\";s:10:\"setting[R]\";s:10:\"setting[R]\";}user_initial|s:0:\"\";'),
('e8g84v1l48nr9im71tve7rnfq3u41j1k','::1',1684134786,'__ci_last_regenerate|i:1684134786;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";success|s:26:\"Data Berhasil Ditambahkan!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}'),
('bjbuvvpu9dii4s8ilu8f4pakni585t4u','::1',1684133905,'__ci_last_regenerate|i:1684133742;is_login|b:1;is_developer|b:0;id|s:1:\"8\";typeuser_id|s:1:\"2\";name|s:24:\"Hilar Transport Logistik\";foto|s:27:\"profile-profile-avatar5.png\";typeuser|s:5:\"Admin\";username|s:13:\"administrator\";switch|b:0;you_can|a:30:{s:11:\"about-us[C]\";s:11:\"about-us[C]\";s:11:\"about-us[D]\";s:11:\"about-us[D]\";s:11:\"about-us[R]\";s:11:\"about-us[R]\";s:11:\"about-us[U]\";s:11:\"about-us[U]\";s:15:\"branch-store[C]\";s:15:\"branch-store[C]\";s:15:\"branch-store[D]\";s:15:\"branch-store[D]\";s:15:\"branch-store[R]\";s:15:\"branch-store[R]\";s:15:\"branch-store[U]\";s:15:\"branch-store[U]\";s:10:\"clients[C]\";s:10:\"clients[C]\";s:10:\"clients[D]\";s:10:\"clients[D]\";s:10:\"clients[R]\";s:10:\"clients[R]\";s:10:\"clients[U]\";s:10:\"clients[U]\";s:18:\"company-profile[C]\";s:18:\"company-profile[C]\";s:18:\"company-profile[D]\";s:18:\"company-profile[D]\";s:18:\"company-profile[R]\";s:18:\"company-profile[R]\";s:18:\"company-profile[U]\";s:18:\"company-profile[U]\";s:9:\"galery[C]\";s:9:\"galery[C]\";s:9:\"galery[D]\";s:9:\"galery[D]\";s:9:\"galery[R]\";s:9:\"galery[R]\";s:9:\"galery[U]\";s:9:\"galery[U]\";s:9:\"master[C]\";s:9:\"master[C]\";s:9:\"master[D]\";s:9:\"master[D]\";s:9:\"master[R]\";s:9:\"master[R]\";s:9:\"master[U]\";s:9:\"master[U]\";s:8:\"pages[R]\";s:8:\"pages[R]\";s:11:\"services[C]\";s:11:\"services[C]\";s:11:\"services[D]\";s:11:\"services[D]\";s:11:\"services[R]\";s:11:\"services[R]\";s:11:\"services[U]\";s:11:\"services[U]\";s:10:\"setting[R]\";s:10:\"setting[R]\";}user_initial|s:0:\"\";'),
('rm5moi30o7q8vjg0u7d6d8q82gvpfd3i','::1',1684134565,'__ci_last_regenerate|i:1684134565;'),
('2viimdttk0jlnt41pttecjtua3hkmhil','::1',1684134895,'__ci_last_regenerate|i:1684134895;'),
('dlch0meht4iunj49qr4mdtbts40kjjp8','::1',1684135972,'__ci_last_regenerate|i:1684135972;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('4m22hnrnf92erts4pg79ksgf8nvi39j9','::1',1684135206,'__ci_last_regenerate|i:1684135206;'),
('6j6nvm8ff5tts555fhit41tf97fa64lb','::1',1684135240,'__ci_last_regenerate|i:1684135206;'),
('f1grgk1uca4r5uu7a46160tnvjpjpldn','::1',1684136005,'__ci_last_regenerate|i:1684135972;is_login|b:1;is_developer|b:0;id|s:1:\"8\";typeuser_id|s:1:\"2\";name|s:24:\"Hilar Transport Logistik\";foto|s:27:\"profile-profile-avatar5.png\";typeuser|s:5:\"Admin\";username|s:13:\"administrator\";switch|b:0;you_can|a:30:{s:11:\"about-us[C]\";s:11:\"about-us[C]\";s:11:\"about-us[D]\";s:11:\"about-us[D]\";s:11:\"about-us[R]\";s:11:\"about-us[R]\";s:11:\"about-us[U]\";s:11:\"about-us[U]\";s:15:\"branch-store[C]\";s:15:\"branch-store[C]\";s:15:\"branch-store[D]\";s:15:\"branch-store[D]\";s:15:\"branch-store[R]\";s:15:\"branch-store[R]\";s:15:\"branch-store[U]\";s:15:\"branch-store[U]\";s:10:\"clients[C]\";s:10:\"clients[C]\";s:10:\"clients[D]\";s:10:\"clients[D]\";s:10:\"clients[R]\";s:10:\"clients[R]\";s:10:\"clients[U]\";s:10:\"clients[U]\";s:18:\"company-profile[C]\";s:18:\"company-profile[C]\";s:18:\"company-profile[D]\";s:18:\"company-profile[D]\";s:18:\"company-profile[R]\";s:18:\"company-profile[R]\";s:18:\"company-profile[U]\";s:18:\"company-profile[U]\";s:9:\"galery[C]\";s:9:\"galery[C]\";s:9:\"galery[D]\";s:9:\"galery[D]\";s:9:\"galery[R]\";s:9:\"galery[R]\";s:9:\"galery[U]\";s:9:\"galery[U]\";s:9:\"master[C]\";s:9:\"master[C]\";s:9:\"master[D]\";s:9:\"master[D]\";s:9:\"master[R]\";s:9:\"master[R]\";s:9:\"master[U]\";s:9:\"master[U]\";s:8:\"pages[R]\";s:8:\"pages[R]\";s:11:\"services[C]\";s:11:\"services[C]\";s:11:\"services[D]\";s:11:\"services[D]\";s:11:\"services[R]\";s:11:\"services[R]\";s:11:\"services[U]\";s:11:\"services[U]\";s:10:\"setting[R]\";s:10:\"setting[R]\";}user_initial|s:0:\"\";'),
('5j8b05s9i44cg8oij1h07agefo2rmck6','::1',1684208726,'__ci_last_regenerate|i:1684208726;'),
('1na5kg385ml9mv3m1cph6ontscjqc4kp','::1',1684214156,'__ci_last_regenerate|i:1684214156;'),
('q9pusrudfn1qp5c0k5vcfhfja552qran','::1',1684215430,'__ci_last_regenerate|i:1684215430;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('iccst1a4n96ot0dtvado4phhq7ui0500','::1',1684216052,'__ci_last_regenerate|i:1684216052;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('t0gj75ve92chpdfmlmrure8uu0fu3atd','::1',1684216371,'__ci_last_regenerate|i:1684216371;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('s7hbdtkucq6prn8j74efsomr15sqmrt3','::1',1684216775,'__ci_last_regenerate|i:1684216775;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('pbchv1n8i156qlj66hdvnjcvaruom3a0','::1',1684217543,'__ci_last_regenerate|i:1684217543;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('ct4sc0p7savuv4i5oe5i4b2h9u0cjvuu','::1',1684217845,'__ci_last_regenerate|i:1684217845;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('n1k84j5r8r0c2uc2lv43io8ljfemkf8i','::1',1684218150,'__ci_last_regenerate|i:1684218150;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";'),
('smvm5f4poh0ddq6vjjjj7d9835rf040k','::1',1684218261,'__ci_last_regenerate|i:1684218150;is_login|b:1;is_developer|b:1;id|s:1:\"1\";typeuser_id|s:1:\"1\";name|s:24:\"Hilar Transport Logistik\";foto|s:19:\"profile-avatar5.png\";typeuser|s:11:\"Super Admin\";username|s:8:\"sysadmin\";switch|b:0;you_can|a:0:{}user_initial|s:0:\"\";');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(100) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT '',
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clients` */

insert  into `clients`(`id`,`client`,`adress`,`image`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,'PT Angkasa Pura',NULL,'client-1661398390642-ap-logo-primer-rgb.png',2,1683421064,1683704255,1,1),
(2,'PT Gatra Trans',NULL,'client-1573425492240_copy.png',2,1683553904,1683704262,1,1),
(3,'PT Teba Express',NULL,'client-logo_copy.png',2,1683553932,1683704268,1,1),
(4,'PT JNT (Next Project)',NULL,'client-LOGO-JNT.png',2,1683553958,1683704273,1,1);

/*Table structure for table `company_profile` */

DROP TABLE IF EXISTS `company_profile`;

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `year` double DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `version` varchar(25) NOT NULL DEFAULT '',
  `ig_name` varchar(100) DEFAULT NULL,
  `ig_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `company_profile` */

insert  into `company_profile`(`id`,`owner`,`name`,`alias`,`description`,`company`,`email`,`address`,`phone`,`website`,`year`,`logo`,`version`,`ig_name`,`ig_url`) values 
(1,'M.Arfi Luqmn Hakim','Hilar Transport Logistik','Hilar','Company Profile PT Hilar Transport Logistik',' PT Hilar Transport Logistik','cs@hilartranslog.com','Jl Telaga Rambil 49, Kecamatan Sidayu, Kabupaten Gresik','08990446822','',2023,'company_profile-Hilar_Logo_copy.png','1.0.0','Ciprut Breastpump','https://www.instagram.com/ciprutbreastpump_momuungmalang/');

/*Table structure for table `content_blogs` */

DROP TABLE IF EXISTS `content_blogs`;

CREATE TABLE `content_blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `content_blogs` */

/*Table structure for table `galery` */

DROP TABLE IF EXISTS `galery`;

CREATE TABLE `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `galery` */

insert  into `galery`(`id`,`title`,`image`,`status`,`created_at`,`updated_at`) values 
(1,'Image OKE','galery-cta-bg.jpg',2,NULL,1683767037),
(2,'Image OKE OKE','galery-331.jpg',2,NULL,1683768104),
(3,'Image OKE','galery-22.jpg',2,NULL,1683767638),
(4,'Image OKE','galery-11.jpg',2,NULL,1683767647),
(5,'Image OKE','galery-cta-bg.jpg',2,NULL,1683767037),
(6,'Image OKE','galery-33.jpg',2,NULL,1683767667),
(7,'Image OKE','galery-cta-bg.jpg',2,NULL,1683767037),
(8,'Image OKE','galery-cta-bg.jpg',2,NULL,1683767037),
(9,'Image OKE','',1,NULL,1683767037),
(10,'Image OKE','',1,NULL,1683767037);

/*Table structure for table `master_branch_store` */

DROP TABLE IF EXISTS `master_branch_store`;

CREATE TABLE `master_branch_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `url_maps` longtext DEFAULT NULL,
  `url_embed` longtext DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `master_branch_store` */

insert  into `master_branch_store`(`id`,`name`,`address`,`phone`,`url_maps`,`url_embed`,`created_at`,`updated_at`) values 
(5,'Head Office','Jl Telaga Rambil 49, Kecamatan Sidayu, Kabupaten Gresik','08990446822','','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d588.6798487369502!2d112.5577539755718!3d-6.991584281512907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77e3a6417383f5%3A0xacd50b562a090c71!2sJl.%20Telaga%20Rambit%20No.49%2C%20Bunderan%2C%20Kec.%20Sidayu%2C%20Kabupaten%20Gresik%2C%20Jawa%20Timur%2061153!5e0!3m2!1sid!2sid!4v1683559931567!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>',1683416805,1683416805),
(6,'Branch Office','Gudang Barang di Medaeng – Waru Kab.Sidoarjo','08990446822','','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d588.6798487369502!2d112.5577539755718!3d-6.991584281512907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77e3a6417383f5%3A0xacd50b562a090c71!2sJl.%20Telaga%20Rambit%20No.49%2C%20Bunderan%2C%20Kec.%20Sidayu%2C%20Kabupaten%20Gresik%2C%20Jawa%20Timur%2061153!5e0!3m2!1sid!2sid!4v1683559931567!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>',1683416830,1683416830);

/*Table structure for table `master_brand` */

DROP TABLE IF EXISTS `master_brand`;

CREATE TABLE `master_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `master_brand` */

insert  into `master_brand`(`id`,`name`,`description`,`image`,`slug`,`created_at`,`updated_at`) values 
(1,'Spectra',NULL,'master_brand-bag2.jpg','spectra',NULL,NULL),
(6,'Mutter','','master_brand-bag2.jpg','mutter',1667440220,1667440220),
(7,'Kinmade','','master_brand-bag2.jpg','kinmade',1667807795,1667807795);

/*Table structure for table `master_image` */

DROP TABLE IF EXISTS `master_image`;

CREATE TABLE `master_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `size_image` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `master_image` */

insert  into `master_image`(`id`,`type`,`name`,`title`,`size_image`,`description`,`image`,`created_at`,`updated_at`) values 
(1,1,'Image Section Hubungi Kami','Hubungi Kami ','Ukuran 1920 x 995 pixels','Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','image_header-cta-bg.jpg',NULL,NULL);

/*Table structure for table `master_kategori` */

DROP TABLE IF EXISTS `master_kategori`;

CREATE TABLE `master_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `master_kategori` */

insert  into `master_kategori`(`id`,`name`,`keterangan`,`slug`,`created_at`,`updated_at`) values 
(6,'Pompa Asi','pompa asi','pompa-asi',1667776850,1667776850),
(10,'Asi Booster','','asi-booster',1667442019,1667442019),
(11,'Sparepart','','sparepart',1667776856,1667776856);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `link` varchar(128) DEFAULT '',
  `icon` varchar(64) DEFAULT '',
  `parent_id` int(11) DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=797 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`slug`,`level`,`link`,`icon`,`parent_id`,`urutan`,`type`) values 
(1,'Setting','setting',1,'#','fas fa-cogs',NULL,1,2),
(2,'User','user',2,'user','fas fa-users',1,1,2),
(3,'Menu','menu',2,'menu','fas fa-list',1,2,2),
(4,'Role','role',2,'role','fas fa-project-diagram',1,3,2),
(11,'Group Menu','group-menu',2,'groupMenu','fas fa-layer-group',1,4,2),
(25,'Profile','profile',1,'profile','fas fa-users',NULL,1,1),
(30,'Company Profile','company-profile',2,'companyProfile','fas fa-building',1,5,2),
(31,'Typeuser','typeuser',2,'typeuser','fas fa-user-check',1,5,2),
(38,'Master','master',1,'#','fas fa-hourglass',NULL,2,1),
(43,'Setting Image','setting-image',2,'index.php/master/settingImage','',38,1,1),
(50,'Branch Store','branch-store',2,'index.php/master/branchStore','',38,4,1),
(61,'Blog','blog-1',1,'index.php/blog/articles','fas fa-newspaper',NULL,4,1),
(66,'Pages','pages',1,'#','fas fa-newspaper',NULL,5,1),
(67,'Clients','clients',2,'index.php/clients/client','',66,1,1),
(68,'Services','services',2,'index.php/pages/service','',66,2,1),
(69,'Administrator','administrator',1,'','',NULL,0,3),
(70,'About Us','about-us',2,'index.php/pages/about','',66,3,1),
(74,'Home','home',1,'#hero','',NULL,1,4),
(75,'Tentang Kami','tentang-kami',1,'#about','',NULL,2,4),
(76,'Layanan Kami','layanan-kami',1,'#why-us','',NULL,3,4),
(77,'Klien Kami','klien-kami',1,'#clients','',NULL,4,4),
(78,'Galeri','galeri',1,'#portfolio','',NULL,5,4),
(79,'Kontak Kami','kontak-kami',1,'#contact','',NULL,6,4),
(793,'Galery','galery',2,'index.php/pages/galery','',66,4,1),
(794,'Setting Section','setting-section',1,'index.php/setting/setting','fas fa-cogs',NULL,5,1),
(795,'Hubungi Kami','hubungi-kami',1,'#cta','',NULL,6,4),
(796,'Phonebook','phonebook',1,'index.php/phonebook/phonebook','fas fa-book',NULL,6,1);

/*Table structure for table `phonebook` */

DROP TABLE IF EXISTS `phonebook`;

CREATE TABLE `phonebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `phonebook` */

insert  into `phonebook`(`id`,`first_name`,`last_name`,`phone_number`,`email`,`status`,`created_at`,`updated_at`) values 
(1,'Effendy','Anwar','08990446822','epen.effendy@gmail.com',1,NULL,NULL),
(2,'Ciprut','AAXX','34654684','blontenkz@gmail.com',0,1684216998,1684217808),
(3,'Ciprut','XXX','34654684','blontenkz@gmail.com',1,1684216998,1684217848),
(4,'Ciprut','AA','34654684','blontenkz@gmail.com',1,1684216999,1684216999),
(5,'Ciprut','AA','34654684','blontenkz@gmail.com',0,1684216999,1684216999);

/*Table structure for table `product_store_online` */

DROP TABLE IF EXISTS `product_store_online`;

CREATE TABLE `product_store_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `store_name` varchar(50) DEFAULT '',
  `type_store` varchar(20) DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product_store_online` */

insert  into `product_store_online`(`id`,`product_id`,`store_name`,`type_store`,`url`) values 
(33,4,'Tokopedia Pusat','tokopedia','https://tokopedia.link/ciprutbreastpump'),
(44,3,'Lazada Pusat','lazada','https://s.lazada.co.id/s.ihyhr'),
(45,3,'Shopee Cabang Tebo','shopee','http://shopee.co.id/ciprutbreastpumpcabang'),
(46,3,'Shopee Pusat','shopee','http://shopee.co.id/ciprutbreastpump_momuungmalang'),
(47,3,'Tokopedia Cabang Tebo','tokopedia','Tokopedia Cabang Tebo'),
(48,3,'Tokopedia Pusat','tokopedia','https://tokopedia.link/ciprutbreastpump');

/*Table structure for table `product_store_online_temp` */

DROP TABLE IF EXISTS `product_store_online_temp`;

CREATE TABLE `product_store_online_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(100) DEFAULT NULL,
  `store` varchar(20) DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product_store_online_temp` */

insert  into `product_store_online_temp`(`id`,`store_name`,`store`,`url`,`user_id`) values 
(71,'Lazada Pusat','lazada','https://s.lazada.co.id/s.ihyhr',1),
(72,'Shopee Cabang Tebo','shopee','http://shopee.co.id/ciprutbreastpumpcabang',1),
(73,'Shopee Pusat','shopee','http://shopee.co.id/ciprutbreastpump_momuungmalang',1),
(74,'Tokopedia Cabang Tebo','tokopedia','Tokopedia Cabang Tebo',1),
(75,'Tokopedia Pusat','tokopedia','https://tokopedia.link/ciprutbreastpump',1);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `discount_price` decimal(10,0) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `top_seller` varchar(20) DEFAULT '',
  `image` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`kategori_id`,`brand_id`,`short_description`,`description`,`price`,`discount_price`,`status`,`slug`,`top_seller`,`image`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(3,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc','top_seller','product-product1.jpg',1667777472,1668008033,1,1),
(4,'Paket Reseller Breastpump',6,1,'<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">Paket Reseller Breastpump</span><br></p>','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">Paket Reseller Breastpump</span><br></p>',1300000,10,2,'paket-reseller-breastpump','top_seller','product-product1.jpg',1667802934,1667978543,1,1),
(5,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc','top_seller','product-product1.jpg',1667777472,1667869434,1,1),
(6,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc','top_seller','product-product1.jpg',1667777472,1667869434,1,1),
(7,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(8,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(9,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(10,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(11,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(12,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(13,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(14,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1),
(15,'KINMADE VALVE PINK (1 PC)',6,7,'<span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagi','<p><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 13px;\">1000% ORIGINAL KINMADE READY STOCK????????????❤ . Kinmade valve tosca / kinmade valve pink / kinmade valve orange / kinmade valve biru mini mini . Valve Adalah bagian untuk memastikan hisapan udara hanya satu arah (dari payudara menuju botol). Jika valve sobek maka hisapan pompa akan berkurang drastis atau bahkan sama sekali tidak ada. Bisa digunakan pada semua tipe breastpump Spectra. ✿ Keunggulan Valve Tosca, Pink : - Mengosongkan PD secara optimal - No more clogged dust - Hasil jadi lebih banyak - Bisa membantu menaikan supply ASI NB : PEMBELIAN 2 PCS DENGAN KEMASAN ORIGINAL KINMADE PEMBELIAN 1 PCS MENGGUNAKAN KANTONG / PLASTIK KLIP BARANG 100 % ORIGINAL</span><br></p>',25000,0,2,'kinmade-valve-pink-1-pc',NULL,'product-product1.jpg',1667777472,1667869434,1,1);

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `typeuser_id` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `profile` */

insert  into `profile`(`user_id`,`name`,`email`,`phone`,`typeuser_id`,`foto`) values 
(1,'Hilar Transport Logistik','epen.effendy@gmail.com','08990446822',1,'profile-avatar5.png'),
(2,'Effendy','epen.effendy@gmail.com','08990446822',2,NULL),
(8,'Hilar Transport Logistik','cs@hilartranslog.com','',2,'profile-profile-avatar5.png');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `services` */

insert  into `services`(`id`,`name`,`desc`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,'Transporter Darat, Laut, Udara','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit',2,1683515224,1683516192,1,1),
(2,'Forwarding','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit',2,1683553561,1683553561,1,1),
(3,'Export - Import','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit',2,1683553574,1683553574,1,1),
(4,'Ekspedisi','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit',2,1683553587,1683553587,1,1),
(5,'Logistik','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit',2,1683553599,1683553599,1,1);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `flag_desc` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `settings` */

insert  into `settings`(`id`,`content`,`desc`,`slug`,`flag_desc`,`flag`,`status`) values 
(1,'HILAR TRANSPORTASI LOGISTIK','Pelayanan Terbaik Untuk Anda','home',1,0,1),
(2,'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.\r\n\r\n',NULL,'tentang-kami',0,1,1),
(3,'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.',NULL,'layanan-kami',0,1,1),
(4,'Bila Anda membutuhkan informasi lebih lanjut, silahkan menghubungi kami melalui alamat, email, dan nomor di bawah ini.\r\n\r\n',NULL,'kontak-kami',0,1,1),
(5,'Test Galery',NULL,'galeri',0,1,1),
(6,'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.',NULL,'klien-kami',0,1,1),
(7,'Hubungi Kami','Segera!!!!','hubungi-kami',1,0,0);

/*Table structure for table `typeuser` */

DROP TABLE IF EXISTS `typeuser`;

CREATE TABLE `typeuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `typeuser` */

insert  into `typeuser`(`id`,`code`,`value`,`description`) values 
(1,'SA','Super Admin','Super Admin'),
(2,'ADM','Admin','Admin');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password_hash` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`email`,`password_hash`,`auth_key`,`confirmed_at`,`unconfirmed_email`,`blocked_at`,`registration_ip`,`created_at`,`updated_at`,`flags`,`last_login_at`,`status`) values 
(1,'sysadmin','epen.effendy@gmail.com','$2y$10$NymUEHW3ID.QtzZXJaBYSedF4kANCXyvAHO0y9.wUQxxSVyAZu216',NULL,NULL,NULL,NULL,NULL,1654670581,1654831094,NULL,1684214156,1),
(2,'epen_effendy','epen.effendy@gmail.com','$2y$10$YT5e.qC5LvLAEFLKY3w6z.tARUggxONK4AxHTGob5w7.A3hIum3TC',NULL,NULL,NULL,NULL,NULL,1654738531,1654738531,NULL,1655426735,1),
(7,'admindk','admin@mail.com','$2y$10$RhSuuoDPoKdlhwmtd0Es.uhmkFgfl.fkBYLsyEM52MUsnHy4Oi5/e',NULL,NULL,NULL,NULL,NULL,1655432277,1655432277,NULL,NULL,1),
(8,'administrator','cs@hilartranslog.com','$2y$10$AVolADmyU98rWyqqywVrveyG7/GzLDi7Ji/wnQgCYdwN6bVJx5N4O',NULL,NULL,NULL,NULL,NULL,1683560696,1683560696,NULL,1684135972,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
