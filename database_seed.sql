-- Users
INSERT INTO users (id, name, email, profile_picture, created_at) VALUES
(1, 'Jane Smith', 'jane.smith@example.com', 'profile1.jpg', '2024-07-01'),
(2, 'John Doe', 'john.doe@example.com', 'profile2.jpg', '2024-07-02'),
(3, 'Alice Brown', 'alice.brown@example.com', 'profile4.jpg', '2024-07-03');

-- Locations
INSERT INTO locations (id, name, address, city, country) VALUES
(1, 'Gent Expo', 'Maaltekouter 1', 'Gent', 'Belgium'),
(2, 'Flanders Expo', 'Flanderslaan 1', 'Ghent', 'Belgium');

-- Categories
INSERT INTO categories (id, name) VALUES
(1, 'Tech'),
(2, 'Art'),
(3, 'Music');

-- Events
INSERT INTO events (id, name, description, start_date, end_date, location_id, category_id) VALUES
(1, 'Tech Conference', 'A conference about technology.', '2024-08-10', '2024-08-12', 1, 1),
(2, 'Art Expo', 'An exhibition of modern art.', '2024-09-05', '2024-09-07', 2, 2),
(3, 'Music Festival', 'Live music from top artists.', '2024-10-15', '2024-10-17', 1, 3);

-- Tickets
INSERT INTO tickets (id, user_id, event_id, price, ticket_code, created_at) VALUES
(1, 1, 1, 49.99, 'TICKET-1A2B3C', '2024-07-10'),
(2, 2, 2, 29.99, 'TICKET-4D5E6F', '2024-07-11'),
(3, 3, 3, 59.99, 'TICKET-7G8H9I', '2024-07-12'),
(4, 1, 3, 59.99, 'TICKET-ABCDEF', '2024-07-13');
