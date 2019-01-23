-- view_products_list
 select
`products`.`id` AS `id`,`products`.`title` AS `title`,
`products`.`description` AS `description`,
`products`.`main_cat_id` AS `main_cat_id`,
`products`.`price` AS `price`,
`products`.`reseller_id` AS `reseller_id`,
`products`.`sub_cat_id` AS `sub_cat_id`,
`view_category_detail`.`sub_cat_name` AS `sub_cat`,
`products`.`visits` AS `visits`,
`products`.`created_at` AS `created_at`,
`products`.`updated_at` AS `updated_at`,
`products`.`num_buys` AS `num_buys`,
`view_category_detail`.`parent_cat` AS `main_cat`,
`resellers`.`reseller_firstname` AS `reseller_firstname`,
`resellers`.`reseller_lastname` AS `reseller_lastname`,
group_concat(`product_images`.`image` separator ',') AS `images`
from products
left join view_category_detail on products.sub_cat_id = view_category_detail.id
left join product_images on products.id = product_images.product_id
left join resellers on products.reseller_id = resellers.id
group by products.id
