-- Local development only. Run AFTER `php artisan migrate`.
-- Production has tables/columns that were added outside the migrations;
-- this file reconstructs them from the code (models, controllers, views, imports).
-- Prefer importing a real production dump when one is available.

-- ---------- database: jipremium (connection "mysql") ----------

ALTER TABLE partners
    ADD COLUMN isActive TINYINT(1) NOT NULL DEFAULT 1 AFTER name;

ALTER TABLE inquiries
    ADD COLUMN email VARCHAR(255) NULL AFTER id,
    MODIFY inquiry TEXT NOT NULL;

ALTER TABLE buyer_registrations
    MODIFY first_name VARCHAR(255) NULL,
    ADD COLUMN last_name VARCHAR(255) NULL AFTER first_name,
    MODIFY phone VARCHAR(50) NULL,
    ADD COLUMN tag VARCHAR(50) NULL AFTER id_event,
    ADD COLUMN discount DECIMAL(15,2) NOT NULL DEFAULT 0 AFTER platform,
    ADD COLUMN total_payment DECIMAL(15,2) NOT NULL DEFAULT 0 AFTER discount,
    ADD COLUMN type VARCHAR(100) NULL AFTER total_payment;

CREATE TABLE IF NOT EXISTS brands (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(255) NOT NULL,
    brand_desc TEXT NULL,
    booth_no VARCHAR(255) NULL,
    ceo_name VARCHAR(255) NULL,
    website VARCHAR(255) NULL,
    phone_number VARCHAR(100) NULL,
    email VARCHAR(255) NULL,
    status VARCHAR(1) NOT NULL DEFAULT '1',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS categories (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS products (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand_id BIGINT UNSIGNED NULL,
    category_id BIGINT UNSIGNED NULL,
    product_name VARCHAR(255) NOT NULL,
    product_desc TEXT NULL,
    product_image TEXT NULL,
    is_best_product CHAR(1) NOT NULL DEFAULT 'N',
    is_best_design CHAR(1) NOT NULL DEFAULT 'N',
    display_order INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    KEY products_brand_id_index (brand_id),
    KEY products_category_id_index (category_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS images (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(500) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- id is assigned by the app (random int or id_order_detail from the Kreen API)
CREATE TABLE IF NOT EXISTS order_details (
    id VARCHAR(50) NOT NULL PRIMARY KEY,
    id_order VARCHAR(50) NOT NULL,
    id_event_ticket VARCHAR(50) NULL,
    first_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    phone VARCHAR(50) NULL,
    qty INT NOT NULL DEFAULT 1,
    type VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    KEY order_details_id_order_index (id_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------- database: kreen_event_local (connection "event_db") ----------
-- Minimal subset used by Api\CheckinBackfillController.

CREATE TABLE IF NOT EXISTS kreen_event_local.tbl_event_order (
    id VARCHAR(50) NOT NULL PRIMARY KEY,
    id_event VARCHAR(50) NULL,
    invoice_number VARCHAR(100) NULL,
    first_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    phone VARCHAR(50) NULL,
    date_event DATE NULL,
    status VARCHAR(5) NULL,
    created_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS kreen_event_local.tbl_event_order_detail (
    id VARCHAR(50) NOT NULL PRIMARY KEY,
    id_order VARCHAR(50) NOT NULL,
    id_event_ticket VARCHAR(50) NULL,
    first_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    phone VARCHAR(50) NULL,
    status VARCHAR(5) NULL,
    flag_present TINYINT(1) NULL,
    KEY id_order (id_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS kreen_event_local.tbl_event_log_scan (
    id VARCHAR(50) NOT NULL PRIMARY KEY,
    id_merchant VARCHAR(50) NULL,
    id_event VARCHAR(50) NULL,
    id_order_detail VARCHAR(50) NOT NULL,
    type_scan VARCHAR(50) NOT NULL,
    scan_date DATETIME NULL,
    user_input VARCHAR(100) NULL,
    platform VARCHAR(50) NULL,
    UNIQUE KEY uniq_order_detail_type (id_order_detail, type_scan)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS kreen_event_local.tbl_event_order_form_answer (
    id VARCHAR(50) NOT NULL PRIMARY KEY,
    id_order VARCHAR(50) NOT NULL,
    id_order_detail VARCHAR(50) NOT NULL,
    id_order_form_master VARCHAR(50) NOT NULL,
    answer TEXT NULL,
    KEY id_order_detail (id_order_detail)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
