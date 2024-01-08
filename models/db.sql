-- Active: 1651820926135@@127.0.0.1@3306@pkh
CREATE TABLE bantuan (
  id_bantuan INT AUTO_INCREMENT PRIMARY KEY,
  jenis_bantuan VARCHAR(30) NOT NULL,
  nama_bantuan VARCHAR(30),
  bulan_bantuan VARCHAR(15),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE pendamping (
  id_pendamping INT AUTO_INCREMENT PRIMARY KEY,
  kode_pendamping CHAR(15),
  nama_pendamping VARCHAR(30)
);

CREATE TABLE pendidikan (
  id_pendidikan INT AUTO_INCREMENT PRIMARY KEY,
  pendidikan VARCHAR(50)
);

INSERT INTO
  pendidikan (pendidikan)
VALUES
  ('TK'),
  ('SD'),
  ('SMP'),
  ('SMA'),
  ('D3'),
  ('S1'),
  ('S2'),
  ('S3');

CREATE TABLE warga (
  id_warga INT AUTO_INCREMENT PRIMARY KEY,
  id_pendamping INT,
  no_kk INT(20),
  nama VARCHAR(50),
  tempat_lahir VARCHAR(30),
  tgl_lahir DATE,
  id_pendidikan INT,
  pekerjaan VARCHAR(30),
  penghasilan VARCHAR(30),
  no_hp INT(12),
  no_rek INT(20),
  kd_pos INT(10),
  desa_kel VARCHAR(75),
  kec VARCHAR(50),
  kab_kota VARCHAR(50),
  prov VARCHAR(50),
  jumlah_anak INT,
  jumlah_sd INT,
  jumlah_smp INT,
  jumlah_sma INT,
  jumlah_balita INT,
  jumlah_bumil INT,
  jumlah_lansia INT,
  jumlah_disabilitas INT,
  nama_desa VARCHAR(50),
  FOREIGN KEY (id_pendamping) REFERENCES pendamping(id_pendamping) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (id_pendidikan) REFERENCES pendidikan(id_pendidikan) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE berita (
  id_berita INT AUTO_INCREMENT PRIMARY KEY,
  nama_berita VARCHAR(50),
  deskripsi TEXT,
  author VARCHAR(50),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE sejarah (
  id_sejarah INT AUTO_INCREMENT PRIMARY KEY,
  deskripsi TEXT
);

INSERT INTO
  sejarah (deskripsi)
VALUES
  ('');

CREATE TABLE visi (
  id_visi INT AUTO_INCREMENT PRIMARY KEY,
  deskripsi TEXT
);

INSERT INTO
  visi (deskripsi)
VALUES
  ('');

CREATE TABLE misi (
  id_misi INT AUTO_INCREMENT PRIMARY KEY,
  deskripsi TEXT
);

INSERT INTO
  misi (deskripsi)
VALUES
  ('');