# symfony-console-app

## PHP part

### Setup

1. install vendors from composer
`$ composer install`

2. start project autoload
`$ composer dump -o`

### How use

App has 2 commands:

1. Get employee permissions:
`$ bin/console permission-list <employee>`

2. Check is emloyee has permission:
`bin/console is-can <employee> <permissions>`

### Data

##### Employees:

- designer
- developer
- manager
- tester

##### Permissions:

- art
- communicateWithManager
- createTask
- testCode
- writeCode

## SQL part

#### DataBase:

| categories |
| ------------ |
| id |
| name |
| parent_id |

| product_category |
| ------------ |
| product_id |
| category_id |

| products |
| ------------ |
| id |
| name |

a.
```
SELECT categories.title FROM products
INNER JOIN product_category ON products.id = product_category.product_id
INNER JOIN categories ON categories.id = product_category.category_id
WHERE products.id IN (9, 14, 6, 7, 2)
GROUP BY categories.id
```

b.
```
SELECT products.* FROM products
INNER JOIN product_category ON products.id = product_category.product_id
INNER JOIN categories ON categories.id = product_category.category_id
WHERE categories.id = 2 OR (categories.parent_id = 2b AND categories.id IN (3, 4, 5))
```

c.
```
SELECT COUNT(category_id) FROM product_category
WHERE category_id IN (7, 8, 9)
GROUP BY category_id
```

d.
```
SELECT COUNT(products.id) FROM products
INNER JOIN product_category ON products.id = product_category.product_id
WHERE product_category.category_id IN (3, 4, 5)
GROUP BY products.id
```

e. (MySQL)
```
SELECT * FROM categories
WHERE id=5
UNION
SELECT * FROM categories
WHERE id=(SELECT parent_id FROM categories WHERE id=5)
UNION
SELECT * FROM categories
WHERE id=(SELECT parent_id FROM categories WHERE id=(SELECT parent_id FROM categories WHERE id=5))
UNION
SELECT * FROM categories
WHERE id=(SELECT parent_id FROM categories WHERE id=(SELECT parent_id FROM categories WHERE id=(SELECT parent_id FROM categories WHERE id=5)))
```

e. (PHP)
```
function breadcrumbsElements($id) {b
    $query = 'SELECT * FROM categories WHERE id = ' . $id;
    //getQueryResult is current sql getter
    $category = getQueryResult($query);
    $breadcrumbs = [$category];
    if (!is_null(($parentId = $category['parent_id']))) {
        $breadcrumbs .= breadcrumbsElements($parentId);
    }
    return $breadcrumbs;
}

$breadcrumbs = breadcrumbsElements(5);
```
