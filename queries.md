# Requêtes SQL

<https://dev.mysql.com/doc/refman/5.5/en/select.html>  

## Accueil

### Récupérer les 5 premières catégories

<details><summary>La requête</summary>

```sql
SELECT *
FROM `category`
WHERE `home_order` != 0
ORDER BY `home_order` ASC
LIMIT 5
```

</details>

## Catégorie

### Récupérer les informations de la catégorie

<details><summary>La requête</summary>

```sql
SELECT *
FROM `category`
WHERE `id` = 1;
```

</details>

### Récupérer la liste des produits associés à une catégorie

<details><summary>La requête</summary>

```sql
SELECT
  `product`.*,
  `type`.`name` AS 'typeName'
FROM `product`
JOIN `type` on `type`.`id` = `product`.`type_id`
WHERE `category_id` = 1;
```

</details>

## Type

### Récupérer les informations du type

<details><summary>La requête</summary>

```sql
SELECT *
FROM `type`
WHERE `id` = 1;
```

</details>

### Récupérer la liste des produits associés à un type

<details><summary>La requête</summary>

```sql
SELECT *
FROM `product`
WHERE `type_id` = 1;
```

</details>

## Marque

### Récupérer les informations de la marque

<details><summary>La requête</summary>

```sql
SELECT *
FROM `brand`
WHERE `id` = 2;
```

</details>

### Récupérer la liste des produits d'une marque

<details><summary>La requête</summary>

```sql
SELECT
  `product`.*,
  `type`.`name` AS 'typeName'
FROM `product`
JOIN `type` on `type`.`id` = `product`.`type_id`
WHERE `brand_id` = 2;
```

</details>

## Produit

### Récupérer les informations d'un produit

<details><summary>La requête</summary>

```sql
SELECT
  `product`.*,
  `brand`.`name` AS 'brandName',
  `category`.`name` AS 'categoryName',
  `type`.`name` AS 'typeName'
FROM `product`
JOIN `brand` ON `brand`.`id` = `product`.`brand_id`
JOIN `category` ON `category`.`id` = `product`.`category_id`
JOIN `type` ON `type`.`id` = `product`.`type_id`
WHERE `product`.`id` = 1
```

</details>

## BONUS - Panier

### Récupérer la liste des produits ajoutés dans le panier

<details><summary>La requête</summary>

```sql
SELECT *
FROM `product`
WHERE
  `id` = 1
  OR `id` = 2
  OR `id` = 3;

SELECT *
FROM `product`
WHERE
  `id` IN(1, 2, 3);
```

</details>

## Footer

### Récupérer les 5 premiers types

<details><summary>La requête</summary>

```sql
SELECT *
FROM `type`
WHERE `footer_order` != 0
ORDER BY `footer_order` ASC
LIMIT 5;
```

### Récupérer les 5 premières marques

<details><summary>La requête</summary>

```sql
SELECT *
FROM `brand`
WHERE `footer_order` != 0
ORDER BY `footer_order` ASC
LIMIT 5;
```

</details>
