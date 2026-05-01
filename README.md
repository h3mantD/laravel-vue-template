# Laravel Vue Template

A strict Laravel + Inertia Vue starter template for personal reuse.

## Stack

- PHP `8.4+`
- Laravel `13`
- Inertia.js `v3` + Vue `3`
- Tailwind CSS `v4`
- Vite `v8`
- Pest `v4`
- npm (not Bun)

## Requirements

- PHP `8.4+`
- Composer `2+`
- Node.js `22+`
- npm `10+`
- SQLite (default test/dev setup)

## Quick Start

```bash
composer setup
```

`composer setup` will:

1. Install PHP dependencies
2. Copy `.env` if missing
3. Generate app key
4. Run database migrations
5. Install npm dependencies
6. Build frontend assets

## Daily Development

Run everything together (app server, queue worker, logs, Vite):

```bash
composer dev
```

If you only want frontend dev server:

```bash
npm run dev
```

## Quality & Testing

### Full strict pipeline

```bash
composer test
```

This runs:

- Pint style checks
- Rector dry-run
- ESLint
- Prettier check
- Pest type coverage
- Pest test suite with code coverage threshold
- PHPStan (Larastan)
- TypeScript type checks (`vue-tsc`)

### Useful standalone commands

```bash
composer lint        # auto-fix PHP/frontend style + run Rector
composer lint:check  # check-only lint pipeline
npm run lint         # ESLint autofix
npm run lint:check   # ESLint check
npm run format       # Prettier write
npm run format:check # Prettier check
npm run types:check  # vue-tsc
```

## Dependency Upgrades

Update dependencies in-place:

```bash
composer update:requirements
composer update
npm install
```

## CI

GitHub Actions workflow (`.github/workflows/tests.yml`) runs the same strict checks via:

```bash
composer test
```

## Notes

- Playwright MCP local artifacts are ignored via `/.playwright-mcp`.
- This template includes `laravel/ai` and `laravel/boost`.
