-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2023 lúc 05:44 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
  `useName` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`accountID`, `useName`, `pass`, `role`) VALUES
(1, 'pnt01', '1', 1),
(2, 'pnt02', '1', 2),
(3, 'pnt03', '1', 3),
(5, 'pnt05', '1', 1),
(27, 'PNT123', '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `accountID`) VALUES
(1, 'Phan Nhật Thắng', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  `categoryImage` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryImage`) VALUES
(1, 'java', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ft3h.com.vn%2Ftin-tuc%2Fthanh-thao-lap-trinh-java&psig=AOvVaw3PXQ-6UlPbYodXN46AtVVc&ust=1652695619858000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCPDnnYyh4fcCFQAAAAAdAAAAABAJ'),
(2, 'c++', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freeiconspng.com%2Fimg%2F28389&psig=AOvVaw2crM6IxZiKKYfqUvXQPVF2&ust=1652695762648000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCNiQwdCh4fcCFQAAAAAdAAAAABAK'),
(3, 'php', 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fmedia.bitdegree.org%2Fstorage%2Fmedia%2Fimages%2F2020%2F05%2FScreenshot-2019-10-28-at-14.36.00-300x213.png&imgrefurl=https%3A%2F%2Fvn.bitdegree.org%2Fhuong-dan%2Fphp-va-html%2F&tbnid=4bphQ3gZIT7Y3M&vet=12'),
(4, 'c', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fcontent.timesjobs.com%2Fc-programming-language-rises-amid-covid-19%2Farticleshow%2F75733821.cms&psig=AOvVaw01ZB0f4sgw-jo23nn_xYvN&ust=1652695927278000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCMi0qJ-i4fcCFQAA'),
(5, 'full stack', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.istockphoto.com%2Fphoto%2Fmachine-code-languages-on-colorful-signposts-3d-rendering-gm962823340-262977089&psig=AOvVaw3KEnLH8QDjN5TH4Fg_RkBb&ust=1652769945208000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `commentName` varchar(20) NOT NULL,
  `commentTime` datetime NOT NULL,
  `courseID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseDetail` text NOT NULL,
  `courseFee` int(11) NOT NULL,
  `img` char(255) NOT NULL,
  `videoDemo` char(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `courseDetail`, `courseFee`, `img`, `videoDemo`, `categoryID`, `teacherID`) VALUES
(1, 'HTML5 Apps and Games', 'Tìm hiểu cách tạo các trang Web bằng HTML5 và CSS cơ bản, trực tiếp từ PITU, người tạo ra các tiêu chuẩn Web mới nhất.', 1200000, 'https://i.imgur.com/iVPnFRC.png', 'https://www.youtube.com/watch?v=Lz-kJ5ccS20', 1, 1),
(2, 'Lập trình C++: Kỹ năng cơ bản', 'Tìm hiểu các nguyên tắc cơ bản của lập trình bằng ngôn ngữ lập trình C ++, bao gồm lặp, phân nhánh quyết định, kiểu dữ liệu và biểu thức.', 1099000, 'https://i.imgur.com/md0SyA8.png', '', 2, 1),
(4, 'Lập trình cho mọi người (Bắt đầu với Python)', 'Khóa học này là phần giới thiệu \"không có điều kiện tiên quyết\" về Lập trình Python. Bạn sẽ tìm hiểu về các biến, thực thi có điều kiện, thực thi lặp lại và cách chúng ta sử dụng các hàm. Bài tập về nhà được thực hiện trên trình duyệt web nên bạn có thể làm tất cả các bài tập lập trình trên điện thoại hoặc máy tính công cộng.', 899000, 'https://i.imgur.com/NtjAaji.png', '', 5, 1),
(6, 'Giới thiệu về lập trình Java cho người mới bắt đầu', 'Giới thiệu về các doanh nghiệp trí tuệ của khoa học máy tính và nghệ thuật lập trình.', 550000, 'https://i.imgur.com/pdzbj8q.png', '', 1, 1),
(7, 'Giới thiệu về JavaScript', 'Học JavaScript, một ngôn ngữ lập trình phát triển Web, để thêm tính tương tác cho các trang Web của bạn và trở thành một nhà phát triển Web chuyên nghiệp.', 480000, 'https://i.imgur.com/hWO0Mwv.png', '', 4, 1),
(12, 'Cơ bản về khoa học máy tính', 'Đây là một khóa học theo nhịp độ riêng cung cấp Giới thiệu về Máy tính và Lập trình. Khóa học sẽ giải quyết các chủ đề sau, sử dụng ngôn ngữ lập trình Python\r\n', 999000, 'https://i.imgur.com/SbbGH0l.png', '', 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `lessonID` int(11) NOT NULL,
  `lessonName` varchar(20) NOT NULL,
  `lessontImage` char(255) NOT NULL,
  `lessonVideo` char(255) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lesson`
--

INSERT INTO `lesson` (`lessonID`, `lessonName`, `lessontImage`, `lessonVideo`, `courseID`) VALUES
(1, 'bài 1', '', '', 1),
(2, 'bài 2', '', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `paymentFee` int(11) NOT NULL,
  `paymentTime` date NOT NULL,
  `mota` varchar(255) NOT NULL,
  `studentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salary`
--

CREATE TABLE `salary` (
  `salaryID` int(11) NOT NULL,
  `salatyNumber` int(11) NOT NULL,
  `salaryTime` datetime NOT NULL,
  `adminID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `studentPhone` char(10) NOT NULL,
  `studentAdress` varchar(50) NOT NULL,
  `studentEmail` char(30) NOT NULL,
  `studentDate_Birth` date NOT NULL,
  `studentMoney` double NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `studentPhone`, `studentAdress`, `studentEmail`, `studentDate_Birth`, `studentMoney`, `accountID`) VALUES
(2, 'PNT', '0867987120', 'Nghệ An', 'thang0101@gmail.com', '2002-01-01', 300000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `teacherPhone` char(10) NOT NULL,
  `teacherAdress` varchar(50) NOT NULL,
  `teacherEmail` char(30) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `teacherPhone`, `teacherAdress`, `teacherEmail`, `accountID`) VALUES
(1, 'PNT', '0867987120', 'Hà Nội', 'thang0101@gmail.com', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `accountID` (`accountID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `courseID` (`courseID`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `categoryID` (`categoryID`,`teacherID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Chỉ mục cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lessonID`),
  ADD KEY `courseID` (`courseID`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `studentID` (`studentID`,`courseID`),
  ADD KEY `courseID` (`courseID`);

--
-- Chỉ mục cho bảng `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salaryID`),
  ADD KEY `adminID` (`adminID`,`teacherID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `accountID` (`accountID`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `accountID` (`accountID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `salary`
--
ALTER TABLE `salary`
  MODIFY `salaryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`);

--
-- Các ràng buộc cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- Các ràng buộc cho bảng `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- Các ràng buộc cho bảng `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`);

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);

--
-- Các ràng buộc cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
