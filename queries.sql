SELECT title FROM category;

SELECT lot.NAME, lot.start_price, lot.image_link, MAX(bet.price) AS price, COUNT(bet.id) AS count, category.title
FROM lot
JOIN category
ON lot.id_category = category.id
JOIN bet
ON lot.id = bet.id_lot
WHERE lot.id_winner IS NULL
GROUP BY lot.id;

SELECT name, description, image_link, fav_count, category.title FROM lot
JOIN category
ON lot.id_category = category.id
WHERE id = 3;
