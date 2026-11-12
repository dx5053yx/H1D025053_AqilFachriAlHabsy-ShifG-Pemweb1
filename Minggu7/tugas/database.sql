create database cod;

use cod;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100),
  `harga` int(11),
  PRIMARY KEY (`id`)
);

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100),
  `nomor_hp` varchar(20),
  `alamat` varchar(200),
  PRIMARY KEY (`id`)
);

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100),
  `nomor_hp` varchar(20),
  PRIMARY KEY (`id`)
);
