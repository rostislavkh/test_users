<?php
return [
    // Я хардкод категорично НЕ підтримую
    // Роблю так тільки тому, що так написано в ТЗ. Хоча якби треба було зробити правильно, то я б записував його в БД + хешував би пароль і звичайно ж авторизував би користувача. (Або просто використав би стандартну авторизацію Laravel, просто за необхідності трохи б її переробив під себе)
    'users' => [
        ['id' => 1, 'name' => 'Олександр', 'surname' => 'Іваненко', 'email' => 'ivanenko.a@example.com', 'password' => 'kQv7T5zp'],
        ['id' => 2, 'name' => 'Дмитро', 'surname' => 'Ковальчук', 'email' => 'kovalchuk.d@example.com', 'password' => '3La1Wjgf'],
        ['id' => 3, 'name' => 'Віталій', 'surname' => 'Мельник', 'email' => 'melnik.v@example.com', 'password' => 'hKf9G8kZ'],
        ['id' => 4, 'name' => 'Тетяна', 'surname' => 'Григоренко', 'email' => 'hryhoreko.t@example.com', 'password' => 'bSx6J0nE'],
        ['id' => 5, 'name' => 'Юлія', 'surname' => 'Кравченко', 'email' => 'kravchenko.y@example.com', 'password' => 'qRm5F9cH'],
        ['id' => 6, 'name' => 'Ігор', 'surname' => 'Поляков', 'email' => 'polyakov.i@example.com', 'password' => 'sNt4D2zA'],
        ['id' => 7, 'name' => 'Наталя', 'surname' => 'Кузнецова', 'email' => 'kuznetsova.n@example.com', 'password' => 'eUy3B8jV'],
        ['id' => 8, 'name' => 'Олексій', 'surname' => 'Лисенко', 'email' => 'lysenko.o@example.com', 'password' => 'fGv0X9bP'],
        ['id' => 9, 'name' => 'Вікторія', 'surname' => 'Чернишева', 'email' => 'chernysheva.v@example.com', 'password' => 'lMn6R4qS'],
        ['id' => 10, 'name' => 'Євген', 'surname' => 'Костенко', 'email' => 'kostenko.e@example.com', 'password' => 'dZa7Y2rT']
    ]
];
