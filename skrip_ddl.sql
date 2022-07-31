create database dspp;

use dspp;

create table siswa ( 
	nis char(11) PRIMARY KEY,
	nama_siswa varchar(45),
	kelas varchar(45));

create table tu (
	nis char(11),
	no_bayar char(5) PRIMARY KEY,
	bulan varchar(45),
	foreign key (nis) references siswa(nis) ON UPDATE RESTRICT ON DELETE RESTRICT);

create table wali_kelas (
	no_bayar char(11),
	bulan varchar(45),
	kelas varchar(45) PRIMARY KEY,
	foreign key (no_bayar) references tu(no_bayar) ON UPDATE RESTRICT ON DELETE RESTRICT);

create table lapor ( nis char(11) PRIMARY KEY,
	bulan varchar(45),
	kelas varchar(45),
	dsp double,
	tagihan_spp double,
	foreign key (nis) references siswa(nis) ON UPDATE RESTRICT ON DELETE RESTRICT,
	foreign key (kelas) references wali_kelas(kelas) ON UPDATE RESTRICT ON DELETE RESTRICT);