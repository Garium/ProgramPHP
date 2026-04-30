CREATE TABLE "feedback" (
  "Feedback_ID" int NOT NULL AUTO_INCREMENT,
  "feedback" char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  "feedback_date" date NOT NULL,
  "ContactNumberforFeedback" varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  "emailAdressforFeedback" char(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  "name" varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY ("Feedback_ID")
)
CREATE TABLE "company_account" (
  "company_ID" int NOT NULL AUTO_INCREMENT,
  "CompanyName" varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  "Contactemail" varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  "password" varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "accountStatus" varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Active',
  PRIMARY KEY ("company_ID")
)
CREATE TABLE "account_rubrics" (
  "Rubric_ID" int NOT NULL AUTO_INCREMENT,
  "company_ID" int NOT NULL,
  "Rubric_date" date DEFAULT NULL,
  "points" int DEFAULT NULL,
  "certificate_Level" char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY ("Rubric_ID"),
  KEY "fk_Company" ("company_ID"),
  CONSTRAINT "fk_Company" FOREIGN KEY ("company_ID") REFERENCES "company_account" ("company_ID") ON DELETE CASCADE ON UPDATE CASCADE
)
CREATE TABLE "certificate_progress" (
  "certifice_ID" int NOT NULL AUTO_INCREMENT,
  "Rubric_ID" int NOT NULL,
  "certificate_Ref" char(50) COLLATE utf8mb4_general_ci NOT NULL,
  "Voucher_Points" int DEFAULT NULL,
  "amount_Paid" decimal(7,2) DEFAULT NULL,
  "Certificate_Achieved" tinyint(1) DEFAULT NULL,
  PRIMARY KEY ("certifice_ID"),
  KEY "fk_Rubric" ("Rubric_ID"),
  CONSTRAINT "fk_Rubric" FOREIGN KEY ("Rubric_ID") REFERENCES "account_rubrics" ("Rubric_ID") ON DELETE CASCADE ON UPDATE CASCADE
)