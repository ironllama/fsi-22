CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    timeslot DATETIME NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    numpeeps INT NOT NULL DEFAULT 1,
    code VARCHAR(255),
    is_active TINYINT NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

-- TRUNCATE reservation;
-- ALTER TABLE table_name AUTO_INCREMENT = 1;
