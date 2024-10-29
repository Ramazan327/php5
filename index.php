<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <style>
        /* Основные стили */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .tov {
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        h1,
        h2 {
            text-align: center;
            color: #444;
        }

        /* Карточка товара */
        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Форма */
        form {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"],
        form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #5a67d8;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #434190;
        }

        /* Разделитель */
        .form-section {
            margin-bottom: 30px;
        }

        /* Отступы */
        .product-list p {
            margin: 0;
        }
    </style>
</head>

<body>

    <h1>Каталог</h1>

    <!-- Форма для добавления товара -->
    <h2>Добавления</h2>
    <form action="add_product.php" method="POST">
        <label for="name">Имя:</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Описание:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="price">Цена:</label>
        <input type="number" name="price" step="0.01" required>
        <br>
        <label for="category">Категория:</label>
        <input type="text" name="category" required>
        <br>
        <input type="submit" value="Add Product">
    </form>

    <!-- Форма для поиска товаров -->
    <h2>Поиск</h2>
    <form action="search.php" method="GET">
        <label for="keyword">Название:</label>
        <input type="text" name="keyword" required>
        <input type="submit" value="Search">
    </form>

    <!-- Форма для фильтрации товаров -->
    <h2>Фильтрация</h2>
    <form action="filter.php" method="GET">
        <label for="category">Категория:</label>
        <input type="text" name="category">
        <br>
        <label for="minPrice">Мин цена:</label>
        <input type="number" name="minPrice" step="0.01">
        <br>
        <label for="maxPrice">Макс цена:</label>
        <input type="number" name="maxPrice" step="0.01">
        <br>
        <input type="submit" value="Filter">
    </form>

    <!-- Вывод каталога -->
    <h2>Каталог</h2>
    <div class="tov">
        <?php
        include 'connect.php';
        include 'functions.php';

        $products = getCatalog();
        if ($products) {
            foreach ($products as $product) {
                echo "<p>{$product['name']} - {$product['price']} - {$product['category']}</p>";
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </div>

</body>

</html>