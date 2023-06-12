INSERT INTO role (name_role)
    VALUES
    ('admin'),
    ('worker');

INSERT INTO users (email_users, password_users, id_role)
    VALUES
    ('V.parrot@gmail.com', 'Parrot123', 1),
    ('Armand@gmail.com', 'Armand123', 2),
    ('Marine@gmail.com', 'Marinette', 2);

INSERT INTO garage (name_garage, adress_garage, phone_garage)
    VALUES
    ('V.Parrot', 'Toulouse 31200', '0654454534');

