-- Create the database
CREATE DATABASE IF NOT EXISTS dictionary_db;

-- Use the database
USE dictionary_db;

-- Create a table for the dictionary
CREATE TABLE IF NOT EXISTS dictionary (
    id INT AUTO_INCREMENT PRIMARY KEY,
    word VARCHAR(255) NOT NULL,
    explanation TEXT NOT NULL
);

-- Insert sample data into the dictionary
INSERT INTO dictionary (word, explanation) VALUES
('JavaScript', 'JavaScript is a programming language commonly used in web development.'),
('CSS', 'CSS is a language used to describe the style of HTML documents.'),
('HTML', 'HTML is the standard markup language for creating web pages.'),
('Database', 'A database is an organized collection of structured data.'),
('Python', 'Python is a high-level, interpreted programming language.'),
('MySQL', 'MySQL is an open-source relational database management system.');

-- Query to get an explanation for a specific word
-- For example, fetching explanation for the word "JavaScript"
SELECT explanation FROM dictionary WHERE word = 'JavaScript';
