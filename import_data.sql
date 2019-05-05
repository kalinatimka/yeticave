INSERT INTO category (title) VALUES
  ('Доски и лыжи'),
  ('Крепления'),
  ('Ботинки'),
  ('Одежда'),
  ('Инструменты'),
  ('Разное');

INSERT INTO user (register_date, email, name, password, avatar_link, contact_data) VALUES
  ('2019-04-25 15:07:00', 'ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', '/img/upload/avatar.jpg', 'ignat.v@gmail.com'),
  (NOW(), 'kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', '/img/upload/avatar.jpg', '+7(900)000-21-34'),
  (NOW(), 'warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', '/img/upload/user.jpg', 'Зеленоград, Старое Крюково');

INSERT INTO lot (id_creator, id_winner, id_category, creating_date, `name`, description, image_link, start_price, end_date, bet_step, fav_count) VALUES
  (3, NULL, 1, '2019-04-25 15:07:00', '2014 Rossignol District Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'img/lot-1.jpg', 10999, '2019-07-01 00:00:00', 200, 5),
  (1, NULL, 1, '2019-04-12 10:00:00', 'DC Ply Mens 2016/2017 Snowboard', 'Этот, ставший уже легендарным, сноуборд наверняка разменяет еще не один десяток лет. Традиционный погиб в сочетании с направленной геометрией делает доску точной и маневренной. Карбоновые нити, уложенные под углом в 45 градусов, определяют торсионную жесткость доски, которая делает ее упругой и отзывчивой, а расширенные канты в области креплений делают доску более стабильной на жестком рельефе, позволяя развивать большие скорости.', 'img/lot-2.jpg', 159999,'2019-06-27 00:00:00', 2000, 0),
  (2, NULL, 2, '2019-04-12 14:10:07', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Эргономичный хайбэк, амортизирующие вставки и, безусловно, лучшие стрепы и бакли в индустрии.', 'img/lot-3.jpg', 8000, '2019-05-30 00:00:00', 100, 0),
  (2, NULL, 3, '2019-04-12 10:00:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Вы можете распаковать их из коробки даже у подъемника, ощущения будут такие, что вы катаетесь в них уже много лет. Надежный и теплый внутренник, теплоотражающая фольга - в них Вы сможете пережить даже самую низкую температуру, будь то парк или бэккантри.', 'img/lot-4.jpg', 10999, '2019-07-10 00:00:00', 400, 8),
  (1, NULL, 4, '2019-04-14 12:30:27', 'Куртка для сноуборда DC Mutiny Charocal', 'Водонепроницаемая мембранная ткань и качественный синтетический утеплитель позволят выходить на склон в холодную погоду, а в случае потепления вентиляционные отверстия с готовностью помогут оптимизировать температуру под личные предпочтения.', 'img/lot-5.jpg', 7500, '2019-08-15 00:00:00', 200, 3),
  (3, NULL, 5, NOW(), 'Маска Oakley Canopy', 'Инженеров Oakley вдохновили забрала шлемов лётчиков-истребителей. В результате, эта маска получила непревзойдённый угол обзора, широкий ремень с силиконовыми нитями для надёжной фиксации и механизм быстрой смены линз. Дополнительный бонус: маска совместима с большинством моделей шлемов для катания.', 'img/lot-6.jpg', 5400, '2019-07-20 00:00:00', 50, 15);

INSERT INTO bet (dateNtime, price, id_user, id_lot) VALUES
  ('2019-04-05 11:17:09', 11500, 3, 1),
  ('2019-04-08 00:21:00', 10500, 1, 1),
  ('2019-04-10 19:05:00', 11000, 1, 1),
  (NOW(), 10000, 2, 1);
