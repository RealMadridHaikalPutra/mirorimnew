//how to compare two table in php?
SELECT * from db_gallery WHERE db_gallery.image IN (SELECT gallery_image FROM db_special_image WHERE db_gallery.subcat_id = db_special_image.subcat_id)


SELECT * from db_gallery INNER JOIN db_special_image ON db_gallery.subcat_id = db_special_image.subcat_id AND db_gallery.image=db_special_image.gallery_image




<!--DELIMITER-->Source: https://stackoverflow.com/questions/43315908






