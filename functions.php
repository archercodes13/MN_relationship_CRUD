<?php

function getGenres($sql) {
    return $sql->query("SELECT * FROM genre ORDER BY name")->fetchAll();
}

function getGenre($sql, $id) {
    $stmt = $sql->prepare("SELECT * FROM genre WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addGenre($sql, $name, $description) {
    $stmt = $sql->prepare("INSERT INTO genre (name, description) VALUES (?, ?)");
    $stmt->execute([$name, $description]);
}

function editGenre($sql, $id, $name, $description) {
    $stmt = $sql->prepare("UPDATE genre SET name = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $description, $id]);
}

function deleteGenre($sql, $id) {
    $bands = getBandsWithGenre($sql, $id);

    foreach($bands as $band) {
        deleteBand($sql, $band["id"]);
    }

    $stmt = $sql->prepare("DELETE FROM genre WHERE id = ?");
    $stmt->execute([$id]);
}

function getBandsWithGenre($sql, $id) {
    $stmt = $sql->prepare("
        SELECT band.*, stage.name AS stage, genre.name AS genre
        FROM band
        JOIN stage ON band.stage_id = stage.id
        JOIN genre ON band.genre_id = genre.id
        WHERE band.genre_id = ?
        ORDER BY band.name
    ");
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}

function getStages($sql) {
    return $sql->query("SELECT * FROM stage ORDER BY name")->fetchAll();
}

function getStage($sql, $id) {
    $stmt = $sql->prepare("SELECT * FROM stage WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addStage($sql, $name, $location) {
    $stmt = $sql->prepare("INSERT INTO stage (name, location) VALUES (?, ?)");
    $stmt->execute([$name, $location]);
}

function editStage($sql, $id, $name, $location) {
    $stmt = $sql->prepare("UPDATE stage SET name = ?, location = ? WHERE id = ?");
    $stmt->execute([$name, $location, $id]);
}

function deleteStage($sql, $id) {
    $bands = getBandsWithStage($sql, $id);

    foreach($bands as $band) {
        deleteBand($sql, $band["id"]);
    }

    $stmt = $sql->prepare("DELETE FROM stage WHERE id = ?");
    $stmt->execute([$id]);
}

function getBandsWithStage($sql, $id) {
    $stmt = $sql->prepare("
        SELECT band.*, stage.name AS stage, genre.name AS genre
        FROM band
        JOIN stage ON band.stage_id = stage.id
        JOIN genre ON band.genre_id = genre.id
        WHERE band.stage_id = ?
        ORDER BY band.name
    ");
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}

function getBands($sql) {
    return $sql->query("
        SELECT band.*, stage.name AS stage, genre.name AS genre
        FROM band
        JOIN stage ON band.stage_id = stage.id
        JOIN genre ON band.genre_id = genre.id
        ORDER BY band.name
    ")->fetchAll();
}

function getBand($sql, $id) {
    $stmt = $sql->prepare("
        SELECT band.*, stage.name AS stage, genre.name AS genre
        FROM band
        JOIN stage ON band.stage_id = stage.id
        JOIN genre ON band.genre_id = genre.id
        WHERE band.id = ?
    ");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addBand($sql, $name, $photo, $stage_id, $genre_id) {
    $stmt = $sql->prepare("
        INSERT INTO band (name, photo, stage_id, genre_id)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->execute([$name, $photo, $stage_id, $genre_id]);
}

function editBand($sql, $id, $name, $photo, $stage_id, $genre_id) {
    $stmt = $sql->prepare("
        UPDATE band
        SET name = ?, photo = ?, stage_id = ?, genre_id = ?
        WHERE id = ?
    ");
    $stmt->execute([$name, $photo, $stage_id, $genre_id, $id]);
}

function deleteBand($sql, $id) {
    $stmt = $sql->prepare("DELETE FROM band_member WHERE band_id = ?");
    $stmt->execute([$id]);

    $stmt = $sql->prepare("DELETE FROM attendee_band WHERE band_id = ?");
    $stmt->execute([$id]);

    $stmt = $sql->prepare("DELETE FROM band WHERE id = ?");
    $stmt->execute([$id]);
}

function getBandMembersByBand($sql, $band_id) {
    $stmt = $sql->prepare("
        SELECT *
        FROM band_member
        WHERE band_id = ?
        ORDER BY name
    ");
    $stmt->execute([$band_id]);
    return $stmt->fetchAll();
}

function addBandMember($sql, $name, $band_id) {
    $stmt = $sql->prepare("INSERT INTO band_member (name, band_id) VALUES (?, ?)");
    $stmt->execute([$name, $band_id]);
}

function getAttendees($sql) {
    return $sql->query("SELECT * FROM attendees ORDER BY name")->fetchAll();
}

function getAttendee($sql, $id) {
    $stmt = $sql->prepare("SELECT * FROM attendees WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addAttendee($sql, $name) {
    $stmt = $sql->prepare("INSERT INTO attendees (name) VALUES (?)");
    $stmt->execute([$name]);
}

function editAttendee($sql, $id, $name) {
    $stmt = $sql->prepare("UPDATE attendees SET name = ? WHERE id = ?");
    $stmt->execute([$name, $id]);
}

function deleteAttendee($sql, $id) {
    $stmt = $sql->prepare("DELETE FROM attendee_band WHERE attendee_id = ?");
    $stmt->execute([$id]);

    $stmt = $sql->prepare("DELETE FROM attendees WHERE id = ?");
    $stmt->execute([$id]);
}

function getBandsByAttendee($sql, $attendee_id) {
    $stmt = $sql->prepare("
        SELECT band.*, genre.name AS genre, stage.name AS stage
        FROM band
        JOIN attendee_band ON band.id = attendee_band.band_id
        JOIN genre ON band.genre_id = genre.id
        JOIN stage ON band.stage_id = stage.id
        WHERE attendee_band.attendee_id = ?
        ORDER BY band.name
    ");
    $stmt->execute([$attendee_id]);
    return $stmt->fetchAll();
}

function getAttendeesByBand($sql, $band_id) {
    $stmt = $sql->prepare("
        SELECT attendees.*
        FROM attendees
        JOIN attendee_band ON attendees.id = attendee_band.attendee_id
        WHERE attendee_band.band_id = ?
        ORDER BY attendees.name
    ");
    $stmt->execute([$band_id]);
    return $stmt->fetchAll();
}

function addBandToAttendee($sql, $attendee_id, $band_id) {
    $stmt = $sql->prepare("
        INSERT IGNORE INTO attendee_band (attendee_id, band_id)
        VALUES (?, ?)
    ");
    $stmt->execute([$attendee_id, $band_id]);
}

function deleteBandFromAttendee($sql, $attendee_id, $band_id) {
    $stmt = $sql->prepare("
        DELETE FROM attendee_band
        WHERE attendee_id = ? AND band_id = ?
    ");
    $stmt->execute([$attendee_id, $band_id]);
}

?>
