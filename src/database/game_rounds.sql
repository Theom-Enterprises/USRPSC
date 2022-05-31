CREATE TABLE RUNDE
(
    zeitpunkt DATETIME,
    spieler1  VARCHAR(25),
    spieler2  VARCHAR(25),
    symbol1   VARCHAR(10),
    symbol2   VARCHAR(10)
);

INSERT INTO RUNDE (zeitpunkt, spieler1, spieler2, symbol1, symbol2)
VALUES ('2022-05-20 09:05', 'Max', 'Otto', 'Schere', 'Stein'),
       ('2022-05-21 10:45', 'Max', 'Otto', 'Stein', 'Schere'),
       ('2022-05-21 11:00', 'Max', 'Otto', 'Papier', 'Papier'),
       ('2022-05-22 08:15', 'Max', 'Otto', 'Papier', 'Stein'),
       ('2022-05-24 09:50', 'Max', 'Otto', 'Schere', 'Papier');

DELETE FROM RUNDE;