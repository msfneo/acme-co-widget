# Acme Co Widget

A simple and extensible shopping basket engine implemented in PHP. This system handles:

- Product catalog with prices
- Delivery charge rules based on subtotal
- Promotional offers (BOGO Half Price, 3 for 2)
- Unit tests with PHPUnit

## 🛠 Requirements
- Docker
- Docker Compose

---

## 📦 Installation & Running (via Docker)

Clone the repository, then simply run:

```bash
docker-compose up --build
```


## 📁 Project Structure
```
basket/
├── bin/                # Entry point (CLI runner)
├── src/                # Application logic
│   └── Offer/          # Offer strategy implementations
├── tests/              # PHPUnit tests
├── composer.json       # Dependencies and autoloading
├── Dockerfile          # Build instructions for Docker
├── docker-compose.yml  # Docker container setup
├── phpunit.xml         # PHPUnit configuration
└── README.md           # This file
```

## 💡 Example Offers Implemented
### 1. BOGO Half (Buy One, Get One 50% Off)
- Applies to pairs of the same product.

### 2. Three for Two
- For every 3 items, the customer pays for only 2.

## 📘 Example Basket
```php
$catalog = new Catalog([
    'R01' => 32.95,
    'G01' => 24.95,
    'B01' => 7.95
]);

$delivery = new DeliveryCalculator([
    50 => 4.95,
    90 => 2.95
]);

$offers = [
    'R01' => new BogoHalf(),
    'B01' => new ThreeForTwo()
];

$basket = new Basket($catalog, $delivery, $offers);
$basket->add('B01', 'R01', 'R01');
echo $basket->total();
```

