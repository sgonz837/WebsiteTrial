--
-- Table structure for table "Categories"
--

DROP TABLE IF EXISTS "Categories";
CREATE TABLE "Categories" (
  "CategoryID" INTEGER PRIMARY KEY,
  "CategoryName" TEXT NOT NULL
);

--
-- Dumping data for table "Categories"
--

INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (1, 'Apparel');
INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (2, 'Home and Garden');
INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (3, 'Jewelry');

-- --------------------------------------------------------

--
-- Table structure for table "Customers"
--

DROP TABLE IF EXISTS "Customers";
CREATE TABLE "Customers" (
  "CustomerID" INTEGER PRIMARY KEY,
  "UserName" TEXT NOT NULL,
  "Email" TEXT NOT NULL,
  "Passwd" TEXT NOT NULL,
  "PhoneNumber" TEXT DEFAULT NULL
);

INSERT INTO "Customers" ("UserName", "Email", "Passwd", "PhoneNumber")
            VALUES ("jcarelli", "jc@ku.edu", "11111", "8005551212");

-- --------------------------------------------------------

--
-- Table structure for table "OrderDetails"
--

DROP TABLE IF EXISTS "OrderDetails";
CREATE TABLE "OrderDetails" (
  "OrderID" INTEGER NOT NULL,
  "ProductID" TEXT NOT NULL,
  "Quantity" INTEGER NOT NULL,
  "LineTotal" REAL DEFAULT NULL
);

--
-- Table structure for table "Orders"
--

DROP TABLE IF EXISTS "Orders";
CREATE TABLE "Orders" (
  "OrderID" INTEGER PRIMARY KEY,
  "CustomerID" INTEGER NOT NULL,
  "ProductCost" REAL DEFAULT NULL,
  "Shipping" REAL DEFAULT NULL,
  "Tax" REAL DEFAULT NULL,
  "Total" REAL DEFAULT NULL,
  "OrderDate" INTEGER DEFAULT NULL
);

--
-- Table structure for table "Products"
--

DROP TABLE IF EXISTS "Products";
CREATE TABLE "Products" (
  "ProductID" INTEGER PRIMARY KEY,
  "CategoryID" INTEGER NOT NULL,
  "Taxable" TEXT DEFAULT "yes",
  "Name" TEXT NOT NULL,
  "Description" TEXT DEFAULT NULL,
  "Type" TEXT DEFAULT NULL,
  "Price" REAL DEFAULT NULL,
  "Image" TEXT DEFAULT NULL
);

--
-- Data for table "Products"
--

