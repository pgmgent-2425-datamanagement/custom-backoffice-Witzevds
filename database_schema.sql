-- Event Management System Database Schema
-- Created for Event Backoffice Application

-- Drop tables if they exist (in reverse order due to foreign key constraints)
DROP TABLE IF EXISTS event_user;
DROP TABLE IF EXISTS tickets;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS locations;
DROP TABLE IF EXISTS users;

-- Create USERS table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    profile_picture VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create LOCATIONS table
CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create CATEGORIES table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create EVENTS table
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    location_id INT NOT NULL,
    category_id INT NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Foreign key constraints
    CONSTRAINT fk_events_location FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE,
    CONSTRAINT fk_events_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    
    -- Check constraint to ensure end_date is after start_date
    CONSTRAINT chk_event_dates CHECK (end_date >= start_date)
);

-- Create TICKETS table
CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    ticket_code VARCHAR(50) NOT NULL UNIQUE,
    price DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Foreign key constraints
    CONSTRAINT fk_tickets_event FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    CONSTRAINT fk_tickets_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    
    -- Check constraint to ensure price is non-negative
    CONSTRAINT chk_ticket_price CHECK (price >= 0)
);

-- Create EVENT_USER junction table (many-to-many relationship)
CREATE TABLE event_user (
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    -- Primary key is composite
    PRIMARY KEY (event_id, user_id),
    
    -- Foreign key constraints
    CONSTRAINT fk_event_user_event FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    CONSTRAINT fk_event_user_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create indexes for better performance
CREATE INDEX idx_events_start_date ON events(start_date);
CREATE INDEX idx_events_location ON events(location_id);
CREATE INDEX idx_events_category ON events(category_id);
CREATE INDEX idx_tickets_event ON tickets(event_id);
CREATE INDEX idx_tickets_user ON tickets(user_id);
CREATE INDEX idx_tickets_code ON tickets(ticket_code);

-- Insert sample data for testing

-- Sample categories
INSERT INTO categories (name) VALUES 
('Conference'),
('Workshop'),
('Concert'),
('Festival'),
('Webinar'),
('Sports'),
('Art & Culture');

-- Sample locations
INSERT INTO locations (name, address, city, country) VALUES 
('Antwerp Convention Center', 'Koningin Astridplein 20', 'Antwerp', 'Belgium'),
('Brussels Expo', 'Atomiumsquare 1', 'Brussels', 'Belgium'),
('Ghent Opera House', 'Schouwburgstraat 3', 'Ghent', 'Belgium'),
('Leuven Music Hall', 'Bondgenotenlaan 15', 'Leuven', 'Belgium'),
('Hasselt Cultural Center', 'Kunstlaan 5', 'Hasselt', 'Belgium');

-- Sample users
INSERT INTO users (name, email, profile_picture) VALUES 
('John Doe', 'john.doe@example.com', 'profile1.jpg'),
('Jane Smith', 'jane.smith@example.com', 'profile2.jpg'),
('Bob Johnson', 'bob.johnson@example.com', NULL),
('Alice Brown', 'alice.brown@example.com', 'profile4.jpg'),
('Charlie Wilson', 'charlie.wilson@example.com', NULL);

-- Sample events
INSERT INTO events (name, description, start_date, end_date, location_id, category_id, image) VALUES 
('Tech Conference 2025', 'Annual technology conference featuring the latest innovations', '2025-08-15', '2025-08-17', 1, 1, 'tech_conf.jpg'),
('PHP Workshop', 'Hands-on PHP development workshop for beginners', '2025-07-20', '2025-07-20', 4, 2, 'php_workshop.jpg'),
('Summer Music Festival', 'Three-day outdoor music festival', '2025-07-25', '2025-07-27', 2, 4, 'music_fest.jpg'),
('Modern Art Exhibition', 'Contemporary art showcase', '2025-08-01', '2025-08-31', 3, 7, 'art_expo.jpg'),
('Web Development Webinar', 'Online session about modern web development', '2025-07-10', '2025-07-10', 5, 5, NULL);

-- Sample tickets
INSERT INTO tickets (event_id, user_id, ticket_code, price) VALUES 
(1, 1, 'TC2025-001', 299.99),
(1, 2, 'TC2025-002', 299.99),
(2, 3, 'PHP-WS-001', 149.50),
(3, 1, 'SMF-2025-001', 89.00),
(3, 4, 'SMF-2025-002', 89.00),
(4, 2, 'ART-EXP-001', 25.00),
(5, 5, 'WEB-DEV-001', 0.00);

-- Sample event registrations (many-to-many)
INSERT INTO event_user (event_id, user_id) VALUES 
(1, 1),
(1, 2),
(2, 3),
(3, 1),
(3, 4),
(4, 2),
(4, 5),
(5, 1),
(5, 3),
(5, 5);
