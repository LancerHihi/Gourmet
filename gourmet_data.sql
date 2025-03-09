-- Insert data into Reviewer table
INSERT INTO Reviewer (ID, Username, Email, Biography, Location, Num_post, TITLE) VALUES
('R001', 'FoodieFan123', 'foodiefan@email.com', 'I love exploring new cuisines.', 'New York', 15, 'Advanced'),
('R002', 'GourmetGal', 'gourmetgal@email.com', 'Passionate about fine dining.', 'Paris', 22, 'Expert'),
('R003', 'BurgerBoy', 'burgerboy@email.com', 'Fast food enthusiast.', 'London', 8, 'Immediate'),
('R004', 'SweetTooth', 'sweettooth@email.com', 'Dessert lover.', 'Tokyo', 12, 'Advanced'),
('R005', 'CafeCritic', 'cafecritic@email.com', 'Coffee and cafe reviews.', 'Rome', 5, 'Amateur');

-- Insert data into Restaurent table
INSERT INTO Restaurent (ID, Res_name, Res_type, Location) VALUES
('RS001', 'Le Gourmet', 'Fine Dining', 'Paris'),
('RS002', 'Burger Heaven', 'Fast food', 'London'),
('RS003', 'Sushi Palace', 'Fine Dining', 'Tokyo'),
('RS004', 'Pizza Pronto', 'Fast food', 'Rome'),
('RS005', 'Cafe Aroma', 'Bistro', 'New York');

-- Insert data into Post table
INSERT INTO Post (Price, Postname, Post_datetime, Username, Description, Restaurent_ID, Restaurent_type, Rating, Image) VALUES
(35.50, 'Exquisite Steak Dinner', '2023-10-26 19:00:00', 'FoodieFan123', 'The steak was perfectly cooked.', 'RS001', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home1.jpg')),
(12.75, 'Ultimate Burger Combo', '2023-10-26 12:30:00', 'BurgerBoy', 'Best burger I have ever had!', 'RS002', 'Fast food', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home2.jpg')),
(42.00, 'Fresh Sushi Platter', '2023-10-27 20:00:00', 'SweetTooth', 'Amazing fresh sushi!', 'RS003', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home3.jpg')),
(9.99, 'Classic Pepperoni Pizza', '2023-10-27 18:00:00', 'CafeCritic', 'Quick and delicious pizza.', 'RS004', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home4.jpg')),
(8.50, 'Cappuccino and Croissant', '2023-10-28 09:00:00', 'GourmetGal', 'Perfect morning treat.', 'RS005', 'Bistro', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home5.jpg')),
(25.00, 'Tiramisu Delight', '2023-10-28 21:00:00', 'SweetTooth', 'The best tiramisu ever.', 'RS001', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home6.jpg')),
(15.00, 'Double Cheese burger', '2023-10-29 13:00:00', 'BurgerBoy', 'Delicious and filling', 'RS002', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home7.jpg')),
(50.00, 'Omakase Sushi', '2023-10-29 20:30:00', 'FoodieFan123', 'Incredible sushi experience.', 'RS003', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home1.jpg')),
(11.00, 'Margherita Pizza', '2023-10-30 18:30:00', 'CafeCritic', 'Simple and tasty pizza.', 'RS004', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home2.jpg')),
(7.00, 'Latte and Pastry', '2023-10-30 09:30:00', 'GourmetGal', 'Great coffee and pastry selection.', 'RS005', 'Bistro', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home3.jpg')),
(18.00, 'Spicy Chicken Wings', '2023-11-01 19:30:00', 'BurgerBoy', 'Crispy and flavorful wings.', 'RS002', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home4.jpg')),
(30.00, 'Seafood Paella', '2023-11-01 20:30:00', 'FoodieFan123', 'Rich and satisfying paella.', 'RS001', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home5.jpg')),
(10.50, 'Vegetarian Pizza', '2023-11-02 18:45:00', 'CafeCritic', 'Fresh and delicious veggies.', 'RS004', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home6.jpg')),
(6.50, 'Iced Caramel Latte', '2023-11-02 10:00:00', 'GourmetGal', 'Perfect for a warm day.', 'RS005', 'Bistro', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home7.jpg')),
(28.00, 'Tempura Platter', '2023-11-02 21:15:00', 'SweetTooth', 'Light and crispy tempura.', 'RS003', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home1.jpg')),
(14.50, 'Chicken Caesar Salad', '2023-11-03 12:00:00', 'FoodieFan123', 'Healthy and filling salad.', 'RS005', 'Bistro', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home2.jpg')),
(22.00, 'BBQ Ribs', '2023-11-03 19:45:00', 'BurgerBoy', 'Tender and smoky ribs.', 'RS002', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home3.jpg')),
(38.00, 'Lobster Bisque', '2023-11-03 20:45:00', 'GourmetGal', 'Creamy and flavorful soup.', 'RS001', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home4.jpg')),
(11.50, 'Hawaiian Pizza', '2023-11-04 18:30:00', 'CafeCritic', 'Sweet and savory pizza.', 'RS004', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home5.jpg')),
(7.50, 'Matcha Latte', '2023-11-04 10:30:00', 'SweetTooth', 'Smooth and earthy latte.', 'RS005', 'Bistro', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home6.jpg')),
(45.00, 'Sashimi Selection', '2023-11-04 21:00:00', 'FoodieFan123', 'Finest selection of sashimi.', 'RS003', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home7.jpg')),
(16.00, 'Club Sandwich', '2023-11-05 12:30:00', 'GourmetGal', 'Classic and satisfying sandwich.', 'RS005', 'Bistro', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home1.jpg')),
(24.00, 'Onion Rings', '2023-11-05 20:00:00', 'BurgerBoy', 'Crispy and golden onion rings.', 'RS002', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home2.jpg')),
(32.00, 'Duck Confit', '2023-11-05 21:00:00', 'SweetTooth', 'Perfectly cooked duck confit.', 'RS001', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home3.jpg')),
(12.00, 'Mushroom Pizza', '2023-11-06 18:15:00', 'CafeCritic', 'Earthy and delicious pizza.', 'RS004', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home4.jpg')),
(8.00, 'Chocolate Croissant', '2023-11-06 09:45:00', 'FoodieFan123', 'Flaky and chocolatey pastry.', 'RS005', 'Bistro', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home5.jpg')),
(40.00, 'Grilled Salmon', '2023-11-06 20:30:00', 'GourmetGal', 'Perfectly grilled salmon.', 'RS003', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home6.jpg')),
(17.50, 'BLT Sandwich', '2023-11-07 12:15:00', 'BurgerBoy', 'Classic BLT with crispy bacon.', 'RS005', 'Bistro', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home7.jpg')),
(26.00, 'Fried Chicken', '2023-11-07 19:15:00', 'CafeCritic', 'Crispy and juicy fried chicken.', 'RS002', 'Fast food', '4', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home1.jpg')),
(35.00, 'Beef Wellington', '2023-11-07 20:15:00', 'SweetTooth', 'Tender beef wellington.', 'RS001', 'Fine Dining', '5', LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/Lab_web/image/home2.jpg'));