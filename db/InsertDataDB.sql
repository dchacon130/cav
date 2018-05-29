/*INSERT DB CAVDB*/
INSERT INTO `city` (`id`, `name`, `description`, `state`) VALUES (NULL, 'Bogotá', 'BOGOTA', '1'), (NULL, 'Medellin', 'MEDELLIN', '1');
INSERT INTO `document_type` (`id`, `name`, `description`, `state`) VALUES (NULL, 'CC', 'Cedula Ciudadania', '1'), (NULL, 'CE', 'Cedula Extrangeria', '1');
INSERT INTO `profile` (`id`, `name`, `description`, `state`) VALUES (NULL, 'GE', 'Gerente', '1'), (NULL, 'SC', 'Soporte Comercial', '1');
INSERT INTO `segmento` (`id`, `name`, `description`, `state`) VALUES (NULL, 'Distribuidores', 'Distribuidores', '1');
INSERT INTO `user` (`id`, `document_type_id`, `document`, `name`, `lastname`, `birthday`, `email`, `phone`, `address`, `city_id`, `user`, `password`, `profile_id`, `date_sys`, `state`) VALUES (NULL, '1', '1024478130', 'Diego', 'Chacón', '1987-11-19 00:00:00', 'diego.chacon@freelancediego.website', '3104823098', 'av cali # 88-81', '1', 'diego.chacon', '123', '1', '2018-05-16 00:00:00', '1');
INSERT INTO `company` (`id`, `user_id`, `name`, `document_type_id`, `document`, `dv`, `address`, `city_id`, `phone`, `date_sys`, `state`) VALUES (NULL, '1', 'Load IT', '1', '1234567890', '0', 'av cali # 88-81', '1', '3104558899', '2018-05-16 00:00:00', '1');
INSERT INTO `sede` (`id`, `company_id`, `name`, `phone`, `address`, `date_sys`, `state`) VALUES (NULL, '1', 'Sede A', '3104823098', 'av cali # 88-81 A', '2018-05-16 00:00:00', '1');
INSERT INTO `sede` (`id`, `company_id`, `name`, `phone`, `address`, `date_sys`, `state`) VALUES (NULL, '1', 'Sede B', '3102589645', 'av cali # 88-81 B', '2018-05-16 00:00:00', '1');
INSERT INTO `sede` (`id`, `company_id`, `name`, `phone`, `address`, `date_sys`, `state`) VALUES (NULL, '1', 'Sede C', '3102369875', 'av cali # 88-81 C', '2018-05-16 00:00:00', '1');
