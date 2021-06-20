


CREATE TABLE ITEM
(
  item_code INT NOT NULL,
  item_des VARCHAR(150) NOT NULL,
  item_price INT NOT NULL,
  sell_count INT NOT NULL,
  quantity INT NOT NULL,
  PRIMARY KEY (item_code)
);

CREATE TABLE CUSTOMER
(
  cname VARCHAR(150) NOT NULL,
  caddress VARCHAR(150) NOT NULL,
  customer_no INT NOT NULL,
  PRIMARY KEY (customer_no)
);

CREATE TABLE PURCHASE
(
  net_price INT NOT NULL,
  c_no INT NOT NULL,
  o_time INT NOT NULL,
  o_date DATE NOT NULL,
  Payment_state CHAR(2) NOT NULL,
  PRIMARY KEY (c_no),
  UNIQUE (o_time),
  UNIQUE (o_date)
);

CREATE TABLE Orders
(
  item_des VARCHAR(150) NOT NULL,
  order_no INT NOT NULL,
  time INT NOT NULL,
  date DATE NOT NULL,
  customer_no INT NOT NULL,
  PRIMARY KEY (order_no, customer_no),
  FOREIGN KEY (customer_no) REFERENCES CUSTOMER(customer_no)
);

CREATE TABLE is_in
(
  item_code INT NOT NULL,
  order_no INT NOT NULL,
  PRIMARY KEY (item_code, order_no),
  FOREIGN KEY (item_code) REFERENCES ITEM(item_code),
  FOREIGN KEY (order_no) REFERENCES Orders(order_no)
);

INSERT INTO `CUSTOMER` (`customer_no`, `caddress`, `cname`) VALUES ('0001', '\"The Key Wutthakat\"', '\"Pragati Kharel\"'), ('0002', '\"Ideo Wutthakat\"', '\"Jonnhy Vans\"');

INSERT INTO `ITEM` (`item_price`, `item_des`, `sell_count`, `quantity`, `item_code`) VALUES ('100', '\"Tshirt\"', '1', '5', '3'), ('200', '\"Jeans\"', '1', '5', '4');


INSERT INTO `ORDERS` (`time`, `item_des`, `date`, `customer_no`, `order_no`) VALUES ('1600', '\"Tshirt\"', '2021-06-06', '0001', '100'), ('1500', '\"Jeans\"', '2021-06-10', '0002', '100');

INSERT INTO `PURCHASE` (`net_price`, `c_no`, `payment_state`, `o_date`, `o_time`) VALUES ('100', '0001', '1', '2021-06-06', '1600'), ('200', '0002', '1', '2021-06-10', '1500');
