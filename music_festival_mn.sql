DROP DATABASE IF EXISTS music_festival_mn;
CREATE DATABASE music_festival_mn CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE music_festival_mn;

CREATE TABLE genre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE stage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL
);

CREATE TABLE band (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    stage_id INT NOT NULL,
    genre_id INT NOT NULL,
    FOREIGN KEY (stage_id) REFERENCES stage(id),
    FOREIGN KEY (genre_id) REFERENCES genre(id)
);

CREATE TABLE band_member (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    band_id INT NOT NULL,
    FOREIGN KEY (band_id) REFERENCES band(id)
);

CREATE TABLE attendees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE attendee_band (
    attendee_id INT NOT NULL,
    band_id INT NOT NULL,
    PRIMARY KEY (attendee_id, band_id),
    FOREIGN KEY (attendee_id) REFERENCES attendees(id),
    FOREIGN KEY (band_id) REFERENCES band(id)
);

INSERT INTO genre (id, name, description) VALUES
(1, 'Pop', 'Popular music for a wide audience.'),
(2, 'Rock', 'Music with guitars, drums and strong energy.'),
(3, 'Indie', 'Alternative and independent music with a softer atmosphere.'),
(4, 'Folk', 'Acoustic music focused on melody and storytelling.');

INSERT INTO stage (id, name, location) VALUES
(1, 'Main Stage', 'The biggest stage near the entrance.'),
(2, 'Lake Stage', 'A smaller stage next to the lake.'),
(3, 'Night Stage', 'Indoor stage for evening concerts.');

INSERT INTO band (id, name, photo, stage_id, genre_id) VALUES
(1, 'Sunday1994', 'uploads/sunday1994.jpg', 2, 3),
(2, 'One Direction', 'uploads/1d.webp', 1, 1),
(3, 'GreenDay', 'uploads/greenday.webp', 1, 2),
(4, 'The National', 'uploads/thenational.jpg', 3, 4);

INSERT INTO band_member (name, band_id) VALUES
('Harry Styles', 2),
('Billie Joe Armstrong', 3),
('Mike Dirnt', 3),
('Matt Berninger', 4);

INSERT INTO attendees (id, name) VALUES
(1, 'Archer'),
(2, 'Inez'),
(3, 'Chloe');

INSERT INTO attendee_band (attendee_id, band_id) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 1),
(3, 4);
