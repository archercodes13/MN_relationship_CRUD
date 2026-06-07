# PHP M:N Music Festival

This is a simple PHP CRUD application created for practicing database relationships.

The project demonstrates an M:N relationship between attendees and bands.

One attendee can save many bands to their festival program, and one band can be saved by many attendees. This relationship is solved using a connection table called `attendee_band`.

## Main features

- CRUD for bands
- CRUD for genres
- CRUD for stages
- CRUD for attendees
- CRUD for band members
- image upload for bands
- detail pages
- JOIN queries
- M:N relationship between attendees and bands
- adding a band to an attendee
- removing a band from an attendee
- deleting related records from the connection table

## Database relationships

- One stage can have many bands
- One genre can have many bands
- One band can have many band members
- One attendee can save many bands
- One band can be saved by many attendees

## Main M:N table

```txt
attendee_band
- attendee_id
- band_id
