# Pagination Style Unification — চাঁদের পাহাড়

All paginations across the theme have been updated to match the **chobi-pagination** style from `পরিচিতি.php` (ছবি gallery tab).

## Reference Style

- Circular page number buttons (36×36px, rounded)
- "পূর্ববর্তী" / "পরবর্তী" pill-shaped prev/next buttons with border
- Bengali numerals (০, ১, ২, ৩…)
- Gold accent color (`var(--gold-color)`)
- Sliding window showing ~3 page numbers
- Smooth scroll to content on paginated pages

---

## Files Changed

### 1. `functions.php`
**Path:** `wp-content/themes/chaderPahar/functions.php`

- Added `chader_pahar_pagination()` — reusable helper that renders the chobi-pagination HTML with Bengali numerals
- Added `chader_pahar_pagination_css()` — global CSS for `.chobi-pagination`, `.chobi-page-link`, `.chobi-nav-btn` via `wp_head`
- Added `chader_pahar_pagination_scroll()` — smooth scroll to content when `paged > 1` via `wp_footer`
- Updated `kichirmichir_ajax_pagination()` — AJAX handler now uses `chader_pahar_pagination()` instead of raw `paginate_links()`

---

### 2. `category-godya.php` (গদ্য)
**Path:** `wp-content/themes/chaderPahar/category-godya.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS
- Removed `convertToBengaliNumbers` JS

---

### 3. `category-golpo.php` (গল্প)
**Path:** `wp-content/themes/chaderPahar/category-golpo.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS
- Removed `convertToBengaliNumbers` JS

---

### 4. `category-kobita.php` (কবিতা)
**Path:** `wp-content/themes/chaderPahar/category-kobita.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS
- Removed `convertToBengaliNumbers` JS

---

### 5. `category-pradarshany.php` (প্রদর্শনী)
**Path:** `wp-content/themes/chaderPahar/category-pradarshany.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS
- Removed `convertToBengaliNumbers` JS

---

### 6. `category-probondho.php` (প্রবন্ধ)
**Path:** `wp-content/themes/chaderPahar/category-probondho.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS
- Removed `convertToBengaliNumbers` JS

---

### 7. `category.php` (default category)
**Path:** `wp-content/themes/chaderPahar/category.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS
- Removed `convertToBengaliNumbers` JS

---

### 8. `category-chitro-ankon.php` (চিত্রাঙ্কন)
**Path:** `wp-content/themes/chaderPahar/category-chitro-ankon.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS

---

### 9. `প্রতিবেদন.php` (Report)
**Path:** `wp-content/themes/chaderPahar/প্রতিবেদন.php`

- Replaced `<nav id="pagination_one">` with `chader_pahar_pagination()` call
- Removed `#pagination_one` CSS
- Removed `convertToBengaliNumbers` JS

---

### 10. `ভিডিও.php` (Video)
**Path:** `wp-content/themes/chaderPahar/ভিডিও.php`

- Removed `convert_pagination_numbers_to_bengali()` PHP function
- Replaced Bootstrap-style `paginate_links()` block with `chader_pahar_pagination()` call
- Removed `.pagination li` CSS

---

### 11. `category-kichirmichir.php` (কিচিরমিচির / শিশু-সাহিত্য)
**Path:** `wp-content/themes/chaderPahar/category-kichirmichir.php`

- Added initial `chader_pahar_pagination()` call inside `#kichirmichir-posts`
- Updated AJAX JS click selector from `#pagination_one a.page-numbers` → `.chobi-pagination a`
- Updated AJAX response handler to swap `.chobi-pagination` via `outerHTML`
- Removed `convertToBengaliNumbers` JS
- Removed `#pagination_one` CSS

---

## Not Changed

### `পরিচিতি.php` (Reference file)
This is the **reference pagination** (client-side JS gallery pagination). Its inline CSS remains as-is — the global CSS in `wp_head` now provides the same styles everywhere.
