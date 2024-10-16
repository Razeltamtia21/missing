-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2024 pada 17.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'lelouch', 'lelouch@gmail.com', '$2y$10$UtWDiW2e7A9TN63k7uHEPucTWayp6DrRr7AcU0drRlvKWOiINLgba'),
(2, 'razel', 'razeltamtia@gmail.com', '$2y$10$OAm9IHalmV6dLYZZyep0MejC/fab.Pez9T9XXsNRqThwY.BlX4BxG'),
(3, 'Gerald', 'gerald@gmail.com', '$2y$10$3/rvKyFKQCL9vpBqjd3wEeGq7TuKCBbw5f6haKa56iYQJjQCr/Ebu'),
(4, 'dafa', 'dafa@gmail.com', '$2y$10$vLosQ3H8CSQkDUCR2pG22OnhYV2YCr8czXvRwkFcwe8huj6hqIpz6'),
(5, 'andi', 'andi@gmail.com', '$2y$10$fooRnnGJtLnjPlzcb9A28eRZOt/no5v0zmwuBb0wq21U.f3wr/83C'),
(6, 'athalla', 'athalla@gmail.com', '$2y$10$dI5dK6o30pT.fUJc38rp8O1eeM9bciW7AAbVL6gnWRrEZpFW75SHK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
