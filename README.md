# Course - PHP & Notion API

## 👋 hello

Welcome to the companion repository for the course "Course - PHP & Notion API"! This course is designed to explain & showcase how to use the Notion API with PHP.

## 🛠 Requirements
- PHP
- Composer

## 👾 Samples

- [Sample #1 - Fetching all events](./samples/resources/events.php)
- [Sample #2 - Fetching all past events](./samples/resources/past_events.php)
- [Sample #3 - Fetching all future events](./samples/resources/future_events.php)
- [Sample #4 - Fetching the next event](./samples/resources/next_event.php)
- [Sample #5 - Fetching one event](./samples/resources/event.php)

## 🧨 Getting Started

All samples are easily testable in your browser by running the php built-in web server.

```bash
php -S localhost:9000 -t samples/
```

And then browsing to the host and port you specified (in the above example, `http://localhost:9000`).

## 🚧 How to run the examples

1. Install the dependencies with Composer:

```bash
$ composer install
```

2. Copy the `.env.example` file in the examples folder as `.env`

```bash
$ cp samples/.env.example samples/.env
```

3. Fill the `.env` file with correct information

    - `NOTION_WEBMARDI_DATABASE_ID` a Notion database
    - `NOTION_TOKEN` a valid notion Token for the previous Database

4. Run the PHP built-in web server. Supply the `-t` option to this directory:

```bash
$ php -S localhost:9000 -t samples/
```
