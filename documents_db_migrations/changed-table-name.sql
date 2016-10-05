#changes from 4.10.16
#change table name 'users' to 'admins'
RENAME TABLE `users` TO `admins`;

#change field id_user to id_admin
ALTER TABLE admins CHANGE id_user id_admin INT UNSIGNED NOT NULL AUTO_INCREMENT;

#change constraint
ALTER TABLE posts
DROP FOREIGN KEY `id_user_fk`,
ADD CONSTRAINT `id_admin_fk` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);