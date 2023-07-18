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

INSERT INTO ad (id_car, title_car, price_car, model_car, km_car, year_car)
    VALUES
    (1, 'Mercodeluxe', 65 455, 'merco' 13455, 2005, null);

INSERT INTO hour (id_hour, monday_hour, tuesday_hour, wednesday_hour, thursday_hour, friday_hour, saturday_hour, sunday_hour)
    VALUES
    (1, '8H45-12H00, 14H00-18H00', '8H45-12H00, 14H00-18H00', '8H45-12H00', 'FERME');

INSERT INTO service (id_service, title_service, description_service, price_service, image_service)
    VALUES
    (1, 'Entretien', 'Amortiseurs, pneumatique, vitrage, batterie, peux importe nous nous occipons de votre bijoux ', '100', "../../assets/Images/Images/Entretien.jpg"),
    (2, 'Peinture', "Un Covering, une petite retouche, nous trouverons la couleurs adapter a ce que soiuhaiter pour refaire ou modifier l'estéthique", '250', "../../assets/Images/Images/Peinture.jpg"),
    (3, 'Vidange', 'Nous vidons et nettoyons vos reservoir', '133', '../../assets/Images/Images/vidange.png');

INSERT INTO review (id_review, name_review, surname_review, grade_review, comment_review, accept_review)
    VALUES
    (1, 'Jean', 'Dupont', '5', "Excellent garage je recommande !", 1),
    (2, 'Marine', 'Duprés', '5', "Rapide, et sans vous prendre pour des cons ! !", 1),
    (3, 'pascale', 'Duchamps', '4', "Seul petit bémol vous êtes fermé le dimanche sinon c'étais 5/5 :P!", 1);