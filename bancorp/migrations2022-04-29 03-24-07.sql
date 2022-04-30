Select id, migration, batch from bancorp.migrations
USE bancorp;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO bancorp.migrations(id,migration,batch) VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO bancorp.migrations(id,migration,batch) VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO bancorp.migrations(id,migration,batch) VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO bancorp.migrations(id,migration,batch) VALUES (4,'2019_12_14_000001_create_personal_access_tokens_table',1);
