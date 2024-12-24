CREATE DATABASE stock_manager;
USE stock_manager;

CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO products (name, description, quantity, price) VALUES
('Notebook Dell', 'Inspiron 15 8GB RAM 256GB SSD', 15, 3599.99),
('Mouse Gamer', 'RGB 12000DPI', 50, 199.90),
('Teclado Mecânico', 'Switch Blue RGB', 30, 299.90),
('Monitor 24"', 'Full HD IPS 75Hz', 20, 899.90),
('Webcam HD', '1080p com microfone', 40, 159.90),
('SSD 480GB', 'Leitura 550MB/s', 100, 299.90),
('Memória RAM 8GB', 'DDR4 3200MHz', 60, 199.90),
('Headset Gamer', '7.1 Surround Sound', 25, 249.90),
('Placa de Vídeo', 'RTX 3060 12GB', 10, 2499.90),
('Fonte 650W', '80 Plus Bronze', 35, 399.90);