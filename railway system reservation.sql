
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `accomodation` (
  `acc_id` int(11) NOT NULL,
  `acc_type` varchar(35) NOT NULL,
  `acc_price` double NOT NULL,
  `acc_slot` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `accomodation` (`acc_id`, `acc_type`, `acc_price`, `acc_slot`) VALUES


CREATE TABLE `booked` (
  `book_id` int(11) NOT NULL,
  `book_by` varchar(50) NOT NULL,
  `book_contact` varchar(15) NOT NULL,
  `book_address` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_age` int(11) NOT NULL,
  `book_gender` varchar(15) NOT NULL,
  `book_departure` date NOT NULL,
  `dest_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `book_tracker` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `destination` (
  `dest_id` int(11) NOT NULL,
  `dest_destination` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `destination` (`dest_id`, `dest_destination`) VALUES

CREATE TABLE `origin` (
  `origin_id` int(11) NOT NULL,
  `origin_desc` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `origin` (`origin_id`, `origin_desc`) VALUES
(1, 'Palompon');


CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL,
  `stat_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `status` (`stat_id`, `stat_desc`) VALUES

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `trans_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trans_payment` double NOT NULL,
  `trans_passenger` varchar(100) NOT NULL,
  `trans_age` int(11) NOT NULL,
  `trans_gender` varchar(15) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `stat_id` int(11) DEFAULT 1,
  `trans_refunded` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`user_id`, `user_account`, `user_password`) VALUES

ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`acc_id`);

ALTER TABLE `booked`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `dest_id` (`dest_id`,`acc_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `origin_id` (`origin_id`);

ALTER TABLE `destination`
  ADD PRIMARY KEY (`dest_id`);

ALTER TABLE `origin`
  ADD PRIMARY KEY (`origin_id`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`stat_id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `accomodation`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


--
ALTER TABLE `booked`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;


--
ALTER TABLE `destination`
  MODIFY `dest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
ALTER TABLE `origin`
  MODIFY `origin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `status`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
AUTO_INCREMENT for table `transaction`

ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`),
  ADD CONSTRAINT `booked_ibfk_3` FOREIGN KEY (`origin_id`) REFERENCES `origin` (`origin_id`);


